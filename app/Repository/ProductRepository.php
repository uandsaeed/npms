<?php
    /**
     * Created by PhpStorm.
     * User: ariful.haque
     * Date: 10/06/2018
     * Time: 2:33 AM
     */

    namespace App\Repository;

    use App\Product;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Cache;


    /**
     * Class ProductRepository
     *
     * @package App\Repository
     */
    class ProductRepository implements IRepository
    {
        public $type = null;
        public $brand = null;

        public function __construct()
        {

            $this->type = new ProductTypeRepository();
            $this->brand = new BrandRepository();

        }

        /**
         * @return mixed
         */
        public function getAllPaginated($page){

//            $products = Cache::tags(['BROWSE_PRODUCTS'])->remember('BROWSE_PRODUCTS_'.$page, 10, function (){

                return Product::where('status', 1)
                        ->orderBy('updated_at', 'desc')
                        ->paginate(10);
//            });
//
//            return $products;
        }


        /**
         * @param      $data []
         *
         * @param bool $flushCache
         * @return Product ;
         */
        public function insert($data, $flushCache = false){

            $user = Auth::user();
            $product = new Product();
            $product->title = $data['title'];
            $product->ingredients = $data['ingredients'];
            $product->price = $data['price'];
            $product->currency = $data['currency'];

            $brand = $this->brand->findByNameOrCreate($data['brand']);
            $product->brand_id = $brand->id;

            $product->description = trim($data['description']);
            $product->instructions = trim($data['instructions']);

            $product->size = $data['size'];
            $product->size_unit = $data['unit'];
            $product->product_type_id = $data['product_type_id'];
            $product->url = isset($data['url']) ? $data['url'] : '';
            $product->status = $data['status'];
            $product->created_by = $user->id;
            $product->updated_by = $user->id;

            $product->save();

            if ($flushCache == true){
                if ($product->status == 1){
                    $this->flushBrowseProducts();
                } else {
                    $this->flushPendingProducts();
                }
            }

            return $product;
        }

        /**
         * @param $data
         * @param $id
         * @return mixed
         */
        public function update($data, $id)
        {

            $product = $this->findById($id);

            $oldStatus = $product->status;


            $product->title = $data['title'];
            $product->ingredients = $data['ingredients'];
            $product->price = $data['price'];
            $product->currency = $data['currency'];

            $product->description = trim($data['description']);
            $product->instructions = trim($data['instructions']);

            $brand = $this->brand->findByNameOrCreate($data['brand']);

            $product->brand_id = $brand->id;

            $product->size = $data['size'];
            $product->size_unit = $data['unit'];
            $product->product_type_id = $data['product_type_id'];
            $product->status = $data['status'];

            $product->updated_by = getAuthUser()->id;

            $product->save();

            $this->flushProductById($id);

            // if status changed, flush both browsing cache
            if ($oldStatus !== $product->status){
                $this->flushPendingProducts();
                $this->flushBrowseProducts();
            }

            return $product;

        }


        /**
         * @param     $keyword
         * @param int $status
         * @param     $page
         * @param     $per_page
         * @return
         */
        public function search($keyword, $status = 1, $page, $per_page){

            $key = 'BROWSE_PRODUCTS_SEARCH_'.str_slug($keyword).'_STATUS_'.$status.'_PAGE_'.$page.'_PER_PAGE_'.$per_page;

            $products = Cache::tags(['BROWSE_PRODUCTS_SEARCH'])
                ->remember($key, 10,
                function () use($keyword, $status, $per_page){

                    return Product::with(['brand', 'labels', 'createdBy', 'updatedBy', 'productType'])
                        ->where('status', $status)
                        ->where(function ($query) use($keyword){

                            $query->where('title', 'LIKE', '%'.$keyword.'%')
                                ->orWhere('ingredients', 'LIKE', '%'.$keyword.'%');

                        })
                        ->orderBy('updated_at', 'desc')
                        ->paginate($per_page);
            });

            return $products;

        }


        /**
         * @param $id
         * @return mixed
         */
        public function delete($id)
        {
            // TODO: Implement delete() method.
        }

        /**
         * @param $id
         * @return mixed
         */
        public function findById($id)
        {

            $product = Cache::tags(['PRODUCT_BY_ID'])->remember('PRODUCT_BY_ID_'.$id, 10, function () use($id){

                return Product::with('permissions', 'brand', 'labels', 'productType', 'createdBy', 'updatedBy')
                        ->find($id);
            });


            return $product;

        }


        /**
         *
         */
        public function getPendingProducts(){


            $products = Cache::tags(['PENDING_PRODUCTS'])->remember('PENDING_PRODUCTS', 10, function () {

                return Product::with('brand', 'labels', 'productType', 'createdBy', 'updatedBy')
                    ->where('status', 0)
                    ->orderBy('updated_at', 'desc')
                    ->paginate(10);

            });

            return $products;

        }

        /**
         * @param $id
         */
        public function flushProductById($id){

            Cache::tags(['PRODUCT_BY_ID'])->flush('PRODUCT_BY_ID_'.$id);

        }

        public function flushBrowseProducts(){
            Cache::tags(['BROWSE_PRODUCTS', 'GLOBAL_PERMISSIONS', 'PENDING_PRODUCTS'])->flush();
        }

        /**
         *
         */
        public function flushPendingProducts(){
            Cache::tags(['PENDING_PRODUCTS'])->flush();
        }

        /**
         *
         */
        public function flushGlobalPermission(){

            Cache::tags(['GLOBAL_PERMISSIONS'])->flush();

        }
    }
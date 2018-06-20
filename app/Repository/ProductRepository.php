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
        public function getAllPaginated(){


            $products = Product::where('status', 1)
                ->orderBy('updated_at', 'desc')
                ->paginate(10);


            return $products;

        }



        /**
         * @param $data []
         *
         * @return  Product;
         */
        public function insert($data){

            $product = new Product();
            $product->title = $data['title'];
            $product->ingredients = $data['ingredients'];
            $product->price = $data['price'];
            $product->currency = $data['currency'];

            $brand = $this->brand->findByNameOrCreate($data['brand']);
            $product->brand_id = $brand->id;

            $product->size = $data['size'];
            $product->size_unit = $data['unit'];
            $product->product_type_id = $data['product_type_id'];
            $product->url = isset($data['url']) ? $data['url'] : 'test';
            $product->status = $data['status'];
            $product->created_by = getAuthUser()->id;
            $product->updated_by = getAuthUser()->id;

            $product->save();

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

            $product->title = $data['title'];
            $product->ingredients = $data['ingredients'];
            $product->price = $data['price'];
            $product->currency = $data['currency'];

            $brand = $this->brand->findByNameOrCreate($data['brand']);

            $product->brand_id = $brand->id;

            $product->size = $data['size'];
            $product->size_unit = $data['unit'];
            $product->product_type_id = $data['product_type_id'];
            $product->status = $data['status'];

            $product->updated_by = getAuthUser()->id;

            $product->save();

            return $product;

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
                    ->where('status', 0)->paginate(10);

            });

            return $products;

        }

        /**
         * @param $id
         */
        public function flushProductById($id){

            Cache::tags(['PRODUCT_BY_ID'])->flush('PRODUCT_BY_ID_'.$id);

        }

        /**
         *
         */
        public function flushGlobalPermission(){

            Cache::tags(['GLOBAL_PERMISSIONS'])->flush();

        }
    }
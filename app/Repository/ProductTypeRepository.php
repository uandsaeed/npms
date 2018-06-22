<?php
    /**
     * Created by PhpStorm.
     * User: ariful.haque
     * Date: 10/06/2018
     * Time: 2:33 AM
     */

    namespace App\Repository;

    use App\ProductType;
    use Illuminate\Support\Facades\Cache;


    /**
     * Class ProductTypeRepository
     *
     * @package App\Repository
     */
    class ProductTypeRepository implements IRepository
    {

        public function getAllList(){

            $types = Cache::tags(['PRODUCT_TYPES'])->remember('PRODUCT_TYPES_ALL', 20, function (){

                return ProductType::with(['createdBy', 'updatedBy', 'products'])
                        ->get();

            });

            return $types;

        }


        /**
         * @param $page
         * @return mixed
         */
        public function getAllPaginated($page){

            $products = Cache::tags(['BROWSE_PRODUCT_TYPE'])->remember('BROWSE_PRODUCT_TYPE_'.$page, 10, function (){

                return ProductType::with(['createdBy', 'updatedBy', 'products'])
                    ->orderBy('updated_at', 'desc')
                    ->paginate(10);
            });

            return $products;
        }


        /**
         * @param $data
         * @return ProductType
         */
        public function insert($data){

            $type = new ProductType();
            $type->title = $data['title'];
            $type->slug = $data['slug'];
            $type->description = $data['description'];


            $type->created_by = getAuthUser()->id;
            $type->updated_by = getAuthUser()->id;

            $type->save();

            $this->flushBrowseProductTypes();

            return $type;
        }

        /**
         * @param $data
         * @param $id
         * @return mixed
         */
        public function update($data, $id)
        {

            $type = $this->findById($id);

            $type->title = $data['title'];
            $type->slug = $data['slug'];
            $type->description = $data['description'];


            $type->updated_by = getAuthUser()->id;
            $type->save();

            $this->flushProductById($id);
            $this->flushBrowseProductTypes();

            return $type;

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

            $type = Cache::tags(['PRODUCT_TYPE_BY_ID'])->remember('PRODUCT_BY_ID_'.$id, 10, function () use($id){

                return ProductType::with(['createdBy', 'updatedBy'])
                    ->find($id);
            });


            return $type;
        }

        public function findByNameOrCreate($name){

            $type = ProductType::firstOrCreate(['title' => $name, 'slug' => str_slug($name)]);

            return $type;

        }


        /**
         * @param $id
         */
        public function flushProductById($id){

            Cache::tags(['PRODUCT_TYPE_BY_ID'])->flush('PRODUCT_TYPE_BY_ID_'.$id);

        }

        public function flushBrowseProductTypes(){

            Cache::tags(['BROWSE_PRODUCT_TYPE'])->flush();
            Cache::tags(['PRODUCT_TYPES'])->flush();

        }


    }
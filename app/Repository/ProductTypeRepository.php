<?php
    /**
     * Created by PhpStorm.
     * User: ariful.haque
     * Date: 10/06/2018
     * Time: 2:33 AM
     */

    namespace App\Repository;


    use App\ProductType;
    use Illuminate\Support\Facades\Auth;
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

            $user = Auth::user();
            $type = new ProductType();
            $type->title = $data['title'];
            $type->slug = $data['slug'];
            $type->description = isset($data['description']) ? $data['description'] : '';


            $type->created_by = $user->id;
            $type->updated_by = $user->id;

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
            $user = Auth::user();

            $type = $this->findById($id);

            $type->title = $data['title'];
            $type->slug = $data['slug'];
            $type->description = $data['description'];


            $type->updated_by = $user->id;
            $type->save();

            $this->flushProductTypeById($id);
            $this->flushBrowseProductTypes();

            return $type;

        }

        /**
         * @param $id
         * @return mixed
         */
        public function delete($id)
        {
            $item = $this->findById($id);

            $item->delete();

            $this->flushProductTypeById($id);
            $this->flushBrowseProductTypes();
            return true;

        }

        /**
         * @param $id
         * @return mixed
         */
        public function findById($id)
        {

            $type = Cache::tags(['PRODUCT_TYPE_BY_ID'])->remember('PRODUCT_BY_ID_'.$id, 60, function () use($id){

                return ProductType::with(['createdBy', 'updatedBy'])
                    ->find($id);
            });


            return $type;
        }

        public function findByNameOrCreate($name){

            $type = $this->findByName($name);

            if ($type){
                return $type;
            } else {

                $type['title'] = $name;
                $type['slug'] = str_slug($name, '-');

                return $this->insert($type);
            }

        }

        public function findByName($name){

            $type = Cache::tags(['PRODUCT_TYPE_BY_NAME'])->remember('PRODUCT_BY_NAME_'.$name, 60, function () use($name){

                return ProductType::with(['createdBy', 'updatedBy'])
                    ->where('title',$name)
                    ->first();
            });


            return $type;

        }


        /**
         * @param $id
         */
        public function flushProductTypeById($id){

            Cache::tags(['PRODUCT_TYPE_BY_ID'])->flush('PRODUCT_TYPE_BY_ID_'.$id);

        }

        public function flushBrowseProductTypes(){

            Cache::tags(['BROWSE_PRODUCT_TYPE'])->flush();
            Cache::tags(['PRODUCT_TYPES'])->flush();
            Cache::tags(['PRODUCT_TYPE_BY_NAME'])->flush();
            Cache::tags(['PRODUCT_TYPE_BY_ID'])->flush();

        }


    }
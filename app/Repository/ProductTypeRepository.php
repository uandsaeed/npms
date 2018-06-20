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

                return ProductType::all();

            });

            return $types;

        }

        public function insert($data){

        }

        /**
         * @param $data
         * @param $id
         * @return mixed
         */
        public function update($data, $id)
        {
            // TODO: Implement update() method.
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
            // TODO: Implement findById() method.
        }

        public function findByNameOrCreate($name){

            $type = ProductType::firstOrCreate(['title' => $name, 'slug' => str_slug($name)]);

            return $type;

        }

    }
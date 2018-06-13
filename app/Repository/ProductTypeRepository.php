<?php
    /**
     * Created by PhpStorm.
     * User: ariful.haque
     * Date: 10/06/2018
     * Time: 2:33 AM
     */

    namespace App\Repository;

    use App\ProductType;


    /**
     * Class ProductTypeRepository
     *
     * @package App\Repository
     */
    class ProductTypeRepository implements IRepository
    {

        public function getAllList(){

//            @tood add cache
            $productTypes = ProductType::all();

            return $productTypes;

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
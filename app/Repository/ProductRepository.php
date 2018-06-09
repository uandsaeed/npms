<?php
    /**
     * Created by PhpStorm.
     * User: ariful.haque
     * Date: 10/06/2018
     * Time: 2:33 AM
     */

    namespace App\Repository;


    /**
     * Class ProductRepository
     *
     * @package App\Repository
     */
    class ProductRepository implements IRepository
    {

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

    }
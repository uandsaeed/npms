<?php
    /**
     * Created by PhpStorm.
     * User: ariful.haque
     * Date: 10/06/2018
     * Time: 2:39 AM
     */

    namespace App\Repository;


    /**
     * Interface IRepository
     *
     * @package App\Repository
     */
    interface IRepository
    {
        /**
         * @param $data
         * @return mixed
         */
        public function insert($data);

        /**
         * @param $data
         * @param $id
         * @return mixed
         */
        public function update($data, $id);


        /**
         * @param $id
         * @return mixed
         */
        public function delete($id);

        /**
         * @param $id
         * @return mixed
         */
        public function findById($id);



    }
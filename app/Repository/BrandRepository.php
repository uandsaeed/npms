<?php
    /**
     * Created by PhpStorm.
     * User: ariful.haque
     * Date: 10/06/2018
     * Time: 2:33 AM
     */

    namespace App\Repository;

    use App\Brand;
    use Illuminate\Support\Facades\Auth;


    /**
     * Class BrandRepository
     *
     * @package App\Repository
     */
    class BrandRepository implements IRepository
    {

        /**
         * @param $data
         * @return Brand;
         */
        public function insert($data){

            $item = new Brand();
            $item->title = $data['title'];
            $item->slug = isset($data['slug']) ? $data['slug'] : null;
            $item->description = isset($data['description']) ? $data['description'] : null;

            $item->added_by = Auth::user()->id;
            $item->updated_by = Auth::user()->id;
            $item->save();

            return $item;
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
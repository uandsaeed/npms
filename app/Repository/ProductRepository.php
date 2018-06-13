<?php
    /**
     * Created by PhpStorm.
     * User: ariful.haque
     * Date: 10/06/2018
     * Time: 2:33 AM
     */

    namespace App\Repository;

    use App\Product;
    use Illuminate\Support\Facades\Auth;


    /**
     * Class ProductRepository
     *
     * @package App\Repository
     */
    class ProductRepository implements IRepository
    {
        public $type = null;
        public function __construct()
        {

            $this->type = new ProductTypeRepository();

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
            $product->size = $data['size'];
            $product->size_unit = $data['unit'];
            $product->product_type_id = $data['product_type_id'];
            $product->url = str_slug($data['title']);
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

            $product = Product::find($id);

            return $product;

        }

    }
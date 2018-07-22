<?php
    /**
     * Created by PhpStorm.
     * User: ariful.haque
     * Date: 15/07/2018
     * Time: 6:36 PM
     */

namespace App\Repository;


class SearchRepository
{
    private $productRepo ;

    public function __construct()
    {
        $this->productRepo = new ProductRepository();
    }

    /**
     * @param array $labelIds
     */
    public function getProductsResult($labelIds = []){





    }

}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductInsertRequest;
use App\Repository\ProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class ProductController
 *
 * @package App\Http\Controllers\Admin
 */
class ProductController extends Controller
{

    private  $repo = null;

    public function __construct()
    {
        $this->repo = new ProductRepository();
    }

    public function index(){

        $title = 'Browse Products';

        $types = $this->repo->type->getAllList();

        return view('npms.admin.product.index', ['title' => $title, 'types' => $types]);


    }

    public function create(){


        $title = 'Create Product';
        $types = $this->repo->type->getAllList();


        return view('npms.admin.product.create', ['title' => $title, 'types' => $types]);


    }

    public function edit($id){

//        dd($id);
        $title = 'Edit Product';
        $types = $this->repo->type->getAllList();
        $product = $this->repo->findById($id);

        return view('npms.admin.product.create', ['title' => $title, 'types' => $types, 'product' => $product]);


    }


    /**
     *
     * @param ProductInsertRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function insert(ProductInsertRequest $request){

        $posts = $request->all();
        $product = $this->repo->insert($posts);

        return response()->redirectTo('admin/product/edit/'.$product->id);



    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Events\ProductCreated;
use App\Http\Requests\ProductInsertRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Class UserController
 *
 * @package App\Http\Controllers\Admin
 */
class UserController extends Controller
{

    private  $repo = null;

    public function __construct()
    {
        $this->repo = new UserRepository();

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){

        $posts = $request->all();

        $page = isset($posts['page']) ? $posts['page'] : 1;
        $title = 'Browse Users';

        $users = $this->repo->getAllPaginatedVisitors($page);

        return view('npms.admin.users.subscribers.index', ['title' => $title, 'items' => $users]);


    }


    /**
     * Search Product
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request){

        $posts = $request->all();

        $page = isset($posts['page']) ? $posts['page'] : 1;

        $products = $this->repo->search($posts['s'], $posts['status'], $page, $posts['per_page']);

        $title = 'Searching '.$posts['s'];

        return view('npms.admin.product.index', ['title' => $title, 'products' => $products]);

    }


    /**
     * Create a product
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){

        $title = 'Create User';
//        $types = $this->repo->type->getAllList();

        return view('npms.admin.users.moderators.create',
            ['title' => $title]);
    }



    public function edit($id){

        $title = 'Edit Product';
        $types = $this->repo->type->getAllList();
        $product = $this->repo->findById($id);

        $keywords = $this->labelRepo->getKeywordsByType([1,2,3,4], '1234');

        return view('npms.admin.product.create',
                    ['title' => $title, 'types' => $types, 'product' => $product,
                          'keywords' => $keywords]);


    }


    /**
     *
     * @param ProductInsertRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function insert(ProductInsertRequest $request){


        $posts = $request->all();

        $product = $this->repo->insert($posts, true);

        event(new ProductCreated($product));

        return response()->redirectTo(url('/admin/product/edit/'.$product->id));

    }

    /**
     * @param ProductUpdateRequest $request
     * @param                      $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProductUpdateRequest $request, $id){

        $posts = $request->all();
        $product = $this->repo->update($posts, $id);

        return response()->redirectTo(url('/admin/product/edit/'.$product->id));

    }
    
}

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
 * Class AdminController
 *
 * @package App\Http\Controllers\Admin
 */
class AdminController extends Controller
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
        $title = 'Browse Admins';

        $users = $this->repo->getAllPaginatedAdmins($page);

        return view('npms.admin.users.admins.index', ['title' => $title, 'items' => $users]);


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

        $title = 'Create Admin';

        return view('npms.admin.users.admins.create',
            ['title' => $title]);
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){

        $title = 'Edit Admin';

        $record = $this->repo->findById($id);
        return view('npms.admin.users.admins.create',
                    ['title' => $title, 'user' => $record]);


    }


    /**
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function insert(Request $request){


        $posts = $request->all();
        $record = $this->repo->insert($posts, true);

        return response()->redirectTo(url('/admin/moderator/edit/'.$record->id));

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

        return response()->redirectTo(url('/admin/moderator/'));

    }
    
}

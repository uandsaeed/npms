<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class PermissionController
 *
 * @package App\Http\Controllers\Admin
 */
class PermissionController extends Controller
{


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){

        $title = 'Product Permission';

//        $posts = $request->all();
//        $page = isset($posts['page']) ? $posts['page'] : 1;
//        $products = $this->repo->getAllPaginated($page);

        return view('npms.admin.product.permissions', ['title' => $title]);

    }
}

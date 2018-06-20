<?php

namespace App\Http\Controllers\Admin;

use App\ProductPermission;
use App\Repository\ProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class PermissionController
 *
 * @package App\Http\Controllers\Admin
 */
class PermissionController extends Controller
{

    private $repo ;

    public function __construct()
    {

        $this->repo = new ProductRepository();
    }



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

    /**
     * @param Request $request
     * @param         $productId
     * @param         $id
     * @return
     */
    public function change(Request $request, $productId, $id){

        $permission = ProductPermission::find($id);

        $permission->permission = $permission->permission == true ? false : true;
        $permission->save();

        $this->repo->flushProductById($productId);

        return $permission;

    }
}

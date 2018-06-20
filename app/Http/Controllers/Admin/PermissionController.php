<?php

namespace App\Http\Controllers\Admin;

use App\GlobalPermission;
use App\ProductPermission;
use App\Repository\ProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

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


        $permissions = Cache::tags(['GLOBAL_PERMISSIONS'])->remember('GLOBAL_PERMISSIONS', 60, function (){

            return GlobalPermission::with(['createdBy', 'updatedBy'])->get();

        });

        return view('npms.admin.product.permissions', ['title' => $title, 'permissions' => $permissions]);

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

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function insertGlobal(Request $request){

        $posts = $request->all();

        $permission = new GlobalPermission();

        $user = Auth::user();

        $permission->product_field = $posts['field'];
        $permission->permission = $posts['permission'] == 1 ? true : false;
        $permission->created_by = $user->id;
        $permission->updated_by = $user->id;
        $permission->save();

        $this->repo->flushGlobalPermission();

        return response()->json(['permission' => $permission])->setStatusCode(201);

    }

    /**
     * @param Request $request
     * @param         $id
     */
    public function changeGlobal(Request $request, $id){

        $permission = GlobalPermission::find($id);

        $permission->permission = $permission->permission == true ? false : true;
        $permission->save();

        $this->repo->flushGlobalPermission();

        return $permission;

    }
}

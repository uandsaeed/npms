<?php

namespace App\Http\Controllers\Admin;

use App\Repository\ProductTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class ProductTypeController
 *
 * @package App\Http\Controllers\Admin
 */
class ProductTypeController extends Controller
{

    private $repo = null;

    public function __construct()
    {
        $this->repo = new ProductTypeRepository();
    }

    /**
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){


        $title = 'Product Type List';

        $posts = $request->all();

        $page = isset($posts['page']) ? $posts['page'] : 1;

        $types = $this->repo->getAllPaginated($page);

        return view('npms.admin.product_types.index', ['title' => $title, 'types' => $types]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function insert(Request $request){


        $posts = $request->all();

        $type = $this->repo->insert($posts, true);


        return response()->redirectTo('admin/product/types/'.$type->id);

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){

        $title = 'Edit Product Type';

        $type = $this->repo->findById($id);

        return view('npms.admin.product_types.edit', ['title' => $title,  'type' => $type]);

    }


    /**
     * @param Request $request
     * @param         $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id){

        $posts = $request->all();
        $type = $this->repo->update($posts, $id);

        return response()->redirectTo('admin/product/types/'.$type->id);

    }

    public function delete($id){

        $user = getAuthUser();


        if ($user->role == getUserRole(USER_ROLE_ADMIN)){

            $this->repo->delete($id);

            return response()->redirectTo('/admin/product/types');
        }

    }


}

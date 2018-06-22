<?php

namespace App\Http\Controllers\Admin;

use App\Repository\BrandRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    private  $repo = null;

    public function __construct()
    {
        $this->repo = new BrandRepository();
    }

    /**
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){


        $title = 'Brand List';

        $posts = $request->all();

        $page = isset($posts['page']) ? $posts['page'] : 1;

        $brands = $this->repo->getAllPaginated($page);

        return view('npms.admin.brand.index', ['title' => $title, 'brands' => $brands]);

    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){

        $title = 'Create Brand';

        return view('npms.admin.brand.create', ['title' => $title]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function insert(Request $request){


        $posts = $request->all();

        $brand = $this->repo->insert($posts);


        return response()->redirectTo('admin/brand/'.$brand->id);

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){

        $title = 'Edit Brand Type';

        $brand = $this->repo->findById($id);



        return view('npms.admin.brand.edit', ['title' => $title,  'brand' => $brand]);

    }


    /**
     * @param Request $request
     * @param         $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id){

        $posts = $request->all();
        $type = $this->repo->update($posts, $id);

        return response()->redirectTo('admin/brand/'.$type->id);


    }

    public function delete($id){

        $user = getAuthUser();

        if ($user->role == getUserRole(USER_ROLE_ADMIN)){

            $this->repo->delete($id);

            return response()->redirectTo('/admin/brand');
        }

    }

}

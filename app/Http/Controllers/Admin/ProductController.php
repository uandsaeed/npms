<?php

namespace App\Http\Controllers\Admin;

use App\Events\ProductCreated;
use App\Http\Requests\ProductInsertRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Repository\LabelRepository;
use App\Repository\ProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Class ProductController
 *
 * @package App\Http\Controllers\Admin
 */
class ProductController extends Controller
{

    private  $repo = null;
    private $labelRepo = null;

    public function __construct()
    {
        $this->repo = new ProductRepository();
        $this->labelRepo = new LabelRepository();

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){

        $posts = $request->all();

        $page = isset($posts['page']) ? $posts['page'] : 1;
        $title = 'Browse Products';

        $this->repo->flushBrowseProducts();
        $products = $this->repo->getAllPaginated($page);

        return view('npms.admin.product.index', ['title' => $title, 'products' => $products]);


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

        $title = 'Create Product';
        $types = $this->repo->type->getAllList();

        $keywords = $this->labelRepo->getKeywordsByType([1,2,3,4], '1234');

        return view('npms.admin.product.create',
            ['title' => $title, 'types' => $types, 'keywords' => $keywords]);
    }

    /**
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function import(){

        $title = 'Import Product';

        return view('npms.admin.product.import', ['title' => $title]);
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

        return response()->redirectTo('admin/product/edit/'.$product->id);

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

        return response()->redirectTo('admin/product/edit/'.$product->id);

    }

    /**
     * @param Request $request
     * @param         $productId
     * @return \Illuminate\Http\JsonResponse
     */
    public function syncLabel(Request $request, $productId){

        $posts = $request->all();

        $product = $this->repo->findById($productId);

        $product->labels()->syncWithoutDetaching([$posts['labelId']]);
        $this->repo->flushProductById($productId);

        $product = $this->repo->findById($productId);

        $label = $product->labels->where('id', $posts['labelId']);

        return response()->json(['labels' => $label]);

    }

    /**
     * @param Request $request
     * @param         $productId
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeLabel(Request $request, $productId){

        $posts = $request->all();

        $product = $this->repo->findById($productId);

        $product->labels()->detach($posts['labelId']);
        $this->repo->flushProductById($productId);

        return response()->json(['labels' => 'success']);

    }


    /**
     * Upload a excel file
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request){


        $storage = Storage::disk();

        $year   = date('Y', strtotime(now()));
        $month  = date('m', strtotime(now()));
        $day    = date('d', strtotime(now()));

        $originalName = $request->file('qqfile')->getClientOriginalName();

        $path = 'products/'.$year.'/'.$month.'/'.$day;

        $path = $storage->putFileAs($path, $request->file('qqfile'), $originalName);

        $path = storage_path('app/'.$path);



        try {
            $rows = [];

            $productRepo = new ProductRepository();

            Excel::load($path, function ($reader) use(&$rows, $productRepo ){

                foreach ($reader->toArray() as $row) {

                    $product['title']           = $row['title'];
                    $product['ingredients']     = isset($row['ingredients'])? $row['ingredients']: '';
                    $product['price']           = formatePrice($row['price']);
                    $product['currency']        = $row['currency'];
                    $product['brand']           = $row['brand'];
                    $product['size']            = $row['size'];
                    $product['unit']            = $row['size_unit'];
                    $product['description']     = '';
                    $product['instructions']    = '';

                    $product['type']            = $row['type'];

                    $type = $productRepo->type->findByNameOrCreate($row['type']);
                    $product['product_type_id'] = $type->id;

                    $product['url']             = $row['url'];
                    $product['status']          = $row['status'];

                    $newProduct = $productRepo->insert($product);

                    event(new ProductCreated($newProduct));

                    array_push($rows, $product);

                }

            });

            $this->repo->flushBrowseProducts();

            return response()->json(['products' => $rows, 'success' => true] );

        } catch (\Exception $e) {

            return response()->json(['error' => $e->getMessage(), 'file' => $path]);
        }

        return response()->json(['path'=> $path, 'success' => true]);

    }


    public function pending(){

        $title = 'Pending products';


        $product = $this->repo->getPendingProducts();


        return view('npms.admin.product.pending', ['title' => $title, 'products' => $product]);


    }


    /**
     * Change a product status from 0 to 1
     *
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function approve($id){

        $user = getAuthUser();

//        dd($user);
        if ($user->role == 'admin'){


            $product = $this->repo->findById($id);

            $product->status = 1;
            $product->save();

            return response()->json(['product' => $product])->setStatusCode(200);


        } else{

            return response()->json(['message' => 'Unauthenticated'])->setStatusCode(403);

        }


    }
}

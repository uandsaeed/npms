<?php
    /**
     * Created by PhpStorm.
     * User: ariful.haque
     * Date: 10/06/2018
     * Time: 2:33 AM
     */

    namespace App\Repository;

    use App\Product;
    use App\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Cache;


    /**
     * Class UserRepository
     *
     * @package App\Repository
     */
    class UserRepository implements IRepository
    {
        public $type = null;
        public $brand = null;

        public function __construct()
        {

            $this->type = new ProductTypeRepository();
            $this->brand = new BrandRepository();

        }

        /**
         * @todo add cache
         * @return mixed
         */
        public function getAllPaginatedVisitors($page){

//            $products = Cache::tags(['BROWSE_PRODUCTS'])->remember('BROWSE_PRODUCTS_'.$page, 10, function (){

                return User::where('role', USER_ROLE_VISITOR)
                        ->orderBy('last_login', 'desc')
                        ->paginate(10);
//            });
//
//            return $products;
        }


        /**
         * @todo add cache
         *
         * @param $page
         * @return mixed
         */
        public function getAllPaginatedAdmins($page){

//            $products = Cache::tags(['BROWSE_PRODUCTS'])->remember('BROWSE_PRODUCTS_'.$page, 10, function (){

            return User::where('role', USER_ROLE_ADMIN)
                ->orderBy('last_login', 'desc')
                ->paginate(10);
//            });
//
//            return $products;
        }

        /**
         * @param      $data []
         *
         * @param bool $flushCache
         * @return Product ;
         */
        public function insert($data, $flushCache = false){

            $auth = Auth::user();
            $user = new User();
            $user->name             = $data['first_name'];
            $user->last_name        = $data['last_name'];
            $user->email            = $data['email'];
            $user->password         = bcrypt($data['email']);

            if($data['role'] == USER_ROLE_VISITOR){
                $user->gender           = $data['gender'];
                $user->date_of_birth    = $data['date_of_birth'];
                $user->skin_tone        = $data['skin_tone'];
            }

            $user->role             = $data['role'];
            $user->status           = $data['user_status'];

            $user->save();

            if ($flushCache == true){
                $this->flushPendingProducts();

            }

            return $user;
        }

        /**
         * @param $data
         * @param $id
         * @return mixed
         */
        public function update($data, $id)
        {

            $user = $this->findById($id);

            $user->name             = $data['first_name'];
            $user->last_name        = $data['last_name'];

            if($data['role'] == USER_ROLE_VISITOR){
                $user->gender           = $data['gender'];
                $user->date_of_birth    = $data['date_of_birth'];
                $user->skin_tone        = $data['skin_tone'];
            }

            $user->role             = $data['role'];
            $user->status           = $data['user_status'];

            $this->flushById($id);

            return $user;

        }


        /**
         * @param     $keyword
         * @param int $status
         * @param     $page
         * @param     $per_page
         * @return
         */
        public function search($keyword, $status = 1, $page, $per_page){

            $key = 'BROWSE_PRODUCTS_SEARCH_'.str_slug($keyword).'_STATUS_'.$status.'_PAGE_'.$page.'_PER_PAGE_'.$per_page;

            $products = Cache::tags(['BROWSE_PRODUCTS_SEARCH'])
                ->remember($key, 10,
                function () use($keyword, $status, $per_page){

                    return Product::with(['brand', 'labels', 'createdBy', 'updatedBy', 'productType'])
                        ->where('status', $status)
                        ->where(function ($query) use($keyword){

                            $query->where('title', 'LIKE', '%'.$keyword.'%')
                                ->orWhere('ingredients', 'LIKE', '%'.$keyword.'%');

                        })
                        ->orderBy('updated_at', 'desc')
                        ->paginate($per_page);
            });

            return $products;

        }


        /**
         * @param $id
         * @return mixed
         */
        public function delete($id)
        {
            // TODO: Implement delete() method.
        }

        /**
         * @param $id
         * @return mixed
         */
        public function findById($id)
        {

            $user = Cache::tags(['USER_BY_ID'])->remember('USER_BY_ID'.$id, 10, function () use($id){

                return User::find($id);
            });


            return $user;

        }


        /**
         *
         */
        public function getPendingProducts(){


            $products = Cache::tags(['PENDING_PRODUCTS'])->remember('PENDING_PRODUCTS', 10, function () {

                return Product::with('brand', 'labels', 'productType', 'createdBy', 'updatedBy')
                    ->where('status', 0)
                    ->orderBy('updated_at', 'desc')
                    ->paginate(10);

            });

            return $products;

        }

        /**
         * @param $id
         */
        public function flushById($id){

            Cache::tags(['USER_BY_ID'])->flush('USER_BY_ID'.$id);

        }

        public function flushCache(){
            Cache::tags(['USER_BY_ID'])->flush();
        }


    }
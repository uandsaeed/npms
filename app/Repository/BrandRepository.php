<?php
    /**
     * Created by PhpStorm.
     * User: ariful.haque
     * Date: 10/06/2018
     * Time: 2:33 AM
     */

    namespace App\Repository;

    use App\Brand;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Cache;


    /**
     * Class BrandRepository
     *
     * @package App\Repository
     */
    class BrandRepository implements IRepository
    {
        public function getAllList(){

            $brands = Cache::tags(['BROWSE_BRAND_ALL'])->remember('BROWSE_BRAND_ALL', 20, function (){

                return Brand::with(['createdBy', 'updatedBy', 'products'])
                            ->get();

            });

            return $brands;
        }


        /**
         * @param $page
         * @return mixed
         */
        public function getAllPaginated($page){

            $products = Cache::tags(['BROWSE_BRAND'])->remember('BROWSE_BRAND_'.$page, 10, function (){

                return Brand::with(['createdBy', 'updatedBy', 'products'])
                    ->orderBy('updated_at', 'desc')
                    ->paginate(10);
            });

            return $products;
        }


        /**
         * @param $data
         * @return Brand;
         */
        public function insert($data){

            $item = new Brand();
            $item->title = $data['title'];
            $item->slug = isset($data['slug']) ? $data['slug'] : null;
            $item->description = isset($data['description']) ? $data['description'] : null;

            $item->created_by = getAuthUser()->id;
            $item->updated_by = getAuthUser()->id;
            $item->save();

            $this->flushBrowseBrand();

            return $item;
        }

        /**
         * @param $data
         * @param $id
         * @return mixed
         */
        public function update($data, $id)
        {
            $item = $this->findById($id);

            $item->title = $data['title'];
            $item->slug = $data['slug'];
            $item->description = $data['description'];


            $item->updated_by = getAuthUser()->id;
            $item->save();

            $this->flushBrandById($id);
            $this->flushBrowseBrand();

            return $item;

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

            $brand = Cache::tags(['BRAND_BY_ID'])->remember('BRAND_BY_ID_'.$id, 10, function () use($id){

                return Brand::with(['createdBy', 'updatedBy', 'products'])
                    ->find($id);
            });


            return $brand;
        }

        /**
         * @param $name
         */
        public function findByName($name){

            $brand = Cache::tags(['BRAND_BY_NAME_'])->remember('BRAND_BY_NAME_'.str_slug($name), 20,
                function () use($name) {

                    return  Brand::with(['createdBy', 'updatedBy', 'products'])
                        ->where('title', $name)->first();

            });

            return $brand;

        }

        /**
         * @param $name
         * @return Brand
         */
        public function findByNameOrCreate($name){

            $brand = Brand::where('title', $name)->first();

            if ($brand){

                return $brand;

            } else{

                $brand = new Brand();
                $brand->title = $name;
                $brand->slug = str_slug($name);
                $brand->created_by = getAuthUser()->id;
                $brand->updated_by = getAuthUser()->id;
                $brand->save();

                return $brand;

            }

        }


        /**
         * @param $id
         */
        public function flushBrandById($id){

            Cache::tags(['BRAND_BY_ID'])->flush('BRAND_BY_ID_'.$id);

        }

        public function flushBrowseBrand(){

            Cache::tags(['BROWSE_BRAND_ALL'])->flush();
            Cache::tags(['BROWSE_BRAND'])->flush();

        }



    }
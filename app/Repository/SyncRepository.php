<?php
    /**
     * Created by PhpStorm.
     * User: ariful.haque
     * Date: 15/06/2018
     * Time: 2:13 PM
     */

    namespace App\Repository;

    use App\Label;
    use App\Product;
    use Carbon\Carbon;
    use Illuminate\Support\Facades\Cache;
    use Illuminate\Support\Facades\Log;
    use App\Repository\LabelRepository;

    /**
     * Class SyncRepository
     *
     * @package App\Repository
     */
    class SyncRepository
    {


        /**
         * @param Label $label
         * @return Label
         */
        public function syncByLabelId(Label $label){

            /**
             * Make keyword as array
             *
             * Check the label match = neutral or positive or negative
             *
             * if neutral, regular search
             * if positive, ?
             * if negative, ?
             *
             */

            $keywords = ingredient_explode(trim($label->keywords));

            $products = Product::where(function ($query) use($keywords) {

                /**
                 * @TODO use label->match to add products
                 */
                $first = true;

                // make a like search for each keyword
                foreach ($keywords as $keyword){

                    if($keyword !==''){

                        if ( $first== true){
                            $query->where('ingredients' , 'like', '%'.$keyword.'%');
                            $first = false;
                        } else{
                            $query->orWhere('ingredients' , 'like', '%'.$keyword.'%');
                        }

                    }
                }

            })->get();

            foreach ($products as $product) {

                if (strlen(trim($product->ingredients)) > 0) {

                    $product->labels()->syncWithoutDetaching([$label->id], [
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);

                    Log::info( 'Syncing label ['.$label->title . '] with product ['.$product->title. '] ('.$product->id.')');
                }

            }


            $label->require_sync = false;
            $label->last_sync = Carbon::now();
            $label->save();

            return $label;

        }


        /**
         * @param Product $product
         */
        public function syncByProductId(Product $product){


            if (strlen(trim($product->ingredients)) > 0) {

                $keywords = ingredient_explode($product->ingredients);

                // @get the label using cache for better and fast earch
                $labels = Label::where(function ($query) use($keywords) {

                $first = true;

                // make a like search for each keyword
                foreach ($keywords as $keyword){

                    //@todo sync with keywords only. add title

                    if ( $first== true){
                        $query->where('keywords' , 'like', '%'.$keyword.'%');
                        $first = false;
                    } else{
                        $query->orWhere('keywords' , 'like', '%'.$keyword.'%');
                    }
                }

                })->get();

                foreach ($labels as $label) {

                $label->products()->syncWithoutDetaching([$product->id], [
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);

                $label->require_sync = false;
                $label->last_sync = Carbon::now();
                $label->save();

                Log::info( 'Syncing product ['.$product->title . '] with label ['.$label->title. '] ('.$product->id.')');

            }
            }

        }



    }
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
    use Illuminate\Support\Facades\Log;


    /**
     * Class SyncRepository
     *
     * @package App\Repository
     */
    class SyncRepository
    {


        /**
         * @param Label $label
         */
        public function syncByLabelId(Label $label){

            /**
             * Make keyword as array
             */
            $keywords = explode(',', $label->keywords);

            Log::info('Label '.$label->title . ' keywords', $keywords);


            $products = Product::where(function ($query) use($keywords){

                $first = true;

                // make a like search for each keyword
                foreach ($keywords as $keyword){

                    if ( $first== true){
                        $query->where('ingredients' , 'like', '%'.$keyword.'%');
                        $first = false;
                    } else{
                        $query->orWhere('ingredients' , 'like', '%'.$keyword.'%');
                    }
                }
            })->get();

            foreach ($products as $product) {

                $product->labels()->syncWithoutDetaching([$label->id], [
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
                Log::info( 'Syncing ['.$label->title . '] with ['.$product->title. '] ('.$product->id.')');

            }


            $label->require_sync = false;
            $label->last_sync = Carbon::now();
            $label->save();

            Log::info('Label '.$label->title . ' synced');


        }

    }
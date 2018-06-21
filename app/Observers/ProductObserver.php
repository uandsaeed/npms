<?php

namespace App\Observers;

use App\Product;
use App\ProductPermission;
use Illuminate\Support\Facades\Log;

/**
 * Class ProductObserver
 *
 * @package App\Observers
 */
class ProductObserver
{

    /**
     * Listen to the User created event.
     *
     * @param Product $product
     * @return void
     */
    public function created(Product $product)
    {

        $product_array = $product->toArray();


        // list of fields to remove from permissions
        $removeList = ['id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'];

        // remove unnecessary fields
        foreach ($removeList as $remove){
            unset($product_array[$remove]);
        }

        // @todo when added global permission, get the permission from there
        // add permission for each fields
        foreach ($product_array as $key => $field){

            $permission = new ProductPermission();
            $permission->product_id = $product->id;
            $permission->product_field = $key;
            $permission->permission = true;
            $permission->created_by = $product->updated_by;
            $permission->updated_by = $product->updated_by;
            $permission->save();
        }

        Log::info('Permissions created for product => '.$product->title, $product_array);

    }

    /**
     * Listen to the Product deleted event.
     *
     * @param Product $product
     * @return void
     */
    public function deleted(Product $product)
    {
        //
    }

}
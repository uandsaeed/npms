<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductPermission
 *
 * @package App
 */
class ProductPermission extends Model
{

    protected $table = 'product_permissions';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'product_id',
        'product_field',
        'permission',
        'created_by',
        'updated_by',

    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(){

        return $this->belongsTo(Product::class, 'product_id', 'id');

    }
}

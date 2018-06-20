<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GlobalPermission extends Model
{
    protected $table = 'global_permissions';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'product_field',
        'permission',
        'created_by',
        'updated_by',

    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdBy(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function updatedBy(){
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

}

<?php

use Illuminate\Database\Seeder;

    /**
     * Class GlobalPermissionsTableSeeder
     */
    class GlobalPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $fields  = ['title',
            'ingredients',
            'price',
            'currency',
            'brand_id',
            'size',
            'size_unit',
            'product_type_id',
            'url',
            'status'];

        foreach ($fields as $field){

            $permission = new \App\GlobalPermission();
            $permission->product_field = $field;
            $permission->permission = true;
            $permission->created_by = 1;
            $permission->updated_by = 1;
            $permission->save();
        }


    }
}

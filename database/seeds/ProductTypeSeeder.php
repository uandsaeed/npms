<?php

use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $types = [

            ['title' => 'Lotion', 'slug' => 'lotion', 'created_by'=> 1, 'updated_by' => 1],
            ['title' => 'Bread', 'slug' => 'bread', 'created_by'=> 1, 'updated_by' => 1],
            ['title' => 'Vegan', 'slug' => 'vegan', 'created_by'=> 1, 'updated_by' => 1],
            ['title' => 'Cakes', 'slug' => 'Cakes', 'created_by'=> 1, 'updated_by' => 1],

        ];


        \App\ProductType::insert($types);

    }
}

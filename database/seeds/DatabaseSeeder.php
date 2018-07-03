<?php

use Illuminate\Database\Seeder;

    /**
     * Class DatabaseSeeder
     */
    class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserTableSeeder::class);
         $this->call(ProductTypeSeeder::class);
         $this->call(GlobalPermissionsTableSeeder::class);
         $this->call(QuestionsTableSeeder::class);
    }
}

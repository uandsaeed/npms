<?php

    use App\User;
    use Illuminate\Database\Seeder;

    /**
     * Class UserTableSeeder
     */
    class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->name = 'Ariful Haque';
        $admin->email = 'arifulhb@gmail.com';
        $admin->role = USER_ROLE_ADMIN;
        $admin->status = USER_STATUS_ACTIVE;
        $admin->password = bcrypt('secret');
        $admin->save();
    }
}

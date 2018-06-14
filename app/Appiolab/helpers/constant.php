<?php
    /**
     * Created by PhpStorm.
     * User: ariful.haque
     * Date: 08/06/2018
     * Time: 3:08 PM
     */
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Cache;

    /**
     * User
     */

    const USER_ROLE_VOID = 0;
    const USER_ROLE_VISITOR = 1;
    const USER_ROLE_ADMIN = 2;


    const USER_ROLE  = [
        0 => 'void',
        1 => 'visitor',
        2 => 'admin'
    ];

    function getUserRole($value){
        return USER_ROLE[$value];
    }


    const USER_STATUS_ACTIVE = 1;
    const USER_STATUS_INACTIVE = 0;

    /**
     * Product
     */


    /**
     * Label
     */

    /**
     * Question
     */


    /**
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    function getAuthUser(){

        return Cache::remember('auth_user', 20, function () {
            return Auth::user();
        });
    }
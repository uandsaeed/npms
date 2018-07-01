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
    const LABEL_RELEVANCE_NEUTRAL = 0;
    const LABEL_RELEVANCE_NEGATIVE = 1;
    const LABEL_RELEVANCE_POSITIVE = 2;
    const LABEL_RELEVANCE = [
      0 => 'Neutral',
      1 => 'Negative',
      2 => 'Positive',
    ];
    function getLabelRelevance($value){
        return LABEL_RELEVANCE[$value];
    }


    const LABEL_WEIGHT_VOID = 0;
    const LABEL_WEIGHT_LOW = 1;
    const LABEL_WEIGHT_LOW_MEDIUM = 2;
    const LABEL_WEIGHT_MEDIUM = 3;
    const LABEL_WEIGHT_MEDIUM_HIGH = 4;
    const LABEL_WEIGHT_HIGH = 5;
    const LABEL_WEIGHT = [
      0 => 'Void',
      1 => 'Low',
      2 => 'Low Medium',
      3 => 'Medium',
      4 => 'Medium High',
      5 => 'High',
    ];
    function getLabelWeight($value){
        return LABEL_WEIGHT[$value];
    }

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


    /**
     * @link https://stackoverflow.com/questions/31042097/explode-string-when-not-between
     *
     * @param $string
     * @return array
     */
    function ingredient_explode($string){

        $string = str_replace("[", "(", $string);
        $string = str_replace("]", ")", $string);

        $new_string = preg_split('~,(?![^()]*\))~', $string);

        return $new_string;
    }
<?php

use Illuminate\Database\Seeder;

class LabelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $labels = [
            [
                'title'         => 'Female Products',
                'description'   => 'Female Products',
                'keywords'      => 'female, women, girl, ladies',
                'type'          => LABEL_TYPE_GENDER,
                'match'         => LABEL_RELEVANCE_POSITIVE,
                'weight'        => LABEL_WEIGHT_HIGH,
                'require_sync'  => true,
                'created_by'    => 1,
                'updated_by'    => 1,

            ],
            [
                'title'         => 'Male Products',
                'description'   => 'Male Products',
                'keywords'      => 'male, men, boy',
                'type'          => LABEL_TYPE_GENDER,
                'match'         => LABEL_RELEVANCE_POSITIVE,
                'weight'        => LABEL_WEIGHT_HIGH,
                'require_sync'  => true,
                'created_by'    => 1,
                'updated_by'    => 1,
            ],
            [
                'title'         => 'Between £50 - £75',
                'description'   => 'Between £50 - £75',
                'keywords'      => '£50 - £75, 50 - 75, 50,75',
                'type'          => LABEL_TYPE_PRICE,
                'match'         => LABEL_RELEVANCE_POSITIVE,
                'weight'        => LABEL_WEIGHT_HIGH,
                'require_sync'  => true,
                'created_by'    => 1,
                'updated_by'    => 1,
            ],
            [
                'title'         => 'Between £76 - £100',
                'description'   => 'Between £76 - £100',
                'keywords'      => '£76 - £100, 76 - 100, 76,100',
                'type'          => LABEL_TYPE_PRICE,
                'match'         => LABEL_RELEVANCE_POSITIVE,
                'weight'        => LABEL_WEIGHT_HIGH,
                'require_sync'  => true,
                'created_by'    => 1,
                'updated_by'    => 1,
            ],
            [
                'title'         => 'Between £101 - £150',
                'description'   => 'Between £101 - £150',
                'keywords'      => '£101 - £150, 101 - 150, 150,100',
                'type'          => LABEL_TYPE_PRICE,
                'match'         => LABEL_RELEVANCE_POSITIVE,
                'weight'        => LABEL_WEIGHT_HIGH,
                'require_sync'  => true,
                'created_by'    => 1,
                'updated_by'    => 1,
            ],
            [
                'title'         => 'Between £151 - £200',
                'description'   => 'Between £151 - £200',
                'keywords'      => '£151 - £200, 151 - 200, 151, 200',
                'type'          => LABEL_TYPE_PRICE,
                'match'         => LABEL_RELEVANCE_POSITIVE,
                'weight'        => LABEL_WEIGHT_HIGH,
                'require_sync'  => true,
                'created_by'    => 1,
                'updated_by'    => 1,
            ],
            [
                'title'         => '£200+',
                'description'   => '£200+',
                'keywords'      => '£200+, 200+, 200',
                'type'          => LABEL_TYPE_PRICE,
                'match'         => LABEL_RELEVANCE_POSITIVE,
                'weight'        => LABEL_WEIGHT_HIGH,
                'require_sync'  => true,
                'created_by'    => 1,
                'updated_by'    => 1,
            ],
            [
                'title'         => '25 and under',
                'description'   => '25 and under ',
                'keywords'      => '25',
                'type'          => LABEL_TYPE_AGE,
                'match'         => LABEL_RELEVANCE_POSITIVE,
                'weight'        => LABEL_WEIGHT_HIGH,
                'require_sync'  => true,
                'created_by'    => 1,
                'updated_by'    => 1,
            ],
            [
                'title'         => 'Age between 26 - 30',
                'description'   => 'Age between 26 - 30',
                'keywords'      => '26 - 30',
                'type'          => LABEL_TYPE_AGE,
                'match'         => LABEL_RELEVANCE_POSITIVE,
                'weight'        => LABEL_WEIGHT_HIGH,
                'require_sync'  => true,
                'created_by'    => 1,
                'updated_by'    => 1,
            ],
            [
                'title'         => 'Age between 31 - 40',
                'description'   => 'Age between 31 - 40',
                'keywords'      => '31 - 40',
                'type'          => LABEL_TYPE_AGE,
                'match'         => LABEL_RELEVANCE_POSITIVE,
                'weight'        => LABEL_WEIGHT_HIGH,
                'require_sync'  => true,
                'created_by'    => 1,
                'updated_by'    => 1,
            ],
            [
                'title'         => 'Age between 41 - 50',
                'description'   => 'Age between 41 - 50',
                'keywords'      => '41 - 50',
                'type'          => LABEL_TYPE_AGE,
                'match'         => LABEL_RELEVANCE_POSITIVE,
                'weight'        => LABEL_WEIGHT_HIGH,
                'require_sync'  => true,
                'created_by'    => 1,
                'updated_by'    => 1,
            ],
            [
                'title'         => 'Age between 51 - 65',
                'description'   => 'Age between 51 - 65',
                'keywords'      => '51 - 65',
                'type'          => LABEL_TYPE_AGE,
                'match'         => LABEL_RELEVANCE_POSITIVE,
                'weight'        => LABEL_WEIGHT_HIGH,
                'require_sync'  => true,
                'created_by'    => 1,
                'updated_by'    => 1,
            ],
            [
                'title'         => 'Age between 65+',
                'description'   => 'Age between 65+',
                'keywords'      => '65+',
                'type'          => LABEL_TYPE_AGE,
                'match'         => LABEL_RELEVANCE_POSITIVE,
                'weight'        => LABEL_WEIGHT_HIGH,
                'require_sync'  => true,
                'created_by'    => 1,
                'updated_by'    => 1,
            ]

        ];

        \App\Label::insert($labels);

    }
}

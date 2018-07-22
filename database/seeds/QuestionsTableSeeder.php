<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            0 => [
                'question' => 'Are you male or female?',
                'sort' => 1,
                'answers' => [
                    'Female',
                    'Male'
                ]
            ],
            1 => [
                'question' => 'What is your budget for a full skincare regime (including all products)?',
                'sort' => 2,
                'answers' => [
                    '£50 - £75',
                    '£75 - 100',
                    '£100 - 150',
                    '£150 - 200',
                    '£200+'
                ]
            ],
            2 => [
                'question' => 'What is your age?',
                'sort' => 3,
                'answers' => [
                    '25 and under',
                    '26 - 30',
                    '31 - 40',
                    '41 - 50',
                    '51 - 65',
                    '65+'
                ]
            ],
            3 => [
                'question' => 'How many products would you be willing to use in your regime?',
                'sort' => 4,
                'answers' => [
                    '2', '3', '4', '5', '6+'
                ]
            ],
            4 => [
                'question' => 'What is your natural skin tone?',
                'sort' => 5,
                'answers' => [
                    'Type 1 ()',
                    'Type 2 ()',
                    'Type 3 ()',
                    'Type 4 ()',
                    'Type 5 ()'
                ]
            ],
            5 => [
                'question' => 'After spending time in the sun, my skin becomes:',
                'sort' => 6,
                'answers' => [
                    'My skin always burns, never tans',
                    'My skin usually burns, tans with some difficulty',
                    'My skin burns sometimes and is slow to tan',
                    'My skin rarely burns and tans quickly',
                    'My skin rarely burns; it is really easy and fast to tan',
                    'My skin almost never burns; fast and dark tanning'
                ]
            ],
            6 => [
                'question' => 'When you first wake up in the morning (before using any product), how does your skin feel?',
                'sort' => 7,
                'answers' => [
                    'Oily all over',
                    'Oily t-zone, dry cheeks',
                    'Normal',
                    'Dry everywhere',
                    'Other'
                ]
            ],
            7 => [
                'question' => 'Skincare moisturizers, makeup, and cleansers cause my face to break out, itch or burn:',
                'sort' => 8,
                'answers' => [
                    'Always',
                    'Often',
                    'Sometimes',
                    'Rarely',
                    'Never'
                ]
            ],
            8 => [
                'question' => 'Which best describes the results you are looking for in your new regime?',
                'sort' => 9,
                'answers' => [
                    'Reducing blemishes/acne',
                    'Adding more moisture to dry skin',
                    'Anti-aging results',
                    'General improvement in texture and radiance, no specific concerns',
                    'Improving scarring'
                ]
            ],
            9 => [
                'question' => 'How would you best describe your living environment :',
                'sort' => 10,
                'answers' => [
                    'High sun exposure, high pollution levels',
                    'Low sun exposure, high pollution levels',
                    'High sun exposure, low pollution levels',
                    'Low sun exposure, low pollution levels'
                ]
            ],
            10 => [
                'question' => 'Do you suffer with any of the following concerns:',
                'sort' => 11,
                'answers' => [
                    'Acne',
                    'Spots',
                    'Pigmentation marks',
                    'Scarring',
                    'Excessive oiliness',
                    'Bumps under the skin',
                    'Ezcema / Dry patches',
                    'Rosacea / Redness',
                    'Sensitive skin',
                    'Fine lines',
                    'Wrinkles',
                    'Enlarged pores',
                    'Blackheads',
                    'Dullness',
                    'Dark circles around the eyes',
                    'Puffiness around the eyes',
                    'Sagging skin',
                    'None'
                ]
            ],
            11 => [
                'question' => 'Which types of ingredients sensitive to?',
                'sort' => 12,
                'answers' => [
                    'Fragrances',
                    'Essential oils',
                    'Vitamins',
                    'Gluten',
                    'Shea Butter',
                    'Nuts',
                    'Other',
                    'None'
                ]
            ],
            12 => [
                'question' => 'Do you have any additional requirements from the brands you use?',
                'sort' => 13,
                'answers' => [
                    'Vegan',
                    'Fragrance free',
                    'High % natural',
                    'Hypoallergenic',
                    'Suitable for those pregnant or breast feeding',
                    'None'
                ]
            ],
        ];


        foreach ($questions as $item){


            $question = new \App\Question();

            $question->title = $item['question'];
            $question->sort = $item['sort'];
            $question->is_active = 1;
            $question->created_by =  1;
            $question->updated_by =  1;
            $question->save();
            foreach($item['answers'] as $ans){

                $question->answers()->create([
                    'title' => $ans,
                    'created_by' => 1,
                    'updated_by' => 1
                ]);
            }

        }



    }
}

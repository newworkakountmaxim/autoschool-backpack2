<?php

use Illuminate\Database\Seeder;

use App\Models\Question;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $question1=Question::create([
        	'name'=>'Question1', 
        	'img_url'=>'uploads/Admin/26231410_1821408994570089_5410841888648798407_n.jpg', 
        	'qty_answ'=>'4',
        	'cor_answ'=>'1',
        	'answers'=>'Question1-Answer1,Question1-Answer2,Question1-Answer3,Question1-Answer4',
        	'user_id'=>rand(1, 3),
        	'theme_id'=>rand(1, 10),
        	'pdd_links'=>'Question1-PddLinks',
        	'feature'=>'Question1-Feature',
        	'comments'=>'Question1-Comments'
        ]);		
		$question2=Question::create([
        	'name'=>'Question2', 
        	'img_url'=>'uploads/Admin/26231410_1821408994570089_5410841888648798407_n.jpg', 
        	'qty_answ'=>'4',
        	'cor_answ'=>'1',
        	'answers'=>'Question2-Answer1,Question2-Answer2,Question2-Answer3,Question2-Answer4',
        	'user_id'=>rand(1, 3),
        	'theme_id'=>rand(1, 10),
        	'pdd_links'=>'Question2-PddLinks',
        	'feature'=>'Question2-Feature',
        	'comments'=>'Question2-Comments'
        ]);
		$question3=Question::create([
        	'name'=>'Question3', 
        	'img_url'=>'uploads/Admin/26231410_1821408994570089_5410841888648798407_n.jpg', 
        	'qty_answ'=>'4',
        	'cor_answ'=>'1',
        	'answers'=>'Question3-Answer1,Question3-Answer2,Question3-Answer3,Question3-Answer4',
        	'user_id'=>rand(1, 3),
        	'theme_id'=>rand(1, 10),
        	'pdd_links'=>'Question3-PddLinks',
        	'feature'=>'Question3-Feature',
        	'comments'=>'Question3-Comments'
        ]);
		$question4=Question::create([
        	'name'=>'Question4', 
        	'img_url'=>'uploads/Admin/26231410_1821408994570089_5410841888648798407_n.jpg', 
        	'qty_answ'=>'4',
        	'cor_answ'=>'1',
        	'answers'=>'Question4-Answer1,Question4-Answer2,Question4-Answer3,Question4-Answer4',
        	'user_id'=>rand(1, 3),
        	'theme_id'=>rand(1, 10),
        	'pdd_links'=>'Question4-PddLinks',
        	'feature'=>'Question4-Feature',
        	'comments'=>'Question4-Comments'
        ]);
		$question5=Question::create([
        	'name'=>'Question5', 
        	'img_url'=>'uploads/Admin/26231410_1821408994570089_5410841888648798407_n.jpg', 
        	'qty_answ'=>'4',
        	'cor_answ'=>'1',
        	'answers'=>'Question5-Answer1,Question5-Answer2,Question5-Answer3,Question5-Answer4',
        	'user_id'=>rand(1, 3),
        	'theme_id'=>rand(1, 10),
        	'pdd_links'=>'Question5-PddLinks',
        	'feature'=>'Question5-Feature',
        	'comments'=>'Question5-Comments'
        ]);
		$question6=Question::create([
        	'name'=>'Question6', 
        	'img_url'=>'uploads/Admin/26231410_1821408994570089_5410841888648798407_n.jpg', 
        	'qty_answ'=>'4',
        	'cor_answ'=>'1',
        	'answers'=>'Question6-Answer1,Question6-Answer2,Question6-Answer3,Question6-Answer4',
        	'user_id'=>rand(1, 3),
        	'theme_id'=>rand(1, 10),
        	'pdd_links'=>'Question6-PddLinks',
        	'feature'=>'Question6-Feature',
        	'comments'=>'Question6-Comments'

        ]);
    }
}

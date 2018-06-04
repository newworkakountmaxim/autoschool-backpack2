<?php

use Illuminate\Database\Seeder;
use App\Models\Theme;

class ThemesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $theme1=Theme::create(['name'=>'Theme1','description'=>'Description1','user_id'=>'1']);
        $theme2=Theme::create(['name'=>'Theme2','description'=>'Description1','user_id'=>'1']);	
        $theme3=Theme::create(['name'=>'Theme3','description'=>'Description1','user_id'=>'1']);	
        $theme4=Theme::create(['name'=>'Theme4','description'=>'Description4','user_id'=>'1']);	
        $theme5=Theme::create(['name'=>'Theme5','description'=>'Description5','user_id'=>'1']);	
        $theme6=Theme::create(['name'=>'Theme6','description'=>'Description6','user_id'=>'1']);			
		$theme7=Theme::create(['name'=>'Theme7','description'=>'Description7','user_id'=>'1']);
		$theme8=Theme::create(['name'=>'Theme8','description'=>'Description8','user_id'=>'1']);			
		$theme9=Theme::create(['name'=>'Theme9','description'=>'Description9','user_id'=>'1']);
		$theme10=Theme::create(['name'=>'Theme10','description'=>'Description10','user_id'=>'1']);		
    }
}



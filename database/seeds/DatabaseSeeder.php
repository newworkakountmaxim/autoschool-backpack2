<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(ThemesSeeder::class);
        $this->call(QuestionsSeeder::class);
    }
}

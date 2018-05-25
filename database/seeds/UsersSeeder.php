<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1=User::create(['name'=>'Max Admin (seeder)','email'=>'newworkakount@gmail.com','password'=>bcrypt('yjdsqflvby')]);
		$user1->assignRole('superadmin');
    }
}

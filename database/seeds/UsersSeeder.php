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
		$user2=User::create(['name'=>'Max Teacher (seeder)','email'=>'teacher@teacher.com','password'=>bcrypt('yjdsqflvby')]);
		$user2->assignRole('teacher');
		$user3=User::create(['name'=>'Max User (seeder)','email'=>'user@user.com','password'=>bcrypt('yjdsqflvby')]);
		$user3->assignRole('user');
    }
}

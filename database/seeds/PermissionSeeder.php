<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$roles=[
			'superadmin',
			'teacher',
			'user'			
		];

		$permissions=[
			'dashboard'=>['superadmin','teacher','user'],
			'file-manager'=>['superadmin','teacher'],			
			'permission-manager'=>['superadmin'],
			'crud-all'=>['superadmin'],
			'adminka'=>['superadmin','teacher'],
			'test'=>['superadmin']
		];

		//create roles
		foreach ($roles as $role) {
			$rolesArray[$role]=Role::create(['name' => $role]);
		}

		//create permissions
		foreach ($permissions as $permission=>$authorized_roles) {

			//create permission
			Permission::create(['name' => $permission]);
			
			//authorize roles to those permissions
			foreach ($authorized_roles as $role) {
				$rolesArray[$role]->givePermissionTo($permission);
			}
		}


    }
}

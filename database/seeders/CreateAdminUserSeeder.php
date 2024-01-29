<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name' => 'elhamra youssef',
        	'email' => 'admin@gmail.com',
        	'password' => bcrypt('123456'),
            'role_name'=>'AdminSuper',

        ]);

        $role = Role::create(['name' => 'AdminSuper']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
        ////////////////
        $roleSuperUser = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id','id')->all();

        $roleSuperUser->syncPermissions($permissions);

        $user->assignRole([$role->id]);
        ////////////////
        $roleUser = Role::create(['name' => 'user']);

        $permissions = Permission::pluck('id','id')->all();

        $roleUser->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}

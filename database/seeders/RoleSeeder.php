<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // crééer user
        $user = User::firstOrCreate([
            'name' => 'super-admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin@gmail.com'),
            ]);
        // crééer le role admin
        $role = Role::firstOrCreate([
            'name' => 'owner',
            'display_name' => 'Administrateur',
        ]);
        //récuperer la liste des permissions et affeecter à administrateur
        $role->syncPermissions( Permission::all());
        // affecter le role admin à administrateur
        $user->assignRole($role);
    }
}

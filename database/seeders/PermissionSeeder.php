<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    protected $tables = ['tags','attributes','documents'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [];
        foreach ($this->tables as $table) {
            array_push($permissions,$table.'.list-Liste');////1
            array_push($permissions,$table.'.show-Voir');////2
            array_push($permissions,$table.'.create-Ajouter');////3
            array_push($permissions,$table.'.edit-Editer');////4
            array_push($permissions,$table.'.delete-Supprimer');////5
        }
        foreach ($permissions as $permission) {
            $permissionItem = explode('-',$permission);
            $permissionArray = explode('.',$permissionItem[0]);
            Permission::firstOrCreate([
                'name' => $permissionItem[0],
                'model'=> $permissionArray[0],
                'display_name'=> $permissionItem[1],
            ]);
        }
    }
}

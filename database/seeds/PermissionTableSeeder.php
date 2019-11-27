<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name' => 'createUser',
            'label' => 'Criar usuario'
        ]);
        DB::table('permissions')->insert([
            'name' => 'updateUser',
            'label' => 'Atualizar usuario'
        ]);
        DB::table('permissions')->insert([
            'name' => 'viewUser',
            'label' => 'Visualizar usuario'
        ]);
        DB::table('permissions')->insert([
            'name' => 'getUsers',
            'label' => 'Listar usuarios'
        ]);
    }
}

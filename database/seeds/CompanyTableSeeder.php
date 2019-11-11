<?php

use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'id' => \Faker\Provider\Uuid::uuid(),
            'cnpj' => '082.277.955/0001-55',
            'name' => 'NOVO NORDISK FARMACEUTICA DO BRASIL LTDA',
            'logo' => 'logo-default.jpg',
            'contact_name' => 'Teste',
            'phone' => '353535353535',
            'email' => 'email@email.com',
            'status' => 'ativo'
        ]);
    }
}

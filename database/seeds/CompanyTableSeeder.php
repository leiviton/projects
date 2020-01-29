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
            'cnpj' => '056994502000130',
            'name' => 'NOVARTIS BIOCIENCIAS SA',
            'logo' => 'logo-default.jpg',
            'contact_name' => 'Simonete',
            'phone' => '353535353535',
            'email' => 'simonete.bispo@novartis.com',
            'status' => "Aberto,Despachado,Pendente,Concluído,Frustrado,Cancelado"
        ]);

        DB::table('companies')->insert([
            'cnpj' => '082277955000155',
            'name' => 'NOVO NORDISK FARMACEUTICA DO BRASIL LTDA',
            'logo' => 'logo-default.jpg',
            'contact_name' => 'Teste',
            'phone' => '353535353535',
            'email' => 'email@email.com',
            'status' => "Aberto,Enviado ao Site,Entregue Paciente,Entregue amostra Drs"
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_solicitation')->insert([
            'id' => \Faker\Provider\Uuid::uuid(),
            'company_id' => DB::table('companies')->first()->id,
            'short_description' => 'Chamado Novo',
            'description' => 'Chamado novo'
        ]);

        DB::table('status_solicitation')->insert([
            'id' => \Faker\Provider\Uuid::uuid(),
            'company_id' => DB::table('companies')->first()->id,
            'short_description' => 'Em atendimento',
            'description' => 'Chamado em atendimento com analista'
        ]);

        DB::table('status_solicitation')->insert([
            'id' => \Faker\Provider\Uuid::uuid(),
            'company_id' => DB::table('companies')->first()->id,
            'short_description' => 'Em agendamento',
            'description' => 'Chamado em agendamento'
        ]);

        DB::table('status_solicitation')->insert([
            'id' => \Faker\Provider\Uuid::uuid(),
            'company_id' => DB::table('companies')->first()->id,
            'short_description' => 'Agendado aguardando visita',
            'description' => 'Chamado Agendado com paciente'
        ]);

        DB::table('status_solicitation')->insert([
            'id' => \Faker\Provider\Uuid::uuid(),
            'company_id' => DB::table('companies')->first()->id,
            'short_description' => 'Em Transito',
            'description' => 'Chamado em transito para entrega'
        ]);

        DB::table('status_solicitation')->insert([
            'id' => \Faker\Provider\Uuid::uuid(),
            'company_id' => DB::table('companies')->first()->id,
            'short_description' => 'Entregue',
            'description' => 'Chamado entregue/coletado com paciente'
        ]);

        DB::table('status_solicitation')->insert([
            'id' => \Faker\Provider\Uuid::uuid(),
            'company_id' => DB::table('companies')->first()->id,
            'short_description' => 'Coletado amostra em transito',
            'description' => 'Chamado entregue/coletado com paciente'
        ]);

        DB::table('status_solicitation')->insert([
            'id' => \Faker\Provider\Uuid::uuid(),
            'company_id' => DB::table('companies')->first()->id,
            'short_description' => 'Enviado ao site',
            'description' => 'Chamado enviado ao site do cliente'
        ]);

        DB::table('status_solicitation')->insert([
            'id' => \Faker\Provider\Uuid::uuid(),
            'company_id' => DB::table('companies')->first()->id,
            'short_description' => 'Concluido',
            'description' => 'Chamado finalizado'
        ]);

        DB::table('status_solicitation')->insert([
            'id' => \Faker\Provider\Uuid::uuid(),
            'company_id' => DB::table('companies')->first()->id,
            'short_description' => 'Cancelado',
            'description' => 'Chamado cancelado cliente'
        ]);

        DB::table('status_solicitation')->insert([
            'id' => \Faker\Provider\Uuid::uuid(),
            'company_id' => DB::table('companies')->first()->id,
            'short_description' => 'Encerrado sem sucesso',
            'description' => 'Chamado encerrado sem sucesso'
        ]);

        DB::table('status_solicitation')->insert([
            'id' => \Faker\Provider\Uuid::uuid(),
            'company_id' => DB::table('companies')->first()->id,
            'short_description' => 'Pendente',
            'description' => 'Chamado em analise'
        ]);

        DB::table('status_solicitation')->insert([
            'id' => \Faker\Provider\Uuid::uuid(),
            'company_id' => DB::table('companies')->first()->id,
            'short_description' => 'Aguardando expedicao',
            'description' => 'Chamado aguardando expedição'
        ]);
    }
}

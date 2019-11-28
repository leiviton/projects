<?php

use ApiWebPsp\Models\SolicitationItem;
use ApiWebPsp\Models\Solicitation;
use Illuminate\Database\Seeder;

class SolicitationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Solicitation::class,50)->create()->each(function ($c) {
            for ($i=0; $i<=2; $i++){
                $c->solicitation_items()->save(factory(SolicitationItem::class)->make([
                    'product_id' => rand(1,5),
                    'qtd' => 2,
                    'price_unitary' => 50,
                    'lot' => 'LT555',
                    'pen' => 'sim',
                    'expiration_date' => date('Y-m-d')
                ]));
            }
        });
    }
}

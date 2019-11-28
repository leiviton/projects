<?php

use ApiWebPsp\Models\Address;
use ApiWebPsp\Models\Patient;
use Illuminate\Database\Seeder;

class PatientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Patient::class,10)->create()->each(function ($p) {
            for ($i=0; $i<3; $i++) {
                $p->addresses()->save(factory(Address::class)->make());
            }
        });
    }
}
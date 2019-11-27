<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(ClientOauthTableSeeder::class);
        $this->call(CompanyTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(CapabilityTableSeeder::class);

    }
}

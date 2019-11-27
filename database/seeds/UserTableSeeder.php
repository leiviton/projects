<?php

use ApiWebSac\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create(
            [
                'id' => \Faker\Provider\Uuid::uuid(),
                'name' => 'Leiviton Carlos',
                'email' => 'leivitoncs@gmail.com',
                'role' => 'admin',
                'password' => bcrypt(123456),
                'remember_token' => str_random(10),
            ]);

        factory(User::class)->create(
            [
                'id' => \Faker\Provider\Uuid::uuid(),
                'name' => 'Caio Lavos',
                'email' => 'caio.moraes@drsgroup.com.br',
                'role' => 'admin',
                'password' => bcrypt(123456),
                'remember_token' => str_random(10),
            ]);

        factory(User::class)->create(
            [
                'id' => \Faker\Provider\Uuid::uuid(),
                'name' => 'Allan Santos',
                'email' => 'allan.santos@drsgroup.com.br',
                'role' => 'drs-analyst',
                'password' => bcrypt(123456),
                'remember_token' => str_random(10),
            ]);

        factory(User::class)->create(
            [
                'id' => \Faker\Provider\Uuid::uuid(),
                'name' => 'Raquel Mota',
                'email' => 'raquel.mota@drsgroup.com.br',
                'role' => 'admin',
                'password' => bcrypt(123456),
                'remember_token' => str_random(10),
            ]);

        factory(User::class)->create(
            [
                'id' => \Faker\Provider\Uuid::uuid(),
                'name' => 'Lucas Rilko',
                'email' => 'lucas.rolko@drsgroup.com.br',
                'role' => 'admin',
                'password' => bcrypt(123456),
                'remember_token' => str_random(10),
            ]);

        factory(User::class)->create(
            [
                'id' => \Faker\Provider\Uuid::uuid(),
                'name' => 'Atendente 2',
                'email' => 'atendente1@drsgroup.com.br',
                'role' => 'drs-attendant',
                'password' => bcrypt(123456),
                'remember_token' => str_random(10),
            ]);

        factory(User::class)->create(
            [
                'id' => \Faker\Provider\Uuid::uuid(),
                'name' => 'Atendente 2',
                'email' => 'atendente2@drsgroup.com.br',
                'role' => 'drs-attendant',
                'password' => bcrypt(123456),
                'remember_token' => str_random(10),
            ]);

        factory(User::class)->create(
            [
                'id' => \Faker\Provider\Uuid::uuid(),
                'name' => 'Atendente 3',
                'email' => 'atendente3@drsgroup.com.br',
                'role' => 'drs-attendant',
                'password' => bcrypt(123456),
                'remember_token' => str_random(10),
            ]);

        factory(User::class, 50)->create();
    }
}

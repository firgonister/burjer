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
        // $this->call(UserSeeder::class);
        DB::table('users')->insert([
            'name' => 'Nana',
            'email' => 'admin@masternana.com',
            'password' => Hash::make('nana1234'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('users')->insert([
            'name' => 'rumah_akak',
            'email' => 'diskominfo@gmail.com',
            'password' => Hash::make('diskominfo'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('kategoris')->insert([
            'nama' => 'Tidak Ada Kategori',
        ]);
    }
}

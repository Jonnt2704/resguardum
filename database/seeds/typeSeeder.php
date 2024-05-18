<?php

use Illuminate\Database\Seeder;

class typeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type')->insert([
            'name' => 'ADMINISTRADOR',
        ]);

        DB::table('type')->insert([
            'name' => 'ESTUDIANTE',
        ]);
    }
}

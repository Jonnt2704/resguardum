<?php

use Illuminate\Database\Seeder;

class lineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('line')->insert([
            'name' => 'DESARROLLO DE SOFTWARE',
        ]);

        DB::table('line')->insert([
            'name' => 'SISTEMA DE PROCESAMIENTO DE INFORMACIÓN',
        ]);

        DB::table('line')->insert([
            'name' => 'SISTEMAS INTELIGENTES',
        ]);

        DB::table('line')->insert([
            'name' => 'SISTEMAS Y ARQUITECTURAS DE PROCESOS',
        ]);

        DB::table('line')->insert([
            'name' => 'MÉTODOS Y ESTANDARIZACIÓN DE SISTEMAS',
        ]);

        DB::table('line')->insert([
            'name' => 'CIBERNÉTICA',
        ]);

        DB::table('line')->insert([
            'name' => 'SISTEMAS DE COMUNICACIONES',
        ]);
    }
}

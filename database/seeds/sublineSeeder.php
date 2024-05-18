<?php

use Illuminate\Database\Seeder;

class sublineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subline')->insert([
            'name' => 'OPTIMIZACIÓN DE PROCESOS',
            'line' => '1'                     
        ]);

        DB::table('subline')->insert([
            'name' => 'SIMULACIÓN',
            'line' => '1'
        ]);

        DB::table('subline')->insert([
            'name' => 'DESARROLLO DE SOFTWARE MULTIMEDIA',
            'line' => '1'
        ]);

        DB::table('subline')->insert([
            'name' => 'INGENIERIA DE SOFTWARE ORIENTADA A LA WEB',
            'line' => '1'
        ]);

        DB::table('subline')->insert([
            'name' => 'HIPERMEDIA ADAPTATIVA',
            'line' => '2'
        ]);

        DB::table('subline')->insert([
            'name' => 'INTELIGENCIA DE NEGOCIOS',
            'line' => '2'
        ]);

        DB::table('subline')->insert([
            'name' => 'BASE DE DATOS - HARDWARE',
            'line' => '2'
        ]);

        DB::table('subline')->insert([
            'name' => 'SISTEMAS DE INFORMACIÓN PARA LA GESTIÓN DE RELACIONES CON LOS CLIENTES',
            'line' => '2'
        ]);

        DB::table('subline')->insert([
            'name' => 'PLANIFICACIÓN DE RECURSOS EMPRESARIALES (ERP)',
            'line' => '2'
        ]);

        DB::table('subline')->insert([
            'name' => 'AGENTES INTELIGENTES',
            'line' => '3'
        ]);

        DB::table('subline')->insert([
            'name' => 'INTELIGENCIA ARTIFICIAL',
            'line' => '3'
        ]);

        DB::table('subline')->insert([
            'name' => 'SISTEMAS EXPERTOS',
            'line' => '3'
        ]);

        DB::table('subline')->insert([
            'name' => 'DATA CIENCIA',
            'line' => '3'
        ]);

        DB::table('subline')->insert([
            'name' => 'REINGENIERIA',
            'line' => '4'
        ]);

        DB::table('subline')->insert([
            'name' => 'DESARROLLO DE METODOLOGÍA',
            'line' => '5'
        ]);

        DB::table('subline')->insert([
            'name' => 'NORMALIZACIÓN',
            'line' => '5'
        ]);

        DB::table('subline')->insert([
            'name' => 'AUDITORIA',
            'line' => '5'
        ]);

        DB::table('subline')->insert([
            'name' => 'REINROBÓTICA',
            'line' => '6'
        ]);

        DB::table('subline')->insert([
            'name' => 'DOMOTICA',
            'line' => '6'
        ]);

        DB::table('subline')->insert([
            'name' => 'AUTOMATIZACIÓN DE PROCESOS INDUSTRIALES',
            'line' => '6'
        ]);

        DB::table('subline')->insert([
            'name' => 'REDES DE DATOS',
            'line' => '7'
        ]);

        DB::table('subline')->insert([
            'name' => 'TRANSMICIÓN DE DATOS',
            'line' => '7'
        ]);

    }
}

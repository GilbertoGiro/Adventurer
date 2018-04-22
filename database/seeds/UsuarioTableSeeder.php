<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB as DB;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = [
            [
                'nome'      => 'Gilberto Giro Resende',
                'email'     => 'gilberto.giro.resende@gmail.com',
                'senha'     => bcrypt('123456'),
                'idcurso'   => 1,
                'idpapel'   => 1,
                'flemail'   => 's',
                'calendia'  => 's',
                'calensem'  => 's',
                'calenmes'  => 's',
                'flexterno' => 'n'
            ],
        ];

        DB::table('usuario')->insert($rows);
    }
}

<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB as DB;

class PapelTableSeeder extends Seeder
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
                'id'   => 1,
                'nome' => 'Administrador'
            ],
            [
                'id'   => 2,
                'nome' => 'Usuário'
            ],
        ];

        DB::table('papel')->insert($rows);
    }
}

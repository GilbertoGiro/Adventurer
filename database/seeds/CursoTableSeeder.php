<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB as DB;

class CursoTableSeeder extends Seeder
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
                'id' => 1,
                'nome' => 'Análise e Desenvolvimento de Sistemas'
            ],
            [
                'id' => 2,
                'nome' => 'Gestão de Tecnologia da Informação'
            ],
            [
                'id' => 3,
                'nome' => 'Eventos'
            ],
            [
                'id' => 4,
                'nome' => 'Gestão Ambiental'
            ],
            [
                'id' => 5,
                'nome' => 'Administração'
            ],
        ];

        DB::table('curso')->insert($rows);
    }
}

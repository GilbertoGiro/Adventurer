<?php

namespace App\Utilities;

use App\Models\Course;
use App\Models\Paper;
use App\Models\Theme;

class Arrays{
    /**
     * Method to get Conditional Array
     *
     * @return array
     */
    public static function conditional()
    {
        return [
            'Sim' => 's',
            'Não' => 'n'
        ];
    }

    /**
     * Method to get Theme Status Label by passe Status
     *
     * @param $status
     * @return mixed
     */
    public static function themeStatusLabel($status)
    {
        $labels = [
            'abe' => '<span class="gold bold">Pendente</span>',
            'apr' => '<span class="green bold">Aprovado</span>',
            'rep' => '<span class="red bold">Reprovado</span>'
        ];

        return $labels[$status];
    }

    /**
     * Method to get Courses list
     *
     * @return array
     */
    public static function courses()
    {
        return Course::all()->toArray();
    }

    /**
     * Method to get Themes list
     *
     * @return array
     */
    public static function themes()
    {
        return Theme::all()->toArray();
    }

    /**
     * Method to get Papers List
     *
     * @return array
     */
    public static function papers()
    {
        return Paper::all()->toArray();
    }
}
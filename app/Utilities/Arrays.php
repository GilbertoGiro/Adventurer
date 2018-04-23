<?php

namespace App\Utilities;

use App\Models\Course;

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
     * Method to get Courses list
     *
     * @return array
     */
    public static function courses()
    {
        return Course::all()->toArray();
    }
}
<?php

namespace App\Utilities;

use App\Models\Course;
use App\Models\Paper;

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
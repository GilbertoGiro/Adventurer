<?php

namespace App\Utilities;

use App\Models\Course;
use App\Models\Paper;
use App\Models\Theme;
use App\Models\User;

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
     * Method to get Status list
     *
     * @return array
     */
    public static function status()
    {
        return [
            'ati' => 'Ativo',
            'ina' => 'Inativo'
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
     * Method to get User Status Label
     *
     * @param $status
     * @return mixed
     */
    public static function userStatusLabel($status)
    {
        $labels = [
            'ati' => '<label class="label background-green white">Ativo</label>',
            'ina' => '<label class="label background-red white">Inativo</label>'
        ];

        return $labels[$status];
    }

    /**
     * Method to get Notification Status Label
     *
     * @param $status
     * @return mixed
     */
    public static function notificationStatusLabel($status)
    {
        $labels = [
            'ati' => '<label class="label background-green white">Ativo</label>',
            'ina' => '<label class="label background-red white">Inativo</label>'
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
        return Theme::all()->where('sttema', '=', 'apr')->toArray();
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

    /**
     * Method to get Admins List
     *
     * @return array
     */
    public static function admins()
    {
        return User::all()->where('idpapel', 1)->where('stusuario', 'ati')->toArray();
    }
}
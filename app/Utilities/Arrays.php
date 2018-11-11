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
     * Method to get available Event Status
     *
     * @return array
     */
    public static function eventStatus()
    {
        return [
            'abe' => 'Aberto',
            'fec' => 'Fechado',
            'can' => 'Cancelado'
        ];
    }

    /**
     * Method to get Theme Status Label
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
     * Method to get Event Status Label
     *
     * @param $status
     * @return mixed
     */
    public static function eventStatusLabel($status)
    {
        $labels = [
            'abe' => '<label class="label background-green white">Aberto</label>',
            'fec' => '<label class="label background-red white">Fechado</label>',
            'can' => '<label class="label background-red white">Cancelado</label>'
        ];
        return $labels[$status];
    }

    /**
     * Method to get Inscription Status Label
     *
     * @param $status
     * @return mixed
     */
    public static function inscriptionStatusLabel($status)
    {
        $labels = [
            'ati' => '<label class="label background-gold white">Aberto</label>',
            'apr' => '<label class="label background-green white">Aprovado</label>',
            'rep' => '<label class="label background-red white">Reprovado</label>'
        ];
        return $labels[$status];
    }

    /**
     * Method to get Theme Status Text
     *
     * @param $status
     * @return mixed
     */
    public static function eventStatusText($status)
    {
        $labels = [
            'abe' => '<span class="gold bold">Aberto</span>',
            'fec' => '<span class="green bold">Fechado</span>',
            'can' => '<span class="red bold">Cancelado</span>'
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
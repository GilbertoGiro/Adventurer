<?php

namespace App\Utilities;

class Address
{
    /**
     * Method to get Formatted Address
     *
     * @param $event
     * @return string
     */
    public static function address($event)
    {
        $address = ($event->endereco) ? $event->endereco : 'Av. União dos Ferroviários';
        $number = ($event->numero) ? $event->numero : 1760;
        $neighborhood = ($event->bairro) ? $event->bairro : 'Centro';
        $complement = ($event->complemento) ? $event->complemento : '';
        $result = $address . ', ' . $number . ' - ' . $neighborhood;
        if ($complement) {
            $result .= ' - ' . $complement;
        }
        return $result;
    }
}
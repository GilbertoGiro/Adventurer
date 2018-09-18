<?php

namespace App\Utilities;

class Tables
{
    /**
     * Method to make Ordered Column
     *
     * @param string $field
     * @param string $column
     * @return string
     */
    public static function makeOrderedColumn(string $field, string $column)
    {
        if (array_search($column, request()->all()) === 'orderByAsc') {
            return "<a href='?orderByDesc={$column}'>{$field} <i class='fa fa-sort-alpha-up'></i></a>";
        }
        return "<a href='?orderByAsc={$column}'>{$field} <i class='fa fa-sort-alpha-down'></i></a>";
    }
}
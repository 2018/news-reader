<?php

namespace App\Models\Services;

use \Illuminate\Database\Eloquent\Builder;

class QueryService
{
    /**
     * Create database date time filter
     *
     * @param Builder $queryBuilder query builder
     * @param string  $col          database date column
     * @param null    $dateTime     date in format YYYY-mm-dd or datetime in format YYYY-mm-dd H:i:s
     * @param bool    $withTime     whether the date with time
     *
     * @return Builder
     */
    public static function dateTime(Builder $queryBuilder, $col, $dateTime = null, $withTime = true): Builder
    {
        $timeMin = $withTime ? ' 00:00:00' : '';
        $timeMax = $withTime ? ' 23:59:59' : '';

        $result = $queryBuilder;

        //full regex /^\d{4}-[01]\d-[0-3]\d [0-2]\d:[0-5]\d:[0-5]\d$/
        if (preg_match("/^\d{4}-[01]\d-[0-3]\d [0-2]\d:[0-5]\d$/", $dateTime) === 1) {
            $result->where($col, '>=', $dateTime . ':00')
                ->where($col, '<=', $dateTime . ':59');
        } elseif (preg_match("/^\d{4}-[01]\d-[0-3]\d [0-2]\d$/", $dateTime) === 1) {
            $result->where($col, '>=', $dateTime . ':00:00')
                ->where($col, '<=', $dateTime . ':59:59');
        } elseif (preg_match("/^\d{4}-[01]\d-[0-3]\d$/", $dateTime) === 1) {
            $result->where($col, '>=', $dateTime . $timeMin)
                ->where($col, '<=', $dateTime . $timeMax);
        } elseif (preg_match("/^\d{4}-[01]\d$/", $dateTime) === 1) {
            $result->where($col, '>=', $dateTime . '-01'. $timeMin)
                ->where($col, '<=', $dateTime . '-31' . $timeMax);
        } elseif (preg_match("/^\d{4}$/", $dateTime) === 1) {
            $result->where($col, '>=', $dateTime . '-01-01' . $timeMin)
                ->where($col, '<=', $dateTime . '-12-31'. $timeMax);
        } else {
            $result->where($col, $dateTime);
        }
        return $result;
    }
}
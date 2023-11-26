<?php

namespace Database\Factories;

abstract class AbstractUniqueInteger
{
    /**
     * @param string $model
     * @param string $nameColumn
     *
     * @return int|null
     */
    public static function getUniqueInteger(string $model, string $nameColumn): ?int
    {
        $nameColumnIds = $model::pluck($nameColumn)->toArray();
        dump($nameColumnIds);
        $availableIds = array_diff(range(1, 10), $nameColumnIds);

        while (count($availableIds) > 0) {
            $randomIndex = array_rand($availableIds);
            $randomId = $availableIds[$randomIndex];
            if (!in_array($randomId, $nameColumnIds)) {
                return $randomId;
            }

            unset($availableIds[$randomIndex]);
        }

        return null;
    }
}

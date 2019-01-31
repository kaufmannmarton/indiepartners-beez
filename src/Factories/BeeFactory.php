<?php

namespace App\Factories;

class BeeFactory
{
    public static function create($beeClass, int $count): array
    {
        $bees = [];

        for ($i = 0; $i < $count; $i++) {
            $bees[] = new $beeClass();
        }

        return $bees;
    }
}

<?php

namespace App\Models;

use App\Models\Bee;

class ScoutBee extends Bee
{
    public const ROLE = 'scout';

    public function __construct(int $damage = 15, int $hp = 30) {
        $this->damage = $damage;
        $this->hp = $hp;
    }
}

<?php

namespace App\Models;

use App\Models\Bee;

class QueenBee extends Bee
{
    public const ROLE = 'queen';

    public function __construct(int $damage = 15, int $hp = 100) {
        $this->damage = $damage;
        $this->hp = $hp;
    }
}

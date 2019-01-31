<?php

namespace App\Models;

use App\Models\Bee;

class WorkerBee extends Bee
{
    public const ROLE = 'worker';

    public function __construct(int $damage = 20, int $hp = 50) {
        $this->damage = $damage;
        $this->hp = $hp;
    }
}

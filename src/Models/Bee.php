<?php

namespace App\Models;

abstract class Bee
{
    protected $damage;
    protected $hp;

    public function hit(): void
    {
        $hp = $this->hp - $this->damage;

        $this->hp = $hp > 0 ? $hp : 0;
    }

    public function isAlive(): bool
    {
        return $this->hp > 0;
    }

    public function toArray(): array
    {
        return [
            'role' => $this::ROLE,
            'hp' => $this->hp,
        ];
    }
}

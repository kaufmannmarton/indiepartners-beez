<?php

namespace App\Models;

use App\Factories\BeeFactory;
use App\Models\Bee;
use App\Models\QueenBee;
use App\Models\WorkerBee;
use App\Models\ScoutBee;

class BeeHive
{
    private $bees;
    private $workerBeeCount;
    private $scoutBeeCount;

    public function __construct(int $workerBeeCount = 5, int $scoutBeeCount = 8) {
        $this->workerBeeCount = $workerBeeCount;
        $this->scoutBeeCount = $scoutBeeCount;
    }

    public function populate(): void
    {
       $this->bees = array_merge(
            BeeFactory::create(QueenBee::class, 1),
            BeeFactory::create(WorkerBee::class, $this->workerBeeCount),
            BeeFactory::create(ScoutBee::class, $this->scoutBeeCount)
        );
    }

    public function isDefeated(): bool
    {
        $queenBee = current(array_filter($this->bees, function(Bee $bee) {
            return $bee::ROLE === QueenBee::ROLE;
        }));

        return !$queenBee->isAlive();
    }

    public function getRandomBee(): Bee
    {
        $bees = array_filter($this->bees, function(Bee $bee) {
            return $bee->isAlive();
        });
        $bee =& $this->bees[array_rand($bees)];

        return $bee;
    }

    public function toArray(): array
    {
        return array_map(function(Bee $bee) {
            return $bee->toArray();
        }, $this->bees);
    }
}

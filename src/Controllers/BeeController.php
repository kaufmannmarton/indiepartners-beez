<?php

namespace App\Controllers;

use App\Models\BeeHive;

class BeeController extends Controller
{
    private $beeHive;

    public function __construct()
    {
        parent::__construct();

        $beeHive = $_SESSION['beehive'];

        if (!$beeHive) {
            $beeHive = new BeeHive;
            $beeHive->populate();

            $_SESSION['beehive'] = $beeHive;
        }

        $this->beeHive = $beeHive;
    }

    public function index(): void
    {
        echo $this->template->render('index', [
            'bees' => $this->beeHive->toArray()
        ]);
    }

    public function attack(): void
    {
        $bee = $this->beeHive->getRandomBee();
        $bee->hit();

        if ($this->beeHive->isDefeated()) {
            $this->beeHive->populate();
        }

        $_SESSION['beehive'] = $this->beeHive;

        header('Location: /');
    }
}

<?php

namespace App\Controllers;

use League\Plates\Engine as TemplateEngine;

class Controller
{
    protected $template;

    public function __construct()
    {
        $this->template = new TemplateEngine(__DIR__ . '/../../resources/templates');
    }
}

<?php

namespace Spike\controllers;

use Spike\core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $this->setLayout('blog');
        return $this->render('blog/home');
    }
}
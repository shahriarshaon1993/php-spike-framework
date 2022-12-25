<?php

namespace Spike\controllers;

use Spike\core\Controller;

class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => 'Shahriar Shaon'
        ];

        return $this->render('home', $params);
    }

    public function about()
    {
        $params = [
            'data' => 'About Data'
        ];

        return $this->render('about', $params);
    }

    public function contact()
    {
        $params = [
            'data' => 'Contact Data'
        ];

        return $this->render('contact', $params);
    }

    public function handleContact()
    {
        return 'Handling Submitted data';
    }
}
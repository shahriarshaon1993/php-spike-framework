<?php

namespace Spike\controllers;

use Spike\core\Controller;
use Spike\core\Request;

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

    public function handleContact(Request $request)
    {
        // $data = $request->getBody();

        return 'Handling Submitted data';
    }
}
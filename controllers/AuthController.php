<?php

namespace Spike\controllers;

use Spike\core\Controller;
use Spike\core\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isPost()) {
            return "Handle submited data";
        }

        return $this->render('login');
    }

    public function register(Request $request)
    {
        if ($request->isPost()) {
            return "Handle submited data";
        }

        return $this->render('register');
    }
}
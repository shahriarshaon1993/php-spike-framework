<?php

namespace Spike\controllers;

use Spike\core\Controller;
use Spike\core\Request;
use Spike\models\Register;

class AuthController extends Controller
{
    public function login()
    {
        $this->setLayout('auth');
        return $this->render('login');
    }

    public function register(Request $request)
    {
        $register = new Register();

        if ($request->isPost()) {
            $register->loadData($request->getBody());
            
            if ($register->validate() && $register->save()) {
                return 'Success';
            }

            $this->setLayout('auth');
            return $this->render('register', [
                'model' => $register
            ]);
        }

        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $register
        ]);
    }
}
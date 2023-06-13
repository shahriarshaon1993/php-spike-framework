<?php

namespace Spike\controllers\admin;

use Spike\core\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $this->setLayout('dashboard');
        return $this->render('blog/dashboard/admin');
    }
}
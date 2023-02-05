<?php

namespace Spike\controllers;

use Spike\core\Application;
use Spike\core\Controller;
use Spike\core\Request;
use Spike\core\Response;
use Spike\models\ContactForm;

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

    public function contact(Request $request, Response $response)
    {
        $contact = new ContactForm();
        if ($request->isPost()) {
            $contact->loadData($request->getBody());
            if ($contact->validate() && $contact->send()) {
                Application::$app->session->setFlash('success', 'Thanks for connecting us.');
                return $response->redirect('/contact');
            }
        }

        return $this->render('contact', [
            'model' => $contact
        ]);
    }
}
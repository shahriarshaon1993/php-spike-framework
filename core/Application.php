<?php

namespace Spike\core;

use Spike\core\services\RouteServices;

class Application
{
    public string $layout = 'main';
    public string $userClass;

    public static string $ROOT_DIR;
    public static Application $app;

    public Controller $controller;
    public RouteServices $service;
    public Response $response;
    public Request $request;
    public Route $route;
    public Database $db;
    public Session $session;
    public ?DbModel $user;

    public function __construct($rootPath, array $config)
    {
        $this->userClass = $config['userClass'];
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;

        $this->db = new Database($config['db']);
        $this->request = new Request();
        $this->response = new Response();
        $this->service = new RouteServices();
        $this->route = new Route($this->request, $this->response);
        $this->session = new Session();

        $primaryValue = $this->session->get('user');

        if ($primaryValue) {
            $primaryKey = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([
                $primaryKey => $primaryValue
            ]);
        } else {
            $this->user = null;
        }
    }

    public function run()
    {
        $this->service->boot();
        echo $this->route->resolve();
    }

    public function login(DbModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);

        return true;
    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }
}
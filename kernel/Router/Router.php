<?php

namespace App\kernel\Router;

include_once(APP_PATH . '/kernel/Controller/Controller.php');
include_once(APP_PATH . '/kernel/View/View.php');
include_once(APP_PATH . '/kernel/Http/Request.php');

use App\kernel\Controller\Controller;
use App\kernel\View\View;
use App\kernel\Http\Request;

class Router {

    private array $routes = [
        'GET' => [],
        'POST'=> [],
    ];

    public function __construct(
        private View $view,
        private Request $request
    ) {
        $this->initRoutes();
    }

    public function dispatch(string $uri, string $method) : void {
        $route = $this->findRoute($uri, $method);
        if(!$route) {
            $this->notFound();
        }

        if(is_array($route->getAction())) {
            [$controller, $action] = $route->getAction();

            /** @var Controller $controller */
            $controller = new $controller();

            call_user_func([$controller, 'setView'], $this->view);
            call_user_func([$controller, 'setRequest'], $this->request);

            call_user_func([$controller, $action]);
        } else {
            call_user_func($route->getAction());
        }
    }

    private function notFound() : void {
        echo '404 | Not found';
        exit;
    }

    private function findRoute(string $uri, string $method) : Route | false {

        if(!isset($this->routes[$method][$uri])) {
            return false;
        }

        return $this->routes[$method][$uri];
    }

    private function initRoutes() : void {
        $routes = $this->getRoutes();

        foreach ($routes as $route) {
            $this->routes[$route->getMethod()][$route->getUri()] = $route; 
        }
    }

    /**
     * @return Route[]
     */

    private function getRoutes() {
        return require_once APP_PATH . '/config/routes.php';
    }
}
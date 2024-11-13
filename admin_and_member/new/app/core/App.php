<?php
namespace App\Core;

class App {
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $this->parseUrl();
        $this->loadController();
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    protected function parseUrl() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            $this->controller = !empty($url[0]) ? ucfirst($url[0]) . 'Controller' : 'HomeController';
            $this->method = !empty($url[1]) ? $url[1] : 'index';
            $this->params = array_slice($url, 2);
        }
    }

    protected function loadController() {
        $controllerFile = "../app/controllers/" . $this->controller . ".php";
        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            $this->controller = new "App\\Controllers\\$this->controller";
        } else {
            die("Controller not found!");
        }
    }
}

<?php

namespace Framework\App;


class App {

    private $domain;
    private $path;
    private $method;
    public $db;
    public $error;
    public $msg;

    public function __construct() {
        $this->domain = $_SERVER['HTTP_HOST'];  // localhost
        $this->path = $_SERVER['REQUEST_URI'];  // /phpframework/admin/dashboard
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->start();
    }

    public function getUrl() {
        return $this->domain . $this->path;  // eg : localhost/phpframework/admin/dashboard
    }

    public function getRequestMethod() {
        return $this->method;
    }

    public function start() {

        require __DIR__ . '\Config\Config.php';

        date_default_timezone_set($this->config['system']['timezone']);

        if ($this->config['debug']) {
            ini_set( "display_errors", "on" );
            error_reporting(E_ALL);
        } else {
            ini_set( "display_errors", "off" );
            error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_WARNING);
        }

        

        
    }

    // routing
    public function render() {
        
        //explode url
        $type = explode("/",$this->path)[2];
        if (COUNT(explode("/",$this->path)) > 3) {
            $controller = explode("/",$this->path)[3];
        }
        if (COUNT(explode("/",$this->path)) > 4) {
            $method = explode("/",$this->path)[4];
        } else {
            $method = false;
        }
        
        if ($type === "member") {
            //include controller
            if (file_exists("./app/member/controller/" . $controller . ".php")) {
                include_once("./app/member/controller/" . $controller . ".php") ;
                $instance = new $controller();
                            
                if (!$method) {
                    $instance->index();
                } else {
                    $instance->$method();
                }
                $data = $instance->getViewData();
                if (is_array($data)) {
                    extract($data);
                }

                $this->error = isset($instance->error) ? $instance->error : "" ;
                $this->msg = isset($instance->msg) ? $instance->msg : "" ;


            } else {
                include_once("error.php") ;
            }
            // include view
            if (file_exists("./app/member/view/" . $controller . "/" . $method . ".php")) {
                include_once("./app/member/view/DefaultLayout.php") ;
                include_once("./app/member/view/" . $controller . "/" . $method . ".php") ;
            } else if (file_exists("./app/member/view/" . $controller . "/" . $controller . ".php"))  {
                include_once("./app/member/view/DefaultLayout.php") ;
                include_once("./app/member/view/" . $controller . "/" . $controller . ".php") ;
            } else {
                include_once("error.php") ;
            }
            
        } else if ($type === "admin") {
            //include controller
            if (file_exists("./app/admin/controller/" . $controller . ".php")) {
                include_once("./app/admin/controller/" . $controller . ".php") ;
                $instance = new $controller();
                            
                if (!$method) {
                    $instance->index();
                } else {
                    $instance->$method();
                }
                $data = $instance->getViewData();
                if (is_array($data)) {
                    extract($data);
                }

                $this->error = isset($instance->error) ? $instance->error : "" ;
                $this->msg = isset($instance->msg) ? $instance->msg : "" ;


            } else {
                include_once("error.php") ;
            }
            // include view
            if (file_exists("./app/admin/view/" . $controller . "/" . $method . ".php")) {
                include_once("./app/admin/view/DefaultLayout.php") ;
                include_once("./app/admin/view/" . $controller . "/" . $method . ".php") ;
            } else if (file_exists("./app/admin/view/" . $controller . "/" . $controller . ".php"))  {
                include_once("./app/admin/view/DefaultLayout.php") ;
                include_once("./app/admin/view/" . $controller . "/" . $controller . ".php") ;
            } else {
                include_once("error.php") ;
            }
            
        } else {
            include_once("error.php") ;
        }


    }




}
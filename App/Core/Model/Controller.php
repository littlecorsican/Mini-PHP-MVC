<?php

//use Framework\Core\Config;


abstract class Controller {

    private $viewData;
    protected $db;
    public $error;
    public $msg;

    public function __construct() {
        $this->start();
    }

    public function start() {
        require 'App\Core\Config\Config.php';

        $this->db = new \Db($this->config['servername'], $this->config['username'], $this->config['password'], $this->config['dbname']);
        $this->db->connect();
        
        
    }

    public function ViewData($data) {
        $this->viewData = $data;
    }

    public function getViewData() {
        return $this->viewData;
    }


}



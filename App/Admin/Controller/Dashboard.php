<?php

//use Framework\Core\Config;


class Dashboard extends Controller {

    function index() {
        
        if (isset($_SESSION['logined'])) {
            if ($_SESSION['logined']) {
                $welcomeMsg = "Welcome " . $_SESSION['username'] . " !";
            }
            
        } else {
            die("illegal access");
        }
        
        
        $viewData = array("welcomeMsg"=>$welcomeMsg);
        $this->ViewData($viewData);

    }



}



<?php

//namespace Framework\App\Admin\Controller;
//use Framework\App\Core\Model;

class Dashboard extends Controller {

    function index() {
        
        if (isset($_SESSION['logined'])) {
            if ($_SESSION['logined']) {
                $welcomeMsg = "Welcome " . $_SESSION['adminname'] . " !";
            }
            
        } else {
            die("illegal access");
        }
        
        
        $viewData = array("welcomeMsg"=>$welcomeMsg);
        $this->ViewData($viewData);

    }



}



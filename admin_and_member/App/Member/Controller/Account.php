<?php

//namespace Framework\App\Member\Controller\Dashboard;


class Account extends Controller {

    function index() {




    }

    function Login() {
        
        if (isset($_POST['login_form'])) {

            $login = new \Login($_POST['input_login'],$_POST['input_password'], "member");

            $login->sign_in();
        }




    }

}



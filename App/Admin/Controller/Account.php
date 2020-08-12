<?php

//namespace Framework\App\Admin\Controller\Dashboard;




class Account extends Controller {

    function index() {

        header("Location: /phpframework/admin/account/login");

    }

    function Login() {

        if (isset($_POST['login_form'])) {

            $username = $_POST['input_login'];
            $pw = md5($_POST['input_password']);

            $stmt = $this->db->preparedStatement("SELECT * FROM tbl_user WHERE username=? LIMIT 1", array($username));
            $result = $stmt->fetch();
            if ($stmt->rowCount()) {

                if ($result['password'] === $pw) { 
                    $_SESSION['logined'] = true;
                    $_SESSION['username'] = $username;

                    header("Location: /phpframework/admin/dashboard");
                } else {
                    $this->error = "Wrong Password!";
                }
                
            } else {
                $this->error = "User does not exists";
            }


            

        }




    }

    function Signup() {

        if (isset($_POST['signup_form'])) {

            $username = $_POST['input_username'];
            $pw = $_POST['input_password'];
            $pw2 = $_POST['input_password2'];
            $email = $_POST['input_email'];

            // check if all fields input
            if ($username == "" OR $pw == "" OR $pw2 == "" OR $email == "" ) {
                $this->error .= "Missing Credentials on sign up form! <br>";
            }

            // check if password same with reinput password
            if ($pw != $pw2 ) {
                $this->error .= "Password and Reinput passwod not match! <br>";
            }

            // check if password meets strength requirement
            if (Strlen($pw) < 7 ) {
                $this->error .= "Password length too short! <br>";
            }

            //check if user is taken
            $stmt = $this->db->preparedStatement("SELECT * FROM tbl_user WHERE username=? LIMIT 1", array($username));
            $result = $stmt->fetch();
            if ($stmt->rowCount()) {
                $this->error .= "Username has been taken! <br>";
            }

            if ($this->error == "") {

                $stmt = $this->db->preparedStatement("INSERT INTO tbl_user (`username`, `password`, `email`, `reset_password`) VALUES (?,?,?,?)", array($username, md5($pw), $email, 0 ));
                $this->msg = "Account created! Click <a href='/phpframework/admin/account/login'>HERE</a> to log in";

            }

        }


    }

    function Logout() {

        $user = $_SESSION['username'];
        session_destroy();

        $viewData = array("user"=>$user);
        $this->ViewData($viewData);

    }

}



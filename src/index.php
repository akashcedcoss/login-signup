<?php
session_start();

    include('config.php');
    include('classes/DB.php');
    include('classes/User.php');
    include('classes/Login.php');
    include('classes/Admin.php');

    if (isset($_POST['submit']) && ($_POST['submit']=='signup')){
        $username = $_POST['username'];
        $fullName = $_POST['full_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $rePassword = $_POST['re_password'];
        if($password == $rePassword){
            $user = new User($username, $fullName, $email, $password, $rePassword, 'customer', 'Not Approved');
            $user->addUser();
            header("Location: admin/login.php");

        }else{
            $msg = "Password and Confirm Password Do Not Match";
            echo User::error($msg);
            header("Location: admin/signup.php");
        }
        
    }

    if (isset($_POST['signin'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = new Login($email, $password);
        $userdata = $user->authenticate();
        if(count($userdata)>=1){
            if($userdata[0]['status']=='Approved' || $userdata[0]['role']=="Admin"){
                $_SESSION['user']= $userdata[0];
                $_SESSION['result'] = "Welcome '".$userdata[0]['username']."' you are successfully logged in.";
                header("Location: admin/dashboard.php");
            }
            else{
                $_SESSION['result'] = "You are Not yet Approved...";
                header("Location: admin/login.php");
            }

        }else{
            $_SESSION['result'] = "Wrong Login Credential...";
            header("Location: admin/login.php");

        }
        
           
}
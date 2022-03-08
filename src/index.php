<?php
session_start();

    include('config.php');
    include('classes/DB.php');
    include('classes/User.php');
    include('classes/Login.php');
    include('classes/Admin.php');
    include('./classes/ProductList.php');

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
        if($email == "" || $password == ""){
            $_SESSION['result'] = "Please input correct data";
        }
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
    if(isset($_POST['delete'])){
        $del = new Admin();
        $del->deleteUser($_POST['delete'], 'users');
        header("Location: customers.php");
    }

    if(isset($_POST['approve'])){
        $update = new Admin();
        $update->approve($_POST['approve'], 'approve');
        header("Location: customers.php");
    }

    if(isset($_POST['restrict'])){
        $update = new Admin();
        $update->restrict($_POST['restrict'], 'restrict');
        header("Location: customers.php");
    }
    if(isset($_POST['addProd'])){
        $addP = new ProductList();
        $addP->addProduct($_POST['name'], $_POST['category'], $_POST['price']);
        $_SESSION['fetchArray']=[];
        header("Location: add-product.php");

    }
    if(isset($_POST['delete'])){
        $del = new ProductList();
        $del->deleteProduct($_POST['delete'], 'product');
        header("Location: add-product.php");
    }
    if(isset($_POST['edit'])){
        $id = $_POST['edit'];
        header("Location: edit-product.php?id=".$id." ");
    }
    if(isset($_POST['updateProd'])){
        $id = $_POST['updateProd'];
        $update = new ProductList();
        $update->updateProduct($id, $_POST['name'], $_POST['category'], $_POST['price']);
        header("Location: add-product.php");

    }
    if(isset($_POST['addUser'])){
        header("Location: add-user.php");
        
    }
    if(isset($_POST['logout'])){
        header("Location: admin/login.php");
        session_destroy();
        
    }

?>
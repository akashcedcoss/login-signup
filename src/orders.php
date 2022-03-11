<?php

    include('./config.php');
    include('./classes/DB.php');
    include('./classes/User.php');
    include('./classes/Login.php');
    include('./classes/Admin.php');
    include('./classes/ProductList.php');
    include('./classes/Checkout.php');

    $fetchData = new Checkout();
    $orderArray = $fetchData->listOrder();


?>





<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Dashboard Template · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">



    <!-- Bootstrap core CSS -->
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="./assets/css/dashboard.css" rel="stylesheet">
</head>

<body>

    <?php include 'header.php' ?>

    <div class="container-fluid">
        <div class="row">
            

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                <div class="d-flex justify-content-between flex-wrap 
                flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Orders</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            This week
                        </button>
                    </div>
                </div>

                <div class="table-responsive">
                    <form action="index.php" method="POST">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">State</th>
                                    <th scope="col">Pincode</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Product Price</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($orderArray as $key => $value) {
                                    
                                        echo "<tr>
                                        <td>" . $value['order_id'] . "</td>
                                        <td>" . $value['fname'] . "</td>
                                        <td>" . $value['lname'] . "</td>
                                        <td>" . $value['username'] . "</td>
                                        <td>" . $value['address'] . "</td>
                                        <td>" . $value['country'] . "</td>
                                        <td>" . $value['state'] . "</td>
                                        <td>" . $value['zip']. "</td>
                                        <td>" . $value['pname'] . "</td>
                                        <td>" . $value['pprice'] . "</td>
                                        <td>" . $value['pprice'] . "</td>";

                                        if ($value['status'] == "Pending") {
                                            echo "<td><button class='btn btn-danger' type='submit' 
                                            name = 'delivered' value = " . $value['order_id'] . ">Pending</button>
                  
                  ";
                                        } else {
                                            echo "<td><button class='btn btn-success' type='submit' 
                                            name = 'pending' value = " . $value['order_id'] . ">Delivered</button>
                ";
                                        }
                                    }
                                

                                ?>
                            </tbody>
                        </table>
                    </form>
                    </div>
    </div>


<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>
</body>

</html>
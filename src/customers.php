<?php

  session_start();
    include('./config.php');
    include('./classes/DB.php');
    include('./classes/User.php');
    include('./classes/Login.php');
    include('./classes/Admin.php');

  $fetchObj = new Admin();
  $fetchArray = $fetchObj->fetchData();
  

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

  <?php
    if($_SESSION['user']['role']=="Admin"){

?>
    

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="#">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
  <span>
    <?php
      echo $_SESSION['result'];
    ?>
    </span>
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./admin/dashboard.php">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file"></span>
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add-product.php">
              <span data-feather="shopping-cart"></span>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="customers.php">
              <span data-feather="users"></span>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Integrations
            </a>
          </li>
        </ul>        
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
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

      <h2>Section title</h2>
      <div class="table-responsive">
        <form action="index.php" method="post">

        <div class="col-12">
            <button type="submit" class="btn btn-primary" name="addUser">Add User</button>
          </div>

        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Username</th>
              <th scope="col">FullName</th>
              <th scope="col">Email</th>
              <th scope="col">Status</th>
              <th scope="col">Role</th>
              <th scope="col">Action</th>

            </tr>
          </thead>
          
          <tbody>
          <?php
          foreach($fetchArray as $key => $val){
            echo "<tr> 
              <td>".$val['id']."</td>
              <td>".$val['username']."</td>
              <td>".$val['full_name']."</td>
              <td>".$val['email']."</td>
              <td>".$val['status']."</td>
              <td>".$val['role']."</td>
              <td>
              <button type='submit' name='approve' value=".$val['id'].">Approve</button>
              <button type='submit' name='restrict' value=".$val['id'].">Restrict</button>
              <button type='submit' name='delete' value=".$val['id'].">Delete</button>
              </td>
            </tr>";
          ?>
          </tbody>
          <?php } ?>
        </table>
          </form>
      </div>
    </main>
  </div>
  

  </div>

</div>
<?php 
} 
?>

<?php
    if($_SESSION['user']['role']=="customer"){

?>

  <div class="container">
  
            <a class="nav-link active" aria-current="page" href="dashboard.html">
              <span data-feather="home"></span>
              Dashboard
            </a>
            <h3>My Profile</h3>
            <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" name="full_name" placeholder="Full Name">
      <label for="floatingInput">Full Name</label>
    </div>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>    

    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit" value="signup">Update</button>
    <p class="mt-5 mb-3 text-muted">&copy; CEDCOSS Technologies</p>
          

  </div>

  <?php
    }
    ?>

  <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  


  </body>
</html>
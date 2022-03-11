<?php

session_start();

include('../config.php');
include('../classes/DB.php');
include('../classes/User.php');
include('../classes/Login.php');
include('../classes/Admin.php');
include('../classes/ProductList.php');

// echo "<pre>";
// print_r($_SESSION['cartArray']);
// echo "</pre>";
$addC = $_SESSION['cartArray'];

// print_r($addC);



if(isset($_POST['update'])){
  $id = $_POST['update'];
  $qty = $_POST['quantity'];
  $sql = "UPDATE `product` SET `quantity` = '$qty' WHERE `product`.`id` = $id;";
  $stmt = DB::getInstance()->prepare($sql);
  $stmt->execute();  
  

}

if(isset($_POST['checkout'])){
  header("Location: checkout.php");  
  

}




?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Checkout example · Bootstrap v5.1</title>
    

    <!-- Bootstrap core CSS -->
<link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


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
  </head>
  <body class="bg-light">
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Cart</h2>
    </div>

    <div class="row g-5">
      <div class="col order-md-last">
        <form action="" method="post">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your cart</span>
          <span class="badge bg-primary rounded-pill">3</span>
        </h4>
        <table class="table">
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
            </tr>
            
            <?php
            $total = 0;
            
            foreach($addC as $key => $val) {
              $total = $total + $val[0]['price'];
              // echo $total;
            
            echo '<tr>
                <td>'.$val[0]['name'].'</td>
                <td>'.$val[0]['price'].'<input type="hidden" id = "price" name="price" value="' . $val[0]['price'] .'"></td>
                <td><form action = "" method="POST">
                    <input type="number" class="w-20 quantity"  name = "quantity" id = "quantity" min = "1" max="10" value="'.$val[0]['quantity'].'">
                    <button type="submit" name="update" class="btn btn-secondary ms-1 w-20" value="'.$val[0]['id'].'"> Update </button>
                    <a href="#" class="link-danger">Remove</a>
                    </form>
                </td>
                <td>'.$val[0]['quantity'] * $val[0]['price'].'</td>
                      
                <td><input type="hidden" id = "price" name="gTotal" value="' . $val[0]['price'] .'"></td>
            </tr>
            
            
           '
             ?> 
             <?php } ?>
             <div class="row g-5 align-items-right">
        <div class="col-3">
            
                    <button type="submit" name="checkout" class="btn btn-primary">Checkout</button>
            </form>
        </div>
    </div>
             

             <tfoot>
                <tr>
                    <td colspan="4" class="text-end" name = "total">$1000</td>
                </tr>
            </tfoot>
        </table>
        </form>
      </div>
    </div>
    
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017–2021 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>

<div id="result">
  adfssdgdsag

</div>


    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./assets/js/form-validation.js"></script>
    
  </body>
</html>

<?php
session_start();
    include('../config.php');
    include('../classes/DB.php');
    include('../classes/User.php');
    include('../classes/Login.php');
    include('../classes/Admin.php');
    include('../classes/ProductList.php');
    include('../classes/Checkout.php');
    echo "<pre>";
    $checkoutPro = $_SESSION['cartArray'];
    print_r($checkoutPro);
    echo "</pre>";
    $_SESSION['totalAmount'] = isset($_SESSION['totalAmount'])?$_SESSION['totalAmount']:array();
    $_SESSION['cartArray'] = isset($_SESSION['cartArray'])?$_SESSION['cartArray']:array();

    if(isset($_POST['placeorder'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $username = $_POST['username'];
        $address = $_POST['address'];
        $country = $_POST['country'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $pname = "Mobiles";
        $pprice = $_SESSION['totalAmount'];
        $placed = new Checkout();
        $placed->checkoutP($fname, $lname, $username, $address, $country, $state, $zip, $pname, $pprice); 
        print_r($placed);
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
      <h2>Checkout form</h2>
      <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
    </div>
    <form action="" method="post">
    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your cart</span>
          <span class="badge bg-primary rounded-pill">3</span>
        </h4>



      <?php
      $totalAmount = 0;
      foreach ($checkoutPro as $key => $val)
       { ?>

    <?php 
        
        $totalAmount += $val[0]['price'];
        $_SESSION['totalAmount'] = $totalAmount;
        
        
    ?>
       
        
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0" name="pname"> <?php echo $val[0]['name']; ?></h6>
              <small class="text-muted">Brief description</small>
            </div>
            <span class="text-muted" name = "pprice"><?php echo $val[0]['price']; ?></span>
          </li>
          
          
          <?php } ?>
          
          <li class="list-group-item d-flex justify-content-between bg-light">
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (USD)</span>
            <strong><?php echo $totalAmount; ?></strong>
          </li>
        </ul>

        <form class="card p-2">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Promo code">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </form>
      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Billing address</h4>
          <div class="row g-3">
            <div class="col-sm-6">

            
              <label for="firstName" class="form-label">First name</label>
              <input type="text" name="fname" class="form-control" id="firstName" placeholder=""  required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" name = "lname"class="form-control" id="lastName" placeholder="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-12">
              <label for="username"  class="form-label">Username</label>
              <div class="input-group has-validation">
                <span class="input-group-text">@</span>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
              <div class="invalid-feedback">
                  Your username is required.
                </div>
              </div>
            </div>

           

            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" name="address" class="form-control" id="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            

            <div class="col-12">
              <label for="address" class="form-label">Country</label>
              <input type="text" name="country" class="form-control" id="country" placeholder="India..." required>
              <div class="invalid-feedback">
                Please enter your country.
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">State</label>
              <input type="text" name="state" class="form-control" id="state" placeholder="India..." required>
              <div class="invalid-feedback">
                Please enter your country.
              </div>
            </div>

            <div class="col-md-3">
              <label for="zip" class="form-label">Zip</label>
              <input type="text" name="zip" class="form-control" id="zip" placeholder="" required>
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>
          </div>


          <h4 class="mb-3">Payment</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
              <label class="form-check-label" for="credit">Credit card</label>
            </div>
            <div class="form-check">
              <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="debit">Debit card</label>
            </div>
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="paypal">PayPal</label>
            </div>
          </div>

          <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-name" class="form-label">Name on card</label>
              <input type="text" class="form-control" id="cc-name" placeholder="" required>
              <small class="text-muted">Full name as displayed on card</small>
              <div class="invalid-feedback">
                Name on card is required
              </div>
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">Credit card number</label>
              <input type="text" class="form-control" id="cc-number" placeholder="" required>
              <div class="invalid-feedback">
                Credit card number is required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-expiration" class="form-label">Expiration</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
              <div class="invalid-feedback">
                Expiration date required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-cvv" class="form-label">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
              <div class="invalid-feedback">
                Security code required
              </div>
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit" name="placeorder">Place Order</button>
      </div>
    </div>
    </form>
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


    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./assets/js/form-validation.js"></script>
  </body>
</html>

<?php
session_start();
include('../config.php');
include('../classes/DB.php');
include('../classes/User.php');
include('../classes/Login.php');
include('../classes/Admin.php');
include('../classes/ProductList.php');
include('../classes/Cart.php');

$fetchObj = new ProductList();


    $query="";
    $fetchArray = $fetchObj->fetchData($query);
    $_SESSION['fetchArray'] = $fetchArray;
  
  if(!isset($_SESSION['cart'])){
    $_SESSION['cart']=array();
  }



?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Home · Bootstrap v5.1</title>
    

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
  <body>
    
<header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">Cart</h4>
          <p class="text-muted">Cart is empty now.</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">Follow on Twitter</a></li>
            <li><a href="#" class="text-white">Like on Facebook</a></li>
            <li><a href="#" class="text-white">Email me</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        <strong>Shop</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">My Shop</h1>
        <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
        <p>
          <a href="#" class="btn btn-primary my-2">Shop Now</a>
          <a href="#" class="btn btn-secondary my-2">Subscribe</a>
        </p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
      <div class="container overflow-hidden">
        <form class="row row-cols-lg-auto align-items-center mt-0 mb-3">
            <div class="col-lg-6 col-12">
              <label class="visually-hidden" for="inlineFormInputGroupUsername">Search</label>
              <div class="input-group">
                <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Product, SKU, Category">
              </div>
            </div>
          
            <div class="col-lg-3 col-12">
              <label class="visually-hidden" for="inlineFormSelectPref">Sort By</label>
              <select class="form-select" id="inlineFormSelectPref">
                <option selected>Sort By</option>
                <option value="1">Price</option>
                <option value="2">Recently Added</option>
                <option value="3">Popularity</option>
              </select>
            </div>
          
            <div class="col-lg-3 col-12">
              <button type="submit" class="btn btn-primary w-100">Search</button>
            </div>
          </form>
      </div>
    <!-- <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3"> -->
        
        <!-- <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->

            <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            
            <?php
            foreach($fetchArray as $key => $val){
                
                echo '
                
                <form class="row g-3" action="../index.php" method="POST">
                  <div class="col">
                    <div class="card shadow-sm">
                    
                    <img style="height:150px; width: 120px; float:left; margin-left:4%; margin-top:4%;" src="../uploads/'.$val["image"].'">
                    
                      <div class="card-body">
                          <h5>'.$val['name'].'</h5>
                        <p class="card-text">'.$val['category'].'</p>
                        <div class="d-flex justify-content-between align-items-center">
                        
                          <p><strong>'.$val['price'].'</strong>  &nbsp;<del><small class="link-danger">$180</small></del></p>
                          <button class="btn btn-primary" name="addCart" value = "'.$val['id'].'">Add To Cart</button>
                          <input type="hidden" name="prodID" value="' . $val['id'] . '"> 
                        </div>
                      </div>
                    </div>
                    </div>
                    </form>
                  
                  ';
            } ?>
          
        </div>
        </div>
        
  
              



          <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
              </nav>
          </div>
        
      </div>
    </div>
  </div>

</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">&copy; CEDCOSS Technologies</p>
  </div>
</footer>


    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      
  </body>
</html>

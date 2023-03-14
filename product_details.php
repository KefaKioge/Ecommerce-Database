<!--connect file-->
<?php 

include('./include/connect.php');
include('./functions/functions_file.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce DB Website Project.</title>
    <!--boostrap CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />  

    <!-- css file-->
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!-- navbar -->
<div class = "container-fluid p-0">
    <!-- first child-->
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
  <div class="container-fluid">
    <img src="./images/logo2.jfif" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class = "fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price : 100/-</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-secondary" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<!--second child-->
<nav class = "navbar navbar-expand-lg navbar-dark bg-secondary">
<ul class="navbar-nav me-auto">
<li class="nav-item">
    <a class="nav-item">
        <a class ="nav-link" href ="#">Welcome Guest</a></li>
    <li class="nav-item">
    <a class="nav-item">
        <a class ="nav-link" href ="#">Login</a></li>
</ul>
</nav>

<!--third child-->
<div class="bg light">
    <h3 class="text-center">Dalali Online Stores</h3>
    <p class="text-center">An E-commerce platform that is made to impress</p>
</div>


<!--fourth child-->
<div class="row">

  <!--fetching products-->
<?php 

//calling function 
view_details();
get_unique_categories();
get_unique_brands();

?>

</div>
  <!--end of row-->
</div>

<!--end of column-->

  <div class="col-md-2 bg-secondary p-0"> 
    <!--Brands to be displayed-->
  <ul class="navbar-nav me.auto text-center d-flex align-items-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav link text-light"><h5> BRAND</h5></a>
            </li>
                
<?php 
      getbrands();
      get_unique_categories();

?>
          </ul> 
    
    <!-- Categories to be displayed-->
    <ul class="navbar-nav me.auto text-center d-flex align-items-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav link text-light"><h5>CATEGORY</h5></a>
        </li>

        <?php


?>


    </ul> 
  </div>
</div>




<!--last child-->
<!--Include Footer-->
<?php 
include('./include/footer.php')
?>
</div>
<!-- bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
</body>
</html>
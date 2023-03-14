<?php 

//including connect file
include('./include/connect.php');

function getProducts() {
  global $con;

  $get_products_query = "SELECT * FROM products";
  $result_query = mysqli_query($con, $get_products_query);

  if (!$result_query) {
    // handle SQL error
    echo "Error: " . mysqli_error($con);
    exit;
  }

  if (mysqli_num_rows($result_query) == 0) {
    // handle no results found
    echo "No products found.";
    exit;
  }

  while ($row = mysqli_fetch_assoc($result_query)) {
    // display the product
    echo "<div class='col-md-4 mb-3'>
            <div class='card'>
              <div class='card:hover'>
                <img src='./admin_area/product_images/{$row['product_image1']}' class='card-img-top' alt='{$row['product_name']}'>
                <div class='card-body'>
                  <h5 class='card-title'>{$row['product_name']}</h5>
                  <p class='card-text'>{$row['product_description']}</p>
                  <a href='index.php?add_to_cart={$row['product_id']}' class='btn btn-primary'>Add to Cart</a>
                  <a href='product_details.php?product_id={$row['product_id']}' class='btn btn-warning'>View More</a>
                </div>
              </div>
            </div>
          </div>";
  }
}

//getting all products
function get_all_products(){
  global $con;
  //condition to check isset or not
  if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
  $select_query=" select * from `products` order by rand()";
  $result_query = mysqli_query($con,$select_query);
  
  // loop through the products
  while($row = mysqli_fetch_assoc($result_query))
  {
     // get the product data
  $product_id = $row['product_id'];
  $product_name = $row['product_name'];
  $product_description = $row['product_description'];
  $product_image1 = $row['product_image1'];
  $product_price = $row['product_price'];
  $category_id = $row['category_id'];
  $brand_id = $row['brand_id'];
  
  // display the product
echo "<div class='col-md-4 mb-3'>
<div class='card'>
  <div class='card:hover'>
  <img src='./admin_area/product_images/$product_image1' class='card-img-top w-100' alt='$product_name'>
    <div class='card-body'>
    <h5 class='card-title'>" . implode(' ', array_slice(explode(' ', $product_name), 0, 5)) . (str_word_count($product_name) > 5 ? "..." : "") . "</h5>
      <p class='card-text'>" . (str_word_count($product_description) > 25 ? implode(' ', array_slice(str_word_count($product_description, 1), 0, 25)) . "..." : $product_description) . "</p>
      <p class='card-text'>Price: $product_price</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
      <a href='product_details.php?product_id=$product_id' class='btn btn-warning'>View More</a>
    </div>
  </div>
</div>
</div>";
  }
  }
  }
  }
  

//getting unique categories
function get_unique_categories(){
  global $con;
  
  //condition to check isset or not
  if(isset($_GET['category'])){
    $category_id = $_GET['category'];
    $select_query="SELECT * FROM `products` WHERE category_id = $category_id";
    $result_query = mysqli_query($con,$select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    // check if there are no products for this category
    if($num_of_rows==0){
      echo "<h2 class='text-center text-danger'>Sorry: No stock for this category</h2>";
    }
    // loop through the products
    while($row = mysqli_fetch_assoc($result_query)){
      $product_id = $row['product_id'];
      $product_name = $row['product_name'];
      $product_description = $row['product_description'];
      $product_image1 = $row['product_image1'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brand_id = $row['brand_id'];
      // display the product
      echo "<div class='col-md-4 mb-3'>
              <div class='card'>
              <img src='./admin_area/product_images/$product_image1' class='card-img-top w-100' alt='$product_name'>
                <div class='card-body'>
                  <h5 class='card-title'>$product_name</h5>
                  <p class='card-text'>$product_description</p>
                  <p class='card-text'>Price: $product_price</p>
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                  <a href='product_details.php?product_id=$product_id' class='btn btn-warning'>View More</a>
                </div>
              </div>
            </div>";
    }
  }
}


//getting unique brands
function get_unique_brands(){
  global $con;
  
  //condition to check isset or not
  if(isset($_GET['brand'])){
    $brand_id = $_GET['brand'];
    $select_query = "SELECT * FROM `products` WHERE brand_id = $brand_id";
    $result_query = mysqli_query($con, $select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if($num_of_rows == 0){
      echo "<h2 class='text-center text-danger'>Sorry: This brand is not available in our shop</h2>";
    }
    while($row = mysqli_fetch_assoc($result_query)){
      $product_id = $row['product_id'];
      $product_name = $row['product_name'];
      $product_description = $row['product_description'];
      $product_image1 = $row['product_image1'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brand_id = $row['brand_id'];
      echo "<div class='col-md-4 mb-3'>
              <div class='card'>
              <img src='./admin_area/product_images/$product_image1' class='card-img-top w-100' alt='$product_name'>
                <div class='card-body'>
                  <h5 class='card-title'>$product_name</h5>
                  <p class='card-text'>$product_description</p>
                  <p class='card-text'>Price: $product_price</p>
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                  <a href='product_details.php?product_id=$product_id' class='btn btn-warning'>View More</a>
                </div>
              </div>
            </div>";
    }
  }
}

//Displaying Brands inside Nav
function getbrands(){
  global $con;
  $select_brands = "SELECT brand_name, brand_id FROM `brands`";
$result_brands = mysqli_query($con, $select_brands);
while ($row_data = mysqli_fetch_assoc($result_brands)) {
  $brand_name = $row_data['brand_name'];
  $brand_id = $row_data['brand_id'];
  echo "<li class='nav-item'>
  <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_name</a>
  </li>";
}
}

//Displaying Brands inside Nav
function get_categories(){
  global $con;
  $select_categories = "SELECT category_name, category_id FROM `categories`";
  $result_categories = mysqli_query($con, $select_categories);
  while ($row_data = mysqli_fetch_assoc($result_categories)) {
    $category_name = $row_data['category_name'];
    $category_id = $row_data['category_id'];
    echo "<li class='nav-item'>
    <a href='index.php?category=$category_id' class='nav-link text-light'>$category_name</a>
    </li>";
  }
}

//Searching Products using KeyWords
function search_data_product() {
  global $con;
  if (isset($_GET['search_data'])) {
      $search_data_value = $_GET['search_data'];
      $search_query = "SELECT * FROM `products` WHERE product_keywords LIKE '%{$search_data_value}%'";

      $result_query = mysqli_query($con, $search_query);

      // loop through the products
      while ($row = mysqli_fetch_assoc($result_query)) {
          // get the product data
          $product_id = $row['product_id'];
          $product_name = $row['product_name'];
          $product_description = $row['product_description'];
          $product_image1 = $row['product_image1'];
          $product_price = $row['product_price'];
          $category_id = $row['category_id'];
          $brand_id = $row['brand_id'];

          // display the product
// display the product
echo "<div class='col-md-4 mb-3'>
        <div class='card'>
        <img src='./admin_area/product_images/$product_image1' class='card-img-top w-100' alt='$product_name'>
          <div class='card-body'>
            <h5 class='card-title'>$product_name</h5>
            <p class='card-text'>" . (strlen($product_description) > 100 ? substr($product_description,0,100)."..." : $product_description) . "</p>
            <p class='card-text'>Price: $product_price</p>
            <div class='d-flex justify-content-between align-items-center'>
              <div class='btn-group'>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-sm btn-outline-secondary'>Add to Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-sm btn-outline-secondary'>View More</a>
              </div>
              <small class='text-muted'>$product_price</small>
            </div>
          </div>
        </div>
      </div>";
      }
    }
  }


 
//view details function

function view_details(){
  global $con;
  //condition to check isset or not
  if (isset($_GET['product_id']) && !isset($_GET['category']) && !isset($_GET['brand'])){  
    $product_id = $_GET['product_id'];
    $select_query="SELECT * FROM `products` WHERE product_id = $product_id";
    $result_query = mysqli_query($con,$select_query);
    // loop through the products
    while($row = mysqli_fetch_assoc($result_query)){
      // get the product data
      $product_id = $row['product_id'];
      $product_name = $row['product_name'];
      $product_description = $row['product_description'];
      $product_image1 = $row['product_image1'];
      $product_image2 = $row['product_image2'];
      $product_image3 = $row['product_image3'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brand_id = $row['brand_id'];

      // display the product
      echo  "<div class='col-md-4 mb-3'>
      <div class='card h-100 shadow'>
      <div class='card-img-top'>
      <img src='./admin_area/product_images/$product_image1' class='card-img-top w-100' alt='$product_name'>
            <div class='card-body'>
              <h5 class='card-title'>$product_name</h5>
              <p class='card-text'>$product_description</p>
              <p class='card-text'>Price: $product_price</p>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
              <a href='product_details.php?product_id=$product_id' class='btn btn-warning'>View More</a>
            </div>
          </div>
        </div>
      </div>

      <div class='col-md-8'>
        <!--related images-->
        <div class='row'>
          <div class='col-md-12'></div>
          <h4 class='text-center text-info mb-5'>Related Products</h4>
          <div>
            <div class='col-md-6'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top w-100' alt='$product_name'>
            </div>

            <div class='col-md-6'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top w-100' alt='$product_name'>
            </div>
          </div>
        </div>
      </div>";
    }
  }
}
// include the database connection file
include_once './include/connect.php';

// use the PHP function filter_input to get the IP address securely
function getIpAddress() {
  $ip = filter_input(INPUT_SERVER, 'REMOTE_ADDR', FILTER_VALIDATE_IP);
  if (!$ip && filter_input(INPUT_SERVER, 'HTTP_CLIENT_IP', FILTER_VALIDATE_IP)) {
    $ip = filter_input(INPUT_SERVER, 'HTTP_CLIENT_IP', FILTER_VALIDATE_IP);
  } elseif (filter_input(INPUT_SERVER, 'HTTP_X_FORWARDED_FOR', FILTER_VALIDATE_IP)) {
    $ip = filter_input(INPUT_SERVER, 'HTTP_X_FORWARDED_FOR', FILTER_VALIDATE_IP);
  }
  return $ip;
}



// add a product to the cart
function cart() {
  if (isset($_GET['add_to_cart'])) {
    global $con;
    $get_ip_address = getIpAddress();
    $get_product_id = $_GET['add_to_cart'];

    // use prepared statements to avoid SQL injection
    $select_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_address'  AND product_id = '$get_product_id'";
    $result_query = mysqli_query ($con,$select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows > 0) {
      echo "<script>alert('This item is already in the cart.')</script>";
      echo "<script>window.open('index.php', '_self')</script>";
    } else {
      
      $insert_query = "INSERT INTO cart_details (product_id, ip_address, quantity) VALUES (?, ?, 1)";
      $stmt = mysqli_prepare($con, $insert_query);
    mysqli_stmt_bind_param($stmt, "is", $get_product_id, $get_ip_address);
      mysqli_stmt_execute($stmt);

      echo "<script>alert('Item has been added to the cart.')</script>";
      echo "<script>window.open('index.php', '_self')</script>";
    }
  }
}

//function to get cart item numbers
function cart_item(){
  
  if (isset($_GET['add_to_cart'])) {
    global $con;
    $get_ip_address = getIpAddress();

    // Select all items from cart_details table with the matching IP address.
    $select_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_address'";
    $result_query = mysqli_query ($con,$select_query);
    
    // Get the number of rows (items) returned by the query.
    $count_cart_items = mysqli_num_rows($result_query);
    } else {  
      global $con;
      $get_ip_address = getIpAddress();
      // If 'add_to_cart' variable is not set, retrieve all items from cart_details table with the matching IP address.
      $select_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_address'";
      $result_query = mysqli_query ($con,$select_query);
      
  // Get the number of rows (items) returned by the query.
      $count_cart_items = mysqli_num_rows($result_query);    
  
  }
  echo $count_cart_items;
}
//total price function
function total_cart_price(){
  global $con;
  $get_ip_address = getIpAddress();
  $total = 0;
  $cart_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_address'";
  $result = mysqli_query($con,$cart_query);
  if (!$result) {
    die('Error: ' . mysqli_error($con));
  }
  while ($row=mysqli_fetch_array($result)){
    $product_id = $row['product_id'];
    $select_products = "SELECT * FROM `products` WHERE product_id = '$product_id'";
    $result_products = mysqli_query($con,$select_products);
    if (!$result_products) {
      die('Error: ' . mysqli_error($con));
    }
    while($row_product_price=mysqli_fetch_array($result_products)){
      $product_price= array($row_product_price['product_price']);
      $product_values= array_sum($product_price);
      $total += $product_values;
    }
  }
  echo $total;
}


?>
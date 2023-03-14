<?php
// Include the database connection script
include('../include/connect.php');

// Check if the form has been submitted
if(isset($_POST['insert_brand'])){

  // Get the brand name from the form
  $brand_name = $_POST['brand_name'];

  // Check if the brand already exists in the database
  $select_query = "SELECT * FROM brands WHERE brand_name='$brand_name'";
  $result_select = mysqli_query($con, $select_query);
  $number = mysqli_num_rows($result_select);
  
  // If the brand already exists, display an alert message
  if($number > 0){
    echo "<script>alert('This brand has already been added to the database.')</script>";
  }

  // If the brand doesn't exist, insert it into the database
  $insert_query = "INSERT INTO brands (brand_name) VALUES ('$brand_name')";
  $result = mysqli_query($con, $insert_query);
  
  // Display a success or error message depending on the result of the insert query
  if ($result) {
    echo "<script>alert('Brand has been added successfully')</script>";
  } else {
    echo "<script>alert('Error: Failed to add brand')</script>";
    exit();
  }
}

?>
<!-- The HTML form for inserting brands -->
<h2 class="text-center"> Insert Brands</h2>
<form action="" method="post" class="mb-2">
  <div class="input-group w-90 mb-2">
    <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
    <input type="text" class="form-control" name="brand_name" placeholder="Insert Brand" aria-label="brands" aria-describedby="basic-addon1">
  </div>
  <div class="input-group w-10 mb-2 m-auto">
    <input type="submit" class=" bg-info border-0 p-2 m-3" name="insert_brand" value=" Insert Brand">
  </div>
</form>
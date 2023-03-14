<?php
// Include a PHP file that contains the database connection code
include('../include/connect.php');

// Check if the "insert_cat" form submit button has been clicked
if(isset($_POST['insert_cat'])){
  // Get the category name from the "cat_name" input field
  $category_name =$_POST['cat_name'];

// Select data from the "categories" table where the category name matches the input value
  $select_query = "Select * from categories where category_name='$category_name'";
  $result_select=mysqli_query($con,$select_query);
   // Count the number of rows returned from the query
  $number=mysqli_num_rows($result_select);
  // If the category name already exists in the database, display an error message
  // If the category name already exists in the database, display an error message and stop the script execution
if ($number > 0) {
  echo "<script>alert('This category has already been added to the database.')</script>";
  exit();
}

  
    // Insert the category name into the "categories" table
$insert_query="insert into categories(category_name) values('$category_name')";
$result=mysqli_query($con,$insert_query);
 // If the insert query is successful, display a success message; otherwise, display an error message
if ($result) {
  echo "<script>alert('Category has been added successfully')</script>";
} else {
  echo "<script>alert('Error: Failed to add category')</script>";
}

}
// Display a heading and a form for adding a new category
?>
<h2 class="text-center"> Insert Categories</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="cat_name" placeholder="Insert Category" aria-label="Categories" aria-describedby="basic-addon1">
<div class="input-group w-10 mb-2 m-auto">
  

  <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_cat" value=" Insert Category">

</div>
</form>

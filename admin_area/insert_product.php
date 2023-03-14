<!--The code is a PHP script for inserting products into a database. The form collects data from the user and inserts it into the database.-->

<?php
// Include the file that connects to the database
include('../include/connect.php');

// Check if the form has been submitted
if(isset($_POST['insert_product'])){

    // Get the form data
    $product_name=$_POST['product_name'];
    $product_description=$_POST['product_description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    $product_status='true';

    // Access uploaded images and their temporary names
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    // Check if 'product_image1' has been set and is not empty
    if (isset($_FILES['product_image1']) && $_FILES['product_image1']['name'] != '') {
        // Access uploaded image and its name
        $product_image1 = $_FILES['product_image1']['name'];
    
        // Move uploaded image to the product_images folder
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
    } else {
        // 'product_image1' is a required field, so display an error message
        echo "<script>alert('Please upload an image for Product Image 1')</script>";
        exit();
    }

    // Access uploaded images names (if set)
    $product_image1 = isset($_FILES['product_image1']) ? $_FILES['product_image1']['name'] : '';
    $product_image2 = isset($_FILES['product_image2']) ? $_FILES['product_image2']['name'] : '';
    $product_image3 = isset($_FILES['product_image3']) ? $_FILES['product_image3']['name'] : '';

    // Check if any required field is empty
    if ($product_name == '' || $product_description == '' || $product_keywords == '' || $product_category == '' || $product_brands == '' || $product_price == '' || $product_image1 == '' || $product_image2 == '' || $product_image3 == '') {
        echo "<script>alert('Please fill all the fields')</script>";
        exit();
    } else {
        // Move uploaded images to the product_images folder
        move_uploaded_file( $temp_image1, "./product_images/$product_image1");
        move_uploaded_file( $temp_image2, "./product_images/$product_image2");
        move_uploaded_file( $temp_image3, "./product_images/$product_image3");
    }

    // Insert query
    $insert_product = "INSERT INTO `products` (product_name,product_description,product_keywords,category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status) VALUES ('$product_name','$product_description','$product_keywords','$product_category','$product_brands', '$product_image1', '$product_image2','$product_image3','$product_price',NOW(), '$product_status')";

    $result_query=mysqli_query($con,$insert_product);
    if($result_query){
        echo"<script>alert ('Product Posted Successfully')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products_Admin Dashboard</title>
     <!--boostrap CSS link-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />  

    <!-- css file-->
    <link rel="stylesheet" href="style.css">
</head>
<body class = "bg-light">
<div class="container mt-3">
    
        <h1 class= "text-center">Insert Products</h1>
        <!--form-->
    <form action ="" method="post" enctype="multipart/form-data">
        <!--product name-->
            <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_name" class = "form-label">Product Name</label>
            <input type="text" name ="product_name"
            id="product_name"class= "form-control" placeholder="--Enter Product-- Name" autocomplete="off" required = "required">
            </div>

            <!--product description-->
          <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_description" class = "form-label">Product Description</label>
            <input type="text" name ="product_description"
            id="product_description"class= "form-control" placeholder="--Enter Product Description--" autocomplete="off" required = "required">
            </div>

            <!--product keywords-->
           <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_keywords" class = "form-label">Product Keywords</label>
            <input type="text" name ="product_keywords"
            id="product_keywords"class= "form-control" placeholder="--Enter Product Keywords--" autocomplete="off" required = "required">
            </div>

          <!--product categories-->
<div class="form-outline mb-4 w-50 m-auto">
    <select name="product_category" id="" class="form-select">
        <option value="">--Select a Category--</option>
        <?php
        $select_query = "SELECT * FROM categories";
        $result_query = mysqli_query($con, $select_query);

        while ($row = mysqli_fetch_assoc($result_query)) {
            $category_name = $row['category_name'];
            $category_id = $row['category_id'];
            echo "<option value='$category_id'>$category_name</option>";
        }
        ?>
    </select>
</div>

<!--product brands-->
<div class="form-outline mb-4 w-50 m-auto">
    <select name="product_brands" id="" class="form-select">
        <option value="">--Select a Brand--</option>
        <?php
        $select_query = "SELECT * FROM brands";
        $result_query = mysqli_query($con, $select_query);

        while ($row = mysqli_fetch_assoc($result_query)) {
            $brand_name = $row['brand_name'];
            $brand_id = $row['brand_id'];
            echo "<option value='$brand_id'>$brand_name</option>";
        }
        ?>
    </select>
</div>

             <!--Image_1-->
           <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image1" class = "form-label">Product Image 1</label>
            <input type="file" name ="product_image1"
            id="product_image1" class= "form-control" required = "required">
            </div>

               <!--Image_2-->
           <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image2" class = "form-label">Product Image 2</label>
            <input type="file" name ="product_image2"
            id="product_image2" class= "form-control" required = "required">
            </div>

               <!--Image_3-->
           <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image3" class = "form-label">Product Image 3</label>
            <input type="file" name ="product_image3"
            id="product_image3" class= "form-control" required = "required">
            </div>
              <!--product price-->
           <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_price" class = "form-label">Product Price</label>
            <input type="text" name ="product_price"
            id="product_price"class= "form-control" placeholder="Enter Product_Price" autocomplete="off" required = "required">
            </div>

             <!--product price-->
           <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Product">
            </div>
            
        </div>
            
    </form>
    </div>        

    
</body>
</html>
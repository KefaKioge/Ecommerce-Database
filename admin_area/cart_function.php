
//get ip address function
<?php
include('./include/connect.php');

function getIpAddress(){
  if(!empty($_SERVER['HTTP_CLIENT_IP'])){
      //ip from share internet
      $ip = $_SERVER['HTTP_CLIENT_IP'];
  }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
      //ip pass from proxy
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }else{
      $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}
$ip = getIpAddress();
//echo 'User Real IP - '.getIpAddress();

//cart function
function cart(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_address = getIpAddress();
    $get_product_id=$_GET['add_to_cart'];

    $select_query = "select * from `cart_details` where ip_address='$get_ip_address' and product_id = $get_product_id";
    $result_query = mysqli_query($con,$select_query);
    $num_of_rows= mysqli_num_rows($result_query);
    if($num_of_rows>0){
      echo "<script>alert('This item is in the cart')</script>";
      echo "<script>window.open('index.php','_self') </script>";
    }else{
      $insert_query ="insert into `cart_details`(product_id,ip_address,quantity) values($get_product_id,'$get_ip_address',1)";
      $result_query = mysqli_query($con,$insert_query);
      
      echo "<script>alert('Item hasbeed added in the cart')</script>";
      echo "<script>window.open('index.php','_self') </script>";
    }

  }
}
//Error reporting 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
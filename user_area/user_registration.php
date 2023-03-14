<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
     <!--boostrap CSS link-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <div class = "container-fluid my-3">
<h2 class="text-center">New User Registration</h2>
<div class="row d-flex align-items-center justify-content-center">
  <div class="col-lg-12 col-xl-6">
<form action = "" method="post" enctype="multipart/form-data">
     <!--Username Field-->
    <div class="form-outline mb-4">       
        <label for = "user_username" class="form-label">Username</label>
        <input type ="text" id="user_username" class="form-control" placeholder="---Enter Your Username---" autocomplete ="off" required="required" name = "user_username:"/>
    </div>
     <!--Email Fieled-->
    <div class="form-outline mb-4">
        <label for = "User_Email" class="form-label">User Image</label>
        <input type ="email" id="user_image" class="form-control" placeholder="---Enter Your email--" autocomplete ="off" required="required" name = "email:"/>
    </div>
      <!--Image Fieled-->
      <div class="form-outline mb-4">
        <label for = "user_image" class="form-label">--User Image--</label>
        <input type ="file" id="user_image" class="form-control"  required="required" name = "email:"/>
    </div>
      <!--Password Fieled-->
      <div class="form-outline mb-4">
        <label for = "user_password" class="form-label">Password</label>
        <input type ="password" id="user_password" class="form-control" placeholder="---Enter Your Passord--" autocomplete ="off" required="required" name = "user_password:"/>
    </div>
       <!--Confirm Password Fieled-->
       <div class="form-outline mb-4">
        <label for = "confirm_user_password" class="form-label">Confirm Password</label>
        <input type ="password" id="confirm_user_password" class="form-control" placeholder="---Confirm your Passord--" autocomplete ="off" required="required" name = "confirm_user_password:"/>
    </div>
      <!--User Address Field-->
      <div class="form-outline mb-4">       
        <label for = "user_address" class="form-label">Enter Address</label>
        <input type ="text" id="user_address" class="form-control" placeholder="---Enter Your Address---" autocomplete ="off" required="required" name = "user_address"/>
    </div>
       <!--Contact Field-->
       <div class="form-outline mb-4">       
        <label for = "user_contact" class="form-label">Contact</label>
        <input type ="text" id="user_contact" class="form-control" placeholder="---Enter Your Mobile Number---" autocomplete ="off" required="required" name = "Contact:"/>
    </div>
    <div class = "mt-4 pt-2">
        <input type = "submit" value="Register" class = "bg-info py-2 px-3 border-0" name = "user_register">
        <p class ="small fw-bold mt-2 pt-1 mb-0"> Already have an account?<a href = "user_login.php" class = "text-danger"> Login</p>

    </div>
</form>

</div>

    </div>

</body>
</html>
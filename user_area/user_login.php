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
<h2 class="text-center">User Login</h2>
<div class="row d-flex align-items-center justify-content-center">
  <div class="col-lg-12 col-xl-6">
<form action = "" method="post" enctype="multipart/form-data">
     <!--Username Field-->
    <div class="form-outline mb-4">       
        <label for = "User_username" class="form-label">Username</label>
        <input type ="text" id="user_username" class="form-control" placeholder="---Enter Your Username---" autocomplete ="off" required="required" name = "user_username:"/>
    </div>
        <!--Password Fieled-->
        <div class="form-outline mb-4">
        <label for = "user_password" class="form-label">Password</label>
        <input type ="password" id="user_password" class="form-control" placeholder="---Enter Your Passord--" autocomplete ="off" required="required" name = "user_password:"/>
    </div>
    
        <div class = "mt-4 pt-2">
        <input type = "submit" value="Register" class = "bg-info py-2 px-3 border-0" name = "user_register">
        <p class ="small fw-bold mt-2 pt-1 mb-0"> Not Registered?<a href = "user_registration.php" class = "text-danger"> Register</p>
        
      

    </div>
</form>

</div>

    </div>

</body>
</html>
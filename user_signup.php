<?php

 session_start();

 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
    <link href="animate.min.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">


    <title>Golden Kitchen peoject </title>

    <style type="text/css">
            
       body{
        background-color: rgb(220, 212, 212);
       }
    .main{
        background-color: rgb(220, 212, 212);
        width: 800px;
        margin: auto;
    }
form{
    padding: 10px;
}


button:hover{
    background-color:rgb(72, 18, 189);
}
#change{
    border-radius: 12px;
    cursor: pointer;
}


      /* Style for the form container */
      .main {
            width: 500px;
            height: 500px;
            margin-top: 100px;
            margin-bottom: 100px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Style for form fields */
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        /* Style for the show/hide password button */
        #showPassword {
            margin-top: 10px;
            cursor: pointer;
        }
    </style>
    

    
</head>
<body>


<main class="form-signin w-100 m-auto">


<div class="container col-md-6 px-4 py-5" >
 


         <h1 class="h3 mb-3 text-center"> User Signup Page </h1>

       
<?php
      if(isset($_SESSION['errormsg'])){
        echo "<div class='alert alert-danger'>" .$_SESSION['errormsg']."</div>";
        unset($_SESSION['errormsg']);
      }
      ?>


 <form action="process/user_process_signup.php" method="post"> 

<div class="form-group row mb-3">

  <div class="col-md-6">
    <div class="">
    <label for="floatingfname">Firstname</label>
      <input type="text" name="fname" class="form-control" id="floatingfname" placeholder="Firstname">
     
    </div>
   </div>

   <div class="col-md-6">
    <div class="">
    <label for="floatinglname">Lastname</label>
      <input type="text" name="lname" class="form-control" id="floatinglname" placeholder="Lastname">
     
    </div>
   </div>

</div>


      <div class="mb-3">
        <label for="floatingphone">Phone Number</label>
      <input type="number" name="phone" class="form-control" id="phonenumner" placeholder="Phone Number">
     
    </div>

    <div class="mb-3">
    <label for="floatingemail">Email address</label>
      <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
      
    </div>

    <div class=" mb-3">
     <label for="floatingPassword">Password</label>
      <input type="password" name="pwd" class="form-control" id="Password" placeholder="Password">
      
    </div>

    <div class=" mb-3">
     <label for="confirmPassword">Password</label>
      <input type="password" name="pwd" class="form-control" id="confirmPassword" placeholder="Confirm Password">
      
    </div>
    
     
    <button class="btn btn-danger w-50" type="submit" name="btnregister" value="register">Create Account</button>

    <div class="form-floating">
      <p> Already Have an account? <a href="user_loginpage.php">Login</a>   </p>
    </div>
    
  </form>
</div>
<footer class="container-fluid" style="height:100px; line-height:100px;">
  <p class="float-end"><a href="index.php" style="color:#FF5714"> Homepage</a></p>
  <p>&copy; 2024-2025 Golden Kitchen.... All Right Reserve</p>
</footer>

      </main>             
   
     <script src="jquery.js"> </script>
     <script src="Bootstrap/js/bootstrap.bundle.js" type="text/javascript"></script> 

    <script>

    function validateForm() {
     var password = document.getElementById("password").value;
     var confirmpassword = document.getElementById("confirmpassword").value;

       if (password != confirmpassword) {
       alert("Passwords do not match");
        return false;
     }
         return true;
    } 
    </script>
</body>
</html>
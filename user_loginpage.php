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
        <style type="text/css">
            
        div{
            border: 0px solid red;
        }   
        #change{
            color: white;
            height: auto;
        }
        p{

            font-size: 15px;
            color:black;
            font-family: Arial, sans-serif;
        }
        span{
            font-size: 15px;
            margin-top: 70px;
        }
       
        .policy{
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }
        .div bolt{
            color:white;

        }
.policy button{
            width: 5%;
            align-self: flex-end;
        }
        .alart3{
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            height: 100px;
            background-color:#D815B612;
        }
        .alart3 button{
            align-self: flex-end;
        }
        a {
        text-decoration: none;
    }
    #registerForm {
        display: none;
    }
  #logreg{
    padding-top: 50px;
    padding-bottom: 50px;
    padding-left: 200px;
  }   
  #leb{
    font-family: sans-serif;
  }
  #mar{
      background-color: lightgrey;
      height: 50PX;
    }

    h6{
    margin-top: 40px;
    margin-left: 50px;
  }


    </style>
    

    
</head>
<body>
<body>

<main class="form-signin w-100 m-auto">
     <div class="container col-md-6 px-4 py-5">

           
                
    <form id="loginForm" action="process/user_process_login.php" method="post">

    <!-- content start -->
          
            <h1 class="h3 mb-3 text-center"> User Login Page </h1>

<?php

 if(isset($_SESSION['errormsg'])){
  echo "<div class='alert alert-danger'>" .$_SESSION['errormsg']."</div>";
  unset($_SESSION['errormsg']);
}

?>
                             
                             
            <div class=" mb-3">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter Your Email" name="email">
            </div>

            <div class=" mb-3">
              <label for="password">Password:</label>
              <input type="password" id="password" name="password" placeholder="Enter your password" class="form-control"><br>
             </div>

             <input type="checkbox" id="showPasswordCheckbox">
              <label for="showPasswordCheckbox">Show Password</label>

              <button class="btn btn-danger w-50" type="submit" name="btnlogin" value="login">Login</button> <br>
              <a href="" alt="Forget password" > Forget Password</a>

              <div class="form-floating">
                <p> Don't have an account? <a href="user_signup.php">Signup</a>   </p>
            </div>
        
    
    </form>     
    

</div>
<footer class="container-fluid" style="height:100px; line-height:100px;">
  <p class="float-end"><a href="index.php" style="color:#FF5714"> Homepage</a></p>
  <p>&copy; 2024-2025 Golden Kitchen....... All Right Reserve</p>
</footer>
       

     <script src="jquery.js"> </script>
     <script src="Bootstrap/js/bootstrap.bundle.js" type="text/javascript"></script> 

     <script>
          // Function to toggle password visibility
          function togglePasswordVisibility() {
            var passwordField = document.getElementById("password");
            var showPasswordCheckbox = document.getElementById("showPasswordCheckbox");

            if (showPasswordCheckbox.checked) {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }

        // Add event listener to the checkbox
        document.getElementById("showPasswordCheckbox").addEventListener("click", togglePasswordVisibility);


    </script>
</main>  
</body>
</html>
           
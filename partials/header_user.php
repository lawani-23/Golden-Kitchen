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
            
        div{
            border: 0px solid red;
        }   
        #change{
            color: white;
        }

       

        p{

            font-size: 15px;
            color:black;
            font-family: Arial, sans-serif;
            text-align: auto;
        }
        h1{
          font-size: 15px;
        }
        span{
            font-size: 15px;
            margin-top: 70px;
        }
        h4{
            font-size: 20pxpx;
            color:black;
            font-family: Arial, sans-serif;
            text-align: auto; 
        }
        #warning{
   border-radius: 60px;
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
    
    #mar{
      background-color: lightgrey;
      height: 50PX;
    }
    #imgbanner {
    height: 30rem;
      
      
    }
    img{
      padding-top: 30px;
      height: 300px;
      width: 250px;
    }
 h5{
  text-align: left;
  color: black;
 }
 ul{
  text-align:left;
  color: black;
 }
 h6{
    margin-top: 40px;
  }

  .col-md img {
  transition: transform 0.5s ease;

 }
 .col-md:hover img{
  transform: scale(1.1) translate(-5%, -5%);
  background-color: tomato;
  
 }
 .col-md{
  display: inline-block;
  overflow: hidden;

 }
 #logo1{
    margin-bottom: 30px;
    margin-left: 10px;
  }
  #myImage{
    transition: filter 0.3s ease; 
   
  
     
  }
  #myImage.hover-effect {
  filter: hue-rotate(180deg);
  background-color: rgb(151, 29, 29);
  }

  .nav-links {
  display: flex;
  list-style: none;
  padding-right: 10px;
}

.mb-2{
  text-align: left;
}
/* new css */

    </style>

<nav class="navbar navbar-expand-lg bg-danger ">
  <div class="container-fluid">
    <a class="navbar-brand" style="color:white" href="#">Golden Kitchen</a>
    <button class="navbar-toggler"  type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent" style=" text-color:white">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" style="color:white" aria-current="page" href="home.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" style="color:white" aria-current="page" href="home.php">Register</a>
        </li>
        
        <!-- <li class="nav-item dropdown" >
          <a class="nav-link dropdown-toggle" style="color:white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Meal Category
          </a> -->
          <!-- <ul class="dropdown-menu"> -->
          <!-- <li><a  class="dropdown-item" href="#"> <strong>Meal menu </strong> </a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a  class="dropdown-item"  href="#"> <strong> African Cuisine</strong> </a></li>
                  <li><hr class="dropdown-divider"></li>
                   <li><a  class="dropdown-item" href="#"> <strong> African Dishes</strong> </a></li>
                  <li><hr class="dropdown-divider"></li>
                 <li><a  class="dropdown-item" href="#"> <strong>Continental Dishes </strong> </a></li>
           </ul> -->
        <!-- </li> -->
       
      </ul>
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
             
              <li class="nav-item">
                <a href="showcart.php"><img id="myImage" src="image/icon_cart.png" alt="Order " style="width:30px;height:50px;">  (<?php if(isset($_SESSION['products']))
                { echo count($_SESSION['products']);} else{echo 0;} ?>)
                </a>
              </li>
              
            </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
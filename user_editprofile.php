<?php
session_start();
require_once "user_guard.php";
require_once "partials/header_user.php";
require_once "classes/User.php";
require_once "classes/Product.php";

$id = $_SESSION['useronline'];
$user = new User;
$edits = $user->get_user_by_id($id);
?>

<div class="container col-xxl-8 px-4 py-5" >
  <?php
  require_once "partials/menu.php";

  ?>
     
<div class="content" style="background-color: white;padding:3em">
    <h3>Edit Your Profile</h3>
    <form enctype="multipart/form-data" method="post" action="process/process_user_profile.php">
     
   <div class="form-group row">
    <div class="col-md-6 mb-3">
        <label for="fname">FirstName</label>
        <input value = "<?php echo $edits['user_fname']; ?>"  class="form-control border-success noround" id="fname" name="fname" required type="text"  >
    
    </div>
    <div class="col-md-6 mb-3">
        <label for="lname">LastName</label>
        <input class="form-control border-success noround" value = "<?php echo $edits['user_lname']; ?>"   id="lname" name="lname" required type="text"  >
    
    </div>
   </div>
   <div class="form-group row">
    <div class="col-md-6 mb-3">
        <label for="phone">Phone</label>
        <input class="form-control border-success noround" value = "<?php echo $edits['user_phone']; ?>"  id="phone" name="phone" required type="text" >
    
    </div>

    <div class="col-md-6 mb-3">
        <label for="phone">Email</label>
        <input class="form-control border-success noround" value = "<?php echo $edits['user_email']; ?>"  id="email" name="email" required type="text" >
    
    </div>
   
   </div>

   <div class="form-group row">
    <div class="col-md mb-3">
        <label for="phone">Address</label>
        <input class="form-control border-success noround"  id="address" name="address" required type="text" >
    
    </div>
   
   </div>

   <div class="form-group row">
    <div class="col-md-6 mb-3">
        <label for="phone">State</label>
        <input class="form-control border-success noround"  id="state" name="state" required type="text" >
    
    </div>

    <div class="col-md-6 mb-3">
        <label for="phone">Local Government</label>
        <input class="form-control border-success noround"   id="lg" name="lg" required type="text" >
    
    </div>
   
   </div>
        <div class="mb-3"> 
        <input class="btn custom-btn noround" id="btnsubmit" name="btnsubmit" type="submit" value="Update Profile!">
      
         </div>
   </form>
 </div>
</div>
   <hr>
  
<?php
require_once "partials/footer.php";

?>
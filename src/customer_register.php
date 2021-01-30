<?php
session_start();
include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");
?>
<div id="content" >
  <div class="container" >
    <div class="col-md-12" >
      <div class="box" >
        <div class="box-header" >
          <center>
          <h2> Sign up for CometCart </h2>
          </center>
        </div>
        <form action="customer_register.php" method="post" enctype="multipart/form-data" >
          <div class="form-group" >
            <label>Name</label>
            <input type="text" class="form-control" name="c_name" required>
            </div>
            <div class="form-group">
            <label> Email</label>
            <input type="text" class="form-control" name="c_email" required>
          </div>
          <div class="form-group">
            <label> Password </label>
            <input type="password" class="form-control" id="pass" name="c_pass" required>
          </div>
          <div class="form-group"><!-- form-group Starts -->
            <label> Re-enter Password </label>
            <input type="password" class="form-control confirm" id="re_pass" name="re_pass" required>
          </div>
          <div class="form-group"><!-- form-group Starts -->
            <label> Contact number </label>
            <input type="text" class="form-control" name="c_contact" required>
          </div>
          <div class="form-group">
            <label> Address </label>
            <input type="text" class="form-control" name="c_address" required>
          </div>
          <div class="text-center">
            <button type="submit" name="submit" class="btn btn-primary">
            <i class="fa fa-user-md"></i> Submit
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
include("includes/footer.php");
?>
<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php
  if(isset($_POST['submit']))
  {
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    if (!filter_var($c_email, FILTER_VALIDATE_EMAIL)) 
    {
      echo "<script>alert('Invalid email format. Please enter a valid email address.')</script>";
      exit();
    }
    if(($_POST["c_pass"])!=($_POST["re_pass"]))
    {
      echo "<script>alert('Passwords do not match. Please enter the password correctly.')</script>";
      exit();
    }
    $c_pass = $_POST['c_pass'];
    $c_contact = $_POST['c_contact'];
    if (!preg_match("/^[0-9]{10}$/",$c_contact)) 
    {
      echo "<script>alert('Invalid phone number. Please enter a valid phone number.')</script>";
      exit();
    }
    $c_address = $_POST['c_address'];
    $c_ip = getRealUserIp();
    $get_email = "select * from customers where customer_email='$c_email'";
    $run_email = mysqli_query($con,$get_email);
    $check_email = mysqli_num_rows($run_email);
    if($check_email == 1)
    {
      echo "<script>alert('This email is already registered, try another one')</script>";
      exit();
    }
    $insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_contact,customer_address) values ('$c_name','$c_email','$c_pass','$c_contact','$c_address')";
    $run_customer = mysqli_query($con,$insert_customer);
    $sel_cart = "select * from cart where ip_add='$c_ip'";
    $run_cart = mysqli_query($con,$sel_cart);
    $check_cart = mysqli_num_rows($run_cart);
    if($check_cart>0)
    {
      $_SESSION['customer_email']=$c_email;
      $_SESSION['user_type']=1;
      echo "<script>alert('You have been Registered Successfully')</script>";
      echo "<script>window.open('checkout.php','_self')</script>";
    }
    else
    {
      $_SESSION['customer_email']=$c_email;
      $_SESSION['user_type']=1;
      echo "<script>alert('You have been Registered Successfully')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
  }
?>

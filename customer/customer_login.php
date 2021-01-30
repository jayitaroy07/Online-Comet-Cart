<div class="box" >
    <div class="box-header" >
        <center>
            <h1>Login</h1>
        </center>
    </div>
    <form action="checkout.php" method="post" >
        <div class="form-group" >
            <label>Email</label>
            <input type="text" class="form-control" name="c_email" required >
        </div>
        <div class="form-group" >
            <label>Password</label>
            <input type="password" class="form-control" name="c_pass" required >
        </div>
        <div class="text-center" >
            <button name="login" value="Login" class="btn btn-primary" >
            <i class="fa fa-sign-in" ></i> Log in
            </button>
        </div>
    </form>
    <center>
        <a href="customer_register.php" >
            <h3>Sign up as a new user</h3>
        </a>
    </center>
</div>

<?php
if(isset($_POST['login']))
{
    $customer_email = $_POST['c_email'];
    $customer_pass = $_POST['c_pass'];
    $select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
    $run_customer = mysqli_query($con,$select_customer);
    $get_ip = getRealUserIp();
    $check_customer = mysqli_num_rows($run_customer);
    $select_cart = "select * from cart where ip_add='$get_ip'";
    $run_cart = mysqli_query($con,$select_cart);
    $check_cart = mysqli_num_rows($run_cart);
    if($check_customer==0)
    {
        echo "<script>alert('password or email is wrong')</script>";
        exit();
    }
    if($check_customer==1 AND $check_cart==0)
    {
        $_SESSION['customer_email']=$customer_email;
        $_SESSION['user_type']=$check_customer['user_type'];
        echo "<script>alert('You are Logged In')</script>";
        echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
    }
    else 
    {
        $_SESSION['customer_email']=$customer_email;
        $_SESSION['user_type']=$check_customer['user_type'];
        echo "<script>alert('You are Logged In')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    } 
}
?>
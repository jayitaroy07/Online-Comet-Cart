<?php
if($_SESSION['customer_email']!="admin@cometcart.com")
{
    echo "<script>alert('You don't have admin access.')</script>";
    echo "<script>window.open('../index.php','_self')</script>";
}
else
{
?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Welcome Admin</h1>
        </div>
    </div>
<?php 
}
?>
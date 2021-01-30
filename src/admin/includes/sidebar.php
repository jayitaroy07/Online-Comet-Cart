<?php
if($_SESSION['customer_email']!="admin@cometcart.com")
{
    echo "<script>alert('You don't have admin access.')</script>";
    echo "<script>window.open('../index.php','_self')</script>";
}
else
{
?>
    <nav class="navbar navbar-inverse navbar-fixed-top" >
        <div class="navbar-header" >
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" >
            <span class="icon-bar" ></span>
            <span class="icon-bar" ></span>
            <span class="icon-bar" ></span>
            </button>
            <a class="navbar-brand" href="index.php?dashboard" >Admin Control</a>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li><!-- Products li Starts -->
                <li>
                    <a href="index.php?insert_product"> Insert Products </a>
                </li>
                <li>
                    <a href="index.php?view_products"> View/Edit Products </a>
                </li>
                <li>
                    <a href="../index.php"> Back to store </a>
                </li>
            </ul>
        </div>
    </nav>
<?php 
} 
?>
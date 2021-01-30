<?php
session_start();
include("includes/db.php");
if($_SESSION['customer_email']!="admin@cometcart.com")
{
    echo "<script>alert('You don't have admin access.')</script>";
    echo "<script>window.open('../index.php','_self')</script>";
}
else
{
?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Admin Control</title>
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="css/style.css" rel="stylesheet">
            <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" >
            <link rel="shortcut icon" href="//cdn.shopify.com/s/files/1/2484/9148/files/SDQSDSQ_32x32.png?v=1511436147" type="image/png">
        </head>
        <body>
            <div id="wrapper">
                <?php include("includes/sidebar.php");  ?>
                <div id="page-wrapper">
                    <div class="container-fluid">
                        <?php
                        if(isset($_GET['dashboard']))
                        {
                            include("dashboard.php");
                        }
                        if(isset($_GET['insert_product']))
                        {
                            include("insert_product.php");
                        }
                        if(isset($_GET['view_products']))
                        {
                            include("view_products.php");
                        }
                        if(isset($_GET['delete_product']))
                        {
                            include("delete_product.php");
                        }
                        if(isset($_GET['edit_product']))
                        {
                            include("edit_product.php");
                        }
                        ?>
                    </div>
                </div>
            </div>
            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
        </body>
    </html>
<?php
} 
?>
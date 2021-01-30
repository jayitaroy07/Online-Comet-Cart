<?php
if($_SESSION['customer_email']!="admin@cometcart.com")
{
    echo "<script>alert('You don't have admin access.')</script>";
    echo "<script>window.open('../index.php','_self')</script>";
}
else
{
?>
    <?php
    if(isset($_GET['delete_product']))
    {
        $delete_id = $_GET['delete_product'];
        $delete_pro = "update products set status=0 where product_id='$delete_id'";
        $run_delete = mysqli_query($con,$delete_pro);
        if($run_delete)
        {
            echo "<script>alert('The product has been deleted succcessfully')</script>";
            echo "<script>window.open('index.php?view_products','_self')</script>";
        }
    }
    ?>
<?php 
} ?>
<?php
session_start();
if(!isset($_SESSION['customer_email']))
{ 
  echo "<script>window.open('../checkout.php','_self')</script>";
}
else 
{
  include("includes/db.php");
  include("../includes/header.php");
  include("../functions/functions.php");
  include("includes/main.php");
?>
<div id="content" >
  <div class="container" >
    <div class="col-md-3">
      <?php include("includes/sidebar.php"); ?>
    </div>
    <div class="col-md-9" >
      <div class="box" >
        <?php
          if(isset($_GET['my_orders']))
          {
            include("my_orders.php");
          }
        ?>
      </div>
    </div>
  </div>
</div>
<?php
include("../includes/footer.php");
?>
<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>

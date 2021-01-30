<?php
session_start();
include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");
?>

<?php
$product_id = @$_GET['pro_id'];
$get_product = "select * from products where product_id='$product_id'";
$run_product = mysqli_query($con,$get_product);
$check_product = mysqli_num_rows($run_product);
if($check_product == 0)
{
  echo "<script> window.open('index.php','_self') </script>";
}
else
{
  $row_product = mysqli_fetch_array($run_product);
  $pro_id = $row_product['product_id'];
  $pro_title = $row_product['title'];
  $pro_price = $row_product['price'];
  $pro_img1 = $row_product['img'];
  $pro_url = $row_product['url'];
  ?>

  <div id="content" >
    <div class="container" >
      <div class="col-md-12">
        <div class="row" id="productMain">
          <div class="col-sm-6">
            <div id="mainImage">
              <img src="admin/product_images/<?php echo $pro_img1; ?>" class="img-responsive">
            </div>
          </div>
          <div class="col-sm-6" >
            <div class="box" >
              <h1 class="text-center" > <?php echo $pro_title; ?> </h1>
              <?php
              if(isset($_POST['add_cart']))
              {
                $ip_add = getRealUserIp();
                $p_id = $pro_id;
                $product_qty = $_POST['product_qty'];
                $product_size = $_POST['product_size'];
                $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
                $run_check = mysqli_query($con,$check_product);
                if(mysqli_num_rows($run_check)>0)
                {
                  echo "<script>alert('This Product is already added in cart')</script>";
                  echo "<script>window.open('details.php?pro_id=$pro_id','_self')</script>";
                }
                else 
                {
                  $get_price = "select * from products where product_id='$p_id'";
                  $run_price = mysqli_query($con,$get_price);
                  $row_price = mysqli_fetch_array($run_price);
                  $pro_price = $row_price['price'];
                  $query = "insert into cart (p_id,ip_add,qty,p_price) values ('$p_id','$ip_add','$product_qty','$pro_price')";
                  $run_query = mysqli_query($db,$query);
                  echo "<script>alert('Successfully added item to cart.')</script>";
                  echo "<script>window.open('details.php?pro_id=$pro_id','_self')</script>";
                }
              }
              ?>
              <form action="" method="post" class="form-horizontal" >
                <div class="form-group">
                  <label class="col-md-5 control-label" >Product Quantity </label>
                  <div class="col-md-7" >
                    <select name="product_qty" class="form-control" >
                      <option>Select quantity</option>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-5 control-label" >Price</label>
                  $<?php echo $pro_price; ?>
                </div>
                <p class="text-center buttons" >
                  <button class="btn btn-primary" type="submit" name="add_cart">
                    <i class="fa fa-shopping-cart" ></i> Add to Cart
                  </button>
                </p>
              </form>
            </div>
          </div>
        </div>
        <div id="row same-height-row">
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
} 
?>

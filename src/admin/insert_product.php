<?php
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
    <title> Insert Products </title>
  </head>
  <body>
    <div class="row">
      <div class="col-lg-12">
        <ol class="breadcrumb">
          <li class="active">
            <i class="fa fa-dashboard"> </i> Insert Products
          </li>
        </ol>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              <i class="fa fa-money fa-fw"></i> Insert Products
            </h3>
          </div>
          <div class="panel-body">
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
              <div class="form-group" >
                <label class="col-md-3 control-label" > Product Title </label>
                <div class="col-md-6" >
                  <input type="text" name="product_title" class="form-control" required >
                </div>
              </div>
              <div class="form-group" >
                <label class="col-md-3 control-label" > Product Url Title</label>
                <div class="col-md-6" >
                  <input type="text" name="product_url" class="form-control" required >
                  <br>
                  <p style="font-size:15px; font-weight:bold;">
                    Product Url Example : sharpie-pen
                  </p>
                </div>
              </div>
              <div class="form-group" >
                <label class="col-md-3 control-label" > Category </label>
                <div class="col-md-6" >
                  <select name="cat" class="form-control" >
                    <option> Select a Category </option>
                      <?php
                      $get_cat = "select * from categories ";
                      $run_cat = mysqli_query($con,$get_cat);
                      while ($row_cat=mysqli_fetch_array($run_cat)) {
                      $cat_id = $row_cat['cat_id'];
                      $cat_title = $row_cat['cat_title'];
                      echo "<option value='$cat_id'>$cat_title</option>";
                      }
                      ?>
                  </select>
                </div>
              </div>
              <div class="form-group" >
                <label class="col-md-3 control-label" > Product Image </label>
                <div class="col-md-6" >
                  <input type="file" name="product_img1" class="form-control" required >
                </div>
              </div>
              <div class="form-group" >
                <label class="col-md-3 control-label" > Product Price </label>
                <div class="col-md-6" >
                  <input type="text" name="product_price" class="form-control" required >
                </div>
              </div>
              <div class="form-group" >
                <label class="col-md-3 control-label" ></label>
                <div class="col-md-6" >
                  <input type="submit" name="submit" value="Insert Product" class="btn btn-primary form-control" >
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<?php
if(isset($_POST['submit'])){
$product_title = $_POST['product_title'];
$product_cat = $_POST['product_cat'];
$cat = $_POST['cat'];
$product_price = $_POST['product_price'];
$product_url = $_POST['product_url'];
$product_img1 = $_FILES['product_img1']['name'];
$temp_name1 = $_FILES['product_img1']['tmp_name'];
move_uploaded_file($temp_name1,"product_images/$product_img1");
$insert_product = "insert into products (cat_id,date,title,url,img,price) values ('$cat',NOW(),'$product_title','$product_url','$product_img1','$product_price')";
$run_product = mysqli_query($con,$insert_product);
if($run_product){
echo "<script>alert('Product has been inserted successfully')</script>";
echo "<script>window.open('index.php?view_products','_self')</script>";
}
}
?>
<?php } ?>

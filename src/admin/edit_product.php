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
  if(isset($_GET['edit_product']))
  {
    $edit_id = $_GET['edit_product'];
    $get_p = "select * from products where product_id='$edit_id'";
    $run_edit = mysqli_query($con,$get_p);
    $row_edit = mysqli_fetch_array($run_edit);
    $p_id = $row_edit['product_id'];
    $p_title = $row_edit['title'];
    $cat = $row_edit['cat_id'];
    $p_image1 = $row_edit['img'];
    $new_p_image1 = $row_edit['img'];
    $p_price = $row_edit['price'];
    $p_url = $row_edit['url'];
  }
  $get_cat = "select * from categories where cat_id='$cat'";
  $run_cat = mysqli_query($con,$get_cat);
  $row_cat = mysqli_fetch_array($run_cat);
  $cat_title = $row_cat['cat_title'];
  ?>

  <!DOCTYPE html>
  <html>
    <head>
      <title> Edit Products </title>
    </head>
    <body>
      <div class="row">
        <div class="col-lg-12">
          <ol class="breadcrumb">
          <li class="active">
          Edit Products
          </li>
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">
                <i class="fa fa-money fa-fw"></i> Edit Products
              </h3>
            </div>
            <div class="panel-body">
              <form class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group" >
                  <label class="col-md-3 control-label" > Product Title </label>
                  <div class="col-md-6" >
                    <input type="text" name="product_title" class="form-control" required value="<?php echo $p_title; ?>">
                  </div>
                </div>
                <div class="form-group" >
                  <label class="col-md-3 control-label" > Product Url </label>
                  <div class="col-md-6" >
                    <input type="text" name="product_url" class="form-control" required value="<?php echo $p_url; ?>" >
                    <br>
                    <p style="font-size:15px; font-weight:bold;">
                      Product Url Example : utd-mug
                    </p>
                  </div>
                </div>
                <div class="form-group" >
                  <label class="col-md-3 control-label" > Category </label>
                  <div class="col-md-6" >
                    <select name="cat" class="form-control" >
                      <option value="<?php echo $cat; ?>" > <?php echo $cat_title; ?> </option>
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
                  <label class="col-md-3 control-label" > Product Image</label>
                  <div class="col-md-6" >
                    <input type="file" name="product_img1" class="form-control" >
                      <br><img src="product_images/<?php echo $p_image1; ?>" width="70" height="70" >
                  </div>
                </div>
                <div class="form-group" >
                  <label class="col-md-3 control-label" > Product Price </label>
                  <div class="col-md-6" >
                    <input type="text" name="product_price" class="form-control" required value="<?php echo $p_price; ?>" >
                  </div>
                </div>
                <div class="form-group" >
                  <label class="col-md-3 control-label" ></label>
                  <div class="col-md-6" >
                    <input type="submit" name="update" value="Update Product" class="btn btn-primary form-control" >
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
  if(isset($_POST['update']))
  {
    $product_title = $_POST['product_title'];
    $cat = $_POST['cat'];
    $manufacturer_id = $_POST['manufacturer'];
    $product_price = $_POST['product_price'];
    $product_url = $_POST['product_url'];
    $product_img1 = $_FILES['product_img1']['name'];
    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    if(empty($product_img1))
    {
      $product_img1 = $new_p_image1;
    }
    move_uploaded_file($temp_name1,"product_images/$product_img1");
    $update_product = "update products set cat_id='$cat',date=NOW(),title='$product_title',url='$product_url',img='$product_img1',price='$product_price' where product_id='$p_id'";
    $run_product = mysqli_query($con,$update_product);
    if($run_product)
    {
      echo "<script> alert('Product has been updated successfully') </script>";
      echo "<script>window.open('index.php?view_products','_self')</script>";
    }
  }
  ?>
<?php 
} 
?>

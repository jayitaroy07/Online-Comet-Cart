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
        <div class="col-lg-12" >
            <ol class="breadcrumb" >
                <li class="active" >
                    View/Edit Products
                </li>
            </ol>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-12" >
            <div class="panel panel-default" >
                <div class="panel-heading" >
                    <h3 class="panel-title" >
                        <i class="fa fa-money fa-fw" ></i> View/Edit Products
                    </h3>
                </div>
                <div class="panel-body" >
                    <div class="table-responsive" >
                        <table class="table table-bordered table-hover table-striped" >
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Last updated</th>
                                <th>Delete</th>
                                <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                $get_pro = "select * from products where status=1";
                                $run_pro = mysqli_query($con,$get_pro);
                                while($row_pro=mysqli_fetch_array($run_pro))
                                {
                                    $pro_id = $row_pro['product_id'];
                                    $pro_title = $row_pro['title'];
                                    $pro_image = $row_pro['img'];
                                    $pro_price = $row_pro['price'];
                                    $pro_date = $row_pro['date'];
                                    $i++;
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $pro_title; ?></td>
                                        <td><img src="product_images/<?php echo $pro_image; ?>" width="60" height="60"></td>
                                        <td>$ <?php echo $pro_price; ?></td>
                                        <td><?php echo $pro_date; ?></td>
                                        <td>
                                        <a href="index.php?delete_product=<?php echo $pro_id; ?>">
                                        <i class="fa fa-trash-o"> </i> Delete
                                        </a>
                                        </td>
                                        <td>
                                        <a href="index.php?edit_product=<?php echo $pro_id; ?>">
                                        <i class="fa fa-pencil"> </i> Edit
                                        </a>
                                        </td>
                                    </tr>
                                <?php 
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
} 
?>
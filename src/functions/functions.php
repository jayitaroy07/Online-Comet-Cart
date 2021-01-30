<?php
$db = mysqli_connect("localhost","root","root","cometcartdb");
function getRealUserIp()
{
  switch(true)
  {
    case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
    case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
    case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
    default : return $_SERVER['REMOTE_ADDR'];
  }
}

function items()
{
  global $db;
  $ip_add = getRealUserIp();
  $get_items = "select * from cart where ip_add='$ip_add'";
  $run_items = mysqli_query($db,$get_items);
  $count_items = mysqli_num_rows($run_items);
  echo $count_items;
}

function total_price()
{
  global $db;
  $ip_add = getRealUserIp();
  $total = 0;
  $select_cart = "select * from cart where ip_add='$ip_add'";
  $run_cart = mysqli_query($db,$select_cart);
  while($record=mysqli_fetch_array($run_cart))
  {
    $pro_id = $record['p_id'];
    $pro_qty = $record['qty'];
    $sub_total = $record['p_price']*$pro_qty;
    $total += $sub_total;
  }
  echo "$" . $total;
}

function getPro()
{
  global $db;
  $get_products = "select * from products where status=1 order by 1 DESC LIMIT 0,8";
  $run_products = mysqli_query($db,$get_products);
  while($row_products=mysqli_fetch_array($run_products))
  {
    $pro_id = $row_products['product_id'];
    $pro_title = $row_products['title'];
    $pro_price = $row_products['price'];
    $pro_img = $row_products['img'];
    $pro_url = $row_products['url'];
    echo "
    <div class='col-md-4 col-sm-6 single' >
      <div class='product' >
        <a href='details.php?pro_id=$pro_id' >
          <img src='admin/product_images/$pro_img' class='img-responsive' >
        </a>
      <div class='text' >
        <hr>
          <h3><a href='details.php?pro_id=$pro_id' >$pro_title</a></h3>
          <p class='price' > $$pro_price</p>
          <p class='buttons' >
            <a href='details.php?pro_id=$pro_id' class='btn btn-default' >View details</a>
            <button class=\"btn btn-primary\" type=\"submit\" name=\"add_cart\">
              <i class=\"fa fa-shopping-cart\" ></i> Add to Cart
            </button>
          </p>
        </div>
      </div>
    </div>
    ";
  }
}

function getSearchProducts($searchString)
{
  global $db;
  $get_products = "select * from products where title like '%$searchString%'";
  $run_products = mysqli_query($db,$get_products);
  while($row_products=mysqli_fetch_array($run_products))
  {
    $pro_id = $row_products['product_id'];
    $pro_title = $row_products['title'];
    $pro_price = $row_products['price'];
    $pro_img = $row_products['img'];
    $pro_url = $row_products['url'];
    $status = $row_products['status'];
    if($status == 1)
    {
      echo "
      <div class='col-md-4 col-sm-6 center-responsive' >
        <div class='product' >
          <a href='details.php?pro_id=$pro_id' >
            <img src='admin/product_images/$pro_img' class='img-responsive' >
          </a>
          <div class='text' >
            <hr>
              <h3><a href='details.php?pro_id=$pro_id' >$pro_title</a></h3>
              <p class='price' >$$pro_price</p>
              <p class='buttons' >
                <a href='details.php?pro_id=$pro_id' class='btn btn-default' >View details</a>
                <button class=\"btn btn-primary\" type=\"submit\" name=\"add_cart\">
                <i class=\"fa fa-shopping-cart\" ></i> Add to Cart
              </button>
              </p>
          </div>
        </div>
      </div>
      ";
    }
  }
}

function getProducts()
{
  global $db;
  $aWhere = array();
  if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat']))
  {
    foreach($_REQUEST['cat'] as $sKey=>$sVal)
    {
      if((int)$sVal!=0)
      {
        $aWhere[] = 'cat_id='.(int)$sVal;
      }
    }
  }
  $per_page=6;
  if(isset($_GET['page']))
  {
    $page = $_GET['page'];
  }
  else 
  {
    $page=1;
  }
  $start_from = ($page-1) * $per_page ;
  $sLimit = " order by 1 DESC LIMIT $start_from,$per_page";
  $sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'').$sLimit;
  $get_products = "select * from products ".$sWhere;
  $run_products = mysqli_query($db,$get_products);
  while($row_products=mysqli_fetch_array($run_products))
  {
    $pro_id = $row_products['product_id'];
    $pro_title = $row_products['title'];
    $pro_price = $row_products['price'];
    $pro_img = $row_products['img'];
    $pro_url = $row_products['url'];
    $status = $row_products['status'];
    if($status == 1) 
    {
      echo "
      <div class='col-md-4 col-sm-6 center-responsive' >
        <div class='product' >
          <a href='details.php?pro_id=$pro_id' >
            <img src='admin/product_images/$pro_img' class='img-responsive' >
          </a>
          <div class='text' >
            <hr>
              <h3><a href='details.php?pro_id=$pro_id' >$pro_title</a></h3>
              <p class='price' >$$pro_price</p>
              <p class='buttons' >
                <a href='details.php?pro_id=$pro_id' class='btn btn-default' >View details</a>
                <button class=\"btn btn-primary\" type=\"submit\" name=\"add_cart\">
                <i class=\"fa fa-shopping-cart\" ></i> Add to Cart
              </button>
              </p>
          </div>
        </div>
      </div>
      ";
    }
  }
}

function getPaginator()
{
  $per_page = 6;
  global $db;
  $aWhere = array();
  $aPath = '';
  if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){
    foreach($_REQUEST['cat'] as $sKey=>$sVal)
    {
      if((int)$sVal!=0)
      {
        $aWhere[] = 'cat_id='.(int)$sVal;
        $aPath .= 'cat[]='.(int)$sVal.'&';
      }
    }
  }
  $sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'');
  $query = "select * from products ".$sWhere;
  $result = mysqli_query($db,$query);
  $total_records = mysqli_num_rows($result);
  $total_pages = ceil($total_records / $per_page);
  echo "<li><a href='shop.php?page=1";
  if(!empty($aPath))
  { 
    echo "&".$aPath; 
  }
  echo "' >".'First Page'."</a></li>";
  for ($i=1; $i<=$total_pages; $i++)
  {
    echo "<li><a href='shop.php?page=".$i.(!empty($aPath)?'&'.$aPath:'')."' >".$i."</a></li>";
  };
  echo "<li><a href='shop.php?page=$total_pages";
  if(!empty($aPath))
  { 
    echo "&".$aPath; 
  }
  echo "' >".'Last Page'."</a></li>";
}
?>

<?php
$aCat  = array();
if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat']))
{
    foreach($_REQUEST['cat'] as $sKey=>$sVal)
    {
        if((int)$sVal!=0)
        {
            $aCat[(int)$sVal] = (int)$sVal;
        }
    }
}
?>

<div class="panel panel-default sidebar-menu">
    <div class="panel-heading">
        <h3 class="panel-title">
            Search
            <div class="pull-right">
                <a href="#" style="color:black;">
                    <span class="nav-toggle hide-show">
                    Hide
                    </span>
                </a>
            </div>
        </h3>
    </div>
    <div class="panel-collapse collapse-data">
        <div class="panel-body">
            <div class="input-group">
                <input type="text" class="form-control" name="search-box" id="search-box" placeholder="Search..." style="width:85%">
                <button class="input-group-addon" id="search-button" name="search-button"> <i class="fa fa-search"> </i> </button>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-default sidebar-menu">
    <div class="panel-heading">
        <h3 class="panel-title">
            Filter categories
            <div class="pull-right">
                <a href="#" style="color:black;">
                    <span class="nav-toggle hide-show">
                    Hide
                    </span>
                </a>
            </div>
        </h3>
    </div>
    <div class="panel-collapse collapse-data">
        <div class="panel-body">
            <div class="input-group">
                <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-cats" placeholder="Filter Categories">
                <a class="input-group-addon"> <i class="fa fa-search"> </i> </a>
            </div>
        </div>
        <div class="panel-body scroll-menu">
            <ul class="nav nav-pills nav-stacked category-menu" id="dev-cats">
                <?php
                $get_cat = "select * from categories";
                $run_cat = mysqli_query($con,$get_cat);
                while($row_cat = mysqli_fetch_array($run_cat))
                {
                    $cat_id = $row_cat['cat_id'];
                    $cat_title = $row_cat['cat_title'];
                    echo "
                    <li class='checkbox checkbox-primary' style='background:#dddddd;'>
                        <a>
                        <label>
                            <input ";
                            if(isset($aCat[$cat_id])){ echo "checked='checked'"; }
                            echo " type='checkbox' value='$cat_id' name='cat' class='get_cat' id='cat'> 
                            <span>
                                $cat_title
                            </span>
                        </label>
                        </a>
                    </li>
                    ";
                }
                ?>
            </ul>
        </div>
    </div>
</div>

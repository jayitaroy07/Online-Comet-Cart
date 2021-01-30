<div class="panel panel-default sidebar-menu">
    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked">
            <li class="<?php if(isset($_GET['my_orders'])){ echo "active"; } ?>">
                <a href="my_account.php?my_orders"> <i class="fa fa-list"> </i> My Orders </a>
            </li>
            <li>
                <a href="../logout.php"> <i class="fa fa-sign-out"></i> Logout </a>
            </li>
        </ul>
    </div>
</div>
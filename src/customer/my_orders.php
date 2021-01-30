<center>
<h1>My Orders</h1>
</center>
<hr>
<div class="table-responsive" >
    <table class="table table-bordered table-hover" >
        <thead>
            <tr>
                <th>Order No</th>
                <th>Invoice No</th>
                <th>Quantity</th>
                <th>Order Date</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $customer_session = $_SESSION['customer_email'];
                $get_customer = "select * from customers where customer_email='$customer_session'";
                $run_customer = mysqli_query($con,$get_customer);
                $row_customer = mysqli_fetch_array($run_customer);
                $customer_id = $row_customer['customer_id'];
                $get_orders = "select * from customer_orders where cust_id='$customer_id' ORDER BY 'order_date' DESC";
                $run_orders = mysqli_query($con,$get_orders);
                $i = 0;
                while($row_orders = mysqli_fetch_array($run_orders))
                {
                    $order_id = $row_orders['order_id'];
                    $due_amount = $row_orders['due_amount'];
                    $invoice_no = $row_orders['invoice_no'];
                    $qty = $row_orders['qty'];
                    $order_date = substr($row_orders['order_date'],0,11);
                    $i++;
                     ?>
                    <tr>
                    <th><?php echo $order_id; ?></th>
                    <td><?php echo $invoice_no; ?></td>
                    <td><?php echo $qty; ?></td>
                    <td><?php echo $order_date; ?></td>
                    <td>$<?php echo $due_amount; ?></td>
                    </tr>
                    <?php
                 } 
            ?>
        </tbody>
    </table>
</div>



<?php

     // including the footer section 
     include 'include/header.php'; 

?>
        
        <!--================End Main Header Area =================-->
        <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Checkout</h3>
        			<ul>
        				<li><a href="index.php">Home</a></li>
        				<li><a href="checkout.php">Checkout</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->

        
        <!--================Billing Details Area =================-->    
        <section class="billing_details_area p_100">
            <div class="container">
                <div class="row">
                	<div class="col-md-7">
               	    	<div class="main_title">
               	    		<h2>Billing Details</h2>
               	    	</div>
                		<div class="billing_form_area">
                			<form action="" class="billing_form row" method="post" id="contactForm"  enctype="multipart/form-data">
								<div class="form-group col-md-6">
                                <!-- first_name -->
								    <label for="first">First Name *</label>
									<input type="text" class="form-control" id="first" placeholder="First Name" name="first_name" required>
								</div>
								<div class="form-group col-md-6">
                                <!-- last_name -->
								    <label for="last">Last Name *</label>
									<input type="text" class="form-control" id="last" placeholder="Last Name" name="last_name" required>
								</div>
								<div class="form-group col-md-12">
                                <!-- address -->
								    <label for="address">Address *</label>
									<textarea name="address" class="form-control" rows="5" placeholder="Address" required></textarea>
								</div>
								<div class="form-group col-md-6">
                                <!-- email -->
								    <label for="email">Email Address *</label>
									<input type="email" class="form-control" id="email" placeholder="Email Address" name="email" required>
								</div>
								<div class="form-group col-md-6">
                                <!-- phone -->
								    <label for="phone">Phone Number *</label>
									<input type="text" class="form-control" id="phone" placeholder="Phone Number" name="phone" required>
								</div>
								<div class="form-group col-md-12">
                                <!-- Delivery Method -->
								    <label for="delivery_method">Delivery Method *</label>
									<select name="delivery_method" class="product_select" id="delivery_method" required>
                                        <option data-display="Select an option">Select an option</option>
                                        <option value="Self Collect">Self Collect</option> 
                                        <option value="Delivery">Delivery</option> 
                                    </select>
								</div>
				                <div class="form-group col-md-6">
				                <!-- collection_date -->
								    <label for="delivery_date">Delivery Date *</label>
									<input type="date" class="form-control" id="collection_date"  placeholder="Select an option" name="delivery_date" min="2020-08-01" required>
								</div>
				                <div class="form-group col-md-6">
				                <!-- collection_time  -->
								    <label for="collection_time">Delivery Time *</label>
									<input type="time" class="form-control" id="collection_time"  placeholder="Select an option" name="delivery_time" required/>
								</div>
								<div class="form-group col-md-12">
								<!-- order_notes -->
									<label for="phone">Order Notes</label>
									<textarea class="form-control" id="message" rows="1" placeholder="Note about your order. e.g. special note for delivery" name="order_notes" required></textarea>
								</div>
								<div class="form-group col-md-6">
                                <!-- email -->
								    <label for="Card Name">Name on Card</label>
									<input type="text" class="form-control" id="email" placeholder="Name On Card" name="card_owner" required>
								</div>
								<div class="form-group col-md-6">
                                <!-- phone -->
								    <label for="Card Number">Card Number</label>
									<input type="text" class="form-control" id="phone" placeholder="Card Number" name="card_number" required>
								</div>
								<div class="form-group col-md-6">
                                <!-- email -->
								    <label for="Exp Month">Exp Month</label>
								    <select name="expiry_month" class="product_select" id="expiry_month" required>
                                        <option data-display="Select an option">Select an option</option>
                                        <option value="January">January</option> 
                                        <option value="Febuary">Febuary</option>
                                        <option value="March">March</option> 
                                        <option value="April">April</option> 
                                        <option value="May">May</option> 
                                        <option value="June">June</option> 
                                        <option value="July">July</option> 
                                        <option value="August">August</option> 
                                        <option value="September">September</option> 
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
								</div>
								<div class="form-group col-md-3">
                                <!-- phone -->
								    <label for="Exp Year">Exp Year</label>
									<input type="text" class="form-control" id="phone" placeholder="Exp Year" name="expiry_year" required>
								</div>
								<div class="form-group col-md-3">
                                <!-- phone -->
								    <label for="cvc">CVC</label>
									<input type="text" class="form-control" id="phone" placeholder="CVC" name="cvc" required>
								</div>
								<button class="btn btn-default" name="action" type="submit">Place Order</button>
							</form>
                		</div>
                	</div>
                	<div class="col-md-5">
                		<div class="order_box_price">
                			<div class="main_title">
                				<h2>Your Order</h2>
                			</div>
							<div class="payment_list">
								<div class="price_single_cost">
									<h5>Item <span>Total</span></h5>
							 <?php
                  
                                $ip_add = getRealIpUser();
                  
                                $select_cart = "select * from cart where ip_add='$ip_add'";
                  
                                $run_cart = mysqli_query($con,$select_cart);
                  
                                $count = mysqli_num_rows($run_cart);
                  
                                ?>
                                
                                <?php
                            
                                $total = 0;
                            
                                while($row_cart = mysqli_fetch_array($run_cart)){
                                
                                $product_id = $row_cart['p_id'];
                                
                                $product_qty = $row_cart['qty'];
                                
                                $get_products = "select * from products where product_id='$product_id'";
                                
                                $run_products = mysqli_query($con,$get_products);
                                
                                while($row_products = mysqli_fetch_array($run_products)){
                                    
                                    $product_name = $row_products['product_name'];
                                    
                                    $only_price = $row_products['product_price'];
                                    
                                    $sub_total = $row_products['product_price']*$product_qty;
                                    
                                    $total += $sub_total;
                            
                                ?>
									<h6><?php echo $product_name; ?> (<?php echo $product_qty; ?>)<span> RM <?php echo $sub_total; ?>.00 </span></h6>
                            
				                <?php } } ?>
                                   
                                    <h4>Subtotal <span>RM <?php echo $total; ?>.00</span></h4>
				                	<h5>Shipping And Handling<span class="text_f">Free Shipping</span></h5>
									<h3>Total <span>RM <?php echo $total; ?>.00</span></h3>
				                </div>
				                <h4 style="text-align: center; margin-top: 20px;">Stripe Payment</h4>
				                <img src="./img/stripe-payment.png" style="width: 410px; height: 120px;" alt="">
							</div>
						</div>
                	</div>
                </div>
            </div>
        </section>
        <!--================End Billing Details Area =================-->   

        
<?php

     // including the footer section 
     include 'include/footer.php'; 

?>

<?php  

if(isset($_POST['action'])){
    
    $ip_add = getRealIpUser();
    
    $first_name = $_POST['first_name'];
    
    $last_name = $_POST['last_name'];
    
    $address = $_POST['address'];
    
    $email = $_POST['email'];
    
    $phone = $_POST['phone'];
    
    $delivery_method = $_POST['delivery_method'];
    
    $delivery_date = $_POST['delivery_date'];
    
    $delivery_time = $_POST['delivery_time'];
    
    $order_notes = $_POST['order_notes'];
    
    $invoice_no = mt_rand();
    
    $order_status = "In Progress";
    
    // Stripe Payment
        
    $payment_method = "Stripe Payment";
    
    $card_number = $_POST['card_number'];
    
    $expiry_year = $_POST['expiry_year'];
    
    $payment_status = "Order Paid";
                  
   $select_cart = "select * from cart where ip_add='$ip_add'";
                  
   $run_cart = mysqli_query($con,$select_cart);
    
   while($row_cart = mysqli_fetch_array($run_cart)){
                                
   $product_id = $row_cart['p_id'];
                                
   $product_qty = $row_cart['qty'];

   $get_products = "select * from products where product_id='$product_id'";
                                
   $run_products = mysqli_query($con,$get_products);
                                
   while($row_products = mysqli_fetch_array($run_products)){
                                    
    $product_name = $row_products['product_name'];
       
    $order_total = $row_products['product_price']*$product_qty;
       
    // inserting to payments
       
    $insert_payment = "insert into payment
    (invoice_no,
    payment_date,
    payment_method,
    first_name,
    last_name,
    card_no,
    expiry_year,
    amount,
    payment_status)
    values
    ('$invoice_no',
    NOW(),
    '$payment_method',
    '$first_name',
    '$last_name',
    '$card_number',
    '$expiry_year',
    '$order_total',
    '$payment_status')";
    
    $run_payment = mysqli_query($con,$insert_payment);
                                
    $insert_order = "insert into orders 
    (invoice_no, 
    order_date, 
    first_name, 
    last_name, 
    address,  
    email, 
    phone,
    product_id,
    product_name, 
    product_quantity, 
    delivery_method, 
    delivery_date, 
    delivery_time, 
    order_notes,
    order_total,
    order_status) 
    values
    ('$invoice_no',
    NOW(),
    '$first_name',
    '$last_name',
    '$address',
    '$email',
    '$phone',
    '$product_id',
    '$product_name',
    '$product_qty',
    '$delivery_method',
    '$delivery_date',
    '$delivery_time',
    '$order_notes',
    '$order_total',
    '$order_status')";
       
    $insert_order_confirmation = "insert into order_confirmation
    (ip_address,
    invoice_no,
    order_date,
    first_name,
    last_name,
    address,
    email,
    phone,
    product_id,
    product_quantity,
    delivery_method,
    delivery_date,
    delivery_time,
    order_total)
    values
    ('$ip_add',
    '$invoice_no',
    NOW(),
    '$first_name',
    '$last_name',
    '$address',
    '$email',
    '$phone',
    '$product_id',
    '$product_qty',
    '$delivery_method',
    '$delivery_date',
    '$delivery_time',
    '$order_total')";
       
    //$inser into
       
    $run_order_confirmation = mysqli_query($con,$insert_order_confirmation);
    
    $run_order = mysqli_query($con,$insert_order);
       
    if($run_order){
        
        echo "<script>alert('Order has been successfully submited!')</script>";
                  
        echo "<script>window.open('order-confirmation.php','_self')</script>";
        
        $delete_cart =  "delete from cart where ip_add='$ip_add'";
        
        $run_delete = mysqli_query($con,$delete_cart);
        
        // $delete_order_confirmation = "DELETE FROM order_confirmation WHERE time < NOW() - INTERVAL 10 SECOND";
        
        // $run_delete_confirmation = mysqli_query($con,$delete_order_confirmation);
        
        // CUSTOMER EMAIL
                           
        $subject = "Caker Holic - Your Recent Purchase with us!";
                           
        $msg = "Thank you for your recent purchase with us!\n
        Details of Your Recent Purchase\n
        Invoice No: $invoice_no\n  
        Order Date: 28-07-2020\n
        Customer Name: $first_name $last_name\n
        Address: $address\n
        Phone: $phone\n
        Product Name: $product_name\n
        Quantity: $product_qty\n
        Delivery Method: $delivery_method\n
        Delivery Date: $delivery_date\n
        Delivery Time: $delivery_time\n
        Order Notes: $order_notes\n
        Order Total: RM $order_total.00\n
        Payment Method: $payment_method\n
        Thank your for choosing us as your number one stop for cakelious stuffs!!\n
        CAKER HOLIC - BAKE THE WORLD A BETTER PLACE
        ";
                           
        $from = "cakerholic@gmail.com";
                           
        mail($email,$subject,$msg,$from);
        
        // CLIENT EMAIL
        
        $subject = "CAKER HOLIC - NEW ORDER PENDING!";
                           
        $msg = "Dear Caker Holic! You have a new order pending!\n
        Details of the order\n
        Invoice No: $invoice_no\n
        Order Date: 28-07-2020\n
        Customer Name: $first_name $last_name\n
        Address: $address\n
        Phone: $phone\n
        Product Name: $product_name\n
        Quantity: $product_qty\n
        Delivery Method: $delivery_method\n
        Delivery Date: $delivery_date\n
        Delivery Time: $delivery_time\n
        Order Notes: $order_notes\n
        Order Total: RM $order_total.00\n
        Payment Method: $payment_method\n
        ";
                           
        $from = "cakerholic@gmail.com";
        
        $email_1 = "cakerholic@gmail.com";
                           
        mail($email_1,$subject,$msg,$from);
        
    }else{
                  
        echo "<script>alert('Error Try Again')</script>";
    
    }

}
       
}
    
}


?>






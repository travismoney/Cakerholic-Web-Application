<?php

     // including the footer section 
     include 'include/header.php'; 

?>
        
        <!--================End Main Header Area =================-->
        <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Cart</h3>
        			<ul>
        				<li><a href="index.php">Home</a></li>
        				<li><a href="cart.php">Cart</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
        
        <!--================Cart Table Area =================-->
        <section class="cart_table_area p_100">
        	<div class="container">
        	
        	<form action="cart.php" method="post" enctype="multipart/form-data">
        	    
                 <?php
                  
                  $ip_add = getRealIpUser();
                  
                  $select_cart = "select * from cart where ip_add='$ip_add'";
                  
                  $run_cart = mysqli_query($con,$select_cart);
                  
                  $count = mysqli_num_rows($run_cart);
                  
                  ?>
                  
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col" style="text-align: center;">Product Image</th>
								<th scope="col" colspan="3" style="text-align: center;">Product</th>
								<th scope="col" style="text-align: center;">Price</th>
								<th scope="col" colspan="1" style="text-align: center;">Quantity</th>
								<th scope="col" style="text-align: center;">Total</th>
								<th scope="col" style="padding: 0px 20px; text-align: center;" >Remove</th>
							</tr>
						</thead>
						<tbody>
						
						  <?php
                            
                            $total = 0;
                            
                            while($row_cart = mysqli_fetch_array($run_cart)){
                                
                                $product_id = $row_cart['p_id'];
                                
                                $product_qty = $row_cart['qty'];
                                
                                $get_products = "select * from products where product_id='$product_id'";
                                
                                $run_products = mysqli_query($con,$get_products);
                                
                                while($row_products = mysqli_fetch_array($run_products)){
                                    
                                    $product_name = $row_products['product_name'];
                                    
                                    $product_img1 = $row_products['product_img1'];
                                    
                                    $only_price = $row_products['product_price'];
                                    
                                    $sub_total = $row_products['product_price']*$product_qty;
                                    
                                    $total += $sub_total;
                            
                          ?>

							<tr>
								<td>
									<img src="admin/product_images/<?php echo $product_img1; ?>" style="width: 110px; height: 110px;" alt="">
								</td>
								<td colspan="3"><a style="color: #797979;" href="product-details.php?product_id=<? echo $product_id; ?>"><?php echo $product_name; ?></a></td>
								<td>RM <?php echo $only_price; ?>.00</td>
								<td style="text-align: center;"><?php echo $product_qty; ?></td>
								<td style="text-align: center;">RM <?php echo $sub_total; ?>.00 </td>
								<td> <input type="checkbox" name="remove[]" value="<?php echo $product_id; ?>"></td>
							</tr>
							<tr>

							</tr>
							
				        <?php } } ?>
				        
				        
				        
						</tbody>
					</table>
				</div>
                                     
                       <button type="submit" name="update" value="Update Cart" class="btn btn-default" class="float-right">  <!--- btn btn-default start --->
                          
                          <i class="fa fa-refresh"></i> Update Cart
                           
                       </button> <!--- btn btn-default End --->
               
                </form>
                <?php 
               
                function update_cart(){
                    
                    global $con;
                    
                    if(isset($_POST['update'])){
                        
                        foreach($_POST['remove'] as $remove_id){
                            
                            $delete_product = "delete from cart where p_id='$remove_id'";
                            
                            $run_delete = mysqli_query($con,$delete_product);
                            
                            if($run_delete){
                                
                                echo "<script>alert('Product Removed from Cart!')</script>";
                                echo "<script>window.open('cart.php','_self')</script>";
                                
                            }
                            
                        }
                        
                    }
                    
                }
               
               echo @$up_cart = update_cart();
               
               ?>
       			<div class="row cart_total_inner">
        			<div class="col-md-7"></div>
        			<div class="col-md-5">
        				<div class="cart_total_text">
        					<div class="cart_head">
        						Cart Total - <?php echo $count; ?> items
        					</div>
        					<div class="sub_total">
        						<h5>Order Sub Total <span>RM <?php echo $total; ?>.00 </span></h5>
        					</div>
        					<div class="total">
        						<h4>Order Total <span>RM <?php echo $total; ?>.00 </span></h4>
        					</div>
        					<div class="cart_footer">
        						<a class="pest_btn" href="checkout_online.php">Checkout - Online Pay</a>
        				        <a class="pest_btn" href="checkout_cash.php">Checkout - Cash (COD)</a>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Cart Table Area =================-->
        
        
<?php

     // including the footer section 
     include 'include/footer.php'; 

?>
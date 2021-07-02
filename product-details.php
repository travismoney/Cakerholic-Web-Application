<?php

     // including the footer section 
     include 'include/header.php'; 

?>              
        <!--================End Main Header Area =================-->
        <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Product Details</h3>
        			<ul>
        				<li><a href="index.php">Home</a></li>
        				<li><a href="product-details.php">Product Details</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->

        <!--================Product Details Area =================-->
        <section class="product_details_area p_100">
        	<div class="container">
        		<div class="row product_d_price">
        			<div class="col-lg-6">
        				<div class="product_img"><img class="img-fluid" src="admin/product_images/<?php echo $product_img2 ?>" alt=""></div>
        			</div>
        			<div class="col-lg-6">
        				<div class="product_details_text">
        				
        					<h4><?php echo $product_name; ?></h4>
        					<p><?php echo $product_desc_1; ?> </p>
        					<p><?php echo $product_desc_2; ?>
        					<br>Free Delivery in Kuching Area
        					</p>
        					<h5>Price : <span>RM <?php echo $product_price; ?>.00</span></h5>
        					
        					<?php add_cart(); ?>
        					
        					<form action="product-details.php?add_cart=<?php echo $product_id; ?>" class="form-horizontal" method="post">
                           
        				    <div class="quantity_box">
        				    
        						<label for="quantity">Quantity :</label>
        						
        						   <select name="product_qty" id="" > <!--- select start --->
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                          <option>4</option>
                                          <option>5</option>
                                    </select> <!--- select end --->
        						
        					</div>
        					
        					<button class="pink_more">
                               
                               <i class="fa fa-cart-plus" style="margin-right: 7px; font-size: 1.5rem;"></i> Add to Cart
                               
                            </button>
        					    
        					</form>

        				</div>
        			</div>
        		</div>
        		<div class="product_tab_area">
					<nav>
						<div class="nav nav-tabs" id="nav-tab" role="tablist">
							<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Product Description</a>
							<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Product Specification</a>
						</div>
					</nav>
					<div class="tab-content" id="nav-tabContent">
						<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <!-- Cake Description Section-->
							<p><?php echo $product_desc_1; ?></p>
							<p>Best choice for Birthday Celebrations, House Party and many other occasions! </p>
						</div>
						<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <!-- Cake Ingredients Section -->
						    <h5 style="font-weight: bold;">Ingredients</h5>
							<p><?php echo $product_ingred ?></p>
                            <!-- Cake Specfications Section -->
						    <h5 style="font-weight: bold;">Cake Specifications</h5>
							<p>Measurement: <?php echo $product_measurement; ?>
                            <br>Serving Size: <?php echo $product_serving; ?>
                            <br>Product Weight: <?php echo $product_weight; ?>
                            </p>
                            <!-- Cake Care Instructions Section -->
						    <h5 style="font-weight: bold;">Cake Care Instructions</h5>
							<p><?php echo $product_instruct ?></p>
						</div>

					</div>
        		</div>
        	</div>
        </section>
        <!--================End Product Details Area =================-->
        
        <!--================Similar Product Area =================-->
        <section class="similar_product_area p_100">
        	<div class="container">
        		<div class="main_title">
        			<h2>Other Products</h2>
        		</div>
        		<div class="row similar_product_inner">

                    <?php 
                
                    $get_products = "select * from products order by rand() LIMIT 0,4";
                    
                    $run_products = mysqli_query($con,$get_products);
                
                    while ($row_products=mysqli_fetch_array($run_products)){
                        
                        $product_id = $row_products['product_id'];
                        
                        $product_name = $row_products['product_name'];
                        
                        $product_img1 = $row_products['product_img1'];
                        
                        $product_price = $row_products['product_price'];
                        
                        echo "
                        
                        <div class='col-lg-3 col-md-4 col-sm-4'>
                        
        				<div class='cake_feature_item'>
                        
							<div class='cake_img'>
                            
								<img src='admin/product_images/$product_img1' style='height: 270px; width: 270px;' alt=''>
                                
							</div>
                            
							<div class='cake_text'>
                            
								<h4>RM$product_price.00</h4>
                                
								<h3>$product_name</h3>
                                
								<a class='pest_btn' href='product-details.php?product_id=$product_id'>View Item</a>
                                
							</div>
                            
						</div>
                        
        			</div>
                    
                        ";
                        
                    }
                
                ?>

        		</div>
        	</div>
        </section>
        <!--================End Similar Product Area =================-->
        
<?php

     // including the footer section 
     include 'include/footer.php'; 

?>
        
        

        
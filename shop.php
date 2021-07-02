<?php

     // including the footer section 
     include 'include/header.php'; 

?>
        <!--================End Main Header Area =================-->
        <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Shop</h3>
        			<ul>
        				<li><a href="index.php">Home</a></li>
        				<li><a href="shop.php">Shop</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
        
        <!--================Product Area =================-->
        <section class="product_area p_100">
        	<div class="container">
        		<div class="row product_inner_row">
        			<div class="col-lg-9">
        				<div class="row product_item_inner">
        				<!-- item 1 -->
                           
                            <?php getPro(); ?>

        				</div>
        			</div>
                  
                   <?php include("include/sidebar.php"); ?>
                   
        		</div>
        	</div>
        </section>
        <!--================End Product Area =================-->
        
<?php

     // including the footer section 
     include 'include/footer.php'; 

?>




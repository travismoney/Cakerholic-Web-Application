<?php

     include 'include/db.php'; 
     include 'include/functions.php';

?>


<?php

    if(isset($_GET['product_id'])){
        
        $product_id = $_GET['product_id'];
        
        $get_product = "select * from products where product_id='$product_id'";
        
        $run_product = mysqli_query($con,$get_product);
        
        $row_product = mysqli_fetch_array($run_product);
                
        $product_name = $row_product['product_name']; // product name
         
        $product_price = $row_product['product_price']; // product price
        
        $product_desc_1 = $row_product['product_desc_1']; // product desc 1
        
        $product_desc_2 = $row_product['product_desc_2']; // product desc 2 
        
        $product_ingred = $row_product['product_ingred']; // product ingred
        
        $product_measurement = $row_product['product_measurement']; // product measurement 
        
        $product_serving = $row_product['product_serving']; // product serving 
        
        $product_weight = $row_product['product_weight']; // product weight
        
        $product_instruct = $row_product['product_instruct']; // product instruct 
        
        $product_img2 = $row_product['product_img2']; // product img 2
        
        
    }

?>


<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="img/web-icon.png" type="image/x-icon" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Caker Holic - Bake The World A Butter Place</title>

        <!-- Icon css link -->
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="vendors/linearicons/style.css" rel="stylesheet">
        <link href="vendors/flat-icon/flaticon.css" rel="stylesheet">
        <link href="vendors/stroke-icon/style.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Rev slider css -->
        <link href="vendors/revolution/css/settings.css" rel="stylesheet">
        <link href="vendors/revolution/css/layers.css" rel="stylesheet">
        <link href="vendors/revolution/css/navigation.css" rel="stylesheet">
        <link href="vendors/animate-css/animate.css" rel="stylesheet">
        
        <!-- Extra plugin css -->
        <link href="vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
        <link href="vendors/magnifc-popup/magnific-popup.css" rel="stylesheet">
        <link href="vendors/jquery-ui/jquery-ui.min.css" rel="stylesheet">
        <link href="vendors/nice-select/css/nice-select.css" rel="stylesheet">
        <link href="css/lightbox.min.css" type="text/css" rel="stylesheet">
        
        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        
        <!--================Main Header Area =================-->
		<header class="main_header_area">
			<div class="top_header_area row m0">
				<div class="container">
					<div class="float-left">
						<a href="tell:+60123870153"><i class="fa fa-phone" aria-hidden="true"></i> + (60) 12 387 0153</a>
						<a href="mainto:cakerholic.my@gmail.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> cakerholic.my@gmail.com</a>
					</div>
					<div class="float-right">
						<ul class="h_social list_style">
							<li><a href="https://www.facebook.com/felicia.wong.925"><i class="fa fa-facebook"></i></a></li>
							<li><a href="https://www.instagram.com/caker_holic/"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="https://wa.me/15551234567"><i class="fa fa-whatsapp"></i></a></li>
						</ul>
						<ul class="h_search list_style">
							<li class="shop_cart"><a href="cart.php"><i class="lnr lnr-cart"> <?php items(); ?> Items | Total Price: <?php total_price(); ?>.00</i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="main_menu_two">
				<div class="container">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
						<a class="navbar-brand" href="index.php"><img style="width: 240px;" src="img/caker-holic-logo.png" alt=""></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="my_toggle_menu">
                            	<span></span>
                            	<span></span>
                            	<span></span>
                            </span>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav justify-content-end">
								<li><a href="index.php">Home</a></li>
								<li class="dropdown submenu">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Shop</a>
									<ul class="dropdown-menu">
										<li><a href="shop.php">Shop Now</a></li>
										<li><a href="cart.php">Cart</a></li>
									</ul>
								</li>
								<li class="dropdown submenu">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>
									<ul class="dropdown-menu">
										<li><a href="about-us.php">About Caker Holic</a></li>
										<li><a href="testimonials.php">Testimonials</a></li>
									</ul>
								</li>

								<li><a href="contact.php">Contact Us</a></li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</header>
        <!--================End Main Header Area =================-->
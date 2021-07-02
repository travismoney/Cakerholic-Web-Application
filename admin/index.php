<?php

include 'include/header.php'; 

if(!isset($_SESSION['admin_email'])){
    
    echo "<script>window.open('admin-login.php','_self')</script>";
    
}else{
        
    $admin_session = $_SESSION['admin_email']; 
    
    $get_admin = "select * from admin where admin_email='$admin_session'";
    
    $run_admin = mysqli_query($con,$get_admin);
    
    $row_admin = mysqli_fetch_array($run_admin);
        
    $admin_name = $row_admin['admin_name'];
    
    // getting total products number 
    
    $get_products = "select * from products";
    
    $run_products = mysqli_query($con,$get_products);
    
    $count_products = mysqli_num_rows($run_products);

    // getting total product category 
    
    $get_product_categories = "select * from product_category";
    
    $run_product_categories = mysqli_query($con,$get_product_categories);
    
    $count_product_categories = mysqli_num_rows($run_product_categories);
    
    // getting total orders
    
    $get_total_orders = "select * from orders";
    
    $run_total_orders = mysqli_query($con,$get_total_orders);
    
    $count_total_orders = mysqli_num_rows($run_total_orders);
    
    // getting total sales amount
    
    $get_sales_total = "select * from orders";
        
    $run_sales_total = mysqli_query($con,$get_sales_total);
    
    $total = 0;
    
    $i = 0;

    $get_orders = "select * from orders order by 1 DESC";
                            
    $run_orders = mysqli_query($con,$get_orders);
      
    while($row_orders=mysqli_fetch_array($run_orders)){
                                
        $i++;
                            
    }
                                
    while ($num = mysqli_fetch_assoc($run_sales_total)){
        
        $total += $num['order_total'];
        
    }
    
    // Data Points for Total Sales
    $dataPoints = array( 
	array("y" => 25, "label" => "Week 1" ),
	array("y" => 36, "label" => "Week 2" ),
	array("y" => 30, "label" => "Week 3" ),
    array("y" => 50, "label" => "Week 4" )
    );
    
    $dataOrderPoints = array( 
	array("y" => 4, "label" => "21st Dec"),
	array("y" => 4, "label" => "22nd Dec"),
	array("y" => 1, "label" => "23rd Dec"),
	array("y" => 1, "label" => "24th Dec"),
	array("y" => 7, "label" => "25th Dec"),
	array("y" => 8, "label" => "26th Dec"),
	array("y" => 6, "label" => "27th Dec")
    );
    
                
?>
       
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "December 2020 Visitors"
	},
	axisY: {
		title: ""
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.##",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
           
var chart_2 = new CanvasJS.Chart("chartOrderContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "December Week 4 Visitors"
	},
	axisY: {
		title: ""
	},
	data: [{
		type: "splineArea",
		color: "#6599FF",
		yValueFormatString: "#,##0 Visitors",
		dataPoints: <?php echo json_encode($dataOrderPoints); ?>
	}]
});
 
chart_2.render();
 
}
           
</script>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="../admin/index.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard</a
                            >
<!--  Product Category Section -->
                            <div class="sb-sidenav-menu-heading">Products Section</div>
                            
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                               
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                    Products Categories
                                    
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                                
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="insert_product_category.php">Insert Category</a>
                                    <a class="nav-link" href="view_product_category.php">View Categories</a>
                                </nav>
                            </div>
<!--                        -->
                           
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                              
                               <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Products
                                
                               <div class="sb-sidenav-collapse-arrow">
                                   <i class="fas fa-angle-down"></i>
                               </div>
                               
                            </a>
                            
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="insert_product.php">Insert Product</a>
                                    <a class="nav-link" href="view_products.php">View Products</a>
                                </nav>
                            </div>
<!--  Sales Summary Section -->
                            <div class="sb-sidenav-menu-heading">Sales Summary</div>
                            <a class="nav-link" href="sales.php">
                               <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Sales Chart
                            </a>
                            
                            <a class="nav-link" href="orders.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Order History
                            </a>
                                                           
                            <a class="nav-link" href="order_status.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-pencil-alt"></i></div>
                                Order Status
                            </a>
                                                        <a class="nav-link" href="payment.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-money-check-alt"></i></div>
                                Payment History
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $admin_name; ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body" style="font-size: 25px;">
                                    <i class="fas fa-tags"></i> Categories <span class="float-right"><?php echo $count_product_categories; ?></span></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="view_product_category.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body" style="font-size: 25px;"><i class="fas fa-shopping-basket"></i> Products <span class="float-right"><?php echo $count_products; ?></span></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="view_products.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body" style="font-size: 25px;"><i class="fas fa-shopping-cart"></i> Total Orders<span class="float-right"><?php echo $count_total_orders; ?></span></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="orders.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body" style="font-size: 25px;"><i class="fas fa-dollar-sign"></i> Total Sales<span class="float-right">RM <?php echo $total; ?>.00</span></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="sales.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-6">
                                    <div class="card-header"><i class="fas fa-chart-area mr-1"></i> Visitors For December 2020</div>
                                    <div class="card-body"><div id="chartContainer" style="height: 370px; width: 100%;"></div></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-6">
                                    <div class="card-header"><i class="fas fa-chart-area mr-1"></i> December Week 4 Visitors</div>
                                    <div class="card-body"><div id="chartOrderContainer" style="height: 370px; width: 100%;"></div></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Recent Orders</div>
                            <div class="card-body">
                <div class="table-responsive"> <!--- table-responsive starts --->
                   
                    <table class="table table-striped table-bordered table-hover"> <!--- table-bordered table-hover starts --->
                       
                       <thread> <!--- thread starts --->
                          
                           <tr> <!--- tr starts --->
                               <th> Order ID </th>
                               <th> Invoice No </th>
                               <th> Order Date</th>
                               <th> Name</th>
                               <th> Phone </th>
                               <th> Product ID and Name </th>
                               <th> Quantity </th>
                               <th> Delivery Method </th>
                               <th> Delivery Date </th>
                               <th> Order Total </th>
                               <th> Order Status</th>           
                           </tr> <!--- tr ends --->
                           
                       </thread> <!--- thread ends --->
                       
                       <tbody> <!--- tbody starts --->
                       
                       <?php
                            
                            $i=0;
      
                            $get_orders = "select * from orders order by 1 DESC LIMIT 0,10";
                            
                            $run_orders = mysqli_query($con,$get_orders);
      
                            while($row_orders=mysqli_fetch_array($run_orders)){
                                
                                $order_id = $row_orders['order_id'];
                             
                                $invoice_no = $row_orders['invoice_no'];
                                
                                $order_date = $row_orders['order_date'];
                                
                                $first_name = $row_orders['first_name'];
                                
                                $last_name = $row_orders['last_name'];
                                
                                $address = $row_orders['address'];
                                
                                $email = $row_orders['email'];
                                
                                $phone = $row_orders['phone'];
                                
                                $product_id = $row_orders['product_id'];
                                
                                $product_name = $row_orders['product_name'];
                                
                                $product_quantity = $row_orders['product_quantity'];
                                
                                $delivery_method = $row_orders['delivery_method'];
                                
                                $delivery_date = $row_orders['delivery_date'];
                                
                                $delivery_time = $row_orders['delivery_time'];
                                
                                $order_notes = $row_orders['order_notes'];
                                
                                $order_total = $row_orders['order_total'];
                                
                                $order_status = $row_orders['order_status'];
                                
                                $i++;
                                
                       ?>
                       
                       <tr> <!--- tr starts --->
 
                           <!--- Order ID --->
                           <td> <?php echo $order_id; ?> </td>
                           <!--- Invoice No --->
                           <td> <?php echo $invoice_no; ?> </td>
                           <!--- Order Date --->
                           <td> <?php echo $order_date; ?> </td>
                           <!--- First Name --->
                           <td> <?php echo $first_name; ?> <?php echo $last_name; ?> </td>
                           
                           <!--- Phone --->                          
                           <td> <?php echo $phone; ?> </td>
                           <!--- Product --->
                           <td> <?php echo $product_id; ?> - <?php echo $product_name; ?> </td>
                           <!--- Quantity --->                           
                           <td> <?php echo $product_quantity; ?> </td>
                           <!--- Delivery Method --->
                           <td> <?php echo $delivery_method; ?> </td>
                           <!--- Delivery Date --->
                           <td> <?php echo $delivery_date; ?> </td>
                           
                           <td>RM<?php echo $order_total; ?>.00</td>
                           <td><?php echo $order_status; ?></td>

                       </tr> <!--- tr ends --->
                       
                       <?php } ?>

                       </tbody> <!--- tbody ends --->
                        
                    </table> <!--- table-bordered table-hover starts --->
                    
                </div> <!--- table-responsive ends --->
                            </div>
                        </div>
                    </div>
                </main>

<?php

     include 'include/footer.php'; 

?>

<?php } ?>


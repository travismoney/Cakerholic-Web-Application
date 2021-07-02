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
    
    $i = 0;

    $get_orders = "select * from orders order by 1 DESC";
                            
    $run_orders = mysqli_query($con,$get_orders);
      
    while($row_orders=mysqli_fetch_array($run_orders)){
                                
        $i++;
                            
    }
    
    $total = 0;
    
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
                    <div class="container-fluid">
                    <div class="container-fluid">
                        <h1 class="mt-4">Sales Charts</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Sales Charts</li>
                        </ol>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-lg-12">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-bar mr-1"></i> Visitors For December 2020</div>
                                    <div class="card-body"><div id="chartContainer" style="height: 370px; width: 100%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-lg-12">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-bar mr-1"></i> December Week 4 Visitors</div>
                                    <div class="card-body"><div id="chartOrderContainer" style="height: 370px; width: 100%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>

</div>


<?php

     include 'include/footer.php'; 

?>

<?php } ?>

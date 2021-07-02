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
?>
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
                            <li class="breadcrumb-item active">View Order Status</li>
                        </ol>
<div class="row"> <!--- row 2 starts --->
   
    <div class="col-lg-12"> <!--- col-lg-12 starts --->
       
        <div class="panel panel-default"> <!--- panel panel-default starts --->
           
            <div class="panel-heading"> <!--- panel-heading starts --->
              
              <h3 class="panel-title"> <!--- panel-title starts --->
                 
                 <i class="fas fa-money-bill-wave"></i> View Order Status
                  
              </h3> <!--- panel-title ends --->
            
            </div> <!--- panel-heading ends --->
            
            <div class="panel-body"> <!--- panel-body starts --->
               
                <div class="table-responsive"> <!--- table-responsive starts --->
                   
                    <table class="table table-striped table-bordered table-hover"> <!--- table-bordered table-hover starts --->
                       
                       <thread> <!--- thread starts --->
                          
                           <tr> <!--- tr starts --->
                                                             <th> Order ID </th>
                               <th> Invoice No </th>

                               <th> Order Date </th>
                               <th> Name </th>
                               <th> Product ID and Name </th>
                               <th> Quantity </th>
                               <th> Status </th>
                               <th> Update Order Status</th>   
                               <th> Print Invoice</th>       
                           </tr> <!--- tr ends --->
                           
                       </thread> <!--- thread ends --->
                       
                       <tbody> <!--- tbody starts --->
                       
                       
                       <?php
                            
                            $i=0;
      
                            $get_order = "select * from orders order by 1 DESC";
                            
                            $run_order = mysqli_query($con,$get_order);
      
                            while($row_order=mysqli_fetch_array($run_order)){
                                
                                $order_id = $row_order['order_id'];
                                
                                $invoice_no = $row_order['invoice_no'];
                                
                                $order_date = $row_order['order_date'];
                                
                                $first_name = $row_order['first_name'];
                                
                                $last_name = $row_order['last_name'];
                                
                                $product_id = $row_order['product_id'];
                                
                                $product_name = $row_order['product_name'];
                                
                                $product_quantity = $row_order['product_quantity'];
                                
                                $order_status = $row_order['order_status'];
                                
                                $i++;
                                
                       ?>
                       
                       <tr> <!--- tr starts --->
 
                           <!--- No --->

                           
                           <td> <?php echo $order_id; ?></td>
                           <!--- Invoice No --->
                           <td><?php echo $invoice_no; ?> </td>
                           <!--- Order Date --->
                           <td> <?php echo $order_date; ?> </td>
                           <!--- First Name --->
                           <td> <?php echo $first_name; ?> <?php echo $last_name; ?> </td>
                           
                           <td> <?php echo $product_id ?> - <?php echo $product_name; ?> </td>
                           
                          <td> <?php echo $product_quantity; ?> </td>
                          
                          <td> <?php echo $order_status; ?> </td>
                          
                           <td>
                              
                               <a class="btn btn-success" href="edit_order_status.php?order_id=<?php echo $order_id; ?>">
                                  
                                   <i class="fas fa-pencil-alt"></i> Update Order
                                   
                               </a>
    
                           </td>
                           
                           <td>
                               <a class="btn btn-primary" href="print_invoice.php?order_id=<?php echo $order_id; ?>" target="_blank">
                                   <i class="fas fa-print"></i> Print Invoice
                               </a>
                               
                           </td>
                       </tr> <!--- tr ends --->
                       
                       <?php } ?>

                       </tbody> <!--- tbody ends --->
                        
                    </table> <!--- table-bordered table-hover starts --->
                    
                </div> <!--- table-responsive ends --->
                
            </div> <!--- panel-body ends --->
            
        </div> <!--- panel panel-default ends --->
        
    </div> <!--- col-lg-12 ends --->
    
</div> <!--- row 2 ends --->

</div>

</main>

<?php

     include 'include/footer.php'; 

?>

<?php } ?>

<?php

if(isset($_GET['order_id'])){
    
    $order_id = $_GET['order_id'];
}
                
?>

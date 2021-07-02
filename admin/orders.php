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
                            <li class="breadcrumb-item active">View Order History</li>
                        </ol>
<div class="row"> <!--- row 2 starts --->
   
    <div class="col-lg-12"> <!--- col-lg-12 starts --->
       
        <div class="panel panel-default"> <!--- panel panel-default starts --->
           
            <div class="panel-heading"> <!--- panel-heading starts --->
              
              <h3 class="panel-title"> <!--- panel-title starts --->
                 
                 <i class="fas fa-money-bill-wave"></i> View Orders
                  
              </h3> <!--- panel-title ends --->
            
            </div> <!--- panel-heading ends --->
            
            <div class="panel-body"> <!--- panel-body starts --->
               
                <div class="table-responsive"> <!--- table-responsive starts --->
                   
                    <table class="table table-striped table-bordered table-hover"> <!--- table-bordered table-hover starts --->
                       
                       <thread> <!--- thread starts --->
                          
                           <tr> <!--- tr starts --->
                               <th> Order ID </th>
                               <th> Invoice No </th>
                               <th> Order Date</th>
                               <th> Name</th>
                               <th> Address </th>
                               <th> Email</th>
                               <th> Phone </th>
                               <th> Product </th>
                               <th> Quantity </th>
                               <th> Delivery Method </th>
                               <th> Delivery Date </th>
                               <th> Delivery Time </th> 
                               <th> Order Notes </th>
                               <th> Order Total </th>           
                           </tr> <!--- tr ends --->
                           
                       </thread> <!--- thread ends --->
                       
                       <tbody> <!--- tbody starts --->
                       
                       <?php
                            
                            $i=0;
    
                            $total_amount = 0;
      
                            $get_orders = "select * from orders order by 1 DESC";
                            
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
                                
                                $total_amount += $order_total;
                                
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
                           <!--- Address--->
                           <td> <?php echo $address; ?> </td>
                           <!--- Email --->
                           <td> <?php echo $email; ?> </td>
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
                           <!--- Delivery Time --->
                           <td> <?php echo $delivery_time; ?></td>
                           <!--- Order Notes --->
                           <td><?php echo $order_notes; ?></td>
                           
                           <td>RM<?php echo $order_total; ?>.00</td>
                           

                       </tr> <!--- tr ends --->
                       
                       <?php } ?>

                       </tbody> <!--- tbody ends --->
                       
                        <tfoot>
                            <tr>
                              <td colspan="10" style="text-align: center;"><h5>TOTAL ORDERS - <?php echo $i; ?></h5></td>
                              <td colspan="4" style="text-align: center;"> <h5>RM <?php echo $total_amount; ?>.00</h5></td>
                            </tr>
                      </tfoot>
                        
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

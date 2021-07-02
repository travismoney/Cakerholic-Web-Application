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
                               <th> Transaction No </th>
                               <th> Invoice No </th>
                               <th> Payment Date </th>
                               <th> Payment Method </th>
                               <th> Name</th>
                               <th> Card No </th>
                               <th> Expiry Year</th>
                               <th> Amount </th>
                               <th> Payment Status </th>
                               <th> Update Payment </th>
                           </tr> <!--- tr ends --->
                           
                       </thread> <!--- thread ends --->
                       
                       <tbody> <!--- tbody starts --->
                       
                       <?php
                            
                            $i=0;
                            
                            $total_order = 0;
      
                            $get_payment = "select * from payment order by 1 DESC";
                            
                            $run_payment = mysqli_query($con,$get_payment);
      
                            while($row_payment=mysqli_fetch_array($run_payment)){
                                
                                $payment_id = $row_payment['payment_id'];
                                
                                $invoice_no = $row_payment['invoice_no'];
                                
                                $payment_date = $row_payment['payment_date'];
                                
                                $payment_method = $row_payment['payment_method'];
                                
                                $first_name = $row_payment['first_name'];
                                
                                $last_name = $row_payment['last_name'];
                                
                                $card_no = $row_payment['card_no'];
                                
                                $expiry = $row_payment['expiry_year'];
                                
                                $amount = $row_payment['amount'];
                                
                                $payment_status = $row_payment['payment_status'];
                                
                                $total_order += $amount;
                                
                                $i++;
                                
                       ?>
                       
                       <tr> <!--- tr starts --->
 
                           <!--- Order ID --->
                           <td> #<?php echo $payment_id; ?>CH </td>
                           <!--- Invoice No --->
                           <td> <?php echo $invoice_no; ?> </td>
                           <!--- Order Date --->
                           <td> <?php echo $payment_date; ?> </td>
                           
                           <td> <?php echo $payment_method; ?></td>
                           <!--- First Name --->
                           <td> <?php echo $first_name; ?> <?php echo $last_name; ?> </td>
                           <!--- Address--->
                           <td> <?php echo $card_no; ?> </td>
                           <!--- Email --->
                           <td> <?php echo $expiry; ?> </td>
                           <!--- Phone --->                          
                           <td> RM <?php echo $amount; ?>.00 </td>
                           <!--- Product --->
                           <td> <?php echo $payment_status; ?> </td>
                           <td>
                           
                            <a class="btn btn-success" href="edit_payment_status.php?payment_id=<?php echo $payment_id; ?>">
                                  
                                   <i class="fas fa-pencil-alt"></i> Update Payment
                                   
                            </a> 
                           
                           </td>
                           
                       </tr> <!--- tr ends --->
                       
                       <?php } ?>

                       </tbody> <!--- tbody ends --->
                         <tfoot>
                            <tr>
                              <td colspan="7" style="text-align: center;"><h5>TOTAL SALES</h5></td>
                              <td> <h5>RM <?php echo $total_order; ?>.00</h5></td>
                              <td colspan="2"></td>
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

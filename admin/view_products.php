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
                            <li class="breadcrumb-item active">View Products</li>
                        </ol>
<div class="row"> <!--- row 2 starts --->
   
    <div class="col-lg-12"> <!--- col-lg-12 starts --->
       
        <div class="panel panel-default"> <!--- panel panel-default starts --->
           
            <div class="panel-heading"> <!--- panel-heading starts --->
              
              <h3 class="panel-title"> <!--- panel-title starts --->
                 
                 <i class="fa fa-tag"></i> View Products
                  
              </h3> <!--- panel-title ends --->
            
            </div> <!--- panel-heading ends --->
            
            <div class="panel-body"> <!--- panel-body starts --->
               
                <div class="table-responsive"> <!--- table-responsive starts --->
                   
                    <table class="table table-striped table-bordered table-hover"> <!--- table-bordered table-hover starts --->
                       
                       <thread> <!--- thread starts --->
                          
                           <tr> <!--- tr starts --->
                               <th> No </th>
                               <th> ID </th>
                               <th> Name </th>
                               <th> Image </th>
                               <th> Price </th>
                               <th> Short Description </th>
                               <th> Delivery Info </th>
                               <th> Ingredients </th>
                               <th> Measurement </th>
                               <th> Serving Size </th>
                               <th> Weight </th>
                               <th> Instructions </th>
                               <th> Date </th>
                               <th> Edit </th>
                               <th> Delete </th>                           
                           </tr> <!--- tr ends --->
                           
                       </thread> <!--- thread ends --->
                       
                       <tbody> <!--- tbody starts --->
                       
                       <?php
                            
                            $i=0;
      
                            $get_products = "select * from products";
                            
                            $run_products = mysqli_query($con,$get_products);
      
                            while($row_products=mysqli_fetch_array($run_products)){
                                
                                $product_id = $row_products['product_id'];
                             
                                $product_name = $row_products['product_name'];
                                
                                $product_img1 = $row_products['product_img1'];
                                
                                $product_price = $row_products['product_price'];
                                
                                $product_desc_1 = $row_products['product_desc_1'];
                                
                                $product_desc_2 = $row_products['product_desc_2'];
                                
                                $product_ingred = $row_products['product_ingred'];
                                
                                $product_measurement = $row_products['product_measurement'];
                                
                                $product_serving = $row_products['product_serving'];
                                
                                $product_weight = $row_products['product_weight'];
                                
                                $product_instruct = $row_products['product_instruct'];
                                
                                $date = $row_products['date'];
                                
                                $i++;
                                
                       ?>
                       
                       <tr> <!--- tr starts --->
                          
                           <td> <?php echo $i; ?> </td>
                           
                           <td> <?php echo $product_id; ?> </td>
                           
                           <td> <?php echo $product_name; ?> </td>
                           
                           <td> <img src="product_images/<?php echo $product_img1; ?>" width="60" height="60"> </td>
                           
                           <td> RM<?php echo $product_price; ?>.00 </td>
                           
                           <td> <?php echo $product_desc_1; ?> </td>
                           
                           <td> <?php echo $product_desc_2; ?> </td>
                           
                           <td> <?php echo $product_ingred; ?> </td>
                           
                           <td> <?php echo $product_measurement; ?> </td>
                           
                           <td> <?php echo $product_serving; ?> </td>
                                                      
                           <td> <?php echo $product_weight; ?> </td>
                           
                           <td> <?php echo $product_instruct; ?> </td>
                                                      
                           <td> <?php echo $date; ?> </td>
                        
                           <td> 
                           
                               <a class="btn btn-success" href="edit_product.php?edit_product=<?php echo $product_id; ?>">
                                  
                                   <i class="fas fa-pencil-alt"></i>
                                   
                               </a> 
                               
                           </td>
                           
                           <td>
                              
                               <a class="btn btn-danger" href="view_products.php?delete_product=<?php echo $product_id; ?>">
                                  
                                   <i class="fas fa-trash-alt"></i>
                                   
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

<?php
                
if(isset($_GET['delete_product'])){
                    
    include("delete_product.php");
                    
}
                
                
if(isset($_GET['edit_product'])){
                    
    include("edit_product.php");
                    
}


?>

<?php } ?>



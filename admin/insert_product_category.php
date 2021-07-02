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
                        <h2 class="mt-4">Add New Project</h2>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Insert Product Categories</li>
                        </ol>
                        <div class="panel-body">  <!--- panel-body starts --->
                                      
                       
                <form action="" class="form-horizontal" method="post" >  <!--- form-horizontal starts --->
                  
                <!--  PRODUCT CATEGORY TITLE -->
                       
                    <div class="form-group">  <!--- form-group starts --->
                       
                        <label for="" class="control-label col-md-3">
                        
                              Product Category Title 
                              
                        </label>
                        
                        <div class="col-md-6" > <!--- col-md-6 starts --->
                           
                            <input name="product_category_name" type="text" class="form-control">
                            
                        </div> <!--- col-md-6 ends --->
                    
                    </div> <!--- form-group ends --->
                    
                <!--  PRODUCT CATEGORY DESCRIPTION -->
                    
                    <div class="form-group">  <!--- form-group starts --->
                       
                        <label for="" class="control-label col-md-3">
                        
                              Product Category Description 
                              
                        </label>
                        
                        <div class="col-md-6"> <!--- col-md-6 starts --->
                           
                            <textarea type="text" name="product_category_description" id="" cols="30" rows="10" class="form-control"></textarea>
                            
                        </div> <!--- col-md-6 ends --->
                    
                    </div> <!--- form-group ends --->
                    
                <!--  PRODUCT CATEGORY DESCRIPTION -->
                    
                    <div class="form-group float-c">  <!--- form-group starts --->
                       
                        <label for="" class="control-label col-md-3">
                        
                              
                        </label>
                        
                        <div class="col-md-6"> <!--- col-md-6 starts --->
                          
                          <input value="Submit" name="submit" type="submit" class="form-control btn btn-primary">
                        
                        </div> <!--- col-md-6 ends --->
                    
                    </div> <!--- form-group ends --->
                    
                </form>  <!--- form-horizontal ends --->
                
            </div>  <!--- panel-body ends --->
<!--                        Container fluid-->
                    </div>
                </main>
<?php

     include 'include/footer.php'; 

?>


<?php  

          if(isset($_POST['submit'])){
              
              $product_category_name = $_POST['product_category_name'];
              
              $product_category_description = $_POST['product_category_description'];
              
              $insert_product_category = "insert into product_category (product_category_name, product_category_description) values ('$product_category_name','$product_category_description')";
              
              $run_product_category = mysqli_query($con,$insert_product_category);
              
              if($run_product_category){
                  
                  echo "<script>alert('Your New Product Category Has Been Inserted')</script>";
                  
                  echo "<script>window.open('view_product_category.php','_self')</script>";
                  
              }else{
                  
                  echo "<script>alert('Error Try Again')</script>";
              }
              
          }

?>


<?php } ?>
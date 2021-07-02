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
                            <li class="breadcrumb-item active">Product Categories</li>
                        </ol>
<div class="row"> <!--- row 2 starts --->
   
    <div class="col-lg-12"> <!--- col-lg-12 starts --->
       
        <div class="panel panel-default"> <!--- panel panel-default starts --->
           
            <div class="panel-heading"> <!--- panel-heading starts --->
               
                <h3 class="panel-title">  <!--- panel-title starts --->
                   
                    <i class="fa fa-tags fa-fw"></i> View Product Categories
                    
                </h3>  <!--- panel-title ends --->
                 
            </div>  <!--- panel-heading ends --->
            
            <div class="panel-body">  <!--- panel-body starts --->
             
                 <div class="table-responsive"> <!--- table-responsive starts --->
                    
                     <table class="table table-hover table-striped table-bordered"> <!--- table-striped table-bordered starts --->
                        
                         <thread> <!--- thread starts --->
                            
                             <tr> <!--- tr starts --->
                                
                                 <th> Product Category ID </th>
                                 <th> Product Category Title </th>
                                 <th> Product Category Description </th>
                                 <th> Edit Product Category </th>
                                 <th> Delete Product Category </th>
                                 
                             </tr> <!--- tr ends --->
                             
                         </thread> <!--- thread ends --->
                         
                         <tbody> <!--- tbody starts --->
                            
                            <?php
      
                                $i=0;
      
                                $get_product_category = "select * from product_category";
      
                                $run_product_category = mysqli_query($con,$get_product_category);
      
                                while($row_product_category=mysqli_fetch_array($run_product_category)){
                                    
                                    $product_category_id = $row_product_category['product_category_id'];
                                    
                                    $product_category_name = $row_product_category['product_category_name'];
                                    
                                    $product_category_description = $row_product_category['product_category_description'];
                                    
                                    $i++;

                            ?>
                            
                            <tr>  <!--- tr starts --->
                               
                                <td> <?php echo $product_category_id; ?> </td>
                                <td> <?php echo $product_category_name; ?> </td>
                                <td width="300"> <?php echo $product_category_description; ?> </td>
                                <td>

                                    <a class="btn btn-success" href="edit_product_category.php?edit_product_category=<?php echo $product_category_id; ?>">
                                        <i class="fas fa-pencil-alt"></i> Edit Category
                                    </a> 
                                </td>
                                <td> 
                                    <a class="btn btn-danger" href="view_product_category.php?delete_product_category=<?php echo $product_category_id; ?>">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </a> 
                                </td>
                                
                            </tr> <!--- tr ends --->
                            
                            <?php } ?>
                             
                         </tbody> <!--- tbody ends --->
                         
                     </table> <!--- table-striped table-bordered ends --->
                     
                 </div> <!--- table-responsive ends --->
                
            </div>  <!--- panel-body ends --->
            
        </div> <!--- panel panel-default ends --->
        
    </div> <!--- col-lg-12 ends --->
    
</div> <!--- row 2 ends  --->
</div>
</main>


<?php


include 'include/footer.php'; 


?>

<?php
                
if(isset($_GET['delete_product_category'])){
                    
    include("delete_product_category.php");
                    
}
                
                
if(isset($_GET['edit_product_category'])){
                    
    include("edit_product_category.php");
                    
}


?>

<?php } ?>




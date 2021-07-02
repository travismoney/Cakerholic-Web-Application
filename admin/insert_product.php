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
<!-- CONTENT SECTION CSS FIXING NEEDED  -->
<!-- BOOTSTRAP 4 Integrated, Including flex classes -->
                           
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
                            <li class="breadcrumb-item active">Insert Product</li>
                        </ol>
                        <div class="row">
                           
                            <div class="col-lg-12">
                               
                                <div class="panel panel-default">
                                   
                                   <div class="panel-body">
                                   
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">  <!--- form-horizontal starts --->
                 
                <div class="form-group">  <!--- form-group starts --->
                       
                   <label for="" class="control-label col-md-3">Product Category</label>
                        
                   <div class="col-md-6"> <!--- col-md-6 starts --->
                           
                       <select name="product_category" class="form-control">
                                
                           <option>Select Product Category</option>
                                    
                               <?php
                                                       
                                   $get_product_category = "select * from product_category";
                                                       
                                   $run_product_category = mysqli_query($con,$get_product_category);
                                                       
                                   while($row_product_category=mysqli_fetch_array($run_product_category)){
                                                           
                                       $product_category_id = $row_product_category['product_category_id'];
                                                           
                                       $product_category_name = $row_product_category['product_category_name'];
                                                           
                                       echo "
                                                           
                                       <option value='$product_category_id'> $product_category_name </option>
                                       ";
                                   }
                                                    
                               ?>
                                    
                       </select>
                            
                   </div> <!--- col-md-6 ends --->
                    
               </div> <!--- form-group ends --->
                  
                <!--  PRODUCT CATEGORY TITLE -->
                   
                    <div class="form-group">  <!--- form-group starts --->
                       
                        <label for="" class="control-label col-md-3">Product Name</label>
                        
                        <div class="col-md-6"> <!--- col-md-6 starts --->
                           
                            <input name="product_name" type="text" class="form-control">
                            
                        </div> <!--- col-md-6 ends --->
                    
                    </div> <!--- form-group ends --->
                    
                    <div class="form-group"> <!--- form-group starts --->
                   
                       <label class="col-md-3 control-label"> Product Price </label>
                   
                           <div class="col-md-6">  <!--- col-md-6 start --->
                      
                              <input name="product_price" type="text" class="form-control" required>
                       
                           </div>   <!--- col-md-6 end --->
                                
                    </div> <!--- form-group ends ---> <!--- product_price --->
                    
                <div class="form-group"> <!--- form-group starts --->
                   
                   <label class="col-md-3 control-label"> Product Short Description </label>
                   
                   <div class="col-md-6">  <!--- col-md-6 start --->
                      
                      <textarea name="product_desc_1" cols="19" rows="5" class="form-control"></textarea>
                       
                   </div>   <!--- col-md-6 end --->
                                
                </div> <!--- form-group ends ---> <!--- product_desc --->
                   
                <div class="form-group"> <!--- form-group starts --->
                   
                   <label class="col-md-3 control-label"> Product Delivery Duration </label>
                   
                   <div class="col-md-6">  <!--- col-md-6 start --->
                      
                      <textarea name="product_desc_2" cols="19" rows="5" class="form-control"></textarea>
                       
                   </div>   <!--- col-md-6 end --->
                                
                </div> <!--- form-group ends ---> <!--- product_desc --->
                   
                <div class="form-group"> <!--- form-group starts --->
                   
                   <label class="col-md-3 control-label"> Product Ingredients </label>
                   
                   <div class="col-md-6">  <!--- col-md-6 start --->
                      
                      <textarea name="product_ingred" cols="19" rows="2" class="form-control"></textarea>
                       
                   </div>   <!--- col-md-6 end --->
                                
                </div> <!--- form-group ends ---> <!--- product_desc --->
                  
                <div class="form-group"> <!--- form-group starts --->
                   
                   <label class="col-md-3 control-label"> Product Measurement </label>
                   
                   <div class="col-md-6">  <!--- col-md-6 start --->
                      
                      <textarea name="product_measurement" cols="19" rows="2" class="form-control"></textarea>
                       
                   </div>   <!--- col-md-6 end --->
                                
                </div> <!--- form-group ends ---> <!--- product_desc --->
                 
                <div class="form-group"> <!--- form-group starts --->
                   
                   <label class="col-md-3 control-label"> Product Serving Size </label>
                   
                   <div class="col-md-6">  <!--- col-md-6 start --->
                      
                      <textarea name="product_serving" cols="19" rows="2" class="form-control"></textarea>
                       
                   </div>   <!--- col-md-6 end --->
                                
                </div> <!--- form-group ends ---> <!--- product_desc --->
                    
                <div class="form-group"> <!--- form-group starts --->
                   
                   <label class="col-md-3 control-label"> Product Weight </label>
                   
                   <div class="col-md-6">  <!--- col-md-6 start --->
                      
                      <textarea name="product_weight" cols="19" rows="2" class="form-control"></textarea>
                       
                   </div>   <!--- col-md-6 end --->
                                
                </div> <!--- form-group ends ---> <!--- product_desc --->
                  
                <div class="form-group"> <!--- form-group starts --->
                   
                   <label class="col-md-3 control-label"> Product Care Instructions </label>
                   
                   <div class="col-md-6">  <!--- col-md-6 start --->
                      
                      <textarea name="product_instruct" cols="19" rows="3" class="form-control"></textarea>
                       
                   </div>   <!--- col-md-6 end --->
                                
                </div> <!--- form-group ends ---> <!--- product_desc --->
                   
                <div class="form-group"> <!--- form-group starts --->
                   
                   <label class="col-md-3 control-label"> Product Image Small </label>
                   
                   <div class="col-md-6">  <!--- col-md-6 start --->
                      
                      <input name="product_img1" type="file" class="form-control" required>
                       
                   </div>   <!--- col-md-6 end --->
                                
                </div> <!--- form-group ends ---> <!--- product_Img3 --->
                  
                <div class="form-group"> <!--- form-group starts --->
                   
                   <label class="col-md-3 control-label"> Product Image Big </label>
                   
                   <div class="col-md-6">  <!--- col-md-6 start --->
                      
                      <input name="product_img2" type="file" class="form-control" required>
                       
                   </div>   <!--- col-md-6 end --->
                                
                </div> <!--- form-group ends ---> <!--- product_Img3 --->
                    
                <div class="form-group"> <!--- form-group starts --->
                   
                   <label class="col-md-3 control-label"></label>
                   
                   <div class="col-md-6">  <!--- col-md-6 start --->
                     
                     <input type="submit" value="Insert Product" name="action" class="btn btn-primary form-control">
                              
                   </div>   <!--- col-md-6 end --->
                                
                </div> <!--- form-group ends ---> <!--- submit product --->  
                    
                </form>  <!--- form-horizontal ends --->
                                       
                                       
                                       
                                   </div>
                                    
                                </div>
                                
                            </div>
                            
                        </div>
                    <!-- Container fluid -->
                    </div>
                </main>

<?php

     include 'include/footer.php'; 

?>

<?php  

if(isset($_POST['action'])){
    //$product_id          
    $product_category = $_POST['product_category'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_desc_1 = $_POST['product_desc_1'];
    $product_desc_2 = $_POST['product_desc_2'];
    $product_ingred = $_POST['product_ingred'];
    $product_measurement = $_POST['product_measurement'];
    $product_serving = $_POST['product_serving'];
    $product_weight = $_POST['product_weight'];
    $product_instruct = $_POST['product_instruct'];
    //date         
    
    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    
    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];

    move_uploaded_file($temp_name1,"product_images/$product_img1");
    move_uploaded_file($temp_name2,"product_images/$product_img2");

    // code error fixed within 5 hours
    // NOW() -> timestamp cannot be 'NOW()'
    $insert_product = "insert into products 
    (product_category,
    product_name,
    product_price,
    product_desc_1,
    product_desc_2,
    product_ingred,
    product_measurement,
    product_serving,
    product_weight,
    product_instruct,
    date,
    product_img1,
    product_img2) 
    values 
    ('$product_category',
    '$product_name',
    '$product_price',
    '$product_desc_1',
    '$product_desc_2',
    '$product_ingred',
    '$product_measurement',
    '$product_serving',
    '$product_weight',
    '$product_instruct',
    NOW(),
    '$product_img1',
    '$product_img2')";
    
    $run_product = mysqli_query($con,$insert_product);
              
    if($run_product){
        
        echo "<script>alert('Product has been inserted into the database sucessfully')</script>";
        echo "<script>window.open('view_products.php','_self')</script>";
        
    }else{
        
    
    } 
    
}

?>

<?php } ?>

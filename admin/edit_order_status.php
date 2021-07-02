<?php

     include 'include/header.php'; 

?>

<?php 

if(!isset($_SESSION['admin_email'])){
    
    echo "<script>window.open('admin-login.php','_self')</script>";
    
}else{
    
    if(isset($_GET['edit_product_category'])){
        
        $edit_product_category_id = $_GET['edit_product_category'];
        
        $edit_product_category_query = "select * from product_category where product_category_id='$edit_product_category_id'";
        
        $run_edit = mysqli_query($con,$edit_product_category_query);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $product_category_id = $row_edit['product_category_id'];
        
        $product_category_name = $row_edit['product_category_name'];
        
        $product_category_description = $row_edit['product_category_description'];

    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Caker Holic</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="../admin/index.php">Caker Holic</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="admin-login.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
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
                        Caker Holic Admin
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Update Order Status</li>
                        </ol>
                                    <div class="panel-body">  <!--- panel-body starts --->
               
                <form action="" class="form-horizontal" method="post">  <!--- form-horizontal starts --->
                  
                <!--  PRODUCT CATEGORY TITLE -->
                   
                    <div class="form-group">  <!--- form-group starts --->
                       
                        <label for="" class="control-label col-md-3">
                        
                              Order Status Update 
                              
                        </label>
                        
                        <div class="col-md-6"> <!--- col-md-6 starts --->
                           
                           <select name="order_status" class="form-control">
                                
                           <option>Select Order Status</option>
                                    
                                       <option value="Order Cancelled"> Order Cancelled </option>
                                       <option value="Order Completed"> Order Completed </option>
          
                       </select>
                            
                        </div> <!--- col-md-6 ends --->
                    
                    </div> <!--- form-group ends --->

                    
                    <div class="form-group">  <!--- form-group starts --->
                       
                        <label for="" class="control-label col-md-3">
                        
                              
                        </label>
                        
                        <div class="col-md-6"> <!--- col-md-6 starts --->
                          
                          <input value="Update Order Status" name="submit" type="submit" class="form-control btn btn-primary">
                        
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
              
        $order_id = $_GET['order_id'];
              
        $order_status = $_POST['order_status'];
              
        $update_order_status = "update orders set order_status='$order_status' where order_id='$order_id'";
              
        $run_order_status = mysqli_query($con,$update_order_status);
              
        if($run_order_status){
                  
            echo "<script>alert('Order Status has been Successfully updated into Database!')</script>";
                  
            echo "<script>window.open('order_status.php','_self')</script>";
                     
        }
              
    }


?>

<?php } ?>

<?php

if(!isset($_SESSION['admin_email'])){
    
    echo "<script>window.open('admin-login.php','_self')</script>";
    
}else{

?>

<?php
      
    if(isset($_GET['delete_product'])){
        
        $delete_id = $_GET['delete_product'];
        
        $delete_pro = "delete from products where product_id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete_pro);
        
        if($run_delete){
            
            echo "<script>alert('Product has been removed!')</script>";
            
            echo "<script>window.open('view_products.php','_self')</script>";
            
            
        }
     
        
    }
     
      
?>


<?php } ?>
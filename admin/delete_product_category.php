<?php

include 'include/db.php'; 

if(!isset($_SESSION['admin_email'])){
    
    echo "<script>window.open('admin-login.php','_self')</script>";
    
}else{

?>

<?php 
      
      if(isset($_GET['delete_product_category'])){
          
          $delete_product_category_id = $_GET['delete_product_category'];
          
          $delete_product_category = "delete from product_category where product_category_id='$delete_product_category_id'";
          
          $run_delete = mysqli_query($con,$delete_product_category);
          
          if($run_delete){
              
              echo "<script>alert('Product Category Successfully Deleted!')</script>";
              
              echo "<script>window.open('view_product_category.php','_self')</script>";
              
          }
                 
      }

      
?>


<?php } ?>


<?php


$db = mysqli_connect("localhost","root","","caker_holic");

function getRealIpUser(){
    
    switch(true){
            
            case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            
            default : return $_SERVER['REMOTE_ADDR'];
            
    }
    
}

// Function getRealIpUser ends here! 

// Function add_cart starts here! 

function add_cart(){
    
    global $db;
    
    if(isset($_GET['add_cart'])){
        
        $ip_add = getRealIpUser();
        
        $p_id = $_GET['add_cart'];
        
        $product_qty = $_POST['product_qty'];
        
        $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
        
        $run_check = mysqli_query($db,$check_product);
        
        if(mysqli_num_rows($run_check)>0){
            
            echo "<script>alert('This product has already added in cart')</script>";
            echo "<script>window.open('product-details.php?product_id=$p_id','_self')</script>";
            
        }else{
            
            $query = "insert into cart (p_id,ip_add,qty) values ('$p_id','$ip_add','$product_qty')";
            
            $run_query = mysqli_query($db,$query);
            
            echo "<script>alert('Product Added into Cart!')</script>";
            echo "<script>window.open('product-details.php?product_id=$p_id','_self')</script>";
            
        }
        
    }
    
}
// Getting Product Category
function getProductCategory(){
    
    global $db;
    
    $get_product_category = "select * from product_category";
    
    $run_product_category = mysqli_query($db,$get_product_category);
    
    while($row_product_category=mysqli_fetch_array($run_product_category)){
        
        $product_category_id = $row_product_category['product_category_id'];
        
        $product_category_name = $row_product_category['product_category_name'];
        
        echo "
            
            <li>
                
                <a href='shop.php?product_category=$product_category_id'> $product_category_name </a>
                
            </li>
       
        ";

    }
    
}

// Getting Products

function getPro(){
    
    global $db;
    
    $get_products = "select * from products order by 1 DESC LIMIT 0,15";
    
    $run_products = mysqli_query($db,$get_products);
    
    while($row_products=mysqli_fetch_array($run_products)){
        
        $product_id = $row_products['product_id']; // product id
        
        $product_name = $row_products['product_name']; // product name
        
        $product_price = $row_products['product_price']; // product price
        
        $product_img1 = $row_products['product_img1']; // product img 1
        
        
        echo "
        	
            <div class='col-lg-4 col-md-4 col-6'>
        		
                <div class='cake_feature_item'>
					
                    <div class='cake_img'>
                    	
                        <img src='admin/product_images/$product_img1' alt=''>
					
                    </div>
					
                    <div class='cake_text'>
						
                        <h4>RM$product_price.00</h4>
						
                        <h3>$product_name</h3>
						
                        <a class='pest_btn' href='product-details.php?product_id=$product_id'><i style='margin-right: 5px; font-size: 1.2rem;' class='fa fa-shopping-cart'></i> Buy Now</a>
					
                    </div>
				
                </div>
        	
            </div>
        
        ";
        
    }
    
}

function items(){
    
    global $db;
    
    $ip_add = getRealIpUser();
    
    $get_items = "select * from cart where ip_add='$ip_add'";
    
    $run_items = mysqli_query($db,$get_items);
    
    $count_items = mysqli_num_rows($run_items);
    
    echo $count_items;
    
}

// Function items starts ends ! 

// Function total_price starts ends ! 

function total_price(){
    
    global $db;
    
    $ip_add = getRealIpUser();
    
    $total = 0;
    
    $select_cart = "select * from cart where ip_add='$ip_add'";
    
    $run_cart = mysqli_query($db,$select_cart);
    
    while($record=mysqli_fetch_array($run_cart)){
        
        $pro_id = $record['p_id'];
        
        $product_qty = $record['qty'];
        
        $get_price = "select * from products where product_id='$pro_id'";
        
        $run_price = mysqli_query($db,$get_price);
        
        while($row_price=mysqli_fetch_array($run_price)){
            
            $sub_total = $row_price['product_price']*$product_qty;
            
            $total += $sub_total;
            
        }
    }

    echo "RM " . $total; 
}

function getMenuProduct(){
    
        global $db;
    
    $get_products = "select * from products order by 1 DESC LIMIT 0,8";
    
    $run_products = mysqli_query($db,$get_products);
    
    while($row_products=mysqli_fetch_array($run_products)){
        
        $product_id = $row_products['product_id']; // product id
        
        $product_name = $row_products['product_name']; // product name
        
        $product_price = $row_products['product_price']; // product price
        
        $product_img1 = $row_products['product_img1']; // product img 1
    
        echo "
        
            	   <div class='col-lg-3 col-md-4 col-6'>
               
		      <div class='cake_feature_item'>
               
			     <div class='cake_img'>
               
				    <img src='admin/product_images/$product_img1' alt=''>
               
			     </div>
               
			 <div class='cake_text'>
               
				    <h4>RM$product_price.00</h4>
               
				    <h3>$product_name</h3>
               
				    <a class='pest_btn' href='product-details.php?product_id=$product_id'>View Item</a>
               
			 </div>
               
		  </div>
               
	   </div>
        
        ";

}
    
}

?>



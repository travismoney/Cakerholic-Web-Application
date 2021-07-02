<?php

     // including the footer section 
     include 'include/header.php'; 

?>
                            <?php
                  
                                $ip_add = getRealIpUser();
                  
                                $select_order_confirmation = "select * from order_confirmation where ip_address='$ip_add'";
                  
                                $run_order_confirmation = mysqli_query($con,$select_order_confirmation);
                  
                                $count = mysqli_num_rows($run_order_confirmation);
                  
                                ?>
                                
                                <?php
                            
                                $total = 0;
                            
                                while($row_order_confirmation = mysqli_fetch_array($run_order_confirmation)){
                                    
                                $invoice_no = $row_order_confirmation['invoice_no'];
                                    
                                $order_date = $row_order_confirmation['order_date'];
                                    
                                $first_name = $row_order_confirmation['first_name'];
                                    
                                $last_name = $row_order_confirmation['last_name'];
                                    
                                $address = $row_order_confirmation['address'];
                                    
                                $phone = $row_order_confirmation['phone'];
                                    
                                $delivery_method = $row_order_confirmation['delivery_method'];
                                    
                                $delivery_date = $row_order_confirmation['delivery_date'];
                                    
                                $delivery_time = $row_order_confirmation['delivery_time'];
                                    
                                $product_id = $row_order_confirmation['product_id'];
                                
                                $product_qty = $row_order_confirmation['product_quantity'];
                                    
                                $get_payment = "select * from payment where invoice_no = '$invoice_no'";
                                
                                $run_payment = mysqli_query($con,$get_payment);
                                    
                                $row_payment = mysqli_fetch_array($run_payment);
        
                                $payment_method = $row_payment['payment_method'];
                                
                                $get_products = "select * from products where product_id='$product_id'";
                                
                                $run_products = mysqli_query($con,$get_products);
                                
                                while($row_products = mysqli_fetch_array($run_products)){
                                    
                                    $product_name = $row_products['product_name'];
                                    
                                    $only_price = $row_products['product_price'];
                                    
                                    $sub_total = $row_products['product_price']*$product_qty;
                                    
                                    $total += $sub_total;
                                }
                                }
                                
                            
                                ?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        @media screen and (max-width: 480px) {
            .mobile-hide {
                display: none !important;
            }

            .mobile-center {
                text-align: center !important;
            }
        }

        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>

<body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#eeeeee">
    <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Open Sans, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
    </div>
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top: 180px; margin-bottom: 20px;">
        <tr>
            <td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:800px;">
                    <tr>
                        <td align="center" valign="top" style="font-size:0; padding: 35px;" bgcolor="#F44336">
                            <div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                    <tr>
                                        <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 36px; font-weight: 800; line-height: 48px;" class="mobile-center">
                                            <h1 style="font-size: 36px; font-weight: 800; margin: 0; color: #ffffff;">Invoice </h1>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;" class="mobile-hide">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                    <tr>
                                        <td align="right" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;">
                                            <table cellspacing="0" cellpadding="0" border="0" align="right">
                                                <tr>
                                                    <td style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400;">
                                                        <p style="font-size: 18px; font-weight: 400; margin: 0; color: #ffffff;"><a href="#"  style="color: #ffffff; text-decoration: none;"><?php echo $invoice_no; ?></a></p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 35px 35px 20px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:800px;">
                                <tr>
                                    <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;"> <img src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png" width="125" height="120" style="display: block; border: 0px;" /><br>
                                        <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;"> Thank You For Your Recent Order! </h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">
                                        <p style="font-size: 16px; font-weight: 400; line-height: 35px; color: #777777; text-align: center;"> Thank you for your recent order with us! We will deliver your order on the scheduled delivery or pickup time! Stay tuned and have a good day! </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td width="85%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;"> Item </td>
                                                <td width="15%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;"> Sub total </td>
                                            </tr>
                                            <tr>
                                 <?php
                  
                                $ip_add = getRealIpUser();
                  
                                $select_order_confirmation = "select * from order_confirmation where ip_address='$ip_add'";
                  
                                $run_order_confirmation = mysqli_query($con,$select_order_confirmation);
                  
                                $count = mysqli_num_rows($run_order_confirmation);
                  
                                ?>
                                
                                <?php
                            
                                $total = 0;
                            
                                while($row_order_confirmation = mysqli_fetch_array($run_order_confirmation)){
                                    
                                $product_id = $row_order_confirmation['product_id'];
                                
                                $product_qty = $row_order_confirmation['product_quantity'];
                                
                                $get_products = "select * from products where product_id='$product_id'";
                                
                                $run_products = mysqli_query($con,$get_products);
                                
                                while($row_products = mysqli_fetch_array($run_products)){
                                    
                                    $product_name = $row_products['product_name'];
                                    
                                    $only_price = $row_products['product_price'];
                                    
                                    $sub_total = $row_products['product_price']*$product_qty;
                                    
                                    $total += $sub_total;
                            
                                ?>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;"> <?php echo $product_name; ?> (<?php echo $product_qty; ?>) </td>
                                                <td width="25%"  align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;"> RM <?php echo $sub_total; ?>.00</td>
                                            </tr>
                                            <?php } } ?>
                                            <tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;"> Shipping + Handling </td>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;"> RM 00.00</td>
                                            </tr>

                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="padding-top: 20px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td  width="85%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;"> TOTAL </td>
                                                <td width="20%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;"> RM <?php echo $total; ?>.00 </td>
                                            </tr>
                                                                             <tr>
                                                <td  width="65%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;"> Payment Method </td>
                                                <td width="35%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;"> <?php echo $payment_method; ?></td>
                                            </tr>
                                        </table>
                                        
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" height="100%" valign="top" width="100%" style="padding: 0 35px 35px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:800px;">
                                <tr>
                                    <td align="center" valign="top" style="font-size:0;">
                                        <div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">
                                            <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:800px;">
                                                <tr>
                                                    <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
                                                        <p style="font-weight: 800;">Billing Address</p>
                                                        <p><?php echo $first_name; echo " "; echo $last_name; ?><br><?php echo $address; ?><br><?php echo $phone; ?></p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">
                                            <table align="" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:800px;">
                                                <tr>
                                                     <td align="right" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
                                                        <p style="font-weight: 800;">Delivery Details</p>
                                                        <p>Delivery Method: <?php echo $delivery_method; ?><br>Delivery Date: <?php echo $delivery_date; ?><br>Delivery Time: <?php echo $delivery_time; ?></p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style=" padding: 35px; background-color: #ff7361;" bgcolor="#1b9ba3">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                                <tr>
                                    <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;">
                                        <h2 style="font-size: 24px; font-weight: 800; line-height: 30px; color: #ffffff; margin: 0;"> Continue Shopping at Caker Holic!</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" style="padding: 25px 0 15px 0;">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr><form action="" method="post">
                                             <td align="center" style="border-radius: 5px;" bgcolor="#66b3b7"><button class="btn btn-default" name="action" type="">Shop Again</button> </td>  
                                            </form>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>

<?php
if(isset($_POST['action'])){

        $delete_order_confirmation =  "delete from order_confirmation where ip_address='$ip_add'";
        
        $run_delete = mysqli_query($con,$delete_order_confirmation);
    
        echo "<script>window.open('shop.php','_self')</script>";
}
    ?>


<?php
                                    
include 'include/footer.php'; 


?>
<?php

session_start();
ob_start();


include("includes/db.php");
include("functions/functions.php");
    
    
// GETTING CUSTOMER'S INFORMATION FOR BILLING PURPOSE
          
    $get_invoice_no = "select * from orders where customer_email='$customer_session'";
           
    $run_customer = mysqli_query($con,$get_customer);
           
    $row_customer = mysqli_fetch_array($run_customer);
    
    $customer_name = $row_customer['customer_name']; // customer name
    
    $customer_email = $row_customer['customer_email']; // customer email
    
    $customer_address = $row_customer['customer_address']; // customer address
    
    $customer_city = $row_customer['customer_city']; // customer city
    
    $customer_country = $row_customer['customer_country']; // customer country
    
    $customer_contact = $row_customer['customer_contact']; // customer contact
    
// GETTING ORDER DETAILS FROM CUSTOMER'S ORDERS

$get_details = "select * from customer_orders where order_id='$order_id'";

$run_details = mysqli_query($con,$get_details);

$row_details = mysqli_fetch_array($run_details);
    
    $invoice_no = $row_details['invoice_no']; // invoice number

    $due_amount = $row_details['due_amount']; // amount to be paid
                   
    $qty = $row_details['qty']; // quantity
               
    $size = $row_details['size']; // sizing
               
    $order_date = substr($row_details['order_date'],0,11); // order date
               
    $order_status = $row_details['order_status']; // order status
    
// SELECTING CUSTOMER'S PAYMENT DETAILS
    
$get_payment = "select * from payments where invoice_no='$invoice_no'";

$run_payment = mysqli_query($con,$get_payment);

$row_payment = mysqli_fetch_array($run_payment);
    
    $payment_amount = $row_payment['amount']; // payment amount
    
    $payment_mode = $row_payment['payment_mode']; // payment mode
    
    
// selecting product id ordered information for table pending_orders
    
$get_items = "select * from pending_orders where order_id='$order_id'";

$run_items = mysqli_query($con,$get_items);

$row_items = mysqli_fetch_array($run_items);
    
    $product_id = $row_items['product_id']; // product id
    

// getting product information from table product
    
$get_products = "select * from products where product_id='$product_id'";

$run_products = mysqli_query($con,$get_products);

$row_products = mysqli_fetch_array($run_products);
    
    $product_title = $row_products['product_title']; // product name / title
    
    $product_Img1 = $row_products['product_Img1']; // product image 
    
    $product_price = $row_products['product_price']; // product price 
    
    
require('fpdf181/fpdf.php');

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

//create pdf object
$pdf = new FPDF('P','mm','A4');
//add new page
$pdf->AddPage();
    
//Company Image
$pdf->Image('./logo.png',10,10,50);    


//set font to arial, bold, 16pt
$pdf->SetFont('Arial','B',16);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130 ,40,'Coloured Malaysia Sdn. Bhd.',0,0); // Company Name
    
//set font to arial, bold, 22pt
$pdf->SetFont('Arial','B',22);

$pdf->Cell(59 ,12,'ORDER INVOICE',0,1);//end of line
$pdf->Cell(59 ,12,'',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130 ,5,'Taipan USJ 9/5N',0,0); // Street Address
$pdf->Cell(59 ,5,'',0,1);//end of line

$pdf->Cell(130 ,5,'Subang Jaya 47610',0,0); // City ZipCode
$pdf->Cell(25 ,5,'Invoice # :',0,0);
$pdf->Cell(34 ,5,$invoice_no,0,1);//end of line

$pdf->Cell(130 ,5,'Malaysia',0,0); // Country
$pdf->Cell(25 ,5,'Order Date :',0,0);
$pdf->Cell(34 ,5,$order_date,0,1);//end of line

$pdf->Cell(130 ,5,'03-8011-8280',0,0);
$pdf->Cell(25 ,5,'Pay Status :',0,0);
$pdf->Cell(34 ,5,$order_status,0,1);//end of line

$pdf->Cell(130 ,5,'colouredmy@gmail.com',0,0);
$pdf->Cell(27 ,5,'Pay Method :',0,0);
$pdf->Cell(32 ,5,$payment_mode,0,1);//end of line
    
//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//billing address
$pdf->Cell(100 ,5,'Bill to',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$customer_name,0,1); // customer name

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$customer_address,0,1); // customer address
    
$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$customer_city,0,1); // customer city
    
$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$customer_country,0,1); // customer state

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$customer_contact,0,1); // customer contact

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$customer_email,0,1); // customer email

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(80 ,5,'Product Description',1,0);
$pdf->Cell(25 ,5,'Quantity',1,0,'C');
$pdf->Cell(25 ,5,'Size',1,0,'C');
$pdf->Cell(25 ,5,'Unit Price',1,0,'C');
$pdf->Cell(34 ,5,'Total Amount',1,1,'C'); //end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

$pdf->Cell(80 ,5,$product_title,1,0);
$pdf->Cell(25 ,5,$qty,1,0,'C');
$pdf->Cell(25 ,5,$size,1,0,'C');
$pdf->Cell(25 ,5,$product_price,1,0,'C');
$pdf->Cell(34 ,5,$due_amount,1,1,'R');//end of line

$pdf->Cell(80 ,5,'',1,0);
$pdf->Cell(25 ,5,'',1,0);
$pdf->Cell(25 ,5,'',1,0);
$pdf->Cell(25 ,5,'',1,0);
$pdf->Cell(34 ,5,'',1,1,'R');//end of line

$pdf->Cell(80 ,5,'',1,0);
$pdf->Cell(25 ,5,'',1,0);
$pdf->Cell(25 ,5,'',1,0);
$pdf->Cell(25 ,5,'',1,0);
$pdf->Cell(34 ,5,'',1,1,'R');//end of line
    
//summary
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Subtotal',0,0);
$pdf->Cell(12 ,5,'MYR',1,0);
$pdf->Cell(22 ,5,$due_amount,1,1,'R');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Shipping',0,0);
$pdf->Cell(12 ,5,'MYR',1,0);
$pdf->Cell(22 ,5,'0',1,1,'R');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Total Due',0,0);
$pdf->Cell(12 ,5,'MYR',1,0);
$pdf->Cell(22 ,5,$due_amount,1,1,'R');//end of line

//output the result
$pdf->Output();
}

?>
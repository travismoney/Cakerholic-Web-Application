<?php

include 'include/db.php'; 
    
if(isset($_GET['order_id'])){
    
    $order_id = $_GET['order_id'];
}
    
// GETTING CUSTOMER'S INFORMATION FOR BILLING PURPOSE

    $get_order = "select * from orders where order_id='$order_id'";

    $run_order = mysqli_query($con,$get_order);

    // getting order status from customers goes here
           
    $get_order = "select * from orders where order_id='$order_id'";
           
    $run_order = mysqli_query($con,$get_order);
           
    $row_order = mysqli_fetch_array($run_order);
    
    $invoice_no = $row_order['invoice_no']; 

    $order_date = $row_order['order_date']; 

    $first_name = $row_order['first_name']; 

    $last_name = $row_order['last_name']; 

    $address = $row_order['address']; 

    $email = $row_order['email']; 

    $phone = $row_order['phone']; 

    $product_name = $row_order['product_name']; 

    $product_quantity = $row_order['product_quantity']; 

    $delivery_method = $row_order['delivery_method']; 

    $delivery_date = $row_order['delivery_date']; 

    $delivery_time = $row_order['delivery_time']; 

    $order_notes = $row_order['order_notes']; 
    
    $product_id = $row_order['product_id'];

    $order_total = $row_order['order_total'];

    // getting product price per item

    $get_products = "select * from products where product_id='$product_id'";

    $run_products = mysqli_query($con,$get_products);

    $row_products = mysqli_fetch_array($run_products);

    $product_price = $row_products['product_price'];

    // getting payment information

    $get_payment = "select * from payment where invoice_no = '$invoice_no'";

    $run_payment = mysqli_query($con,$get_payment);

    $row_payment = mysqli_fetch_array($run_payment);

    $payment_method = $row_payment['payment_method'];
                                   
require('fpdf181/fpdf.php');

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

//create pdf object
$pdf = new FPDF('P','mm','A4');
//add new page
$pdf->AddPage();
    
//Company Image
$pdf->Image('./caker-holic-logo.png',10,10,50);    


//set font to arial, bold, 16pt
$pdf->SetFont('Arial','B',16);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130 ,45,'Caker Holic Malaysia',0,0); // Company Name

$pdf->Line(10, 70, 210-10, 70); // 10mm from each edge

    
//set font to arial, bold, 22pt
$pdf->SetFont('Arial','B',22);

$pdf->Cell(20 ,13,'ORDER INVOICE',0,1);//end of line
$pdf->Cell(20 ,13,'',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130 ,6,'Kuching Town Area',0,0); // Street Address
$pdf->Cell(59 ,6,'',0,1);//end of line

$pdf->Cell(135 ,6,'Kuching City 93000',0,0); // City ZipCode
$pdf->Cell(25 ,6,'Invoice       :',0,0);
$pdf->Cell(34 ,6,$invoice_no,0,1);//end of line

$pdf->Cell(135 ,6,'Sarawak Malaysia',0,0); // Country
$pdf->Cell(25 ,6,'Order Date :',0,0);
$pdf->Cell(34 ,6,$order_date,0,1);//end of line

$pdf->Cell(135 ,6,'012-3870153',0,0);
$pdf->Cell(20 ,6,'Payment :',0,0);
$pdf->Cell(44 ,6,$payment_method,0,1);//end of line

$pdf->Cell(120 ,6,'cakerholic@gmail.com',0,0);
    
//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//billing address
$pdf->Cell(100 ,20,'Bill to',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10 ,6,'',0,0);
$pdf->Cell(90 ,6,$first_name,0,1); // customer name

$pdf->Cell(10 ,6,'',0,0);
$pdf->Cell(90 ,6,$address,0,1); // customer address
    
$pdf->Cell(10 ,6,'',0,0);
$pdf->Cell(90 ,6,$phone,0,1); // customer contact

$pdf->Cell(10 ,6,'',0,0);
$pdf->Cell(90 ,6,$email,0,1); // customer email

// Order Information
//billing address
$pdf->Cell(100 ,20,'Order Details',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10 ,6,'',0,0);
$pdf->Cell(35 ,6,'Delivery Method :',0,0);
$pdf->Cell(90 ,6,$delivery_method,0,1); // customer name

$pdf->Cell(10 ,6,'',0,0);
$pdf->Cell(35 ,6,'Delivery Date     :',0,0);
$pdf->Cell(90 ,6,$delivery_date,0,1); // customer address
    
$pdf->Cell(10 ,6,'',0,0);
$pdf->Cell(35 ,6,'Delivery Time     :',0,0);
$pdf->Cell(90 ,6,$delivery_time,0,1); // customer contact

$pdf->Cell(10 ,6,'',0,0);
$pdf->Cell(35 ,6,'Order Notes       :',0,0);
$pdf->Cell(90 ,6,$order_notes,0,1); // customer email

$pdf->Cell(189 ,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(105 ,8,'Product Description',1,0);
$pdf->Cell(25 ,8,'Quantity',1,0,'C');
$pdf->Cell(25 ,8,'Unit Price',1,0,'C');
$pdf->Cell(34 ,8,'Total Amount',1,1,'C'); //end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

$pdf->Cell(105 ,8,$product_name,1,0);
$pdf->Cell(25 ,8,$product_quantity,1,0,'C');
$pdf->Cell(25 ,8,$product_price,1,0,'C');
$pdf->Cell(34 ,8,$order_total,1,1,'R');//end of line

$pdf->Cell(105 ,8,'',1,0);
$pdf->Cell(25 ,8,'',1,0);
$pdf->Cell(25 ,8,'',1,0);
$pdf->Cell(34 ,8,'',1,1,'R');//end of line

$pdf->Cell(105 ,8,'',1,0);
$pdf->Cell(25 ,8,'',1,0);
$pdf->Cell(25 ,8,'',1,0);
$pdf->Cell(34 ,8,'',1,1,'R');//end of line

$pdf->Cell(105 ,8,'',1,0);
$pdf->Cell(25 ,8,'',1,0);
$pdf->Cell(25 ,8,'',1,0);
$pdf->Cell(34 ,8,'',1,1,'R');//end of line
  
//summary
$pdf->Cell(130 ,8,'',0,0);
$pdf->Cell(25 ,8,'Subtotal',0,0);
$pdf->Cell(12 ,8,'MYR',1,0);
$pdf->Cell(22 ,8,$order_total,1,1,'R');//end of line

$pdf->Cell(130 ,8,'',0,0);
$pdf->Cell(25 ,8,'Shipping',0,0);
$pdf->Cell(12 ,8,'MYR',1,0);
$pdf->Cell(22 ,8,'0',1,1,'R');//end of line

$pdf->Cell(130 ,8,'',0,0);
$pdf->Cell(25 ,8,'Total Due',0,0);
$pdf->Cell(12 ,8,'MYR',1,0);
$pdf->Cell(22 ,8,$order_total,1,1,'R');//end of line

$pdf->Cell(50 ,8,'',0,0);
$pdf->Cell(130 ,40,'ALL GOODS SOLD ARE NON REFUNDABLE',0,1);




//output the result
$pdf->Output();


?>
<?php

     // including the footer section 
     include 'include/header.php'; 

?>       
        <!--================End Main Header Area =================-->
        <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Contact Us</h3>
        			<ul>
        				<li><a href="index.php">Home</a></li>
        				<li><a href="contact.php">Contact Us</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
        
        <!--================Contact Form Area =================-->
        <section class="contact_form_area p_100">
        	<div class="container">
        		<div class="main_title">
					<h2>Get In Touch</h2>
					<h5>Do you have anything in your mind to let us know?  Kindly don't delay to connect to us by means of our contact form. We cater custom orders too!</h5>
				</div>
       			<div class="row">
       				<div class="col-lg-7">
       					<form class="row contact_us_form" method="post" id="contactForm" novalidate="novalidate">
							<div class="form-group col-md-6">
                            <!-- NAME -->
								<input type="text" class="form-control" id="name" name="name" placeholder="Your name">
							</div>
							<!-- EMAIL -->
							<div class="form-group col-md-6">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email address">
							</div>
							<!-- SUBJECT -->
							<div class="form-group col-md-12">
								<input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
							</div>
							<!-- MESSAGE -->
							<div class="form-group col-md-12">
								<textarea class="form-control" name="message" id="message" rows="1" placeholder="Your Message"></textarea>
							</div>
							
							<div class="form-group col-md-12">
								<button type="submit" value="submit" name="submit" class="btn order_s_btn form-control">Submit Now</button>
							</div>
						</form>
                      
                        <?php 
                       
                       if(isset($_POST['submit'])){
                           
                           /// Admin receives message with this ///
                           
                           $name = $_POST['name'];
                           
                           $subject = $_POST['subject'];
                           
                           $mailFrom = $_POST['email'];
                           
                           $message = $_POST['message'];
                           
                           $mailTo = "cakerholic@gmail.com";
                           
                           $headers = "From: ".$mailFrom;
                           
                           $txt = "You have received a new enquiry from ".$name."via Caker Holic Website.\n\n".$message;
                           
                           mail($mailTo,$subject,$txt,$headers);
                           
                           /// Auto reply to sender with this ///
                           
                           $email = $_POST['email'];
                           
                           $subject = "Thank you for your recent enquiry to Caker Holic";
                           
                           $msg = "Thank you for the your recent enquiry message from our website! We will get back to you as soon as possible! Caker Holic";
                           
                           $from = "From: cakerholic@gmail.com";
                           
                           mail($email,$subject,$msg,$from);
                           
                           echo "<script>alert('Your Message has been sent sucessfully!')</script>";
                           
                       }
                       
                       ?>
       				</div>
       				<div class="col-lg-4 offset-md-1">
       					<div class="contact_details">
       						<div class="contact_d_item">
       							<h3>Address :</h3>
        						<p>Kuching Town <br />Jalan Kuching, Kuching, <br/>Sarawak, 
        						93000, Malaysia</p>
       						</div>
       						<div class="contact_d_item">
       							<h5>Phone : <a href="tel:60123870153">(+60) 12 387 0153</a></h5>
       							<h5>Email : <a href="mailto:cakerholic.my@gmail.com">cakerholic.my@gmail.com</a></h5>
       						</div>
       						<div class="contact_d_item">
       							<h3>Contacting Hours :</h3>
       							<p>8:00 AM – 5:00 PM</p>
       							<p>Monday – Sunday</p>
       						</div>
       						<div class="contact_d_item">
       							<h3>Social Networks :</h3>
        						<ul class="nav" id="social-links">
        							<li><a href="https://www.facebook.com/felicia.wong.925" style="display: inline-block;text-align: center; margin-right: 10px; height: 36px; width: 36px; border-radius: 50%; color: black; border: 1px solid #7b7b7c; font-size: 16.92px; line-height: 35px; -webkit-transition: all 400ms linear 0s; -o-transition: all 400ms linear 0s; transition: all 400ms linear 0s;"><i class="fa fa-facebook"></i></a></li>
        							<li><a href="https://www.instagram.com/caker_holic/" style=" margin-right: 10px;display: inline-block;text-align: center; height: 36px; width: 36px; border-radius: 50%; color: black; border: 1px solid #7b7b7c; font-size: 16.92px; line-height: 35px; -webkit-transition: all 400ms linear 0s; -o-transition: all 400ms linear 0s; transition: all 400ms linear 0s;"><i class="fa fa-instagram"></i></a></li>
        							<li><a href="https://wa.me/15551234567" style=" margin-right: 10px;display: inline-block;text-align: center; height: 36px; width: 36px; border-radius: 50%; color: black; border: 1px solid #7b7b7c; font-size: 16.92px; line-height: 35px; -webkit-transition: all 400ms linear 0s; -o-transition: all 400ms linear 0s; transition: all 400ms linear 0s;"><i class="fa fa-whatsapp"></i></a></li>
        						</ul>
       						</div> 
       					</div>
       				</div>
       			</div>
        	</div>
        </section>
        <!--================End Contact Form Area =================-->
        
        <!--================End Banner Area =================-->
        <section class="map_area">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.3418458858296!2d110.3449217145799!3d1.5587893613031494!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31fba7eeee090c89%3A0xaf8e0d947607a536!2sKuching%20Waterfront!5e0!3m2!1sen!2smy!4v1588178318266!5m2!1sen!2smy" width="100%" height="550" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </section>
        <!--================End Banner Area =================-->
        
        <!--================Search Box Area =================-->
        <div class="search_area zoom-anim-dialog mfp-hide" id="test-search">
            <div class="search_box_inner">
                <h3>Search</h3>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><i class="icon icon-Search"></i></button>
                    </span>
                </div>
            </div>
        </div>
        <!--================End Search Box Area =================-->

<?php

     // including the footer section 
     include 'include/footer.php'; 

?>
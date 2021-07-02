<?php


session_start();
include("include/db.php");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Caker Holic Administrator </title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Caker Holic Administrator Login</h3></div>
                                    <div class="card-body">
                                       
                                        <form action="" method="post">
                                           
                                            <div class="form-group">
                                            
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                
                                                <input name="admin_email" class="form-control py-4" id="inputEmailAddress" type="text" placeholder="Enter email address" required>
                                            
                                            </div>
                                            
                                            <div class="form-group">
                                            
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input name="admin_password" class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" required>
                                                
                                            </div>
                                            
                                            
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            
                                            <button type="submit" class="btn btn-lg btn-primary btn-block" name="admin_login">Login</button>
                                            
                                            </div>
                                            
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted" style=" margin: 0px auto;">Caker Holic Admin Section</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>


<?php

    if(isset($_POST['admin_login'])){
        
        $admin_email = mysqli_real_escape_string($con,$_POST['admin_email']);
        
        $admin_password = mysqli_real_escape_string($con,$_POST['admin_password']);
        
        $get_admin = "select * from admin where admin_email='$admin_email' AND admin_password='$admin_password'";
        
        $run_admin = mysqli_query($con,$get_admin);
        
        $count = mysqli_num_rows($run_admin);
        
        if($count==1){
            
            $_SESSION['admin_email']=$admin_email;
            
            echo "<script>alert('Logged In. Welcome Back!')</script>";
            
            echo "<script>window.open('index.php','_self')</script>";
            
        }else{
            
            echo "<script>alert('Invalid Email or Password Entered! Please Try Again!')</script>";
            
        }     
        
    }

?>

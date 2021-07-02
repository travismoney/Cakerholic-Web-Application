<?php

session_start();
session_destroy();

    echo "<script>window.open('admin-login.php','_self')</script>";

?>
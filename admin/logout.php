<?php 

include 'config.php';

session_start();

session_unset();

session_destroy();

 header('Location://localhost/news_project/admin/');
                             

 ?>

<?php 
if(!empty($_SESSION['user'])){
    // block authenticated user
    header('location:index.php');die;
}

// allow guest user
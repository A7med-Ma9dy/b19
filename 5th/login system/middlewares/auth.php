<?php
if(empty($_SESSION['user'])){
    // block guest user
    header('location:login.php');die;
}

// allow authenticated user
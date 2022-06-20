<?php
if(empty($_SESSION['user'])){
    # Guest
    header('location:login.php');die;
}
<?php
if(!empty($_SESSION['user'])){
    # Auth
    header('location:index.php');die;
}
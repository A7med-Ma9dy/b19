<?php
session_start();
include "middlewares/auth.php";

unset($_SESSION['user']);
header('location:login.php');
<?php
// namespace 
// virtual directory => organize application files
// allow same name of classes to be used for more than once
include_once "classes/users/auth/login.php";
include_once "classes/admins/auth/login.php";
use classes\users\auth\login;
use classes\admins\auth\login AS adminLogin;

new login;
new login;
new login;

new adminLogin;
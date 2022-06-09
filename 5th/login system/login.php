<?php

$title = "Login";
include "layouts/header.php";
include "middlewares/guest.php";
include "layouts/navbar.php";

$users = [
    [
        'id'=>1,
        'name'=>'esraa',
        'email'=>'esraa@gmail.com',
        'password'=>123456,
        'gender'=>'f',
        'image'=>'1.jpg'
    ],
    [
        'id'=>2,
        'name'=>'fatma',
        'email'=>'fatma@gmail.com',
        'password'=>123456,
        'gender'=>'f',
        'image'=>'2.jpg'
    ],
    [
        'id'=>2,
        'name'=>'ahmed',
        'email'=>'ahmed@gmail.com',
        'password'=>123456,
        'gender'=>'m',
        'image'=>'3.jpg'
    ]
];
$errors = [];
if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST){
    if(empty($_POST['email'])){
        $errors['email'] = "<div class='text-danger font-weight-bold'> Email Is Required </div>";
    }
    if(empty($_POST['password'])){
        $errors['password'] = "<div class='text-danger font-weight-bold'> Password Is Required </div>";
    }

    if(empty($errors)){
        // no valdidation error
        // login
        foreach($users AS $user){
            if($user['email'] == $_POST['email'] && $user['password'] == $_POST['password']){
                // correct user
                $_SESSION['user'] = $user;
                header('location:index.php');die;
            }
        }
        $errors['email-password'] = "<div class='text-danger font-weight-bold'> Wrong Email Or Password </div>";
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mt-5 text-dark h1">
                University
            </h1>
        </div>
        <div class="col-4 offset-4">
            <form action="" method="post">
                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="email" name="email" id="Email" value="<?= $_POST['email'] ?? "" ?>" class="form-control"  aria-describedby="helpId" >
                    <?= $errors['email'] ?? "" ?>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control"  aria-describedby="helpId" >
                    <?= $errors['password'] ?? "" ?>
                    <?=  $errors['email-password'] ?? "" ?>
                </div>
                <div class="form-group">
                    <button class="btn btn-outline-dark btn-lg form-control"> Login </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php 
include "layouts/footer.php";
include "layouts/footer-scripts.php";
?>



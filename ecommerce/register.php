<?php
$title = "Register ";
include_once "layouts/header.php";
include_once "layouts/navbar.php";
include_once "layouts/breadcrumb.php";
use App\Http\Requests\Validation;
$validation = new Validation;

if($_SERVER['REQUEST_METHOD'] == "POST"){
    # validation
    $validation->setValueName('first_name')->setValue($_POST['first_name'])->required( )->max(32);
    $validation->setValueName('last_name')->setValue($_POST['last_name'])->required( )->max(32);
    $validation->setValueName('email')->setValue($_POST['email'])->required( )->regex('//')->unique('users','email');
    $validation->setValueName('phone')->setValue($_POST['phone'])->required( )->regex('//')->unique('users','phone');
    $validation->setValueName('password')->setValue($_POST['password'])->required( )->regex('//')->confirmed($_POST['password_confirmation']);
    $validation->setValueName('password_confirmation')->setValue($_POST['password_confirmation'])->required();
    $validation->setValueName('gender')->setValue($_POST['gender'])->required( )->in(['m','f']);
    if(empty($validation->getErrors())){
        # insert user into DB
    }
}
?>
<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg2">
                            <h4> register </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg2" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="" method="post">
                                        <input type="text" name="first_name" placeholder="Fisrt Name">
                                        <?= $validation->getError('first_name') ?>
                                        <input type="text" name="last_name" placeholder="Last Name">
                                        <?= $validation->getError('last_name') ?>
                                        <input name="email" placeholder="Email" type="email">
                                        <?= $validation->getError('email') ?>
                                        <input name="phone" placeholder="Phone" type="number">
                                        <?= $validation->getError('phone') ?>
                                        <input type="password" name="password" placeholder="Password">
                                        <?= $validation->getError('password') ?>
                                        <input type="password" name="password_confirmation" placeholder="Password Confirmation">
                                        <?= $validation->getError('password_confirmation') ?>
                                        <select name="gender" id="" class="form-control">
                                            <option value="m">Male</option>
                                            <option value="f">Female</option>
                                        </select>
                                        <?= $validation->getError('gender') ?>
                                        <div class="button-box mt-5">
                                            <button type="submit"><span>Register</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
include_once "layouts/footer.php";
include_once "layouts/footer-scripts.php";
?>

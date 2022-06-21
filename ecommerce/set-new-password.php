<?php

use App\Database\Models\User;
use App\Http\Requests\Validation;

$title = "Set New Password";
include_once "layouts/header.php";
include_once "App/Http/Middlewares/Guest.php";


$validation = new Validation;
$validation->validUrlEmail($_GET);

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $validation->setValueName('password')->setValue($_POST['password'])
    ->required()->regex('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,32}$/','Minimum eight and maximum 32 characters, at least one uppercase letter, one lowercase letter, one number and one special character')->confirmed($_POST['password_confirmation']);
    $validation->setValueName('password_confirmation')->setValue($_POST['password_confirmation'])
    ->required();
    if(empty($validation->getErrors())){
        // check if code is correct
        $user = new User;
        $user->setEmail($_GET['email'])->setPassword($_POST['password']);
        if($user->updatePassword()){
            header('location:login.php');die;
        }else{
            $error = "<p class='text-danger font-weight-bold'>* Something Went Wrong </p>";
        }
    }
}

?>
<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4> <?= $title ?> </h4>
                        </a>
                        
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <?= $success ?? "" ?>
                                    <form action="" method="post">
                                        <input type="password" name="password" placeholder="New Password">
                                        <?= $validation->getError('password') ?>
                                        <input type="password" name="password_confirmation" placeholder="Password Confirmation">
                                        <?= $validation->getError('password_confirmation') ?>
                                        <?= $error ?? "" ?>
                                        <div class="button-box">
                                            <button type="submit"><span>Change Password</span></button>
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
include_once "layouts/footer-scripts.php";
?>

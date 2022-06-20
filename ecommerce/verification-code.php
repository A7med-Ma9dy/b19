<?php

use App\Database\Models\User;
use App\Http\Requests\Validation;

$title = "Verification Code";
include_once "layouts/header.php";
include_once "App/Http/Middlewares/Guest.php";

if($_GET){
    if(isset($_GET['email'])){
        $validation = new Validation;
        $validation->setValueName('email')->setValue($_GET['email'])->required()->regex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/')->exists('users','email');
        if(!empty($validation->getErrors())){
            include "layouts/errors/404.php";die;
        }
    }else{
        include "layouts/errors/404.php";die;
    }
}else{
    include "layouts/errors/404.php";die;
}
$validation = new Validation;

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $validation->setValueName('verification_code')->setValue($_POST['verification_code'])
    ->required()->integer()->digits(6)->exists('users','verification_code');
    if(empty($validation->getErrors())){
        // check if code is correct
        $user = new User;
        $user->setEmail($_GET['email'])->setVerification_code($_POST['verification_code']);
        if($user->checkUserCode()->get_result()->num_rows == 1){
            date_default_timezone_set('Africa/Cairo');
            $user->setEmail_verified_at(date('Y-m-d H:i:s'));
            if($user->makeUserVerified()){
                $success = "<p class='alert alert-success text-center'>* Correct Code </p>";
                header("refresh:3;url=login.php");
            }else{
                $error = "<p class='text-danger font-weight-bold'>* Something Went Wrong </p>";
            }
        }else{
            $error = "<p class='text-danger font-weight-bold'>* Wrong Code </p>";
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
                                        <input type="number" name="verification_code" placeholder="Verification Code">
                                        <?= $validation->getError('verification_code') ?>
                                        <?= $error ?? "" ?>
                                        <div class="button-box">
                                            <button type="submit"><span>Verify Code</span></button>
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

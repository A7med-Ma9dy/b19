<?php

use App\Mails\Mailer;
use App\Database\Models\User;
use App\Http\Requests\Validation;

$title = "Verify Email";
include_once "layouts/header.php";
include_once "App/Http/Middlewares/Guest.php";

$validation = new Validation;

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $validation->setValueName('email')->setValue($_POST['email'])
    ->required()->regex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/')->exists('users','email');
    if(empty($validation->getErrors())){
        $code = rand(10000,99999); // 5 digits
        $user = new User;
        $user->setEmail($_POST['email'])->setVerification_code($code);
        if($user->updateCode()){
            $subject = "Forget Password Code";
            $body = "<p> Hello {$_POST['email']} .</p><p> Your OTP :<b>{$code}</b> </p><p> Thank You.</p>";
            $verificationCode = new Mailer($_POST['email'],$subject,$body);
            if($verificationCode->send()){
                header('location:verification-code.php?email='.$_POST['email']);die;
            }else{
                $error = "<div class='alert alert-danger'> Try Agian Later </div>";
            }
            header('location:verification-code.php?email='.$_POST['email']);die;
        }else{
            $error = "<div class='alert alert-danger'> Something Went Wrong </div>";
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
                                        <input type="email" name="email" placeholder="Email">
                                        <?= $validation->getError('email') ?>
                                        <?= $error ?? "" ?>
                                        <div class="button-box">
                                            <button type="submit"><span>Verify Email Address</span></button>
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

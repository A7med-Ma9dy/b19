<?php

use App\Database\Models\User;
use App\Http\Requests\Validation;

$title = "Login";
include_once "layouts/header.php";
include_once "App/Http/Middlewares/Guest.php";
include_once "layouts/navbar.php";
include_once "layouts/breadcrumb.php";
$validation = new Validation;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $validation->setValueName('email')->setValue($_POST['email'])->required()->regex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/')->exists('users','email');
    $validation->setValueName('password')->setValue($_POST['password'])->required()->regex('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,32}$/');
    if(empty($validation->getErrors())){
        $userData = new User;
        $userData->setEmail($_POST['email']);
        $user = $userData->getUserByEmail()->get_result()->fetch_object();
        if(password_verify($_POST['password'],$user->password)){
            if(!is_null($user->email_verified_at)){
                if(isset($_POST['remember_me'])){
                    setcookie('remember_me',$_POST['email'],time()+(84600 * 365),'/');
                }
                # LOGIN
                $_SESSION['user'] = $user;
                header('location:index.php');die;
            }else{
                header('location:verification-code.php?email='.$_POST['email']);die;
            }
        }else{
            $error = "<div class='alert alert-danger text-center'> Wrong Email Or Password </div>";
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
                            <h4> login </h4>
                        </a>
                        
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <?= $error ?? "" ?>
                                    <form action="" method="post">
                                        <input type="email" name="email" placeholder="Email Address">
                                        <?= $validation->getError('email') ?>
                                        <input type="password" name="password" placeholder="Password">
                                        <?= $validation->getError('password') ?>
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <input type="checkbox" name="remember_me">
                                                <label>Remember me</label>
                                                <a href="verify-email.php">Forgot Password?</a>
                                            </div>
                                            <button type="submit"><span>Login</span></button>
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

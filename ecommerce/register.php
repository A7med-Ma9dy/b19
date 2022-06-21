<?php
$title = "Register ";
include_once "layouts/header.php";
include_once "App/Http/Middlewares/Guest.php";
include_once "layouts/navbar.php";
include_once "layouts/breadcrumb.php";
use App\Mails\Mailer;
use App\Database\Models\User;
use App\Http\Requests\Validation;

$validation = new Validation;

if($_SERVER['REQUEST_METHOD'] == "POST"){
    # validation
    $validation->setValueName('first_name')->setValue($_POST['first_name'])->required( );
    $validation->setValueName('last_name')->setValue($_POST['last_name'])->required( );
    $validation->setValueName('email')->setValue($_POST['email'])->required( )->regex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/')->unique('users','email');
    $validation->setValueName('phone')->setValue($_POST['phone'])->required( )->regex('/^01[0125][0-9]{8}$/')->unique('users','phone');
    $validation->setValueName('password')->setValue($_POST['password'])->required( )->regex('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,32}$/','Minimum eight and maximum 32 characters, at least one uppercase letter, one lowercase letter, one number and one special character')->confirmed($_POST['password_confirmation']);
    $validation->setValueName('password_confirmation')->setValue($_POST['password_confirmation'])->required();
    $validation->setValueName('gender')->setValue($_POST['gender'])->required( )->in(['m','f']);
    if(empty($validation->getErrors())){
        # generate verification code
        $code = rand(100000,999999); // 6 digits
        # insert user into DB
        $user = new User;
        $user->setFirst_name($_POST['first_name'])->setLast_name($_POST['last_name'])
        ->setEmail($_POST['email'])->setPhone($_POST['phone'])->setPassword($_POST['password'])
        ->setGender($_POST['gender'])->setVerification_code($code);
        if($user->create()){
            $subject = "Verification Code";
            $body = "<p> Hello {$_POST['first_name']} .</p><p> Your Verification Code :<b>{$code}</b> </p><p> Thank You.</p>";
            $verificationCode = new Mailer($_POST['email'],$subject,$body);
            if($verificationCode->send()){
                // redirect to verification code page
                header('location:verification-code.php?email='.$_POST['email']);die;
            }else{
                $error = "<div class='alert alert-danger'> Try Agian Later </div>";
            }
        }else{
            $error = "<div class='alert alert-danger'> Registeration Failed </div>";
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
                        <a class="active" data-toggle="tab" href="#lg2">
                            <h4> register </h4>
                        </a>
                        
                    </div>
                    <div class="tab-content">
                        <div id="lg2" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                <?= $error ?? "" ?>
                                    <form action="" method="post">
                                        <input type="text" name="first_name" value="<?= $_POST['first_name'] ?? "" ?>" placeholder="Fisrt Name">
                                        <?= $validation->getError('first_name') ?>
                                        <input type="text" name="last_name" value="<?= $_POST['last_name'] ?? "" ?>" placeholder="Last Name">
                                        <?= $validation->getError('last_name') ?>
                                        <input name="email" placeholder="Email" value="<?= $_POST['email'] ?? "" ?>" type="email">
                                        <?= $validation->getError('email') ?>
                                        <input name="phone" placeholder="Phone" value="<?= $_POST['phone'] ?? "" ?>" type="number">
                                        <?= $validation->getError('phone') ?>
                                        <input type="password" name="password" placeholder="Password">
                                        <!-- <small><b>Password@123456</b></small> -->
                                        <?= $validation->getError('password') ?>
                                        <input type="password" name="password_confirmation" placeholder="Password Confirmation">
                                        <?= $validation->getError('password_confirmation') ?>
                                        <select name="gender" id="" class="form-control">
                                            <option <?= (isset($_POST['gender']) && $_POST['gender'] == 'm') ? "selected" : "" ?> value="m">Male</option>
                                            <option <?= (isset($_POST['gender']) && $_POST['gender'] == 'f') ? "selected" : "" ?> value="f">Female</option>
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

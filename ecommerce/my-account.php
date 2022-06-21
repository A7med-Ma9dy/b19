<?php 
$title = "My Account";
include_once "layouts/header.php";
include_once "App/Http/Middlewares/Auth.php";
include_once "layouts/navbar.php";
include_once "layouts/breadcrumb.php";

use App\Services\Media;
use App\Database\Models\User;
use App\Http\Requests\Validation;

$validation = new Validation;
$media = new Media;

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update-profile'])){
    $validation->setValueName('first_name')->setValue($_POST['first_name'])->required( );
    $validation->setValueName('last_name')->setValue($_POST['last_name'])->required( );
    $validation->setValueName('gender')->setValue($_POST['gender'])->required( )->in(['m','f']);
    if(empty($validation->getErrors())){
        $userObject = new User;
        $userObject->setFirst_name($_POST['first_name'])->setLast_name($_POST['last_name'])
        ->setGender($_POST['gender'])->setEmail($_SESSION['user']->email);
        if($_FILES['image']['error'] == 0){
            $media->setFile($_FILES['image'])->size(10**6)->extension(['png','jpg','jpeg']);
            if(empty($media->getErrors())){
                $media->upload('assets/img/users/');
                if($_SESSION['user']->image != 'default.jpg'){
                    Media::delete('assets/img/users/'.$_SESSION['user']->image);
                }
                $userObject->setImage($media->newFileName);
                $_SESSION['user']->image = $media->newFileName;
                
            }
        }
        if(empty($media->getErrors())){
            if($userObject->update()){
                $_SESSION['user']->first_name = $_POST['first_name'];
                $_SESSION['user']->last_name = $_POST['last_name'];
                $_SESSION['user']->gender = $_POST['gender'];
                
                $success = "<div class='alert alert-success text-center'> Profile Updated Successfully </div>";
            }else{
                $error = "<div class='alert alert-danger text-center'> Something Went Wrong </div>";
            }
        }   
    }
}
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update-password'])){

}
?>
    <!-- my account start -->
    <div class="checkout-area pb-80 pt-100">
        <div class="container">
            <div class="row">
                <div class="ml-auto mr-auto col-lg-9">
                    <div class="checkout-wrapper">
                        <div id="faq" class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">Edit your account information </a></h5>
                                </div>
                                <div id="my-account-1" class="panel-collapse collapse <?= isset($_POST['update-profile']) ? 'show' : '' ?>">  <!-- show -->
                                    <div class="panel-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                        <div class="billing-information-wrapper">
                                            <div class="account-info-wrapper">
                                                <h4>My Account Information</h4>
                                                <h5>Your Personal Details</h5>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <?= $error ?? "" ?>
                                                    <?= $success ?? "" ?>
                                                    <?= $media->getError('size') ?>
                                                    <?= $media->getError('extension') ?>
                                                </div>
                                                <div class="col-lg-12 col-md-6">
                                                    <div class="row">
                                                        <div class="col-4 offset-4 my-5">
                                                            <label for="file">
                                                                <img style="cursor: pointer;" id="image" src="assets/img/users/<?= $_SESSION['user']->image ?>" class="w-100 rounded-circle" alt="">
                                                            </label>
                                                            <input type="file" onchange="loadFile(event)" name="image" id="file" class="d-none">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>First Name</label>
                                                        <input type="text" name="first_name" value="<?= $_SESSION['user']->first_name ?>">
                                                        <?= $validation->getError('first_name') ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Last Name</label>
                                                        <input type="text"  name="last_name" value="<?= $_SESSION['user']->last_name ?>">
                                                        <?= $validation->getError('last_name') ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Gender</label>
                                                        <select class="form-control" name="gender" id="">
                                                            <option <?= $_SESSION['user']->gender == 'm' ? 'selected' : '' ?> value="m">Male</option>
                                                            <option <?= $_SESSION['user']->gender == 'f' ? 'selected' : '' ?> value="f">Female</option>
                                                        </select>
                                                        <?= $validation->getError('gender') ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="billing-back-btn">
                                               
                                                <div class="billing-btn">
                                                    <button type="submit" name="update-profile">Update Profile</button>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title"><span>2</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-2">Change your password </a></h5>
                                </div>
                                <div id="my-account-2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="billing-information-wrapper">
                                            <div class="account-info-wrapper">
                                                <h4>Change Password</h4>
                                                <h5>Your Password</h5>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Password</label>
                                                        <input type="password">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Password Confirm</label>
                                                        <input type="password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="billing-back-btn">
                                                <div class="billing-back">
                                                    <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                                </div>
                                                <div class="billing-btn">
                                                    <button type="submit">Continue</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    var loadFile = function(event) {
        var output = document.getElementById('image');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
    <!-- my account end -->
<?php 

include_once "layouts/footer.php";
include_once "layouts/footer-scripts.php"

?>
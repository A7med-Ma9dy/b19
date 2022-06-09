<?php
$title = "Home";
include "layouts/header.php";
include "middlewares/auth.php";
$errors = [];
if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST){
    if(empty($_POST['email'])){
        $errors['email'] = "<div class='text-danger font-weight-bold'> Email Is Required </div>";
    }
    if(empty($_POST['name'])){
        $errors['name'] = "<div class='text-danger font-weight-bold'> Name Is Required </div>";
    }
    if(empty($_POST['gender'])){
        $errors['gender'] = "<div class='text-danger font-weight-bold'> Gender Is Required </div>";
    }

    if(empty($errors)){
        // no validation errors
        $_SESSION['user']['name'] = $_POST['name'];
        $_SESSION['user']['email'] = $_POST['email'];
        $_SESSION['user']['gender'] = $_POST['gender'];
        $success = "<div class='text-center alert alert-success'> Profile Updated Successfully </div>";
    }
}
include "layouts/navbar.php";

?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mt-5 text-dark h1">
                My Account
            </h1>
            <?= $success ?? "" ?>
        </div>
        <div class="col-6 offset-3 my-5">
            <form  method="post">
                <div class="form-group">
                   <img src="images/<?= $_SESSION['user']['image'] ?>" alt="<?= $_SESSION['user']['name'] ?>" class="rounded-circle w-100">
                </div>
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" name="name" value="<?= $_SESSION['user']['name'] ?>" id="Name" class="form-control" placeholder="" aria-describedby="helpId">
                    <?=  $errors['name'] ?? "" ?>
                </div>
                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="text" name="email" id="Email" value="<?= $_SESSION['user']['email'] ?>" class="form-control" placeholder="" aria-describedby="helpId">
                    <?=  $errors['email'] ?? "" ?>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" class="form-control" id="gender">
                        <option <?= $_SESSION['user']['gender'] == 'm' ? 'selected' : '' ?> value="m">Male</option>
                        <option <?= $_SESSION['user']['gender'] == 'f' ? 'selected' : '' ?> value="f">Female</option>
                    </select>
                    <?=  $errors['gender'] ?? "" ?>
                </div>
                <div class="form-group">
                    <button class="btn btn-outline-dark btn-lg form-control"> Update </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include "layouts/footer.php";
include "layouts/footer-scripts.php";
?>
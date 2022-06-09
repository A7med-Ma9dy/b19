<?php
$title = "Home";
include "layouts/header.php";
include "middlewares/auth.php";
include "layouts/navbar.php";
?>
<div class="container">
    <div class="row">
    <div class="col-12">
            <h1 class="text-center mt-5 text-dark h1">
                Degrees
            </h1>
        </div>
        <div class="col-12 mt-5">
            <table class="table table-dark table-striped ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include "layouts/footer.php";
include "layouts/footer-scripts.php";
?>
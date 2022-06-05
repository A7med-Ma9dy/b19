<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "hello" ?></title>
    <style>
        h1{
            color:<?php echo "blue" ?>;
        }
    </style>
</head>
<body>
    <h1>Hello <?php echo "world"; ?></h1>
    <select name="" id="">
        <option value="">male</option>
        <option <?php echo "selected" ?> value="">female</option>
    </select>
    <script>

        // alert('ok');
    </script>
</body>
</html>
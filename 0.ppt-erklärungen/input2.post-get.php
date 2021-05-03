<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example</title>
</head>
<body>

<!-- POST REQUEST -->

    <form action="" method="post">
        <input type="text" name="something1" id="something1">
        <input type="submit" value="submit">
    </form>

<!-- GET REQUEST -->

    <form action="" method="get">
        <input type="text" name="something2" id="something2">
        <input type="submit" value="submit">
    </form>

</body>
</html>

<?php
    $something1 = $_POST['something1'];
    echo "Text: " . $something1;

    $something2 = $_GET['something2'];
    echo "Text: " . $something2;
?>
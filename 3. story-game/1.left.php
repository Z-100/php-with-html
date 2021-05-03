<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yeet</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h1>Story-Game</h1>
    <nav id=indexNav>
        <?php require_once("../navbar.php"); ?>
    </nav>

    <div id="indexMain">
        <p>
            You see a cactus in the endless seeming desert<br>
            Do you want to eat it?<br>
        </p>
        <form action="" method="post" id="indexForm">
            <input type="submit" name="option1" value="Eat cactus">
            <input type="submit" name="option2" value="Don't eat cactus">
        </form>
    </div>
    
    <?php
        $option1 = isset($_POST['option1']);
        $option2 = isset($_POST['option2']);

        if ($option1) {
            header("Location: 2.eat.php");
        } elseif ($option2) {
            header("Location: 2.noteat.php");
        } else {
            echo "<p>No path chosen</p>";
        }
    ?>
</body>
</html>
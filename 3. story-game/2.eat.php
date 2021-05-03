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
            Congrats! You didn't starve do death!<br>
            But you will die anyways...<br>
            In about 2-3hours the poison will kill you.
        </p>
        <form action="" method="post" id="indexForm">
            <input type="submit" name="option1" value="Play again!">
            <input type="submit" name="option2" value="Return to main menu">
        </form>
    </div>
    
    <?php
        $option1 = isset($_POST['option1']);
        $option2 = isset($_POST['option2']);

        if ($option1) {
            header("Location: 0.story-game.php");
        } elseif ($option2) {
            header("Location: ../2. html-php-form/index.php");
        }
    ?>
</body>
</html>
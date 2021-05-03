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
            Great. You found a river!<br>
            But the water isn't clean!<br>
            Drink the water, jump across the river, drown yourself, go back<br>
        </p>
        <form action="" method="post" id="indexForm">
            <input type="submit" name="option1" value="drink">
            <input type="submit" name="option2" value="jump">           
            <input type="submit" name="option3" value="drown">
            <input type="submit" name="option4" value="Go back">
        </form>
    </div>
    
    <?php
        $options = isset($_POST);

        switch ($options) {
            case isset($_POST['option1']):
                header("Location: 3.drink.php");
                break;
            case isset($_POST['option2']):
                header("Location: 3.drown.php");
                break;
            case isset($_POST['option3']):
                header("Location: 3.jump.php");
                break;
            case isset($_POST['option4']):
                header("Location: 3.goback.php");
                break;
            default:
                break;
        }
    ?>
</body>
</html>
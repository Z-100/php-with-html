<?php
    $firstname = $_POST['firstname'];   //Declare Variables here to prevent Errors
    $lastname = $_POST['lastname'];     //Show errors to audience
    $email = $_POST['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yeet</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Marvin</h1>
    <nav id=indexNav>
        <ul>
            <li><th><a href="#">Projekt 1:<br>HTML Repetition</a></th></li>
            <li><th><a href="#">Projekt 2:<br>Story-Game</a></th></li>
            <li><th><a href="#">Projekt 3:<br>Wer wird Millionär?</a></th></li>
        </ul>
    </nav>

    <div id="indexMain">
        <form action="" method="post" id="indexForm"> <!-- Optional: Change to recieve.php -->
            <label for="firstname">Vorname: </label>
            <input type="text" id="firstname" name="firstname" placeholder="Max">

            <label for="lastname">Nachname: </label>
            <input type="text" id="lastname" name="lastname" placeholder="Mustermann">

            <label for="email">E-Mail: </label>
            <input type="text" id="email" name="email" placeholder="some@name.com">

            <input type="submit" value="submit">
        </form>

        <div id="mid">
            <h3><?php echo "Vorname:    " . $firstname; ?></h3>
            <h3><?php echo "Nachname:   " . $lastname; ?></h3>
            <h3><?php echo "Email:      " . $email; ?></h3>
        </div>
    </div>
</body>
</html>
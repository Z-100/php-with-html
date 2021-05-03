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
    <h1>Index: PHP form</h1>
    <nav id=indexNav>
        <?php require_once("../navbar.php"); ?>
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
            <?php
                $firstname = isset($_POST['firstname']);
                $lastname = isset($_POST['lastname']);
                $email = isset($_POST['email']);
            ?>
            
            <h3><?php echo "Vorname:    " . $firstname; ?></h3>
            <h3><?php echo "Nachname:   " . $lastname; ?></h3>
            <h3><?php echo "Email:      " . $email; ?></h3>
        </div>
    </div>
</body>
</html>
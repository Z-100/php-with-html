<?php

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    echo "<p>Vorname: " . $firstname . "</p>";
    echo "<p>Nachname: " . $lastname . "</p>";
    echo "<p>E-Mail: " . $email . "</p>";
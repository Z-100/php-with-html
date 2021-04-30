<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../classes/head.php"); ?>
    <title>Z-i-fy - Search</title>
    <link rel="stylesheet" href="../css/searchfield.css"> <!-- MAKE SOME OMTIMIZING SHIT RIGHT HERE-->
</head>
<body>
    <nav id = left>
        <div id="top">
            <img src="../img/z-i-fy_trans.png" alt="logo" id="logo"">
        </div>

        <div id="nav-mid">
            <?php require_once("../classes/links.php"); ?>       
        </div>

        <div id="playlist">
            <?php require_once("../classes/playlists.php"); ?>
        </div>
    </nav>

    <div id=main>
        <div id="top">
            <div id="userField">
                <?php require_once("../classes/userField.php"); ?>
            </div>
        </div>

        <div id="songList"> <!--DO SOME CSS SHIT THIERRY-->
            <?php
                require_once "config.php";
                $sql = "SELECT songs.id, songs.title, albums.name, artists.band, songs.duration 
                        FROM songs
                            JOIN albums ON albums.id = songs.albums_id
                            JOIN songs_artists ON songs.id = songs_artists.songs_id
                            JOIN artists ON artists.id = songs_artists.artists_id";

                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                        echo "<div id=searchfieldList>";
                            echo "<table class=styled-table>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th id=count>#</th>";
                                        echo "<th id=title>TITLE</th>";
                                        echo "<th id=album>ALBUM</th>";
                                        echo "<th id=artist>ARTIST</th>";
                                        echo "<th id=duration>DURATION</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                
                                echo "<tbody>";
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                            echo "<td id=count>" . $row['id'] . "</td>";
                                            echo "<td id=title>" . $row['title'] . "</td>";
                                            echo "<td id=album>" . $row['name'] . "</td>";
                                            echo "<td id=artist>" . $row['band'] . "</td>";
                                            echo "<td id=duration>" . $row['duration'] . "</td>";
                                            echo "</td>";
                                        echo "</tr>";
                                    }
                                echo "</tbody>";
                            echo "</table>";
                        echo "</div>";
                        $result->free();
                    } else {
                        echo "<p class='lead'><em>No songs added</em></p>";
                    }
                $conn->close();
            ?>
        </div>
        
    </div>

    <div id="player">
        <?php require_once("../classes/player.php"); ?>
    </div>
</body>
</html>
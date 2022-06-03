<!DOCTYPE html>
<html>

<head>
    <link type="text/css" rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $dbh = new PDO("mysql:host=localhost;dbname=cinema", "root", "Gaetan521*");
    echo ($_GET["film"]);
    ?>
    <form method="get">
        <p>Recherche : </p>
        <input type="text" name="film">
        <input type="submit">
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
            </tr>
        </thead>
        <tbody>
            <?php

            if(isset($GET['film']) && $_Get['film'] !=""){
            foreach ($dbh->query("SELECT * FROM movie WHERE `title` LIKE '%" . $_GET["film"] . "%'") as $row) {
                echo "<tr> <th>" . $row["id"] . "<th><th>" . $row["title"] . "</th>";
            }
            }
            ?>
            <?php
            foreach ($dbh->query("SELECT * FROM movie INNER JOIN movie_genre ON movie_genre.id_movie = movie.id where movie_genre.id_genre =" .$_GET["genre"] ) as $row) {
                echo "<th>" . $row["id"] . "<th><th>" . $row["title"] . "</th></tr>";
            }
            ?>
            <?php
            // foreach ($dbh->query("SELECT * FROM `distributor`  WHERE distributor.name LIKE  '%" . $_GET["distributor"] . "%'") as $row) {
            //     echo "<th>" . $row["id"] . "<th><th>" . $row["name"] . "</th></tr>";
            // }
            ?>
            <select name="genre" id="genre-select">
                <?php
                foreach($genre_query = $dbh->query('SELECT id, name FROM genre') as $row) {
                    echo "<option value=\"" . $row["id"] . "\">".$row["name"]."</option>";
                }
                ?>
            </form>
</select>
        </tbody>
    </table>
</body>

</html>

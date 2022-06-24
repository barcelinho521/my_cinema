<!DOCTYPE html>
<html>

<head>
    <link type="text/css" rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $dbh = new PDO("mysql:host=localhost;dbname=cinema", "root", "Gaetan521*");
    ?>
    <form method="get">
        <p>Recherche : </p>
        <input type="text" name="film" value="<?php echo ($_GET["film"]);?>">
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
            if(isset($_GET['film']) && $_GET['film'] !="" && $_GET['genre'] == 0){
            foreach ($dbh->query("SELECT * FROM movie WHERE `title` LIKE '%" . $_GET["film"] . "%'") as $row) {
                echo "<tr> <th>" . $row["id"] . "<th><th>" . $row["title"] . "</th>";
            }
            }
            else if(isset($_GET['film']) && $_GET['film'] !="" && $_GET['genre'] != 0){
                foreach ($dbh->query("SELECT * FROM movie INNER JOIN movie_genre ON movie_genre.id_movie = movie.id WHERE `title` LIKE '%" . $_GET["film"] . "%' AND movie_genre.id_genre =" .$_GET["genre"] ) as $row) {
                    echo "<tr> <th>" . $row["id"] . "<th><th>" . $row["title"] . "</th>";
                }
            }
            else {
            foreach ($dbh->query("SELECT * FROM movie INNER JOIN movie_genre ON movie_genre.id_movie = movie.id where movie_genre.id_genre =" .$_GET["genre"] ) as $row) {
                echo "<th>" . $row["id"] . "<th><th>" . $row["title"] . "</th></tr>";
            }
        }
            ?>
            <?php
            // foreach ($dbh->query("SELECT * FROM `distributor`  WHERE distributor.name LIKE  '%" . $_GET["distributor"] . "%'") as $row) {
            //     echo "<th>" . $row["id"] . "<th><th>" . $row["name"] . "</th></tr>";
            // }
            ?>
            <select name="genre" id="genre-select" >
                <?php
                echo "<option value=\"0\">All</option>";
                foreach($genre_query = $dbh->query('SELECT id, name FROM genre') as $row)
                 {
                    if ($row["id"] == $_GET['genre'])
                    echo "<option value=\"" . $row["id"] . "\" selected>".$row["name"]."</option>";
                    else
                    echo "<option value=\"" . $row["id"] . "\">".$row["name"]."</option>";
                }
                ?>
            </form>
</select>
        </tbody>
    </table>
</body>

</html>

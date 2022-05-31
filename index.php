<!DOCTYPE html>
<html>

<head>
    <link type="text/css" rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $dbh = new PDO("mysql:host=localhost;dbname=cinema", "root", "Gaetan52");
    echo ($_GET["film"]);
    ?>
    <form method="get">
        <p>Recherche : </p>
        <input type="text" name="film">
        <input type="submit">
    </form>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($dbh->query("SELECT * FROM movie WHERE `title` LIKE '%" . $_GET["film"] . "%'") as $row) {
                echo "<tr> <th>" . $row["id"] . "<th><th>" . $row["title"] . "</th></tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>
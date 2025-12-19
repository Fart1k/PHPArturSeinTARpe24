<?php
require('config.php');

global $yhendus;

$kask = $yhendus->prepare("SELECT id, Images FROM tooted");
$kask->bind_result($id, $image);
$kask->execute();
?>
<!DOCTYPE html>
<html lang="et">
<head>
    <title>Fotod lehel</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav>
    <li><a href="firmaLeht.php">Avaleht</a></li>
    <li><a href="firmaTooted.php">Tooted</a></li>
    <li><a href="muutmine.php">Admin vaade</a></li>
    <li><a href="firmaGalerii.php"></a></li>
</nav>
<div id="menyykiht">
    <h2>Fotod</h2>
    <ul>
        <?php
        while ($kask->fetch()) {
            echo "<li><img src='$image' alt='Pilt' width='400px' height='400px'></li>";
        }
        ?>
    </ul>
</div>
<div id="jalusekiht">
    Artur Šein
</div>
</body>
</html>
<?php
$yhendus->close();
?>

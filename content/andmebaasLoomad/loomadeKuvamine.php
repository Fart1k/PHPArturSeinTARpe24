<?php
require ('conf.php');
// tabelist kustutamine
global $yhendus;
if(isset($_REQUEST['kustuta'])) {
    $kask = $yhendus -> prepare("delete from loomad where LoomId = ?");
    $kask -> bind_param("i", $_REQUEST['kustuta']);
    $kask -> execute();
}

?>

<!DOCTYPE html>
<html lang = "et">

<head>
    <title>Loomad SQL andmebaasist</title>
    <link rel="stylesheet" href="andmebaasStyle.css">
    <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
<h1>Loomade tabeli sisu</h1>
<table>
    <tr>
        <td>Loomanimi</td>
        <td>Kaal</td>
        <td>Värv</td>
    </tr>

<?php
global $yhendus;
$kask = $yhendus -> prepare("Select LoomId, LoomaNimi, Kaal, Varv from loomad");
$kask -> bind_result($loomid, $loomanimi, $kaal, $varv);
$kask -> execute();

while($kask -> fetch()){
    echo "<tr>";
    echo "<td bgcolor='$varv'>".$loomanimi."</td>";
    echo "<td>".$kaal."</td>";
    echo "<td>".$varv."</td>";
    echo "<td><a href='?kustuta=$loomid'>Kustuta</td>";
    echo "</tr>";
}
?>
</table>
<a href="loomaLisamine.php">Lisa loom</a>
</body>
</html>

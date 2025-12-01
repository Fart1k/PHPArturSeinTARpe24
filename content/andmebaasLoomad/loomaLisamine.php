<?php
require('conf.php');
// lisamine
global $yhendus;
if (isset($_REQUEST["loomanimi"], $_REQUEST["kaal"], $_REQUEST["varv"]) && $_REQUEST["loomanimi"] !== 0) {
    $kask = $yhendus -> prepare("insert into loomad (loomanimi, kaal, varv) values(?, ?, ?)");
    $kask -> bind_param('sis', $_REQUEST["loomanimi"], $_REQUEST["kaal"], $_REQUEST["varv"]);
// i - integer, s - string
    $kask -> execute();
    header("Location:loomadeKuvamine.php");
}
?>
<!DOCTYPE html>
<html lang="et">
<head>
    <title>Looma lisamine SQL tabeli sisse</title>
    <link rel="stylesheet" href="andmebaasStyle.css">
</head>
<body>
<h1>Looma lisamine</h1>
<form action="" name="loom">
<table>
        <tr>
            <td>
                <label for="loomanimi">Sisesta looma nimi</label>
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="loomanimi" id="loomanimi">
            </td>
        </tr>
        <tr>
            <td>
                <label for="kaal">Sisesta looma kaal</label>
            </td>
        </tr>
        <tr>
           <td>
               <input type="number" name="kaal" id="kaal">
           </td>
        </tr>
        <tr>
           <td>
               <label for="varv">Sisesta looma värv</label>
           </td>
        </tr>
        <tr>
           <td>
               <input type="color" name="varv" id="varv">
           </td>
        </tr>
        <tr>
           <td>
               <input type="submit" value="Lisa">
           </td>
        </tr>
</table>
</form>
</body>
</html>


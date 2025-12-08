<?php
$servername = "localhost";
$kasutajaname = "artursein";
$parool = "12345";
$andmebaasinimi = $kasutajaname;

$yhendus = new mysqli($servername, $kasutajaname, $parool, $andmebaasinimi);
$yhendus->set_charset("utf8");
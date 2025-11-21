<?php

echo "<h2>Tekstfunktsioonid</h2>";
$tekst = "Veebirakendus on arvutitarkvara programm";
echo $tekst; // Näitab muutuja sisu
echo "<br>";

echo "<h3>Teksti pikkus</h3>";
echo "Mitu SÕNU on lauses - <strong>str_word_count()</strong>: ".str_word_count($tekst). "tk";
echo "<br>";

echo "Loeb kokku MÄRKIDE arvu tekstis - <strong>strlen()</strong>: ".strlen($tekst);
// metshein.com --> PHP alused

echo "<h3>Teksti vormindamine</h3>";
echo "Kõik tähed muudab väiksemaks - <strong>strtolower</strong>: ".strtolower($tekst);
echo '<br>';

echo "Kõik tähed muudab suuremaks - <strong>strtoupper</strong>: ".strtoupper($tekst);
echo '<br>';

echo "Muudab teksti kõige esimese märgi suureks - <strong>ucfirst()</strong>:".ucfirst($tekst);
echo '<br>';

echo "Muudab iga sõna esimese tähe suureks - <strong>ucwords()</strong>:".ucwords($tekst);
echo '<br>';

echo "<h3>Teksti kärpimine</h3>";

$tekst2 = ' 	A woman should soften but not weaken a man   ';
echo "Näide: <pre>$tekst2</pre>";
echo "Eemaldab tühikud tekstist - <strong>trim(): </strong><pre>".trim($tekst2)."</pre>";
echo "Eemaldab tühikud teksti eest - <strong>ltrim(): </strong><pre>".ltrim($tekst2)."</pre>";
echo "Eemaldab tühikud pärast teksti - <strong>rtrim(): </strong><pre>".rtrim($tekst2)."</pre>";

echo "<h2>Tekst kui massiiv</h2>";
echo "Esimene sõna tekstist - <strong>muutuja[0]</strong>: $tekst[0]";
echo '<br>';
echo "Viies sõna tekstist - <strong>muutuja[4]</strong>: $tekst[4]";
echo '<br>';

echo "Võtab tekstist 6 tähte alates esimest kuni kuueni - <strong>substr(muutuja, 0, 5)</strong>: ".substr($tekst, 0, 5);
echo '<br>';
echo "Võtab tekstist 23 tähte alates viiest kuni -13, kui on negatiivsed arvud, hakkatakse lugema paremast - <strong>substr(muutuja, 4, -13)</strong>: ".substr($tekst, 4, -13);

echo '<br>';
print_r(str_word_count($tekst, 1)); //Array ( [0] => Veebirakendus [1] => on [2] => arvutitarkvara [3] => programm )
echo '<br>';
$sona = str_word_count($tekst, 1);
echo "Võtab 3 sõna massiivist - <strong>sona[2]</strong>: ".$sona[2];
echo '<br>';

echo "<h3>Teksti asendamine</h3>";
$asendus = 'tarkvara';
$otsitav_algus = 17;
$otsitav_pikkus = 30;
echo "Asendab märgid 17-30 tekstis - <strong>substr_replace(muutuja, asendussõna, algus, lõpp)</strong>: ".substr_replace($tekst, $asendus, $otsitav_algus, $otsitav_pikkus);

echo '<br>';
$otsi = array('on', 'programm');
$asenda = array('---', 'software');
echo "Asendab sõnad tekstis - <strong>str.replace(sõna, asendussõna, muutuja)</strong>: ".str_replace($otsi, $asenda, $tekst);

echo "<h2>MÕISTATUS - ARVA ÄRA EESTI LINNAKIRI</h2>";
// eesmärk on ära arvata, millist Eesti linna on kirjeldatud
// Kirjuta abiks 5-6 tekstipõhist, "funktsiooni ehk vihjet
// mis aitavad samm-sammult lähemale jõuda õigele linnanimele
$linn = "Jõhvi";

echo "Selles sõnas on ".mb_strlen($linn). " tähte";
echo '<br>';
echo "Esimene täht - $linn[0]";
echo '<br>';
?>
<form action="tekstifuntksioonid.php" method="post">
    <label for="linn">Sisesta linn</label>
    <input type="text" id="linn" name="linn">
    <input type="submit" value="Kontrolli">
</form>
<?php
if(isset($_REQUEST["linn"]))
{
    if($_REQUEST["linn"] == "Jõhvi")
    {
        echo $_REQUEST["linn"]. " - Õige";
    }
    else
    {
        echo $_REQUEST["linn"]. " - Vale";
    }
}
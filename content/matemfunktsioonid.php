<?php

function clearVarsExcept($url, $varname){
    $url = basename($url);
    if (str_starts_with($url, "?")){
        return "?$varname=".$_REQUEST[$varname];
    }

    return strtok($url, "?")."?$varname=".$_REQUEST[$varname];
}

echo "<h2>Matemaatilised tehted/funktsioonid</h2>";
$arv1 = 10;
$arv2 = 15;
$liitmine = $arv1 + $arv2;
$lahut = $arv1 - $arv2;
$korrutis = $arv1 * $arv2;
$jagamine = $arv1 / $arv2;
echo "arv1 on ".$arv1." ja arv2 on ".$arv2."<br>";
echo "Liitmine: ".$liitmine."<br>";
echo "Lahutamine: ".$lahut."<br>";
echo "Korrutamine: ".$korrutis."<br>";
echo "Jagamine: ".$jagamine."<br>";
echo "Omistamise operaatorid: ";
// $arv1++ - suurendamine ühe võrra $arv1=$arv1+1
$arv1++;
echo $arv1."- suurendamine ühe võrra";
echo "<br>";
// $arv1-- - vähendamine ühe võrra $arv1=$arv1-1
$arv1--;
echo $arv1."- vähendamine ühe võrra";
echo "<br>";
echo "<strong>Ruutjuur -sqrt()</strong> = ".sqrt($arv1);
echo "<br>";
$massiiv = array(11,21,32,43,54);
echo "Massiiv - (11,21,32,43,54)";
echo "<br>";
echo "Väikseim arv - ".min($massiiv);
echo "<br>";
echo "Suurim arv - ".max($massiiv);
echo "<br>";
echo "Juhusliku arvu genereerimine: ".rand();
echo "<br>";
echo "Protsendi leidmine arvust arv1:";
echo "<br>";
echo "20 protsenti arvust arv1 ($arv1): ".($arv1 * 20) / 100;
echo "<br>";
echo "<strong>Arvmõistatus. Arva ära kaks arvu vahemikus 0...10</strong>";
$salaarv1 = 5;
$salaarv2 = 4;
// kirjuta matemaatilise tehtega või funktsioonide abil 5 vihjet
echo "<ol><li>Kui esimene arv korrutada 5, siis tuleb: ".($salaarv1*5)."</li>";
echo "<li>Kui esimesele arvule liita sama arv, siis tuleb: ".($salaarv1+$salaarv1)."</li>";
echo "<li>Kui esimesele arvule liita 17, lahutada 8, siis tuleb: ".($salaarv1+17-8)."</li>";
echo "<li>Kui teine arv korrutada 3, lahutada 2 siis tuleb: ".($salaarv2*3-2)."</li>";
echo "<li>Kui teine arv ruutu võtta siis tuleb: ".($salaarv2*$salaarv2)."</li>";
echo "<li>Teise arvu ruutjuur on: ".sqrt($salaarv2)."</li>";
echo "</ol>";
?>
    <form action="<?=clearVarsExcept($_SERVER['REQUEST_URI'], "leht")?>" method="post">
        <label for="arv1">Arv1: </label>
        <input type="text" id="arv1" name="arv1" min="0" max="10" step="1">
        <br>
        <label for="arv2">Arv2: </label>
        <input type="text" id="arv2" name="arv2" min="0" max="10" step="1">
        <input type="submit" value="Kontrolli">
    </form>

<?php
if (isset($_REQUEST["arv1"])) {
    if ($_REQUEST["arv1"] == $salaarv1) {
        echo "<div id='correct'>";
        echo "arv1: ".$_REQUEST["arv1"]." on õige";
        echo "</div>";
    }
    else {
        echo "<div id='incorrect'>";
        echo "arv1: ".$_REQUEST["arv1"]." on vale";
        echo "</div>";
    }
}
if (isset($_REQUEST["arv2"])) {
    if ($_REQUEST["arv2"] == $salaarv2) {
        echo "<div id='correct'>";
        echo "arv2: ".$_REQUEST["arv2"] . " on õige";
        echo "</div>";
    } else {
        echo "<div id='incorrect'>";
        echo "arv2: ".$_REQUEST["arv2"] . " on vale";
        echo "</div>";
    }
}
?>
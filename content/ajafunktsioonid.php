<div class="flex-container">
    <div>
        <?php
        echo "<h2>Ajafunktsioonid</h2>";
        echo "Tänane kuupäev ".date("d.m.Y");
        // timezone - juhul kui timezone ei ole määratud, siis PHP kasutab aega,
        // mis on localhost'is.
        date_default_timezone_set("Europe/Tallinn");
        echo "<br>";
        echo "<a href='http://www.php.net/manuaal/en/timezones.europe.php'>timezone</a>";
        echo "<br>";

        echo "time() - aeg sekundis ".time();
        echo "<br>";
        echo "date() - ".date("d.m.Y G:i:s", time());
        echo "<pre>
        date('d.m.Y G:i:s', time())
        d - 01...31
        m - 1...12
        Y - neljakohane arv
        G - 24h formaat
        i - minutit 0...59
        s - sekundid 0...59
        </pre>";
        ?>
    </div>

    <div>
        <?php
        echo "<br>";
        echo "<h2>Tehted kuupäevaga</h2>";

        echo "<br>";
        echo "+1min = time() + 60 - ".date("d.m.Y G:i:s", time()+60);

        echo "<br>";
        echo "+1tund = time() + 60*60 - ".date("d.m.Y G:i:s", time()+60*60);

        echo "<br>";
        echo "+1päev = time() + 60*60*24 - ".date("d.m.Y G:i:s", time()+60*60*24);
        ?>
    </div>

    <div>
    <?php
    echo "<br>";
    echo "<h2>Kuupäeva genereerimine</h2>";

    echo "<br>";
    echo "mktime(tunnid, minutid, sekundid, kuu, päev, aasta): ";
    $synnipaev = mktime(12, 34, 23, 2, 8, 2008);
    echo "Minu sünnipäev - ".date("d.m.Y G:i:s", $synnipaev);

    echo "<br>";
    echo "Massiivi (array) abil kuvada tänane kuu nimetus: ";
    $kuud = array
    (1=>"Jaanuar", "Veebruar", "Märts", "April",
        "Mai", "Juuni", "Juuli", "August", "September",
        "Oktober", "November", "December"
    );
    $paev = date('d');
    $aasta = date("Y");
    $kuu = $kuud[date('m')]; // kuu nimega
    echo "Tänane kuupäev kuu nimega - ".$paev.".".$kuu." ".$aasta;

    //ise kirjuta oma sünnipäeva kuu nimega
    echo "<br>";
    $sPaev = 8;
    $sAasta = 2008;
    $sKuu = $kuud[2];
    echo "Minu sünnipäev - ".$sPaev.".".$sKuu." ".$sAasta;
    ?>
    </div>
</div>
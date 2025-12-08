<?php
require('config.php');

global $yhendus;

// Uue teate lisamine
if (isset($_REQUEST["uusleht"])) {
    if (!empty (trim($_REQUEST["toode"]))) {
        $kask = $yhendus->prepare("INSERT INTO tooted (Toode, Kirjeldus, Hind, Muu) VALUES (?, ?, ?, ?)");
        $kask->bind_param("ssis", $_REQUEST["toode"], $_REQUEST["kirjeldus"], $_REQUEST["hind"], $_REQUEST["muu"]);
        $kask->execute();
        header("Location: ".$_SERVER["PHP_SELF"]);
        $yhendus->close();
        exit();
    }
}

// Teate kustutamine
if (isset($_REQUEST["kustutusid"])) {
    $kask = $yhendus->prepare("DELETE FROM tooted WHERE id=?");
    $kask->bind_param("i", $_REQUEST["kustutusid"]);
    $kask->execute();
}

// Teate muutmine
if (isset($_REQUEST["muutmisid"])) {
    $kask = $yhendus->prepare("UPDATE tooted SET Toode=?, Kirjeldus=?, Hind=?, Muu=? WHERE id=?");
    $kask->bind_param(
        "ssssi",
        $_REQUEST["toode"],
        $_REQUEST["kirjeldus"],
        $_REQUEST["hind"],
        $_REQUEST["muu"],
        $_REQUEST["muutmisid"]
    );
    $kask->execute();
}
?>
    <!DOCTYPE html>
    <html lang="et">
    <head>
        <title>Teated lehel</title>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <link rel="stylesheet" href="style.css">
        <style type="text/css">
            #menyykiht {
                float: left;
                padding-right: 30px;
            }
            #sisukiht {
                float: left;
            }
            #jalusekiht {
                clear: left;
                margin-top: 20px;
                font-size: 0.9em;
                color: #666;
            }
        </style>
    </head>
    <body>
    <nav>
        <li><a href="firmaLeht.php">Avaleht</a></li>
        <li><a href="firmaTooted.php">Tooted</a></li>
        <li><a href="muutmine.php">Admin vaade</a></li>
    </nav>
    <div id="menyykiht">
        <h2>Teated</h2>
        <ul>
            <?php
            // Loendi kuvamine
            $kask = $yhendus->prepare(
                "SELECT id, Toode FROM tooted"
            );
            $kask->bind_result($id, $toode);
            $kask->execute();
            while ($kask->fetch()) {
                echo "<li><a href='".$_SERVER["PHP_SELF"].
                    "?id=$id'>".htmlspecialchars($toode)."</a></li>";
            }
            ?>
        </ul>
    </div>

    <div id="sisukiht">
        <?php
        // Ühe teate kuvamine või muutmine
        if (isset($_REQUEST["id"])) {
            $kask = $yhendus->prepare("SELECT id, Toode, Kirjeldus, Hind, Muu FROM tooted WHERE id=?");
            $kask->bind_param("i", $_REQUEST["id"]);
            $kask->bind_result($id, $Toode, $Kirjeldus, $Hind, $Muu);
            $kask->execute();

            if ($kask->fetch()) {
                if (isset($_REQUEST["muutmine"])) {
                    echo "
                   <form action='".$_SERVER["PHP_SELF"]."'>
                     <input type='hidden' name='muutmisid' value='$id'/>
                     <h2>Teate muutmine</h2>
                     <dl>
                       <dt><label for='toode'>Toode: </label></dt>
                       <dd>
                         <input type='text' name='toode' value='' id = 'toode' />".
                        htmlspecialchars($toode)."'/>
                       </dd>
                       <dt><label for='kirjeldus'>Teate Kirjeldus: </label></dt>
                       <dd>
                         <textarea rows='20' cols='30' name='kirjeldus' id='kirjeldus'>".
                        htmlspecialchars($Kirjeldus)."</textarea>
                       </dd>
                       
                       <dt><label for='hind'>Hind: </label></dt>
                       <dd>
                         <input type='number' name='hind' value='' id = 'hind' />".
                        htmlspecialchars($Hind)."'/>
                       </dd>
                       
                       
                       <dt><label for='muu'>Muu: </label></dt>
                       <dd>
                         <input type='text' name='muu' value='' id = 'muu' />".
                        htmlspecialchars($Muu)."'/>
                       </dd>
                       
                     </dl>                      
                     <input type='submit' value='Muuda' />
                   </form>
                ";
                } else {
                    echo "<h2>".htmlspecialchars($Toode)."</h2>";
                    echo htmlspecialchars($Kirjeldus);
                    echo "<br>";
                    echo "Hind: ", htmlspecialchars($Hind), " Euro" ;
                    echo "<br>";
                    echo "Muu: ", htmlspecialchars($Muu);
                }
            }
        }
        ?>
    </div>

    <div id="jalusekiht">
        Artur Šein
    </div>
    </body>
    </html>
<?php
$yhendus->close();
?>
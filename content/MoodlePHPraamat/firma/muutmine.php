<?php
 require('config.php');

 global $yhendus;

  // Uue teate lisamine
  if (isset($_REQUEST["uusleht"])) {
      if (!empty (trim($_REQUEST["toode"]))) {
        $kask = $yhendus->prepare("INSERT INTO tooted (Toode, Kirjeldus, Hind, Muu, Images) VALUES (?, ?, ?, ?, ?)");
        $kask->bind_param("ssiss", $_REQUEST["toode"], $_REQUEST["kirjeldus"], $_REQUEST["hind"], $_REQUEST["muu"], $_REQUEST["image"]);
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
    $kask = $yhendus->prepare("UPDATE tooted SET Toode=?, Kirjeldus=?, Hind=?, Muu=?, Images=? WHERE id=?");
    $kask->bind_param(
      "sssssi",
      $_REQUEST["toode"],
      $_REQUEST["kirjeldus"],
      $_REQUEST["hind"],
      $_REQUEST["muu"],
      $_REQUEST["image"],
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
  </head>
  <body>
  <nav>
      <li><a href="firmaLeht.php">Avaleht</a></li>
      <li><a href="firmaTooted.php">Tooted</a></li>
      <li><a href="muutmine.php">Admin vaade</a></li>
      <li><a href="firmaGalerii.php">Galerii</a></li>
  </nav>
    <div id="menyykiht">
        <h2>Teated</h2>
        <ul>
          <?php
            // Loendi kuvamine
            $kask = $yhendus->prepare(
                "SELECT id, Toode, Hind FROM tooted"
            );
            $kask->bind_result($id, $Toode, $Hind);
            $kask->execute();
            while ($kask->fetch()) {
                echo "<li><a href='".$_SERVER["PHP_SELF"].
                    "?id=$id'>".htmlspecialchars($Toode) . " - " . htmlspecialchars($Hind) . "€</a></li>";
            }
            ?>
        </ul>
        <a href="<?=$_SERVER['PHP_SELF']?>?lisamine=jah">Lisa ...</a>
    </div>

    <div id="sisukiht">
       <?php
         // Ühe teate kuvamine või muutmine
         if (isset($_REQUEST["id"])) {
            $kask = $yhendus->prepare("SELECT id, Toode, Kirjeldus, Hind, Muu, Images FROM tooted WHERE id=?");
            $kask->bind_param("i", $_REQUEST["id"]);
            $kask->bind_result($id, $Toode, $Kirjeldus, $Hind, $Muu, $Image);
            $kask->execute();

            if ($kask->fetch()) {
             if (isset($_REQUEST["muutmine"])) {
                 ?>
                 <form action="<?= $_SERVER["PHP_SELF"] ?>">
                     <input type="hidden" name="muutmisid" value="<?= $id ?>"/>
                     <h2>Teate muutmine</h2>

                     <dl>
                         <dt><label for="toode">Toode: </label></dt>
                         <dd>
                             <input type="text" name="toode" id="toode"
                                    value="<?= htmlspecialchars($Toode) ?>">
                         </dd>

                         <dt><label for="kirjeldus">Teate Kirjeldus: </label></dt>
                         <dd>
                            <textarea rows="20" cols="30" name="kirjeldus" id="kirjeldus">
                                <?= htmlspecialchars($Kirjeldus) ?>
                            </textarea>
                         </dd>

                         <dt><label for="hind">Hind: </label></dt>
                         <dd>
                             <input type="number" name="hind" id="hind"
                                    value="<?= htmlspecialchars($Hind) ?>">
                         </dd>

                         <dt><label for="muu">Muu: </label></dt>
                         <dd>
                             <input type="text" name="muu" id="muu"
                                    value="<?= htmlspecialchars($Muu) ?>">
                         </dd>

                         <dt><label for="image">Pilt: </label></dt>
                         <dd>
                             <textarea name="image" id="image" cols="30" rows="20">
                                 <?= htmlspecialchars($Image) ?>
                             </textarea>
                         </dd>
                     </dl>

                     <input type="submit" value="Muuda"/>
                 </form>
                 <?php

             }
             else
             {
              echo "<h2>".htmlspecialchars($Toode)."</h2>";
              echo htmlspecialchars($Kirjeldus);
              echo "<br>";
              echo "Hind: ", htmlspecialchars($Hind), " Euro";
              echo "<br>";
              echo "Muu: ", htmlspecialchars($Muu);
              echo "<br>";
              echo "Pilt: ", "<img src='$Image' alt='Pilt' width='400px' height='400px'>";

              echo "<br /><a href='".$_SERVER["PHP_SELF"].
                   "?kustutusid=$id'>kustuta</a> ";
              echo "<a href='".$_SERVER["PHP_SELF"].
                   "?id=$id&amp;muutmine=jah'>muuda</a>";
             }
            }
            else
            {
              echo "Vigased andmed.";
            }
         }

         // Uue teate lisamise vorm
         if (isset($_REQUEST["lisamine"])) {
           ?>
             <form action="<?=$_SERVER["PHP_SELF"]?>">
              <input type="hidden" name="uusleht" value="jah" />
              <h2>Uue teate lisamine</h2>
              <dl>
                <dt><label for="toode">Toode:</label></dt>
                <dd>
                 <input type="text" name="toode" id="toode"/>
                </dd>
                  <dt><label for="kirjeldus">Toode kirjeldus</label></dt>
                <dd>
                  <textarea rows="20" cols="30" name="kirjeldus" id="kirjeldus"></textarea>
                </dd>

                  <dt><label for="hind">Hind: </label></dt>
                  <dd>
                      <input type="number" name="hind" id="hind"/>
                  </dd>

                  <dt><label for="muu">Muu: </label></dt>
                  <dd>
                      <input type="text" name="muu" id="muu"/>
                  </dd>
                  
                  <dt><label for="image">Pilt: </label></dt>
                  <dd>
                      <textarea name="image" id="image" cols="30" rows="5"></textarea>
                  </dd>

               </dl>
               <input type="submit" value="Sisesta" />
             </form>
           <?php
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


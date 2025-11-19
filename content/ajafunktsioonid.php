<?php
echo "<h1>Ajafunktsioonid</h1>";
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

echo "<br>";
echo "+1min = time() + 60 - ".date("d.m.Y G:i:s", time()+60);

echo "<br>";
echo "+1tund = time() + 60*60 - ".date("d.m.Y G:i:s", time()+60*60);

echo "<br>";
echo "+1päev = time() + 60*60*24 - ".date("d.m.Y G:i:s", time()+60*60*24);



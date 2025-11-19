<h1>Joonistamine JS-ga</h1>
<canvas id="tahvel" width="300" height="250"></canvas>
<br>
<input type="button" value="Sirge" onclick="sirgeJoon()">
<input type="button" value="Kolmnurk" onclick="kolmnurk()">
<input type="button" value="Ring" onclick="ring()">
<input type="button" value="Ristkülik" onclick="ristkulik()">
<input type="button" value="Puhasta" onclick="puhasta()">
<br>
<label for="raadius">R:</label>
<input type="number" id="raadius" min="0" max="30" value="20" onchange="ring()">
<label for="laius">Laius:</label>
<input type="number" id="laius" min="10" max="150" value="20" onchange="ristkulik()">
<label for="korgus">Kõrgus:</label>
<input type="number" id="korgus" min="10" max="70" value="20" onchange="ristkulik()">
<br>
<input type="button" value="picsum pilt" onclick="pilt()">
<br></br>
<input type="button" value="Seisa" onclick="valgusFoor(value)">
<input type="button" value="Oota" onclick="valgusFoor(value)">
<input type="button" value="Mine" onclick="valgusFoor(value)">

<br>
<!-- Lipude joonistamine -->
<h1>Lippude joonistamine</h1>
<canvas id="lippTahvel" width="330" height="210"></canvas>
<br>
<input type="button" value="Eesti lipp" onclick="eestiLipp()">
<input type="button" value="Jamaica lipp" onclick="jamaicaLipp()">
<input type="button" value="Prantsusmaa lipp" onclick="prantsusmaaLipp()">
<input type="button" value="Kõrgõzstan lipp" onclick="korgozstanLipp()">

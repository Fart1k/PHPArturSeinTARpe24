<?php
echo "<h2>GIT CMD käsurida</h2>";
echo "<ol>";
echo "<li>git init - uus repo </li>";
?>
<li> Nimi ja konto esimene konfigureerimine
    <pre>
    git config --global user.name "Irina Merkulova"

    git config --global user.email "irina.merkulova@gmail.com"

    git config --global --list
    </pre>
</li>
<li>
//ssh võti loomine
    <pre>
     ssh-keygen -o -t rsa -C "irina.merkulova@gmail.com"
    </pre>

    <br>võti salvestatakse opilane/.ssh kausta
    <br>id_rsa.pub tuleb kopeeerida oma git hub -reposse nagu Deploy key
</li>
<li>
    lisa jälgimisele ja commit'i loomine -<br>
    git add .<br>
    git commit -a -m "on loodud phpIndex"
</li>
 <li>
     git remote remove origin
 </li>
 <li>
     git remote add origin git@github.com:IrinaMerkulova/phpIndexTarpe24.git
     <br>git branch -M main
     <br>git push -u origin main";
 </li>
</ol>

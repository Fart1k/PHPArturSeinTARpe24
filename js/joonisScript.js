// sirge joon
function sirgeJoon()
{
    const tahvel = document.getElementById('tahvel');
    if (!tahvel.getContext) return;
    let t = tahvel.getContext('2d'); // anname tahvlinimi on t
    // joon
    t.beginPath();
    t.strokeStyle = "black";
    t.lineWidth = 1;
    t.moveTo(51, 0); // alguspunkt
    t.lineTo(51, 150) // lأµpp-punkt
    t.stroke();
    t.moveTo(150, 0); // alguspunkt
    t.lineTo(150, 50) // lأµpp-punkt
    t.stroke();
    t.moveTo(249, 0); // alguspunkt
    t.lineTo(249, 150) // lأµpp-punkt
    t.stroke();
}

function kolmnurk()
{
    const tahvel = document.getElementById('tahvel');
    if (!tahvel.getContext) return;
    let t = tahvel.getContext('2d');
    //kolmurk
    t.beginPath();
    t.strokeStyle = "black";
    t.fillStyle = "black";
    t.lineWidth = 1;
    t.moveTo(50, 150);
    t.lineTo(150, 50);
    t.lineTo(250, 150);
    t.lineTo(50, 150);
    t.stroke();
    t.fill();
}

function puhasta()
{
    const tahvel = document.getElementById('tahvel');
    if (!tahvel.getContext) return;
    let t = tahvel.getContext('2d');
    t.clearRect(0, 0, 400, 350) // puhastan terve ekraani
}

function ring()
{
    const tahvel = document.getElementById('tahvel');
    let r = document.getElementById('raadius').value;

    if (!tahvel.getContext) return;
    let t = tahvel.getContext('2d');
    // أ¼mberjoon
    t.beginPath();
    t.strokeStyle = "white";
    t.fillStyle = "white";
    t.arc(150, (120), r, 0, 2*Math.PI, false) // x, y, R
    t.stroke();
    // tأ¤ida ring
    t.fill();
}

function ristkulik()
{
    const tahvel = document.getElementById('tahvel');
    let a = document.getElementById('laius');
    let b = document.getElementById('korgus');
    if (!tahvel.getContext) return;
    let t = tahvel.getContext('2d');
    t.fillStyle = "black";
    t.fillRect(50, 150, a.value, b.value)
}

function pilt()
{
    const tahvel = document.getElementById('tahvel');
    if (!tahvel.getContext) return;
    let t = tahvel.getContext('2d');

    const fail = new Image();
    fail.src = "https://picsum.photos/200/300?random=1";
    fail.onload = function () {
        t.drawImage(fail, 0, 0, 300,250);
    }

}
function eestiLipp()
{
    const lipp = document.getElementById('lippTahvel');
    puhasta2()
    if (lipp.getContext)
    {
        let t = lipp.getContext('2d');
        t.clearRect(0, 0, 330, 210);
        t.beginPath();
        t.fillStyle = "lightblue";
        t.fillRect(0, 0, 330, 70);
        t.fillStyle = "black";
        t.fillRect(0, 70, 330, 70);
        t.fillStyle = "white";
        t.fillRect(0, 140, 330, 70);
        t.stroke();

    }
}

function jamaicaLipp()
{
    const lipp = document.getElementById('lippTahvel');
    puhasta2()
    if (lipp.getContext)
    {
        let t = lipp.getContext('2d');
        t.clearRect(0, 0, 330, 210);
        t.beginPath();
        t.fillStyle = "yellow";
        t.fillRect(0, 0, 330, 210)
        t.stroke();

        t.beginPath();
        t.moveTo(0, 10);
        t.lineTo(135, 105);
        t.lineTo(0, 200);
        t.lineTo(0, 10)
        t.stroke();
        t.fillStyle = "black";
        t.fill();

        t.beginPath();
        t.moveTo(330, 10);
        t.lineTo(195, 105);
        t.lineTo(330, 200);
        t.lineTo(330, 10);

        t.stroke();
        t.fillStyle = "black";
        t.fill()

        t.beginPath();
        t.moveTo(30, 0);
        t.lineTo(165, 95);
        t.lineTo(300, 0);
        t.lineTo(30, 0);
        t.stroke();
        t.fillStyle = "green";
        t.fill();

        t.beginPath();
        t.moveTo(30, 210);
        t.lineTo(165, 125);
        t.lineTo(300, 210);
        t.lineTo(30, 210);
        t.stroke();

        t.fillStyle = "green";
        t.fill();
        t.stroke();
    }
}

function prantsusmaaLipp()
{

    const lipp = document.getElementById('lippTahvel');
    puhasta2()
    if (lipp.getContext)
    {
        let t = lipp.getContext('2d');
        t.clearRect(0, 0, 330, 210);
        t.beginPath();
        t.fillStyle = "darkblue";
        t.fillRect(0, 0, 110, 210);
        t.fillStyle = "white";
        t.fillRect(110, 0, 110, 210);
        t.fillStyle = "red";
        t.fillRect(220, 0, 110, 210);
        t.stroke();
    }
}

/* Iseseisvalt
*  1. lisada veel أ¼ks lipp kus olemas vapp vأµi mingi logo lipu peal
*  tahvel canvas peal joonistada valgusfoori (kolm nupu - Mine, oota, peatu)
*
*  */
function korgozstanLipp()
{
    const lipp = document.getElementById('lippTahvel');
    puhasta2()
    if (lipp.getContext)
    {

        let t = lipp.getContext('2d');
        t.clearRect(0, 0, 330, 210);
        t.fillStyle = "red";
        t.fillRect(0, 0, 330, 210);

        const vapp = new Image(50, 50);
        vapp.src = "images/korgostan.png";
        vapp.onload = () => {
            t.drawImage(vapp, (330 / 2 - 25), (210 / 2 - 25),50,50);
        }


    }

}

function valgusFoor(value)
{

    const tahvel = document.getElementById('tahvel');
    // let seisa = document.getElementById('seisa');
    console.log(value);
    if (tahvel.getContext) {
        let t = tahvel.getContext('2d');
        t.clearRect(0, 0, 300, 250);
        if (value === "Seisa") {
            t.lineWidth = 5;
            t.beginPath();
            t.arc(150, 50, 30, 0, 2 * Math.PI, false) // x, y, R
            t.fillStyle = "black";
            t.stroke();
            t.fillStyle = "red";
            t.stroke();
            t.fill();

            t.beginPath();
            t.arc(150, 120, 30, 0, 2 * Math.PI, false) // x, y, R
            t.fillStyle = "black";
            t.stroke();
            t.fillStyle = "gray";
            t.stroke();
            t.fill();

            t.beginPath();
            t.arc(150, 190, 30, 0, 2 * Math.PI, false) // x, y, R
            t.fillStyle = "black";
            t.stroke();
            t.fillStyle = "gray";
            t.stroke();
            t.fill();


        }

        if (value === "Oota") {

            t.lineWidth = 5;
            t.beginPath();
            t.arc(150, 50, 30, 0, 2 * Math.PI, false) // x, y, R
            t.fillStyle = "black";
            t.stroke();
            t.fillStyle = "gray";
            t.stroke();
            t.fill();

            t.beginPath();
            t.arc(150, 120, 30, 0, 2 * Math.PI, false) // x, y, R
            t.fillStyle = "black";
            t.stroke();
            t.fillStyle = "yellow";
            t.stroke();
            t.fill();

            t.beginPath();
            t.arc(150, 190, 30, 0, 2 * Math.PI, false) // x, y, R
            t.fillStyle = "black";
            t.stroke();
            t.fillStyle = "gray";
            t.stroke();
            t.fill();

        }
        if (value === "Mine") {

            t.lineWidth = 5;
            t.beginPath();
            t.arc(150, 50, 30, 0, 2 * Math.PI, false) // x, y, R
            t.fillStyle = "black";
            t.stroke();
            t.fillStyle = "gray";
            t.stroke();
            t.fill();

            t.beginPath();
            t.arc(150, 120, 30, 0, 2 * Math.PI, false) // x, y, R
            t.fillStyle = "black";
            t.stroke();
            t.fillStyle = "gray";
            t.stroke();
            t.fill();

            t.beginPath();
            t.arc(150, 190, 30, 0, 2 * Math.PI, false) // x, y, R
            t.fillStyle = "black";
            t.stroke();
            t.fillStyle = "limegreen";
            t.stroke();
            t.fill();


        }
    }
}

function puhasta2()
{
    const tahvel = document.getElementById('lippTahvel');
    if (!tahvel.getContext) return;
    let t = tahvel.getContext('2d');
    t.clearRect(0, 0, 330, 210); // puhastan terve ekraani
    t.fillStyle = "lightpink";
    t.fillRect(0, 0, 330, 210); // puhastan terve ekraani
}
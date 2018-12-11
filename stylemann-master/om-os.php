<!DOCTYPE html>
<html lang="da">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/om-os.css">
    <title>Om Stylemann</title>
</head>

<body>
 <?php include "head.html"; ?>
    <main>
        <section class="page-container">
        </section>
    </main>
    <?php include "footer.html"; ?>
    <template id="om-os">
        <div class="container1">
            <div id="overskrift1"></div>
            <div id="undertitel1"></div>
            <div id="tekstfelt1"></div>
            <div id="tekstfelt2"></div>
            <div class="billede1"><img id="billede1" alt="" src=""></div>
        </div>
        <div class="container2">
            <div class="billede2"><img id="billede2" alt="" src=""></div>
            <div id="overskrift2"></div>
            <div id="undertitel2"></div>
            <div id="tekstfelt3"></div>
            <div id="tekstfelt4"></div>
        </div>
    </template>
    <script>
        let dest = document.querySelector(".page-container");

        let jsonFile;
        document.addEventListener("DOMContentLoaded", getJson);

        async function getJson() {

            let myJson = await fetch("http://rockbottomproductions.dk/kea/sem2/stylemann/wp-json/wp/v2/om_os");

            jsonFile = await myJson.json();

            visIndhold();

        }

        function visIndhold() {

            let dest = document.querySelector(".page-container"),
                temp = document.querySelector("#om-os");
            let klon = temp.cloneNode(true).content;

            jsonFile.forEach(indholdData => {
                klon.querySelector("#overskrift1").innerHTML = "<h2>" + indholdData.acf.overskrift + "</h2>";
                klon.querySelector("#undertitel1").innerHTML = "<h3>" + indholdData.acf.undertitel1 + "</h3>";

                klon.querySelector("#tekstfelt1").innerHTML = "<p>" + indholdData.acf.tekst1 + "</p>";
                klon.querySelector("#tekstfelt2").innerHTML = "<p>" + indholdData.acf.tekst2 + "</p>";
                klon.querySelector("#billede1").src = indholdData.acf.billede1;

                klon.querySelector("#billede2").src = indholdData.acf.billede2;

                klon.querySelector("#overskrift2").innerHTML = "<h2>" + indholdData.acf.overskrift2 + "</h2>";
                klon.querySelector("#undertitel2").innerHTML = "<h3>" + indholdData.acf.undertitel2 + "</h3>";

                klon.querySelector("#tekstfelt3").innerHTML = "<p>" + indholdData.acf.tekst3 + "</p>";

                klon.querySelector("#tekstfelt4").innerHTML = "<p>" + indholdData.acf.tekst4 + "</p>";
                dest.appendChild(klon);
            })
        }
    </script>
</body>

</html>

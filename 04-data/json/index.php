<?php
//$json = $_COOKIE["dades"] ?? [];

$json = file_exists("dades.json") ? file_get_contents("dades.json") : "[]";
//$dades = json_decode($json, true);

?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor d'enllaços</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        const app = {};

        // PHP escriu el JSON directament dins del codi JavaScript.
        app.dades = <?= $json ?>;

        // Esperem a que el DOM estigui carregat
        addEventListener("DOMContentLoaded", function() {
            // Utilitzem les dades per crear el llistat d'enllaços.
            const llista = document.getElementById("enllacos");
            const missatgeBuit = document.getElementById("missatge-buit");

            app.dades.forEach(dada => {
                const element = document.createElement("li");
                const enllac = document.createElement("a");

                enllac.textContent = dada.descripcio; // evita que el text rebut s'interpreti com HTML.
                enllac.href = dada.url;
                enllac.target = "_blank";
                element.append(enllac);
                llista.append(element);
            });

            missatgeBuit.hidden = app.dades.length > 0;
        });

       
    </script>
</head>

<body>
    <main>
        <header>
            <h1>Gestor d'enllaços</h1>
            <p>Desa i consulta els teus recursos preferits.</p>
        </header>

        <form action="save.php" method="post">
            <label for="descripcio">Descripció</label>
            <input type="text" id="descripcio" name="descripcio"
                placeholder="Ex. Documentació de PHP" required>

            <label for="url">Enllaç</label>
            <input type="url" id="url" name="url"
                placeholder="https://exemple.cat" required>

            <button type="submit">Desar enllaç</button>
        </form>

        <section class="llista" aria-labelledby="titol-llista">
            <h2 id="titol-llista">Enllaços desats</h2>
            <ul id="enllacos"></ul>
            <p id="missatge-buit" class="buit">Encara no hi ha cap enllaç.</p>
        </section>
    </main>


</body>

</html>
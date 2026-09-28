<?php
session_start();
$images = [];
$db = file_get_contents("db.json");
if($db != ""){
    $images = json_decode($db, true);
}

?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria de fotografies</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="site-header">
        <div class="header-content">
            <a class="brand" href="gallery.html">Galeria</a>
            <nav class="main-nav" aria-label="Navegació principal">
                <a class="active" href="index.php" aria-current="page">Galeria</a>
                <a href="add.php">Afegir fotografia</a>
            </nav>
        </div>
    </header>

    <main class="container">
        <div class="page-heading">
            <div>
                <p class="eyebrow">Les nostres imatges</p>
                <h1>Galeria de fotografies</h1>
                <p>Fotografies desades a la carpeta <code>uploads</code>.</p>
            </div>
            <a class="button" href="add.php">Afegir fotografia</a>
        </div>

        <section class="gallery" aria-label="Fotografies">
            <!-- Aquestes targetes són una mostra del disseny.
                 El PHP les generarà recorrent els fitxers d'uploads. -->
            <?php foreach($images as $image => $data) { ?>
            <figure class="photo-card">
                <div class="photo-placeholder" aria-hidden="true">
                    <img src="uploads/<?= $image ?>" alt="<?= $data['alternatiu'] ?>">
                </div>
                <figcaption><?=  $data["descripcio"] ?></figcaption>
            </figure>
            <?php } ?>
        </section>

        <!-- Mostra aquest bloc si la carpeta uploads no conté cap fotografia. -->
        <section class="empty-state" hidden>
            <span aria-hidden="true">🖼️</span>
            <h2>Encara no hi ha fotografies</h2>
            <p>Afegeix la primera imatge a la galeria.</p>
            <a class="button" href="add.html">Afegir fotografia</a>
        </section>
    </main>

    <footer class="site-footer">
        <div class="footer-content">
            <span>Institut Cendrassos</span>
            <span>Mòdul 0613 · DAW</span>
        </div>
    </footer>
</body>
</html>

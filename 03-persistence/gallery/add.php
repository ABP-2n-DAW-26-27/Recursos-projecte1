<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afegir una fotografia</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="site-header">
        <div class="header-content">
            <a class="brand" href="gallery.html">Galeria</a>
            <nav class="main-nav" aria-label="Navegació principal">
                <a href="index.php">Galeria</a>
                <a class="active" href="add.php" aria-current="page">Afegir fotografia</a>
            </nav>
        </div>
    </header>

    <main class="container narrow">
        <div class="page-heading">
            <div>
                <p class="eyebrow">Nova imatge</p>
                <h1>Afegir una fotografia</h1>
                <p>Selecciona una imatge del dispositiu per incorporar-la a la galeria.</p>
            </div>
        </div>

        <form class="upload-form" action="save.php" method="post" enctype="multipart/form-data">
            <div class="form-field">
                <label for="attachment">Fotografia</label>
                <input type="file" id="attachment" name="image" accept="image/jpeg,image/png,image/webp" aria-describedby="attachment-help" required>
                <small id="attachment-help">Formats admesos: JPG, PNG i WebP.</small>
            </div>

            <div class="form-field">
                <label for="alt_text">Text alternatiu</label>
                <input type="text" id="alt_text" name="text_alternatiu" maxlength="160" aria-describedby="alt-text-help" required>
                <small id="alt-text-help">Descriu breument què es veu a la fotografia.</small>
            </div>

            <div class="form-field">
                <label for="description">Descripció</label>
                <textarea id="description" name="descripcio" rows="5" maxlength="500" aria-describedby="description-help"></textarea>
                <small id="description-help">Afegeix informació complementària, si cal.</small>
            </div>

            <div class="form-actions">
                <a class="button button-secondary" href="gallery.html">Cancel·lar</a>
                <button class="button" type="submit">Desar fotografia</button>
            </div>
        </form>
    </main>

    <footer class="site-footer">
        <div class="footer-content">
            <span>Institut Cendrassos</span>
            <span>Mòdul 0613 · DAW</span>
        </div>
    </footer>
</body>
</html>

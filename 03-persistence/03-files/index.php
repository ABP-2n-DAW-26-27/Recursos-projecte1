<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afegir imatge</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="container">
        <header class="header">
            <h1><span>✏️</span> Afegir imatge</h1>
            <nav class="main-nav" aria-label="Navegació principal">
                <a href="index.php">Afegir imatge</a>
                <a href="gallery.php">Galeria</a>
            </nav>
        </header>
        <main class="main-content">
            <form action="add.php" method="POST" enctype="multipart/form-data" >
            <section class="form-section">
                <label for="img">Imatge:</label>
                <div class="form-group">
                    <input type="file" name="img" id="img" >
                </div>
                <div class="actions">
                    <button class="save-btn">Desar Canvis</button>
                </div>
            </section>
            </form>
        </main>
        <?php include("footer.php"); ?>
    </div>
</body>
</html>

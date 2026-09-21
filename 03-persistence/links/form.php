
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkShortener Pro | Llistat Simple</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <div class="container">
        <header class="simple-list-header">
            <h1><span>🔗</span> Afegir enllaç</h1>
        </header>

        <main class="list-container">
            <form action="add.php" method="POST">
                <section class="form-section">
                    <div class="form-group">
                        <label for="page-name">Nom de la pàgina:</label>
                        <input type="text" name="pageName" id="page-name" placeholder="Escriu un nom per a l'enllaç (opcional)">
                    </div>
                    <div class="form-group">
                        <label for="long-url">URL de la pàgina:</label>
                        <input type="text" name="url" id="long-url" placeholder="https://el-teu-enllac-llarg.com/...">
                    </div>
                    <button class="submit-btn">Guardar Enllaç</button>
                </section>
            </form>
            
        </main>
    </div>
    <footer class="main-footer">
        <div class="footer-content">
            <div class="footer-left">
                <img src="../images/logo.png" alt="Logo Cendrassos" class="footer-logo">
            </div>
            <div class="footer-right">
                <span>Mòdul 613 Desenvolupament d'Aplicacions Web en entorn servidor</span>
                <span>Curs: 2025-2026</span>
                <span class="mit-license">Llicència MIT</span>
            </div>
        </div>
    </footer>
</body>

</html>
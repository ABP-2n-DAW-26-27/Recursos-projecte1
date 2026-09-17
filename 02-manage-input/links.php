<?php
$links = [
    "Cendrassos" => "https://cendrassos.net",
    "Moddle del Cendrassos" => "https://moodle.cendrassos.net",
    "Djau" => "https://djau.cendrassos.net",
    "Abepe" => "https://abp.cendrassos.net",
];
?>
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
            <h1><span>🔗</span> Enllaços Guardats</h1>
        </header>

        <main class="list-container">
            <form action="links.php" method="POST">
                <section class="form-section">
                    <div class="form-group">
                        <label for="page-name">Nom de la pàgina:</label>
                        <input type="text" id="page-name" placeholder="Escriu un nom per a l'enllaç (opcional)">
                    </div>
                    <div class="form-group">
                        <label for="long-url">URL de la pàgina:</label>
                        <input type="text" id="long-url" placeholder="https://el-teu-enllac-llarg.com/...">
                    </div>
                    <button class="submit-btn">Guardar Enllaç</button>
                </section>
            </form>
            <div class="link-list">
                <!-- Work in progress -->
                <div class="link-item-simple">
                    <span class="link-name">Projecte de Disseny Web</span>
                    <a href="#" class="link-url-simple">https://github.com/usuari/el-meu-projecte-de-diseny-web-amb-moltes-paraules-a-lurl</a>
                </div>

                <div class="link-item-simple">
                    <span class="link-name">Documentació de Node.js</span>
                    <a href="#" class="link-url-simple">https://nodejs.org/en/docs/guides/getting-started-with-nodejs</a>
                </div>

                <div class="link-item-simple">
                    <span class="link-name">Recursos de CSS</span>
                    <a href="#" class="link-url-simple">https://developer.mozilla.org/en-US/docs/Web/CSS/Reference</a>
                </div>
                <!-- work in progress -->
            </div>
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
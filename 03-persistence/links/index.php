<?php
session_start();
$links = [];
if(isset($_COOKIE["links"])){
    $links = json_decode($_COOKIE["links"], true);
}

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
            
            <div class="link-list">
                <!-- Work in progress -->
                 <?php foreach($links as $link){?>
                <div class="link-item-simple">
                    <span class="link-name"><?=$link["name"];?></span>
                    <a href="<?=$link["url"];?>" class="link-url-simple"><?=$link["url"];?></a>
                </div>
                <?php } ?>

                
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
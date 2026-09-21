<?php
session_start();

$message = "Hello ";
if(isset($_SESSION["names"])){
    $names = $_SESSION["names"];
} else {
    $names = [];
}

if(isset($_GET["userName"])){
  $userName = $_GET["userName"];
  $_SESSION["lastName"] = $userName;
  $message = $message . $userName . "!";
  
  if(isset($names[$userName])){
    $names[$userName] = $names[$userName] + 1;
  } else {
    $names[$userName] = 1;
  }
} elseif(isset($_SESSION["lastName"])){
    $lastName = $_SESSION["lastName"];
    $message = $message . $lastName . "!";
} else {
    $message = $message . " World!";
}

$_SESSION["names"] = $names;

?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello World | Dues Columnes amb Llista</title>
    <style>
        :root {
            --primary-color: #d9301d;
            --text-color: #343a40;
            --background-color-left: #000000;
            --background-color-right: #ffffff;
            --text-color-left: #ffffff;
            --text-color-right: var(--primary-color);
            --border-radius: 8px;
            --shadow-color: rgba(0, 0, 0, 0.2);
        }

        body,
        html {
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            height: 100%;
            overflow: hidden;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        /* --- Columna Esquerra (Formulari i Llista) --- */
        .left-panel {
            flex: 1;
            background-color: var(--background-color-left);
            color: var(--text-color-left);
            display: flex;
            flex-direction: column; /* Apila els elements verticalment */
            justify-content: center;
            align-items: center;
            padding: 2em;
            box-sizing: border-box;
            gap: 2em; /* Espai entre el formulari i la llista */
        }

        .form-content {
            width: 100%;
            max-width: 400px;
            display: flex;
            flex-direction: column;
            gap: 1.5em;
        }

        .form-content h2 {
            font-size: 2.5em;
            margin: 0 0 0.5em;
            font-weight: bold;
            text-align: center;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5em;
        }

        .form-group label {
            font-size: 1.2em;
            font-weight: 500;
        }

        .form-group input[type="text"] {
            padding: 1em;
            border: 1px solid #444;
            border-radius: var(--border-radius);
            font-size: 1em;
            background-color: #222;
            color: #fff;
        }

        .form-group input[type="text"]:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 5px var(--primary-color);
        }

        .submit-btn {
            background-color: var(--primary-color);
            color: #ffffff;
            border: none;
            padding: 1em;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-size: 1.2em;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #b82613;
        }

        /* --- Llistat de Noms (CSS) --- */
        .name-list-container {
            width: 100%;
            max-width: 400px;
        }
        
        .name-list-container h3 {
            margin: 0 0 10px;
            font-size: 1.5em;
            text-align: center;
        }
        
        .name-list {
            list-style: none;
            padding: 0;
            margin: 0;
            max-height: 200px; /* Alçada màxima amb scroll si cal */
            overflow-y: auto;
            border-radius: var(--border-radius);
            background-color: #1a1a1a;
            padding: 10px;
        }
        
        .name-list li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px;
            border-bottom: 1px solid #333;
            color: #ccc;
        }
        
        .name-list li:last-child {
            border-bottom: none;
        }
        
        .name-list .name-count {
            font-weight: bold;
            color: var(--primary-color);
        }
        /* --- Fi de Llistat de Noms (CSS) --- */

        /* --- Columna Dreta (Hello World) --- */
        .right-panel {
            flex: 1;
            background-color: var(--background-color-right);
            color: var(--text-color-right);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2em;
            box-sizing: border-box;
            text-align: center;
        }

        .hello-message {
            font-size: 6em;
            font-weight: bold;
            line-height: 1.1;
            word-wrap: break-word;
            max-width: 100%;
        }

        /* --- Media Queries per a dispositius mòbils --- */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .left-panel,
            .right-panel {
                height: 50vh;
                flex: none;
            }

            .hello-message {
                font-size: 4em;
            }
        }

        @media (max-width: 480px) {
            .hello-message {
                font-size: 2.5em;
            }

            .form-content h2 {
                font-size: 2em;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="left-panel">
            <form action="hello4.php" class="form-content">
                <h2>Benvingut!</h2>
                <div class="form-group">
                    <label for="name">Introdueix el teu nom:</label>
                    <input type="text" id="name" name="userName" placeholder="El teu nom">
                </div>
                <button class="submit-btn">Saludar</button>
            </form>

            <div class="name-list-container">
                <h3>Qui hem saludat?</h3>
                <!-- Work in progress -->
                <ul class="name-list">
                    <?php
                    foreach($names as $name => $count){
                    ?>
                    <li><span><?=$name;?></span> <span class="name-count"><?=$count;?></span></li>
                    <?php } ?>
                </ul>
                <!-- Work in progress -->
            </div>
        </div>

        <div class="right-panel">
            <div class="hello-message">
                <?=$message;?>
            </div>
        </div>
    </div>

</body>

</html>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello World | Aplicació</title>

    <style>
        body.hello-page {
            height: 100vh;
            
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        body.hello-page .container {
            /* Reseteja els estils del contenidor per a aquesta pàgina */
            max-width: 90%;
            padding: 0;
            box-shadow: none;
            background-color: transparent;
            border-radius: 0;
        }

        .hello-world-message {
            font-size: 8em;
            font-weight: bold;
            color: var(--primary-color);
            line-height: 1;
            text-align: center;
        }

        /* Ajust per a pantalles més petites */
        @media (max-width: 768px) {
            .hello-world-message {
                font-size: 4em;
            }
        }

        @media (max-width: 480px) {
            .hello-world-message {
                font-size: 2.5em;
            }
        }
    </style>
</head>

<body class="hello-page">

    <div class="hello-world-container">
        <h1 class="hello-world-message">
            <?php echo "Hello world!!"; ?>
        </h1>
    </div>

</body>

</html>
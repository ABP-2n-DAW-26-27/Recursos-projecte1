<?php
session_start();
?>
<html>
    <head>
        <style>
            div {
                border: 1px;
                background-color: #ffcc00;
                margin : 10px;
                padding: 20px;
                width: 30%;
                float: left;
            }
        </style>
    </head>
    <body>
        <form action="set.php" method="POST" id="enviar">
            <input type="text" name="data" id="linea">
        </form>

        <div onclick="clic(1)">1</div>
        <div onclick="clic(2)">2</div>
        <div onclick="clic(3)">3</div>
        <pre>    
        <?php 
            print_r($_SESSION);
        ?>
        </pre>
    </body>
    <script>
        function clic(n){
            let linea = document.getElementById("linea");
            linea.value =  JSON.stringify({
                "a" :  n
            });
            console.log(linea);
            let form =  document.getElementById("enviar");
            form.submit();
        }
    </script>
</html>
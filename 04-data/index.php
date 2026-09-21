<?php

$links = [];
if(isset($_COOKIE["links"])){
    $links = json_decode($_COOKIE["links"], true);
}

$userName = "John";

?>
<html>
    <head>

    </head>
    <body id="b" data-links='<?=json_encode($links);?>' data-page="index" data-userName="John">
        
    </body>
            <script>
            let links = <?=json_encode($links);?>;
            let userName = "<?=$userName?>";
            console.log(links);
            console.log(userName);
            let b = document.getElementById("b");
            console.log(b.dataset);
            console.log(JSON.parse(b.dataset.links)[0]);
        </script>
</html>
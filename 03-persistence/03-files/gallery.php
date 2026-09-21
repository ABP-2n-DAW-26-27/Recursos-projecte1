<?php

$images = glob("./uploads/*");

//print_r($images);
?>

<html>
    <body>
        <?php include("head.php"); ?>
        <?php foreach($images as $image){ ?>
        <img src="<?=$image;?>" alt="" width="200" >
        <?php } ?>
        <?php include("footer.php"); ?>
        
    </body>
</html>
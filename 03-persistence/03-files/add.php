<?php
$name = rand(1,1000);
move_uploaded_file($_FILES["img"]["tmp_name"], "./uploads/{$name}{$_FILES['img']['name']}");

header("Location: gallery.php?img=./uploads/{$name}{$_FILES['img']['name']}");


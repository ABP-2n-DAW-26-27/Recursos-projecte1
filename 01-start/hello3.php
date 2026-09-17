<html>
    <body>
        <?php if(isset($_GET["name"])) { ?>
        <h1>
            <?php echo "Hello ". $_GET["name"]; ?>
        </h1>
        <?php } ?>
    </body>
</html>
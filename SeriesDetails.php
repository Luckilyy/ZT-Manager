<?php
include 'functions.php';
?>
<html>
    <head>
        <link rel="icon" type="image/x-icon" href="icon.ico" />
        <link rel='stylesheet' type='text/css' href='filmDetails_style.css'>
    </head>
    <body>
        <p><a href="." class="bouton17">Acceuil</a></p>
        <title>Fiche de la Serie</title>
        <h1><?php echo "Fiche de la Serie" ?></h1>
        <?php
        $search = format_search($_GET['series']);
        if (($http = file_get_contents($search)) == FALSE) {
            header("Location: index.php");
        }
        $httpcode = seriesDetail_replace($http);
        ?>
        <div class="corps">
            <?php
            echo $httpcode[1143];
            ?>
        </div>
    </body>
    <footer>
        <small><p>&copy; <?php echo FOOTER_CONTENT ?></p></small>
        <small><p> <?php echo DISCLAIMER ?></p></small>
    </footer>
</html>
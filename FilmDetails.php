<html>
    <head>
        <link rel="icon" type="image/x-icon" href="icon.ico" />
        <link rel='stylesheet' type='text/css' href='filmDetails_style.css'>
        <title>Fiche du Film</title>
    <p><a href="." class="bouton17">Acceuil</a></p>
    <h1>Fiche du Film</h1>
</head>
<body>
    <?php
    include 'functions.php';
    $search = format_search($_GET['film']);
    if (($http = file_get_contents($search)) == FALSE) {
        header("Location: index.php");
    }
    $httpcode = filmDetail_replace($http);
    ?>
    <div class="corps">
        <?php
        echo $httpcode[1143];
        ?>
    </div>
</div>
</body>
<footer>
    <small><p>&copy; <?php echo FOOTER_CONTENT ?></p></small>
    <small><p><?php echo DISCLAIMER ?></p></small>
</footer>
</html>
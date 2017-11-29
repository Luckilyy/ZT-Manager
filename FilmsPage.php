<?php
ini_set("display_errors", 0);
error_reporting(0);
include 'functions.php';
include 'simple_html_dom.php';

$i = -1;
$search = format_search($_GET['zdea']);
$searchtab = explode("%20", $search);
$searching = post_films($search);
$searching = str_replace("src=\"/img/", "src=\"defaut.png\"", $searching);
$html = str_get_html($searching);
$ret = $html->find('div[class=cover_global]');
if (error_get_last() != NULL || count($ret) == 0) {
    header("Location: index.php?result=nothing");
}
?>
<html>
    <head>
        <link rel="icon" type="image/x-icon" href="icon.ico" />
        <link rel='stylesheet' type='text/css' href='filmPage_style.css'>
        <title>Recherche</title>
    </head>
    <body>
        <p><a href="." class="bouton17">Acceuil</a></p>
        <?php
        foreach ($ret as $key => $value) {
            ++$i;
            echo "<div style=\"float: left; padding-top: 6px; padding-right: 6px; padding-left: 6px; padding-bottom: 6px; margin: auto; border: 1px solid black; border-radius: 10px; background: #CDCDCD\">";
            $ret[$i]->first_child()->first_child()->attr['href'] = str_replace("https://ww1.zone-telechargement.ws", "FilmDetails.php?film=https://ww1.zone-telechargement.ws", $ret[$i]->first_child()->first_child()->attr['href']);
            $ret[$i]->last_child()->first_child()->first_child()->first_child()->attr['href'] = str_replace("https://ww1.zone-telechargement.ws", "FilmDetails.php?film=https://ww1.zone-telechargement.ws", $ret[$i]->last_child()->first_child()->first_child()->first_child()->attr['href']);
            echo $ret[$i];
            echo"</div>";
        }
        ?>
    </body>
    <footer>
        <p><small>&copy; <?php echo FOOTER_CONTENT ?></small></p>
        <small><p> <?php echo DISCLAIMER ?></p></small>
    </footer>
</html>
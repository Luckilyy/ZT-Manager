<?php
include 'simple_html_dom.php';
header('Content-Type: text/html; charset=ISO-8859-1');

$i = -1;
$j = 0;
$link = [];
$searching = $_GET['url'];
$html = file_get_html($searching);
$ret = $html->find('div[class=postinfo]');
foreach ($ret[0]->children() as $key => $value) {
    ++$i;
    if ($ret[0]->children($i)->tag == 'b' && $ret[0]->children($i)->children(0)->tag == 'a') {
        $link[$j] = $ret[0]->children($i)->children(0);
        $j++;
    }
}
?>
<?php ?>
<html>
    <head>
        <link rel='stylesheet' type='text/css' href='filmDetails_style.css'>
        <link rel="icon" type="image/x-icon" href="icon.ico" />
        <link rel='stylesheet' type='text/css' href='nopremiumStyle.css'>
        <title>Episodes disponibles</title>
        <p><a href="." class="bouton17">Acceuil</a></p>
    </head>
    <body>
        <div>
            <h2 style="text-align: center">La saison n'est pas complète ou aucun lien premium n'est disponibles</h2>
            <h4 style="text-align: center">Choisissez les épisodes que vous voulez télécharger</h4>
<!--            <h4 style="text-align: center">--><?php //echo $ret[0]->first_child() ?><!--</h4>-->
              </div>
        <div style="margin: auto; padding-left: 4em;">
<?php
$j = 0;
foreach ($link as $key => $value) {
    if (strlen($link[$j]->attr['href']) == 93) {
        //var_dump($value);
       $link[$j]->attr['href'] = str_replace("https://", "dlep.php?url=", $link[$j]->attr['href']);
    }
    $j++;
}
$j = 0;
foreach ($link as $key => $value) {
     //var_dump($link[$j]->attr['href']);
    if (strlen($link[$j]->attr['href']) == 98) {
       
        echo '<div style="float: left; text-align: center; margin:auto; padding-right: 10px;">
                            ' . $link[$j] . '
            </div>';
    }
    $j++;
}
?>
        </div>
    </body>
</html>
<?php

<?php
include 'functions.php';

$url = $_GET['url'];
$fos = $_GET['fos'];
$http = file_get_contents($url);
$httpcode = explode("\n", $http);
$posLink = stripos($httpcode[1156], "Premium");

if ($posLink === false && $fos === 's')
{
    header("Location: nopremium.php?url=" . $url);
    die;
}
$pos1fichier = strpos($httpcode[1156], "1fichier", $posLink);
if ($pos1fichier === false)
{
    header("Location: nopremium.php?url=" . $url);
    die;
}
$posLinkprotecte = strpos($httpcode[1156], "href=\"", $pos1fichier);
$posLinkprotecte += 6;
$endlink = strpos($httpcode[1156], "\"", $posLinkprotecte);
$linkdl = "";

while ($posLinkprotecte < $endlink) {
    $linkdl = $linkdl . $httpcode[1156][$posLinkprotecte];
    $posLinkprotecte++;
}

$pos = strpos($linkdl, "123455617");
$pos += 9;
$todehel = "https://boulacheblu%gmail.com:yaleshendecks1@1fichier.com/?";

while ($pos <= 91) {
    $todehel = $todehel . $linkdl[$pos];
    $pos++;
}

header("Location:" . $todehel . "&auth=1");
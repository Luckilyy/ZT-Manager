<?php
$linkdl = $_GET['url'];

$pos = strpos($linkdl, "123455617");
$pos += 9;
$todehel = "https://boulacheblu%gmail.com:yaleshendecks1@1fichier.com/?";

while ($linkdl[$pos] != null) {
    $todehel = $todehel . $linkdl[$pos];
    $pos++;
}

header("Location:" . $todehel . "&auth=1");


<?php
define('MDP', "us4a8fzsze98");
define('FOOTER_CONTENT', "Copyright 2017 - zt-manager.azurewebsites.net v2.2 29/11/2017, Boulacheb Lucas Contact: boulacheblu@gmail.com");
define('DISCLAIMER', "zt-manager.azurewebsites.net n'heberge aucun fichier. La loi francaise vous autorise a telecharger un fichier seulement si vous en possedez l'original. Ni zt-manager.azurewebsites.net, ni nos hebergeurs, ni personne ne pourront etres tenu responsables d'une mauvaise utilisation de ce site.");

function contain_search($link, $searchtab) {
    foreach ($searchtab as $word) {
        if (stristr($link, $word) == true) {
            return true;
        }
    }
    return false;
}

function http_code($host) {
    $URL = $host;
    $curlHandle = curl_init();
    curl_setopt($curlHandle, CURLOPT_URL, $URL);
    curl_setopt($curlHandle, CURLOPT_HEADER, true);
    curl_setopt($curlHandle, CURLOPT_NOBODY, true);  // we don't need body
    curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
    curl_exec($curlHandle);
    $response = curl_getinfo($curlHandle, CURLINFO_HTTP_CODE);
    curl_close($curlHandle);
    return $response;
}

function post_films($search) {
    $url = 'https://ww1.zone-telechargement.ws/index.php?story=' . $search . '&do=search&subaction=search';
    $fields = array(
        'story' => $search,
        'catlist[]' => '2'
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $result = curl_exec($ch);
    return $result;
}

function post_series($search) {
    $url = 'https://ww1.zone-telechargement.ws/index.php?story=' . $search . '&do=search&subaction=search';
    $fields = array(
        'story' => $search,
        'catlist[]' => '15'
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $result = curl_exec($ch);
    return $result;
}

function format_search($get) {
    $search = str_replace(" ", "%20", $get);
    return $search;
}

function add_balise($ul) {
    if ($ul == 7) {
        $ul = 0;
        echo "</li></ul><br><ul id=\"navbarh\"><li>";
    } else {
        echo "</li><li>";
    }
}

function search_result($httpcode) {
    $i = 1153;
    $li = 0;
    $ul = 0;
    while (++$i < 1585) {
        $httpcode[$i] = str_replace("<a href=\"", "<a href=\"FilmDetails.php?film=", $httpcode[$i]);
        $httpcode[$i] = str_replace("</a>    </div>", "</a>", $httpcode[$i]);
        // var_dump($httpcode[$i], $i);
        if (error_get_last() != NULL) {
            header("Location: index.php?result=nothing");
        }
        echo ($httpcode[$i]);
        $li++;
        if ($li == 18) {
            $ul++;
            add_balise($ul);
            $li = 0;
        }
    }
}

function filmDetail_replace($http) {
    $httpcode = explode("\n", $http);
    $httpcode[1143] = str_replace("<a href=\"", "<a href=\"dl.php?fos=f&url=https://ww1.zone-telechargement.ws", $httpcode[1143]);
    $httpcode[1143] = str_replace("cette saison:</h3>", "ce film:</h3>", $httpcode[1143]);
    $httpcode[1143] = str_replace("</div><center>", "</div></a><center>", $httpcode[1143]);
    $httpcode[1143] = str_replace("<div class=\"otherversions\" style=\"margin-top:10px;border-top: 1px solid #e6e6e6;text-align:"
            . "left;\">", "<div class=\"otherversions\" style=\"margin-top:10px;border-top: 1px solid #e6e6e6;text-align:center;\">", $httpcode[1143]);
    $httpcode[1143] = str_replace("style=\"font-family: 'Ubuntu Condensed','Segoe UI',Verdana,Helvetica,sans-serif;font-size: 24p"
            . "x;letter-spacing: 0.05em;color: #ff4d00;font-weight: bold;text-align: center;margin: 25px;\">", "style=\"font-family: 'Ubuntu Condensed','Segoe UI',Verdana,Helvetica,sans-serif;font-size: 24px;letter-spacing: 0.05em;color: #24   6A0E;font-weight: bold;text-align: center;margin: 25px;\">", $httpcode[1143]);
    $httpcode[1143] = str_replace("style=\"font-size: 18px;margin: 10px auto;color:red;font-weight:bold;text-align:center;\"", "    href=\"" . $_GET['film'] . "\" style"
            . "=\"font-size: 18px;margin: 10px auto;color:#308F13;font-weight:bold;text-align:center;\"", $httpcode[1143]);
    return $httpcode;
}

function seriesDetail_replace($http) {
    $httpcode = explode("\n", $http);
    $httpcode[1143] = str_replace("<div class=\"otherversions\" style=\"margin-top:10px;border-top: 1px solid #e6e6e6;text-align:"
            . "left;\">", "<div class=\"otherversions\" style=\"margin-top:10px;border-top: 1px solid #e6e6e6;text-align:center;\">", $httpcode[1143]);
    $httpcode[1143] = str_replace("style=\"font-family: 'Ubuntu Condensed','Segoe UI',Verdana,Helvetica,sans-serif;font-size: 24p"
            . "x;letter-spacing: 0.05em;color: #ff4d00;font-weight: bold;text-align: center;margin: 25px;\">", "style=\"font-family: 'Ubuntu Condensed','Segoe UI',Verdana,Helvetica,sans-serif;font-size: 24px;letter-spacing: 0.05em;color: #246A0E;font-weight: bold;text-align: center;margin: 25px;\">", $httpcode[1143]);
    $httpcode[1143] = str_replace("style=\"font-size: 18px;margin: 10px auto;color:red;font-weight:bold;text-align:center;\"", "style"
            . "=\"font-size: 18px;margin: 10px auto;color:#308F13;font-weight:bold;text-align:center;\"", $httpcode[1143]);
    $httpcode[1143] = str_replace("<a href=\"", "<a href=\"dl.php?fos=s&url=https://ww1.zone-telechargement.ws", $httpcode[1143]);
    $httpcode[1143] = str_replace("cette saison:</h3>", "cette serie/saison:</h3>", $httpcode[1143]);
    $httpcode[1143] = str_ireplace("Qualités également disponibles pour cette serie:</h3>", "Qualités également disponibles pour cette saison:</h3>", $httpcode[1143]);
    $httpcode[1143] = str_replace("</div><center>", "</div></a><center>", $httpcode[1143]);
    return $httpcode;
}

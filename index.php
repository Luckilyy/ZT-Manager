<?php
include 'functions.php';
include 'simple_html_dom.php';
header('Content-Type: text/html; charset=ISO-8859-1');
?>
<html style="overflow: hidden;">
    <head>
        <link rel='stylesheet' type='text/css' href='style.css'>
        <link rel="icon" type="image/x-icon" href="icon.ico" />
        <title>ZT-Manager</title>
    </head>
    <body>
        <div>
            <img src="logo.png" style="padding-left: 620px; margin: auto;">
            <h4>Download (almost) everything you want easily !</h4>
            <?php
            if (isset($_GET['result']) == true && $_GET['result'] == "nothing") {
                echo '<p style="text-align: center;">No results or too less character (4 minimum)</p>';
            }
            if (isset($_GET['result']) == true && $_GET['result'] == "in") {
                echo '<p style="text-align: center;">Zone Téléchargement was not reachable, retry later !</p>';
            }
            ?>
            <div class="button_box2">
                <form class="form-wrapper-2 cf" action="filmorseries.php" method="post" style="width: 330px;margin: auto;">   
                    <input type="text" name="search" placeholder="What are you looking for ?" autocomplete="off" required>
                    <button type="submit">Search</button>
            </div>
            <div class="continput" style="width: 185px; margin: auto;">
                <ul>
                    <li>
                        <input checked type="radio" name="genre" value="series">
                        <label>Serie</label>
                        <div class="bullet">
                            <div class="line zero"></div>
                            <div class="line one"></div>
                            <div class="line two"></div>
                            <div class="line three"></div>
                            <div class="line four"></div>
                            <div class="line five"></div>
                            <div class="line six"></div>
                            <div class="line seven"></div>
                        </div>
                    </li>
                    <li>
                        <input type="radio" name="genre" value="movie">
                        <label>Film</label>
                        <div class="bullet">
                            <div class="line zero"></div>
                            <div class="line one"></div>
                            <div class="line two"></div>
                            <div class="line three"></div>
                            <div class="line four"></div>
                            <div class="line five"></div>
                            <div class="line six"></div>
                            <div class="line seven"></div>
                        </div>
                    </li>
                </ul>
                </form>
            </div>
        </div>
    </body>
    <footer>
        <small><p><a href="patchnote.php">Patch Notes</a></p></small>
        <small><p>&copy; <?php echo FOOTER_CONTENT ?></p></small>
        <small><p> <?php echo DISCLAIMER ?></p></small>
    </footer>
</html>

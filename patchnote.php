<?php
include 'functions.php';
header('Content-Type: text/html; charset=ISO-8859-1'); ?>
<html>
<title>Patch Notes</title>
<meta charset="ISO-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    html, body, h1, h2, h3, h4, h5, h6 {
        font-family: "Roboto", sans-serif
    }
</style>
<body class="w3-light-grey">

<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">

    <!-- The Grid -->
    <div class="w3-row-padding">

        <!-- Right Column -->
        <div class="w3-twothird">

            <div class="w3-container w3-card w3-white w3-margin-bottom">
                <h2 class="w3-text-grey w3-padding-16">Version 2.2</h2>
                <div class="w3-container">
                    <h5 class="w3-opacity"><b>Fonctionnalités</b></h5>
                    <h6 class="w3-text-teal"><span class="w3-tag w3-teal w3-round">Ajouts</span></h6>
                    <p>Ajout du téléchargement épisode par épisode sur une série incomplète</p>
                </div>
            </div>

            <div class="w3-container w3-card w3-white w3-margin-bottom">
                <h2 class="w3-text-grey w3-padding-16">Version 2.1</h2>
                <div class="w3-container">
                    <h5 class="w3-opacity"><b>Correction de bug</b></h5>
                    <h6 class="w3-text-teal"><span class="w3-tag w3-teal w3-round">Corrigés</span></h6>
                    <p>Problème lors de l'affichage des résultats de recherche</p>
                </div>
            </div>

            <!-- End Right Column -->
        </div>

        <!-- End Grid -->
    </div>

    <!-- End Page Container -->
</div>

<footer class="w3-container w3-teal w3-center w3-margin-top">
    <small><p>&copy; <?php echo FOOTER_CONTENT ?></p></small>
    <small><p><?php echo DISCLAIMER ?></p></small>
</footer>

</body>
</html>
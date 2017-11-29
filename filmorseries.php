<?php
if ($_POST['genre'] == "series") {
    header("Location: SeriesPage.php?zdea=" . $_POST['search']);
} else if ($_POST['genre'] == "movie") {
    header("Location: FilmsPage.php?zdea=" . $_POST['search']);
}

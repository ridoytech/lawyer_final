<?php
session_start();

// $mysqli = new mysqli('localhost', 'teamciph_teamcipher', 'pfjFUWHKTZf9', 'teamciph_teamcipher');
$mysqli = new mysqli('localhost', 'root', '', 'lawyer_final');


if ($mysqli->connect_error) {
    die($mysqli->connect_error);
}


?>

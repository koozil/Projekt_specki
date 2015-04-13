<?php
include 'database.class.php';
ob_start();
include 'page/nav.php';

$username="root";
$password="";
$database="cats";
$imie=$_POST['imię'];
$rasa=$_POST['rasa'];
$wiek=$_POST['wiek'];
$cena=$_POST['cena'];




include 'page/list.php';
include 'page/footer.php';

ob_end_flush();
?>
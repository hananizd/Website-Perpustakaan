<?php
include("data_class.php");

$addnames = $_POST['addname'];
$jenisKelamin = $_POST['jenisKelamin'];
$alamat = $_POST['addalamat'];
$noTelp = $_POST['addphone'];
$addemail = $_POST['addemail'];
$status = $_POST['status'];
$instansi = $_POST['addinstansi'];
$addpass = $_POST['addpass'];
$type = $_POST['type'];

$obj = new data();
$obj->setconnection();
$obj->addnewuser($addnames, $addpass, $addemail, $type, $jenisKelamin, $noTelp);
?>

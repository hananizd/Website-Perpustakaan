<?php
include("data_class.php");

$bookname = $_POST['bookname'];
$bookdetail = $_POST['bookdetail'];
$bookaudor = $_POST['bookaudor'];
$bookpub = $_POST['bookpub'];
$bookid = $_POST['bookid'];
$bookyear = $_POST['bookyear'];
$bookquantity = $_POST['bookquantity'];
$branch = isset($_POST['branch']) ? $_POST['branch'] : '';
$bookprice = isset($_POST['bookprice']) ? $_POST['bookprice'] : '';

if (move_uploaded_file($_FILES["bookphoto"]["tmp_name"], "uploads/" . $_FILES["bookphoto"]["name"])) {
    $bookpic = $_FILES["bookphoto"]["name"];

    $obj = new Data();
    $obj->setConnection();
    $obj->addBook($bookpic, $bookname, $bookdetail, $bookaudor, $bookpub, $branch, $bookprice, $bookquantity, $bookyear, $bookid);
} else {
    echo "File not uploaded";
}
?>

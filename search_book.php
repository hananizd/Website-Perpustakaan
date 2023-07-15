<?php
include("data_class.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookname = $_POST['bookname'];

    $obj = new Data();
    $obj->setconnection();

    $books = $obj->searchBook($bookname);

    if (!empty($books)) {
        foreach ($books as $book) {
            echo "Judul: " . $book['bookname'] . "<br>";
            echo "Detail: " . $book['bookdetail'] . "<br>";
            echo "Pengarang: " . $book['bookaudor'] . "<br>";
            echo "Penerbit: " . $book['bookpub'] . "<br>";
            echo "Tahun Terbit: " . $book['bookyear'] . "<br>";
            echo "ID: " . $book['id'] . "<br>";
            echo "Jumlah: " . $book['bookquantity'] . "<br>";
            echo "<br>";
        }
    } else {
        echo "Buku tidak ditemukan.";
    }
}
?>

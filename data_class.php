<?php

include("db.php");

class Data extends DB {
    private $bookpic;
    private $bookname;
    private $bookdetail;
    private $bookauthor;
    private $bookpub;
    private $branch;
    private $bookprice;
    private $bookquantity;
    private $bookyear;
    private $bookid;
    private $type;

    private $book;
    private $userselect;
    private $days;
    private $getdate;
    private $returnDate;

    function __construct() {
        echo "</br></br>";
    }

    function addnewuser($nama, $jenisKelamin, $alamat, $noTelp, $email, $status, $instansi, $password, $type) {
        $this->name = $nama;
        $this->jenisKelamin = $jenisKelamin;
        $this->alamat = $alamat;
        $this->noTelp = $noTelp;
        $this->email = $email;
        $this->status = $status;
        $this->instansi = $instansi;
        $this->password = $password;
        $this->type = $type;

        $q = "INSERT INTO userdata (id, name, jenisKelamin, alamat, noTelp, email, status, instansi, pass, type)
              VALUES('', '$nama', '$jenisKelamin', '$alamat', '$noTelp', '$email', '$status', '$instansi', '$password', '$type')";

        if ($this->connection->exec($q)) {
            header("Location: admin_service_dashboard.php?msg=Berhasil menambahkan pengguna baru");
        } else {
            header("Location: admin_service_dashboard.php?msg=Gagal melakukan registrasi");
        }
    }

    public function userLogin($email, $password) {
        $q = "SELECT * FROM userdata WHERE email='$email' AND pass='$password'";
        $recordSet = $this->connection->query($q);
        $result = $recordSet->rowCount();

        if ($result > 0) {
            foreach ($recordSet->fetchAll() as $row) {
                $logid = $row['id'];
                header("location: otheruser_dashboard.php?userlogid=$logid");
            }
        } else {
            header("location: index.php?msg=Kredensial tidak valid");
        }
    }

    public function adminLogin($email, $password) {
        $q = "SELECT * FROM admin WHERE email='$email' AND pass='$password'";
        $recordSet = $this->connection->query($q);
        $result = $recordSet->rowCount();

        if ($result > 0) {
            foreach ($recordSet->fetchAll() as $row) {
                $logid = $row['id'];
                header("location: admin_service_dashboard.php?logid=$logid");
            }
        } else {
            header("location: index.php?msg=Kredensial tidak valid");
        }
    }

    public function addBook($bookpic, $bookname, $bookdetail, $bookauthor, $bookpub, $branch, $bookprice, $bookquantity, $bookyear, $bookid) {
        $this->bookpic = $bookpic;
        $this->bookname = $bookname;
        $this->bookdetail = $bookdetail;
        $this->bookauthor = $bookauthor;
        $this->bookpub = $bookpub;
        $this->branch = $branch;
        $this->bookprice = $bookprice;
        $this->bookquantity = $bookquantity;
        $this->bookyear = $bookyear;
        $this->bookid = $bookid;

        $q = "INSERT INTO book (id, bookpic, bookname, bookdetail, bookaudor, bookpub, branch, bookprice, bookquantity, bookava, bookrent, bookyear, bookid)
              VALUES('', '$bookpic', '$bookname', '$bookdetail', '$bookauthor', '$bookpub', '$branch', '$bookprice', '$bookquantity', '$bookquantity', 0, '$bookyear', '$bookid')";

        if ($this->connection->exec($q)) {
            header("Location: admin_service_dashboard.php?msg=Buku berhasil ditambahkan");
        } else {
            header("Location: admin_service_dashboard.php?msg=Gagal menambahkan buku");
        }
    }

    private $id;

    function getissuebook($userloginid) {

        $newfine = "";
        $issuereturn = "";

        $q = "SELECT * FROM issuebook where userid='$userloginid'";
        $recordSetss = $this->connection->query($q);

        foreach ($recordSetss->fetchAll() as $row) {
            $issuereturn = $row['issuereturn'];
            $fine = $row['fine'];
            $newfine = $fine;

            //  $newbookrent=$row['bookrent']+1;
        }

        $getdate = date("d/m/Y");
        if ($issuereturn < $getdate) {
            $q = "UPDATE issuebook SET fine='$newfine' where userid='$userloginid'";

            if ($this->connection->exec($q)) {
                $q = "SELECT * FROM issuebook where userid='$userloginid' ";
                $data = $this->connection->query($q);
                return $data;
            } else {
                $q = "SELECT * FROM issuebook where userid='$userloginid' ";
                $data = $this->connection->query($q);
                return $data;
            }
        } else {
            $q = "SELECT * FROM issuebook where userid='$userloginid'";
            $data = $this->connection->query($q);
            return $data;
        }
    }

    function getbook() {
        $q = "SELECT * FROM book ";
        $data = $this->connection->query($q);
        return $data;
    }

    function getbookissue() {
        $q = "SELECT * FROM book where bookava !=0 ";
        $data = $this->connection->query($q);
        return $data;
    }

    function userdata() {
        $q = "SELECT * FROM userdata ";
        $data = $this->connection->query($q);
        return $data;
    }

    function getbookdetail($id) {
        $q = "SELECT * FROM book where id ='$id'";
        $data = $this->connection->query($q);
        return $data;
    }

    function userdetail($id) {
        $q = "SELECT * FROM userdata where id ='$id'";
        $data = $this->connection->query($q);
        return $data;
    }

    function requestbook($userid, $bookid) {
        $q = "SELECT * FROM book where id='$bookid'";
        $recordSetss = $this->connection->query($q);

        $q = "SELECT * FROM userdata where id='$userid'";
        $recordSet = $this->connection->query($q);

        foreach ($recordSet->fetchAll() as $row) {
            $username = $row['name'];
            $usertype = $row['type'];
        }

        foreach ($recordSetss->fetchAll() as $row) {
            $bookname = $row['bookname'];
        }

        if ($usertype == "student") {
            $days = 7;
        }
        if ($usertype == "teacher") {
            $days = 21;
        }

        $q = "INSERT INTO requestbook (id,userid,bookid,username,usertype,bookname,issuedays)VALUES('','$userid', '$bookid', '$username', '$usertype', '$bookname', '$days')";

        if ($this->connection->exec($q)) {
            header("Location:otheruser_dashboard.php?userlogid=$userid");
        } else {
            header("Location:otheruser_dashboard.php?msg=fail");
        }
    }

    function returnbook($id) {
        $fine = "";
        $bookava = "";
        $issuebook = "";
        $bookrentel = "";

        $q = "SELECT * FROM issuebook where id='$id'";
        $recordSet = $this->connection->query($q);

        foreach ($recordSet->fetchAll() as $row) {
            $userid = $row['userid'];
            $issuebook = $row['issuebook'];
            $fine = $row['fine'];
        }

        if ($fine == 0) {
            $q = "SELECT * FROM book where bookname='$issuebook'";
            $recordSet = $this->connection->query($q);

            foreach ($recordSet->fetchAll() as $row) {
                $bookava = $row['bookava'] + 1;
                $bookrentel = $row['bookrent'] - 1;
            }

            $q = "UPDATE book SET bookava='$bookava', bookrent='$bookrentel' where bookname='$issuebook'";
            $this->connection->exec($q);

            $q = "DELETE from issuebook where id=$id and issuebook='$issuebook' and fine='0' ";
            if ($this->connection->exec($q)) {
                header("Location:otheruser_dashboard.php?userlogid=$userid");
            }
        }
    }

    function delteuserdata($id) {
        $q = "DELETE from userdata where id='$id'";
        if ($this->connection->exec($q)) {
            header("Location:admin_service_dashboard.php?msg=done");
        } else {
            header("Location:admin_service_dashboard.php?msg=fail");
        }
    }

    function deletebook($id) {
        $q = "DELETE from book where id='$id'";
        if ($this->connection->exec($q)) {
            header("Location:admin_service_dashboard.php?msg=done");
        } else {
            header("Location:admin_service_dashboard.php?msg=fail");
        }
    }

    function issuereport() {
        $q = "SELECT * FROM issuebook ";
        $data = $this->connection->query($q);
        return $data;
    }

    function requestbookdata() {
        $q = "SELECT * FROM requestbook ";
        $data = $this->connection->query($q);
        return $data;
    }

    function issuebookapprove($book, $userselect, $days, $getdate, $returnDate, $redid) {
        $this->$book = $book;
        $this->$userselect = $userselect;
        $this->$days = $days;
        $this->$getdate = $getdate;
        $this->$returnDate = $returnDate;

        $q = "SELECT * FROM book where bookname='$book'";
        $recordSetss = $this->connection->query($q);

        $q = "SELECT * FROM userdata where name='$userselect'";
        $recordSet = $this->connection->query($q);
        $result = $recordSet->rowCount();

        if ($result > 0) {
            foreach ($recordSet->fetchAll() as $row) {
                $issueid = $row['id'];
                $issuetype = $row['type'];
            }

            foreach ($recordSetss->fetchAll() as $row) {
                $bookid = $row['id'];
                $bookname = $row['bookname'];

                $newbookava = $row['bookava'] - 1;
                $newbookrent = $row['bookrent'] + 1;
            }

            $q = "UPDATE book SET bookava='$newbookava', bookrent='$newbookrent' where id='$bookid'";
            if ($this->connection->exec($q)) {
                $q = "INSERT INTO issuebook (userid,issuename,issuebook,issuetype,issuedays,issuedate,issuereturn,fine)VALUES('$issueid','$userselect','$book','$issuetype','$days','$getdate','$returnDate','0')";

                if ($this->connection->exec($q)) {
                    $q = "DELETE from requestbook where id='$redid'";
                    $this->connection->exec($q);
                    header("Location:admin_service_dashboard.php?msg=done");
                } else {
                    header("Location:admin_service_dashboard.php?msg=fail");
                }
            } else {
                header("Location:admin_service_dashboard.php?msg=fail");
            }
        } else {
            header("location: index.php?msg=Invalid Credentials");
        }
    }

    function issuebook($book, $userselect, $days, $getdate, $returnDate) {
        $this->$book = $book;
        $this->$userselect = $userselect;
        $this->$days = $days;
        $this->$getdate = $getdate;
        $this->$returnDate = $returnDate;

        $q = "SELECT * FROM book where bookname='$book'";
        $recordSetss = $this->connection->query($q);

        $q = "SELECT * FROM userdata where name='$userselect'";
        $recordSet = $this->connection->query($q);
        $result = $recordSet->rowCount();

        if ($result > 0) {
            foreach ($recordSet->fetchAll() as $row) {
                $issueid = $row['id'];
                $issuetype = $row['type'];
            }

            foreach ($recordSetss->fetchAll() as $row) {
                $bookid = $row['id'];
                $bookname = $row['bookname'];

                $newbookava = $row['bookava'] - 1;
                $newbookrent = $row['bookrent'] + 1;
            }

            $q = "UPDATE book SET bookava='$newbookava', bookrent='$newbookrent' where id='$bookid'";
            if ($this->connection->exec($q)) {
                $q = "INSERT INTO issuebook (userid,issuename,issuebook,issuetype,issuedays,issuedate,issuereturn,fine)VALUES('$issueid','$userselect','$book','$issuetype','$days','$getdate','$returnDate','0')";

                if ($this->connection->exec($q)) {
                    header("Location:admin_service_dashboard.php?msg=done");
                } else {
                    header("Location:admin_service_dashboard.php?msg=fail");
                }
            } else {
                header("Location:admin_service_dashboard.php?msg=fail");
            }
        } else {
            header("location: index.php?msg=Invalid Credentials");
        }
    }

    public function searchBook($bookname) {
        $q = "SELECT * FROM book WHERE bookname LIKE '%$bookname%'";
        $data = $this->connection->query($q);
        return $data;
    }
}
?>

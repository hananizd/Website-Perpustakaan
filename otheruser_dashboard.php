<?php
session_start();

$userloginid = $_SESSION["userid"] = $_GET['userlogid'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="halamanUtama.css">
    <link rel="stylesheet" type="text/css" href="tampilan.css">
</head>
<style>
    .innerright,
    label {
        color: rgb(16, 170, 16);
        font-weight: bold;
    }

    .container,
    .row,
    .imglogo {
        margin: auto;
    }

    .innerdiv {
        text-align: center;
        /* width: 500px; */
        margin: 100px;
    }

    input {
        margin-left: 20px;
    }

    .leftinnerdiv {
        float: left;
        width: 25%;
    }

    .rightinnerdiv {
        float: right;
        width: 75%;
    }

    .innerright {
        background-color: #fff;
        width: 100%;
        height: 385px;
        border-radius: 10px;
    }

    .greenbtn {
        background-color: #FFD646;
        color: black;
        width: 95%;
        height: 40px;
        margin-top: 8px;
        border-radius: 10px;
    }

    .greenbtn,
    a {
        text-decoration: none;
        color: black;
        font-size: large;
    }

    th {
        background-color: #16DE52;
        color: black;
    }

    td {
        background-color: #b1fec7;
        color: black;
    }

    td,
    a {
        color: black;
    }
</style>
<body>
<nav>
    <div class="wrapper">
        <div class="logo">
            <img src="images/logoPerpus.jpg" alt="Logo Perpustakaan Kita" class="logo-gambar">
            <p class="logo-text">Perpustakaan Kita</p>
        </div>

        <div class="menu">
            <ul>
                <li>
                    <a href="aboutus.html"><img src="images/aboutUs.jpg" alt="About Us" class="menu-icon">About Us</a>
                </li>
                <li>
                    <a href="index.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    body {
        background-image: url(images/gambar.jpg);
    }
</style>
<?php
include("data_class.php");
?>
<div class="innerdiv">
    <div class="leftinnerdiv">
        <br>
        <button class="greenbtn" onclick="openpart('myaccount')"> <img class="icons" src="images/icon/profile.png" width="30px" height="30px"/> My Account
        </button>
        <button class="greenbtn" onclick="openpart('card')"> <img class="icons" src="images/icon/profile.png" width="30px" height="30px"/> E-Card
        </button>
        <button class="greenbtn" onclick="openpart('requestbook')">
    <a href="indeks.html">
        <img class="icons" src="images/icon/book.png" width="30px" height="30px"/> Cari Buku
    </a>
</button>
    </div>


    <div class="rightinnerdiv">
        <div id="myaccount" class="innerright portion" style="<?php if (!empty($_REQUEST['returnid'])) {
            echo "display:none";
        } else {
            echo "";
        } ?>">
            <button class="greenbtn">My Account</button>

            <?php
            $u = new data;
            $u->setconnection();
            $u->userdetail($userloginid);
            $recordset = $u->userdetail($userloginid);
            foreach ($recordset as $row) {
                $id = $row[0];
                $name = $row[1];
                $jenisKelamin = $row[2];
                $alamat = $row[3];
                $email = $row[4];
                $noTelp = $row[5];
                $status = $row[6];
                $instansi = $row[7];
                $pass = $row[8];
                $type = $row[9];
            }
            ?>

            <p style="color:black"><u>Nama :</u> &nbsp&nbsp<?php echo $name ?></p>
            <p style="color:black"><u>Jenis Kelamin:</u> &nbsp&nbsp<?php echo $jenisKelamin ?></p>
            <p style="color:black"><u>Alamat:</u> &nbsp&nbsp<?php echo $alamat ?></p>
            <p style="color:black"><u>Email:</u> &nbsp&nbsp<?php echo $email ?></p>
            <p style="color:black"><u>No.Telp:</u> &nbsp&nbsp<?php echo $noTelp ?></p>
            <p style="color:black"><u>Status:</u> &nbsp&nbsp<?php echo $status ?></p>
            <p style="color:black"><u>Instansi:</u> &nbsp&nbsp<?php echo $instansi ?></p>
            <p style="color:black"><u>Account Type:</u> &nbsp&nbsp<?php echo $type ?></p>

        </div>

        <div id="card" class="innerright portion" style="<?php if (!empty($_REQUEST['returnid'])) {
            echo "display:none";
        } else {
            echo "";
        } ?>">
            <button class="greenbtn">E-Card</button>

            <?php
            $u = new data;
            $u->setconnection();
            $u->userdetail($userloginid);
            $recordset = $u->userdetail($userloginid);
            foreach ($recordset as $row) {
                $id = $row[0];
                $name = $row[1];
                $jenisKelamin = $row[2];
                $alamat = $row[3];
                $email = $row[4];
                $noTelp = $row[5];
                $status = $row[6];
                $instansi = $row[7];
                $pass = $row[8];
                $type = $row[9];
            }
            ?>

            <p style="color:black"><u>Nama :</u> &nbsp&nbsp<?php echo $name ?></p>
            <p style="color:black"><u>Jenis Kelamin:</u> &nbsp&nbsp<?php echo $jenisKelamin ?></p>
            <p style="color:black"><u>Alamat:</u> &nbsp&nbsp<?php echo $alamat ?></p>
            <p style="color:black"><u>No.Telp:</u> &nbsp&nbsp<?php echo $noTelp ?></p>
            <p style="color:black"><u>Status:</u> &nbsp&nbsp<?php echo $status ?></p>
            <p style="color:black"><u>Instansi:</u> &nbsp&nbsp<?php echo $instansi ?></p>
            <p style="color:black"><u>Account Type:</u> &nbsp&nbsp<?php echo $type ?></p>

        </div>
    </div>


    <div class="rightinnerdiv">   
        <div id="issuereport" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ echo "display:none";} else {echo "display:none"; }?>">
            <Button class="greenbtn" >BOOK RECORD</Button>

            <?php

            $userloginid=$_SESSION["userid"] = $_GET['userlogid'];
            $u=new data;
            $u->setconnection();
            $u->getissuebook($userloginid);
            $recordset=$u->getissuebook($userloginid);

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  
            padding: 8px;'>Name</th><th>Book Name</th><th>Issue Date</th><th>Return Date</th><th>Fine</th></th><th>Return</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
                echo "<td>$row[0]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[3]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                $table.="<td><a href='otheruser_dashboard.php?returnid=$row[0]&userlogid=$userloginid'><button type='button' class='btn btn-primary'>Return</button></a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

        </div>
    </div>

    <div class="rightinnerdiv">   
        <div id="return" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ $returnid=$_REQUEST['returnid'];} else {echo "display:none"; }?>">
            <Button class="greenbtn" >Return Book</Button>

            <?php

            $u=new data;
            $u->setconnection();
            $u->returnbook($returnid);
            $recordset=$u->returnbook($returnid);
                ?>

        </div>
    </div>



    <script>
        function openpart(portion) {
            var i;
            var x = document.getElementsByClassName("portion");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            document.getElementById(portion).style.display = "block";
        }
    </script>
</body>
</html>

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
    </head>
    <style>
        .innerright,label {
            color: rgb(16, 170, 16);
            font-weight:bold;
        }
        .container,
        .row,
        .imglogo {
            margin:auto;
        }

        .innerdiv {
            text-align: center;
            margin: 100px;
        }

        input{
            margin-left:20px;
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
            background-color: #f3bd7e;
        }

        .greenbtn {
            background-color: #ffe3e3;
            color: black;
            width: 95%;
            height: 40px;
            margin-top: 8px;
        }

        .greenbtn,
        a {
            text-decoration: none;
            color: black;
            font-size: large;
        }

        th{
            background-color: #16DE52;
            color: black;
        }
        td{
            background-color: #b1fec7;
            color: black;
        }
        td, a{
            color:black;
        }
        
        label {
            margin-left:50px;
            padding-Top:10px;
            font-size: 18px;
            color: rgb(51, 51, 51);
        }
        
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        
        input[type=text]:focus,
        input[type=email]:focus,
        input[type=number]:focus,
        input[type=pasword]:focus,

        select:focus,
        textarea:focus {
            outline: none;
        }
        
        input[type=text],
        input[type=email],
        input[type=number],
        input[type=pasword],
        select,
        textarea {
            
            width: 40%;
            padding: 2px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            margin-top: 2px;
            margin-bottom: 2px;
            resize: vertical;
        }
        
        ::placeholder {
            color: rgb(189, 184, 184);
            font-style: italic;
            font-size: 14px;
        }
    </style>
<body >
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
                    
                    <ul class="submenu">
                        <li><a href="index.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
     body{
        background-image: url(images/gambar.jpg);
    }
</style>

<?php
    include("data_class.php");
    $msg="";
    if(!empty($_REQUEST['msg'])){
        $msg=$_REQUEST['msg'];
    }

    if($msg=="done"){
        echo "<div class='alert alert-success' role='alert'>Sucssefully Done</div>";
    }
    elseif($msg=="fail"){
        echo "<div class='alert alert-danger' role='alert'>Fail</div>";
    }

?>
        <div class="caribuku">
            <a href="tambahBuku.html" class="menu-cari-buku">Tambah Buku</a>
        </div>
        <div class="pinjambuku">
            <a href="tambahAnggota.html" class="menu-pinjam-buku">Tambah Anggota</a>
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
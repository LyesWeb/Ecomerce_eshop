<?php
session_start();
include '../include/config.php';
if(isset($_SESSION['a_id'])){
    $aresult = $con->query("SELECT * FROM `admin` WHERE a_id='{$_SESSION['a_id']}'");
    $admin = $aresult->fetch_assoc();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>admin</title>
    <!--Import Google Icon Font-->
    <link href="<?=$path?>css/icones.css" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?=$path?>css/materialize.min.css"  media="screen,projection"/>
    <!-- animate.css -->
    <link rel="stylesheet" type="text/css" href="<?=$path?>css/animate.css">
    <!-- font awesome -->
    <link rel="stylesheet" type="text/css" href="<?=$path?>css/font-awesome.min.css">
    <!-- custom style -->
    <link rel="stylesheet" type="text/css" href="<?=$path?>admin/css/style.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    <div class="head">
        <div class="container">
            <div class="row">
                <div class="logo col s6 m6">
                    <h2><img src="<?=$path?>/images/logo.png" alt=""></h2>
                </div>
                <div class="col s6 m6 right-align">
                    <div class="tools">
                        <img src="<?=$path?>/images/user.png" class="circle">
                        salut, <?=$admin['a_username']?>
                        <a href="logout.php" class="tools_logout"><i class="fa fa-sign-out"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navigation white">
        <div class="container">
            <ul>
                <li><a href="index.php"><i class="fa fa-dashboard"></i> dashboard</a></li>
                <li><a href="produits.php"><i class="fa fa-th-list"></i> les produits</a></li>
                <li><a href="addproduit.php"><i class="fa fa-plus"></i> ajouter produit</a></li>
                <li><a href="clients.php"><i class="fa fa-users"></i> les client</a></li>
                <li><a href="commands.php"><i class="fa fa-th-list"></i> les commands</a></li>
            </ul>
        </div>
    </nav>
    <div class="clearfix"></div>

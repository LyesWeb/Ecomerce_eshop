<?php
include 'config.php';
$action = '';
if(isset($_GET['action']))
    $action = clean($_GET['action']);
if ($action=='addtocard' and isset($_GET['pid'])){
    $exist = false;
    for ($i=0; $i < count($_SESSION['pannier']); $i++)
        if($_SESSION['pannier'][$i]['p_id']==_get('pid')){
            $exist = true;
            $pos = $i;
            break;
        }
    if(!$exist)
        $n = count($_SESSION['pannier']);
    else
        $n = $pos;
    $_SESSION['pannier'][$n]['p_id']=_get('pid');
    $_SESSION['pannier'][$n]['qte']+=1;
    header('Location: index.php');
    exit;
}
// echo "<pre>";
// print_r($_SESSION['pannier']);
// echo "</pre>";
#####[ change lang ]#####
if(isset($_GET['lang'])){
    if($_GET['lang']=='ar'){
        setcookie('lang','ar',time()+24*60*60);
        refrech('index.php',0);
    }else if ($_GET['lang']=='fr') {
        setcookie('lang','fr',time()+24*60*60);
        refrech('index.php',0);
    }
}
#####[ change lang ]#####
if (isset($_COOKIE['lang'])) {
    if ($_COOKIE['lang']=='ar')
        include 'langage/ar.php';
    else
        include 'langage/fr.php';
}else {
    include 'langage/fr.php';
}
#######  prix global de pannier ######
$gp=0;
for ($i=0; $i < count($_SESSION['pannier']); $i++) {
    $qgp = $con->query("SELECT * FROM produit WHERE p_id={$_SESSION['pannier'][$i]['p_id']}");
    $qgp = $qgp->fetch_assoc();
    $gp += $_SESSION['pannier'][$i]['qte']*($qgp['p_prix']-($qgp['p_prix']*$qgp['p_promo']/100));
}
?>
<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="<?=$path?>css/icones.css" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?=$path?>css/materialize.min.css"  media="screen,projection"/>
    <!-- animate.css -->
    <link rel="stylesheet" type="text/css" href="<?=$path?>css/animate.css">
    <!-- font awesome -->
    <link rel="stylesheet" type="text/css" href="<?=$path?>css/font-awesome.min.css">
    <!-- custom style -->

    <link rel="stylesheet" type="text/css" href="<?=$path?>css/style.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<!-- purch -->

<body class="grey lighten-3">
<a href="pannier.php"><div class="purch" id="purch">
    <span class="n"><?php echo count($_SESSION['pannier']); ?></span>
</div></a>
<!-- end purch -->
<!-- header start -->
<header id="header">
    <!-- head top -->
    <div id="headTop" class="light-blue darken-1">
        <div class="container">
            <ul class="left">
                <li><i class="material-icons dp48"><span>perm_phone_msg</i> <?=$info_site['tele']?></span></li>
                <li><i class="material-icons dp48"><span>email</i> <?=$info_site['email']?></span></li>
                <div class="clearfix"></div>
            </ul>
            <ul class="right">
                <?php if(!isset($_SESSION['c_id'])): ?>
                <li style="position: relative;">
                    <a href="register.php" class="waves-effect waves-light"><?=$lang['register']?></a>
                    <div style="color: #fff" class="la-ball-scale-multiple la-2x">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </li>
                <li><a href="register.php" class="waves-effect waves-light"><?=$lang['login']?></a></li>
                <?php else: ?>
                    <!-- Dropdown Trigger -->
                    <li><a class='dropdown-button' href='#' data-activates='user'><img src="<?=$path?>images/user.png" class="circle responsive-img tooltipped"  data-position="left" data-delay="60" data-tooltip="<?php echo $client['c_nom'].'.'.$client['c_prenom'];?>" width='20px'></a></li>
                    <!-- Dropdown Structure -->
                        <ul id='user' class='dropdown-content'>
                        <li><a href="profile.php?id=<?=$client['c_id']?>"><?=$client['c_nom']?></a></li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="material-icons">power_settings_new</i> <?=$lang['logout']?></a></li>
                    </ul>
                <?php endif; ?>
                <!-- Dropdown Trigger -->
                <li><a class="dropdown-button waves-effect waves-light" href="#" data-activates="dropdown1"><?=$lang['lang']?><i class="material-icons right">arrow_drop_down</i></a></li>
                <div class="clearfix"></div>
            </ul>
            <!-- Dropdown Structure -->
            <ul id="dropdown1" class="dropdown-content">
                <li><a href="?lang=fr">Francaise</a></li>
                <li><a href="?lang=ar">العربية</a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- logo section -->
    <div id="logo_recherche" class="light-blue">
        <div class="container">
            <div id="logo" class="left">
                <a href="index.php"><h1><img src="<?=$path?>images/logo.png" alt=""></h1></a>
            </div>
            <div id="recherche" class="right">
                <form method="get" action='recherche.php' class="left">
                    <div class="input-field white">
                        <input id="search" type="search" name="key" required>
                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                        <i class="material-icons">close</i>
                    </div>
                </form>
                <div id="cart" class="right">
                    <a href="pannier.php"><span class="total"><?=$gp?> DHs</span><i class="material-icons dp48">shopping_cart</i>
                    <span class="circle purple lighten-2"><?php echo count($_SESSION['pannier']); ?></span></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- navigation bar -->
    <div id="main_nav">
        <nav>
            <div class="nav-wrapper light-blue">
                <div class="container">
                    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                    <ul class="left hide-on-med-and-down">
                        <li><a href="index.php"><?=$lang['home']?></a></li>
                        <?php
                            $catResult = $con->query("SELECT * FROM `categorie`");
                            $j=0;
                            while ($cat = $catResult->fetch_assoc()) {
                                echo "<li><a href='categorie.php?catid={$cat['id_cat']}'>{$cat['title_cat']}</a></li>";
                                $j++;
                                if($j>5){
                                    echo "<li><a href='categories.php'><i class='fa fa-plus' aria-hidden='true'></i></a></li>";
                                    break;
                                }
                            }
                        ?>
                    </ul>
                    <ul class="side-nav" id="mobile-demo">
                        <li><a href="index.php"><?=$lang['home']?></a></li>
                        <?php
                            $catResult = $con->query("SELECT * FROM `categorie`");
                            $i=0;
                            while ($cat = $catResult->fetch_assoc()) {
                                echo "<li><a href='categorie.php?catid={$cat['id_cat']}'>{$cat['title_cat']}</a></li>";
                                $i++;
                                if($i>9){
                                    $i=0;
                                    break;
                                }
                            }
                            if(!$i) echo "<li><i class='fa fa-plus' aria-hidden='true'></i>
                            <a href='allcategories.php'>{$lang['cats']}</a>
                            </li>";
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!-- main wrapper -->
<div id="main_wrapper">
<!-- <div id="ads_left">
    <img src="images/banner1.gif">
</div> -->

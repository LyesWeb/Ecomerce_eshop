<?php
# ecomerce-eshop
# this is a simple and basic script for ecomerce websites coded by : Ilyas ARIBA
# Email : ilyas.ariba@gmail.com
# Facebook : facebook.com/ilyas.ariba
# Twitter : twitter.com/ilyas_ariba
# Behance : behance.net/ilyas-ariba
# Instagram : instagram.com/ilyas.ariba
?>
<?php
session_start();
if(isset($_SESSION['a_id'])){
    header('Location: index.php');
    exit;
}
include '../include/config.php';
$btncolor = 'blue darken-2';
if(isset($_POST['login'])){
    $ok = false;
    if(!empty($_POST['email']) and !empty($_POST['pass'])){
        $email = clean($_POST['email']);
        $pass = clean($_POST['pass']);
        $pass = md5($pass);
        $r_admin = $con->query("SELECT * FROM `admin` WHERE a_email='$email' and a_pass='$pass'");
        if($r_admin->num_rows<=0){
            $btncolor = 'red darken-1';
        }else {
            $admin = $r_admin->fetch_assoc();
            $ok = true;
            $btncolor = 'green darken-2';
            $_SESSION['a_id'] = $admin['a_id'];
        }
    }else {
        $btncolor = 'red darken-1';
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>login - admin</title>
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
<style media="screen">
body{
    font-size: 15px;
    padding: 64px 24px;
    overflow-y: auto;
    height: auto;
    min-height: 100%;
    background-color: #ececec;
}
.login_content{
    margin: 0 auto;
    width: 30%;
    display: table;
    vertical-align: middle;
    padding: 20px;
    box-shadow: 0 1px 3px rgba(0,0,0,.12), 0 1px 2px rgba(0,0,0,.24);
    border: none;
}
.login_heading {
    text-align: center;
    margin-bottom: 32px;
}
.user_avatar img{
    width: 64px;
    height: 64px;
}
#login_admin{
    width: 100%;
}
</style>
<div class="login_content white">
    <form method="post">
        <div class="login_heading">
            <div class="user_avatar"><img src="../images/user.png" class='circle' alt=""></div>
        </div>
        <form method="post">
            <div class="row">
                <div class="input-field col s12">
                    <input id="email" type="email" name='email' class="validate">
                    <label for="email">Email</label>
                </div>
                <div class="input-field col s12">
                    <input id="password" type="password" name='pass' class="validate">
                    <label for="password">password</label>
                </div>
                <div class="input-field col s12">
                    <input class='btn <?=$btncolor?>' id='login_admin' name='login' type="submit">
                    <?php if ($ok) {
                        refrech("index.php",1);
                    } ?>
                </div>
            </div>
        </form>
    </form>
</div>
<?php
include 'include/footer.php';
?>

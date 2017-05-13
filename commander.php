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
// if (!isset($_POST['passerCmd'])) {
//     header('Location: 404.php');
//     exit;
// }
session_start();
include 'include/header.php';
### refresh pannier ###
if(isset($_POST['refresh'])){
    for ($i=0; $i < count($_POST['qtes']); $i++) {
        $_SESSION['pannier'][$i]['qte'] = $_POST['qtes'][$i];
    }
    refrech('pannier.php',0);
    exit;
}
### /refresh pannier ###
if(!isset($_SESSION['c_id'])){
    include 'include/login.code.php';
}
############################
if(isset($_POST['qtes']))
for ($i=0; $i < count($_POST['qtes']); $i++) {
    $_SESSION['pannier'][$i]['qte'] = $_POST['qtes'][$i];
}
############################
if(isset($_GET['action'])){
    $action = _get('action');
    if($action=='ok'){
        $con->query("INSERT INTO `command` VALUES ('','".date("Y-m-d H:i:s")."',0,{$client['c_id']})");
        $cmd_id = $con->insert_id;
        for ($i=0; $i < count($_SESSION['pannier']); $i++) {
            $pp = $con->query("SELECT * FROM `produit` WHERE `p_id`={$_SESSION['pannier'][$i]['p_id']}");
            $pp = $pp->fetch_assoc();
            $prix = $pp['p_prix']-($pp['p_prix']*$pp['p_promo']/100);
            $con->query("INSERT INTO `article` VALUES ('',$prix,{$_SESSION['pannier'][$i]['qte']},$cmd_id,{$_SESSION['pannier'][$i]['p_id']})");
        }
        unset($_SESSION['pannier']);
        // $_SESSION["pannier"] = array_values($_SESSION["pannier"]);
        refrech('pannier.php',0);
        exit;
    }
}
// echo "<pre>";
// print_r($_SESSION['pannier']);
// echo "</pre>";
?>
<div class="container commander white z-depth-1">
    <div class="row">
        <h6>Envoyer la commande</h6>
        <?php if (isset($_SESSION['c_id'])): ?>
            <div class="col s12">
            Bonjour : <b><?php echo $client['c_nom'].' '.$client['c_prenom'] ?></b><br><br>
                <?php
                    $tbl = "
                    <table id='tableCommand'>
                    <thead>
                        <tr>
                            <th style='width:5%'>#</th>
                            <th style='width:25%'>produit</th>
                            <th style='width:10%'>quantite</th>
                            <th style='width:10%'>prix</th>
                            <th style='width:10%'>total</th>
                        </tr>
                    </thead>
                    ";
                 ?>
                <tbody>
                    <?php
                    $glob=0;
                    for ($i=0; $i < count($_SESSION['pannier']); $i++) {
                        $sp = $con->query("SELECT * FROM `produit` WHERE p_id={$_SESSION['pannier'][$i]['p_id']}");
                        $p = $sp->fetch_assoc();
                        if($_SESSION['pannier'][$i]['qte']>$p['p_stock']) $_SESSION['pannier'][$i]['qte']=$p['p_stock'];
                        $prix = $p['p_prix']-($p['p_prix']*$p['p_promo']/100);
                        $total = $prix*$_SESSION['pannier'][$i]['qte'];
                        $glob+=$total;
                        $tbl.="
                        <tr>
                            <td>$i</td>
                            <td>{$p['p_title']}</td>
                            <td>{$_SESSION['pannier'][$i]['qte']}</td>
                            <td>$prix DHs</td>
                            <td><b>$total DHs</b></td>
                        </tr>
                        ";
                    }
                    $tax = $glob*20/100;
                    $glob+=$tax;
                    $tbl.="
                    <tr>
                        <td colspan=4>tax(20%)</td>
                        <td><b>$tax DHs</b></td>
                    </tr>
                    <tr>
                        <td colspan=4>total</td>
                        <td><b><font size='5'>$glob DHs</font></b></td>
                    </tr>
                    </tbody>
                    </table>
                    ";
                    echo "
                        <div id='data'>
                            $tbl
                        </div>
                    ";
                    ?>
            <div class="right">
                <a href="recu.php">le recu</a>
                <a href="commander.php?action=ok" class="btn">veriffier la commande</a>
            </div>
            <div class="clearfix"></div>
            </div>
        <?php else: ?>
        <div class="col s12 m6">
            <h4>s'identifier</h4>
            <form method="post">
                <div class="input-field col s12">
                  <input placeholder='email' name='email' type="text" class="FRM" autocomplete="off">
                </div>
                <div class="input-field col s12">
                  <input placeholder='password' name='pass' type="password" class="FRM" autocomplete="off">
                </div>
                <div class="input-field col s12">
                    <input type="submit" class='btn' name="login" value="s'identifier">
                </div>
                <div class="input-field col s12">
                    <?php
                        echo $loginMsg;
                        if($ok){
                            refrech("pannier.php",2);
                        }
                    ?>
                </div>
            </form>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php
include 'include/footer.php';
?>

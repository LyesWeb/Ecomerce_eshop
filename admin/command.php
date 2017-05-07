<?php
include 'include/header.php';
if(!isset($_SESSION['a_id'])){
    header('Location: login.php');
    exit;
}
if(!isset($_GET['cmd']) or _get('cmd')==0){
    header('Location: ../404.php');
    exit;
}
$cmd = _get('cmd');

$res2 = $con->query("SELECT * FROM `command` WHERE cmd_id=$cmd");
$fetch2 = $res2->fetch_assoc();
if($res2->num_rows<=0){
    header('Location: ../404.php');
    exit;
}
$res = $con->query("SELECT *
                    FROM command
                    INNER JOIN article
                    ON command.cmd_id=article.cmd_id
                    INNER JOIN produit
                    ON article.p_id=produit.p_id
                    WHERE command.cmd_id=$cmd");



$res3 = $con->query("SELECT * FROM `client` WHERE c_id={$fetch2['c_id']}");
$client = $res3->fetch_assoc();

?>
<div class="container nav-wrapper">
  <div class="col s12">
    <a href="index.php" class="breadcrumb">dashboard</a>
    <a href="produits.php" class="breadcrumb">command</a>
  </div>
</div>
<div class="container command white">
    <div class="row" style="margin:0 10px;">
        <div class="info col m5 s12">
            <h4>address de distinataire</h4>
            <address class="">
                <abbr title="email">E-mail:</abbr><span> <?=$info_site['email']?></span><br>
                <abbr title="Phone">Phone:</abbr><span> <?=$info_site['tele']?></span><br>
                <abbr title="Fax">Fax:</abbr><span> <?=$info_site['fax']?></span><br>
                <abbr title="address">address:</abbr><span> <?=$info_site['adresse']?></span><br>
            </address>
        </div>
        <div class="info col m5 s12" style="border-color: #9bd3fb;">
            <h4>address de client</h4>
            <address class="">
                <abbr title="nom et prenom">Nom et Prenom:</abbr><span> <?php echo $client['c_nom'].' '.$client['c_prenom'];?></span><br>
                <abbr title="email">E-mail:</abbr><span> <?php echo $client['c_email'];?></span><br>
                <?php if($client['c_fax']!='') echo "<abbr title=fax>Fax :</abbr><span>".$client['c_fax']."</span><br>"; ?>
                <abbr title="address">address:</abbr><span> <?php echo $client['c_adresse'].', '.$client['c_ville'].', '.$client['c_contry'];?></span><br>
            </address>
        </div>
    </div>
    <div class="commandStat">
        <span class="left">Stat : </span>
        <?php
            if ($fetch2['cmd_stat']==0)
                echo "<span class='nopayer left'>non payer</span>";
            else
                echo "<span class='payer left'>payer</span>";
        ?>
        <div class="clearfix"></div>
    </div>
    <table id='tableCommand'>
        <thead>
            <tr>
                <th style="width:5%">#</th>
                <th style="width:25%">produit</th>
                <th style="width:10%">quantite</th>
                <th style="width:10%">prix</th>
                <th style="width:10%">total</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i=1;
                $glob=0;
                while ($article = $res->fetch_assoc()) {
                    $total = $article['article_qte']*$article['article_prix'];
                    echo "
                    <tr>
                        <td>$i</td>
                        <td>{$article['p_title']}</td>
                        <td>{$article['article_qte']}</td>
                        <td>{$article['article_prix']} DHs</td>
                        <td><b>$total DHs</b></td>
                    </tr>
                    ";
                    $i++;
                    $glob+=$total;
                }
                $tax=$glob*(20/100);
                $glob+=$tax;
            ?>
            <tr>
                <td colspan="4">tax(20%)</td>
                <td><b><?=$tax?> DHs</b></td>
            </tr>
            <tr>
                <td colspan="4">total</td>
                <td><b><font size='5'><?=$glob?> DHs</font></b></td>
            </tr>
        </tbody>
    </table>
    <div class="right">
        <a href="#" onclick='window.print();' class="btn"><i class="fa fa-print" aria-hidden="true"></i></a>
    </div>
    <div class="clearfix"></div>
</div>
<?php
include 'include/footer.php';
?>

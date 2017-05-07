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
include 'include/header.php';
if(!isset($_GET['pid'])){
    refrech('404.php',0);
    exit;
}
$pid = _get('pid');
$res = $con->query("SELECT * FROM `produit` WHERE `p_id`=$pid");
if($res->num_rows<=0){
    refrech('404.php',0);
    exit;
}
$pro = $res->fetch_assoc();
###  add to card ###
if(isset($_POST['add'])){
    $qt = clean($_POST['qte']);
    $exist = false;
    for ($i=0; $i < count($_SESSION['pannier']); $i++)
        if($_SESSION['pannier'][$i]['p_id']==$pid){
            $exist = true;
            $pos = $i;
            break;
        }
    if(!$exist)
        $n = count($_SESSION['pannier']);
    else
        $n = $pos;
    $_SESSION['pannier'][$n]['p_id']=$pid;
    $_SESSION['pannier'][$n]['qte']+=$qt;
    refrech('pannier.php',0);
    exit;
}
?>
<div class="container detail">
    <h2 class="nom_produit"><?=$pro['p_title']?></h2>
    <div class="stars">
        <i class="material-icons dp48">star</i>
        <i class="material-icons dp48">star</i>
        <i class="material-icons dp48">star</i>
        <i class="material-icons dp48">star</i>
        <i class="material-icons dp48">star</i>
        <span>(876 votes)</span>
    </div>
    <div class="pro_images">
        <div class="left">
            <ul>
                <?php
                    echo "<li><img src='images/produit/thumb/{$pro['p_thumb']}' class=pImg></li>";
                    $imgs = $con->query("SELECT * FROM `images` WHERE p_id=$pid");
                    while ($image = $imgs->fetch_assoc()) {
                        echo "<li><img src='images/produit/pictures/{$image['nom_image']}' class=pImg></li>";
                    }
                ?>
            </ul>
        </div>
        <div class="left p_image">
            <img src="images/produit/thumb/<?=$pro['p_thumb']?>">
            <div class="loop"></div>
            <div class="calc"></div>
            <div class="img_tools">
                <ul>
                    <li id="zoomin"><i class="material-icons dp48">zoom_in</i></li>
                    <li id="zoomout"><i class="material-icons dp48">zoom_out</i></li>
                    <li id="zoomreset"><i class="material-icons dp48">youtube_searched_for</i></li>
                    <div class="clearfix"></div>
                </ul>
            </div>
        </div>
        <div class="ecran z-depth-1"></div>
        <div class="right desc">
            <p>
                <?=$pro['p_desc']?>
            </p>
        </div>
        <div class="right details_table">
            <table>
                <?php
                if ($pro['p_promo']!='' or $pro['p_promo']!=0) {
                    $prix_reduit = $pro['p_prix']-($pro['p_prix']*($pro['p_promo']/100));
                    echo "
                    <tr>
                        <td><b>{$lang['prix']}</b></td>
                        <td><s>{$pro['p_prix']} DHs</s></td>
                    </tr>
                    <tr>
                        <td><b>{$lang['Prix r']}</b></td>
                        <td><span class=leprix>$prix_reduit DHs</span><span class='badge red darken-1 w'>-{$pro['p_promo']}%</span></td>
                    </tr>
                    ";
                }else {
                    echo "
                    <tr>
                        <td><b>Prix</b></td>
                        <td><span class=leprix>10.99 DHs</span></td>
                    </tr>
                    ";
                }
                ?>
                <form method="post">
                <tr>
                    <td><b><?=$lang['qte']?></b></td>
                    <td>
                        <div style="position: relative;display: table;">
                            <button type='button' class="qte_control transparent qteM"><i class="fa fa-minus" aria-hidden="true"></i></button><input id="qte" value="1" name='qte' type="text"><button type='button' class="qte_control transparent qteP"><i class="fa fa-plus" aria-hidden="true"></i></button>
                        </div>
                        <small class="remarque">(<?=$pro['p_stock']?> <?=$lang['stok available']?>)</small>
                        <input type="hidden" id='nbStock' value="<?=$pro['p_stock']?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align='right'><input type='submit' name='add' style='width: 100%;' class="btn light-blue" value="<?=$lang['acheter']?>"></td>
                </tr>
                </form>
            </table>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container other z-depth-1 white">
    <div class="row">
        <div class="col s12">
            <ul class="tabs">
                <li class="tab col s3"><a class="active" href="#test1"><?=$lang['details']?></a></li>
                <li class="tab col s3"><a href="#test2"><?=$lang['video']?></a></li>
            </ul>
        </div>
        <div id="test1" class="col s12 tabcontent">
            <table border="0" class="table tableDetails striped">
                <?php
                    $res = $con->query("SELECT nom_detail,content_detail FROM detail WHERE p_id=$pid");
                    if($res->num_rows<=0)
                    echo "<div class='wranign'><i class='fa fa-exclamation-triangle' aria-hidden='true'></i> aucun details</div>";
                    else
                    while ($de = $res->fetch_assoc()) {
                        echo "
                        <tr>
                            <th width='150px'><i class='fa fa-check' aria-hidden='true'></i> {$de['nom_detail']}</th>
                            <td>{$de['content_detail']}</td>
                        </tr>
                        ";
                    }
                ?>
            </table>
        </div>
        <div id="test2" class="col s12 tabcontent">
            <?php if ($pro['p_video']==''): ?>
                <div class="wranign"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> aucun video</div>
            <?php else: ?>
                <video class="responsive-video" controls>
                    <source src="videos/<?=$pro['p_video']?>" type="video/mp4">
                </video>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="container other z-depth-1 white">
    <div class="row">
        <div class="col s12">
            <ul class="tabs">
                <li class="tab col s3"><a class="active" href="#commentaires"><?=$lang['comments']?></a></li>
                <li class="tab col s3"><a href="#poster"><?=$lang['add comment']?></a></li>
            </ul>
        </div>
        <div id="commentaires" class="col s12 tabcontent">
            <?php
            $comres = $con->query("SELECT * FROM comment INNER JOIN client ON comment.c_id=client.c_id WHERE p_id=$pid");
            if($comres->num_rows<=0)
            echo "<div class='wranign'><i class='fa fa-exclamation-triangle' aria-hidden='true'></i> aucun commentaire</div>";
            while ($c = $comres->fetch_assoc())
                echo "
                <div class='row valign-wrapper'>
                  <div class='col s4 m1'>
                    <img src='images/avatar/{$c['c_avatar']}' class='circle responsive-img valign tooltipped' data-position='left' data-delay='60' data-tooltip='{$c['c_nom']} {$c['c_prenom']}'>
                  </div>
                  <div class='col s8 m10'>
                      <p><small><time class='grey-text  text-darken-1'>{$c['comment_date']}</time></small></p>
                    <span class='grey-text  text-darken-3'>{$c['content_comment']}</span>
                  </div>
                </div>
                ";
            ?>

            <!-- <div class="">
                <ul class="pagination">
                    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                    <li class="active"><a href="#!">1</a></li>
                    <li class="waves-effect"><a href="#!">2</a></li>
                    <li class="waves-effect"><a href="#!">3</a></li>
                    <li class="waves-effect"><a href="#!">4</a></li>
                    <li class="waves-effect"><a href="#!">5</a></li>
                    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                 </ul>
            </div> -->
        </div>
        <div id="poster" class="col s12 tabcontent">
            <div class="row">
                <form class="col s12" method="post">
                  <div class="row" style="margin-bottom:0;">
                    <div class="input-field comment col s12">
                      <textarea placeholder='poster votre commantaire ...' id="textarea1" name='commantaire' class="materialize-textarea"></textarea>
                      <!-- <label for="textarea1">Textarea</label> -->
                      <input type="submit" class="waves-effect waves-light btn right light-blue" name="commenter" value="commenter">
                    </div>
                  </div>
                </form>
                <?php
                if(isset($_POST['commenter'])){
                    if(isset($_SESSION['c_id']))
                    @mysqli_query($con,"INSERT INTO `comment` (c_id,content_comment,p_id) VALUES ({$_SESSION['c_id']},'{$_POST['commantaire']}',$pid)");
                    else
                    refrech('register.php',0);
                }
                ?>
            </div>
        </div>
    </div>
</div>
</div>
<?php
include 'include/footer.php';
?>

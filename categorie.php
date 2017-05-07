<?php
include 'include/header.php';
if(!isset($_GET['catid'])){
    refrech('404.php',0);
    exit;
}
$catid = _get('catid');
?>
<!-- les pros de cat -->
<?php
$pro_result = $con->query("SELECT * FROM produit WHERE id_cat=$catid ORDER BY `p_promo` DESC");
$cat_result = $con->query("SELECT * FROM categorie WHERE id_cat=$catid");
$cat_result = $cat_result->fetch_assoc();
?>
<div class="container produits">
    <h5 class="section_title"><?=$lang['cat']?> : <?php echo "<b>{$cat_result['title_cat']}</b>" ?></h5>
    <div class="row">
        <?php while ($pro = $pro_result->fetch_assoc()): ?>
        <div class="col s12 m3">
            <div class="card">
                <a href="product.php?pid=<?=$pro['p_id']?>">
                    <div class="card-image waves-effect waves-block waves-light" style="background-image: url('images/produit/thumb/<?=$pro['p_thumb']?>');">
                    <?php
                        if($pro['p_promo']!=0){
                            echo "<span class=badge>".$pro['p_promo']."%</span>";
                        }
                    ?>
                    <a href="?action=addtocard&pid=<?=$pro['p_id']?>" class="addtocart waves-effect waves-light"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                    </div>
                </a>
                <div class="card-content">
                    <span class="card-title grey-text text-darken-4"><a href="product.php?pid=<?=$pro['p_id']?>"><?=$pro['p_title']?></a><i class="material-icons activator right Points">more_vert</i></span>
                    <div class="prises">
                        <?php
                            if($pro['p_promo']!=0){
                                $promo = $pro['p_prix']*($pro['p_promo']/100);
                                echo ($pro['p_prix']-$promo).' DHs';
                                echo "<small> DHs</small> <font>{$pro['p_prix']} DHs</font>";
                            }else {
                                echo $pro['p_prix'].' DHs';
                            }
                        ?>
                    </div>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4"><?=$pro['p_title']?><i class="material-icons right">close</i></span>
                    <p><?=$pro['p_desc']?></p>
                </div>
            </div>
        </div>
        <?php endwhile; ?>

</div>
</div>
<?php
include 'include/footer.php';
?>

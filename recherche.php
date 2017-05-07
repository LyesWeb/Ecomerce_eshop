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
?>
<div class="container produits">
<div class="row">
<?php
    $recherche_result = mysqli_query($con,"SELECT * FROM produit WHERE p_title LIKE '%".$_GET['key']."%'");
    if(mysqli_num_rows($recherche_result)<=0){
        echo "<div class=error>Aucun resulta trouver avec '<u><b>{$_GET['key']}</b></u>'</div>";
    }else{
        while ($pro = mysqli_fetch_array($recherche_result)){
?>

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

<?php
}
}
?>
</div>
</div>
<?php
include 'include/footer.php';
?>

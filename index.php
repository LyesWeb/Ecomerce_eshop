<?php
include 'include/header.php';
?>
<!-- menue and slider -->
<div class="container">
    <div class="row">
        <div class="col s12 m3">
            <div class="sidebar z-depth-1">
                <div class="head_list purple lighten-2"><i class="material-icons">menu</i> <?=$lang['cats']?></div>
                <ul class="md-list">
                    <?php
                        $catResult = $con->query("SELECT * FROM `categorie`");
                        while ($cat = $catResult->fetch_assoc()) {
                            echo "<li><a href='categorie.php?catid={$cat['id_cat']}'><i class='material-icons dp48'>done</i> {$cat['title_cat']}</a></li>";
                        }
                    ?>
                </ul>
            </div>
        </div>
        <div class="col s12 m9">
            <div class="carousel carousel-slider center" data-indicators="true">
                <div class="carousel-item red white-text" href="#one!">
                    <h2>annonce 1</h2>
                    <p class="white-text">ici annonce 1</p>
                </div>
                <div class="carousel-item amber white-text" href="#two!">
                    <h2>annonce 2</h2>
                    <p class="white-text">ici annonce 2</p>
                </div>
                <div class="carousel-item green white-text" href="#three!">
                    <h2>annonce 3</h2>
                    <p class="white-text">ici annonce 3</p>
                </div>
                <div class="carousel-item blue white-text" href="#four!">
                    <h2>annonce 4</h2>
                    <p class="white-text">ici annonce 4</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- top produit -->
<?php
$top_result = $con->query("SELECT *,sum(article_qte) n FROM `produit` INNER JOIN `article` ON produit.p_id=article.p_id INNER JOIN `command` ON article.cmd_id=command.cmd_id GROUP BY article.p_id ORDER BY sum(article_qte) DESC LIMIT 4");
?>
<div class="container produits">
    <h5 class="section_title"><?=$lang['top prp']?></h5>
    <div class="row">
        <?php while ($top_pro = $top_result->fetch_assoc()): ?>
        <div class="col s12 m3">
            <div class="card">
                <a href="product.php?pid=<?=$top_pro['p_id']?>">
                    <div class="card-image waves-effect waves-block waves-light" style="background-image: url('images/produit/thumb/<?=$top_pro['p_thumb']?>');">
                    <?php
                        if($top_pro['p_promo']!=0){
                            echo "<span class=badge>".$top_pro['p_promo']."%</span>";
                        }
                    ?>
                    <a href="?action=addtocard&pid=<?=$top_pro['p_id']?>" class="addtocart waves-effect waves-light"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                    </div>
                </a>
                <div class="card-content">
                    <span class="card-title grey-text text-darken-4"><a href="product.php?pid=<?=$top_pro['p_id']?>"><?=$top_pro['p_title']?></a><i class="material-icons activator right Points">more_vert</i></span>
                    <div class="prises">
                        <?php
                            if($top_pro['p_promo']!=0){
                                $promo = $top_pro['p_prix']*($top_pro['p_promo']/100);
                                echo ($top_pro['p_prix']-$promo).' DHs';
                                echo "<small> DHs</small> <font>{$top_pro['p_prix']} DHs</font>";
                            }else {
                                echo $top_pro['p_prix'].' DHs';
                            }
                        ?>
                    </div>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4"><?=$top_pro['p_title']?><i class="material-icons right">close</i></span>
                    <p><?=$top_pro['p_desc']?></p>
                </div>
            </div>
        </div>
        <?php endwhile; ?>

</div>
</div>
<!-- top promo -->
<?php
$top_result = $con->query("SELECT * FROM `produit` WHERE p_promo!=0 ORDER BY p_promo DESC LIMIT 4");
?>
<div class="container produits">
    <h5 class="section_title"><?=$lang['top promo']?></h5>
    <div class="row">
        <?php while ($top_pro = $top_result->fetch_assoc()): ?>
        <div class="col s12 m3">
            <div class="card">
                <a href="product.php?pid=<?=$top_pro['p_id']?>">
                    <div class="card-image waves-effect waves-block waves-light" style="background-image: url('images/produit/thumb/<?=$top_pro['p_thumb']?>');">
                    <?php
                        if($top_pro['p_promo']!=0){
                            echo "<span class=badge>".$top_pro['p_promo']."%</span>";
                        }
                    ?>
                    <a href="?action=addtocard&pid=<?=$top_pro['p_id']?>" class="addtocart waves-effect waves-light"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                    </div>
                </a>
                <div class="card-content">
                    <span class="card-title grey-text text-darken-4"><a href="product.php?pid=<?=$top_pro['p_id']?>"><?=$top_pro['p_title']?></a><i class="material-icons activator right Points">more_vert</i></span>
                    <div class="prises">
                        <?php
                            if($top_pro['p_promo']!=0){
                                $promo = $top_pro['p_prix']*($top_pro['p_promo']/100);
                                echo ($top_pro['p_prix']-$promo).' DHs';
                                echo "<small> DHs</small> <font>{$top_pro['p_prix']} DHs</font>";
                            }else {
                                echo $top_pro['p_prix'].' DHs';
                            }
                        ?>
                    </div>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4"><?=$top_pro['p_title']?><i class="material-icons right">close</i></span>
                    <p><?=$top_pro['p_desc']?></p>
                </div>
            </div>
        </div>
        <?php endwhile; ?>

</div>
</div>
<?php
include 'include/footer.php';
?>

<?php
include 'include/header.php';

if(isset($_GET['action'])){
    $action = clean($_GET['action']);
    if ($action=='deleteall' and isset($_SESSION['pannier'])){
        session_unset($_SESSION['pannier']);
        refrech('pannier.php',0);
        exit;
    }

}

### delete article ###
if(isset($_GET['action']) and isset($_GET['pid'])){
    $action = clean($_GET['action']);
    if($action=='delete'){
        $delete_id = _get('pid');
        for ($i=0; $i < count($_SESSION['pannier']); $i++) {
            if($_SESSION['pannier'][$i]['p_id']==$delete_id){
                unset($_SESSION['pannier'][$i]);
                $_SESSION["pannier"] = array_values($_SESSION["pannier"]);
                refrech('pannier.php',0);
                exit;
            }
        }
        refrech('404.php',0);
        exit;
    }
}



// echo "<pre>";
// print_r($_SESSION['pannier']);
// echo "</pre>";
?>
<div class="container nav-wrapper">
  <div class="col s12">
    <a href="index.html" class="breadcrumb"><?=$lang['home']?></a>
    <a href="pannier.html" class="breadcrumb"><?=$lang['yourpannier']?></a>
  </div>
</div>
<div class="container pannier white">
    <h4><?=$lang['yourpannier']?></h4>
    <?php if (count($_SESSION['pannier'])<=0): ?>
        <?php echo "<div class=wranign><i class='fa fa-exclamation-triangle' aria-hidden='true'></i> {$lang['panniervide']}</div>"; ?>
    <?php else: ?>
    <form method="post" action="commander.php">
    <table>
        <thead>
          <tr>
              <th align='left' data-field="id"><?=$lang['produit']?></th>
              <th></th>
              <th align='left' data-field="quantite"><?=$lang['qte']?></th>
              <th align='left' data-field="prix"><?=$lang['prix']?></th>
              <th></th>
          </tr>
        </thead>

        <tbody>
            <?php
                for ($i=0; $i < count($_SESSION['pannier']); $i++) {
                    $total = 0;
                    $res = $con->query("SELECT * FROM `produit` WHERE p_id={$_SESSION['pannier'][$i]['p_id']}");
                    $produit = $res->fetch_assoc();
                    if($_SESSION['pannier'][$i]['qte']>$produit['p_stock']){
                        $_SESSION['pannier'][$i]['qte']=$produit['p_stock'];
                    }
                    $prix = $_SESSION['pannier'][$i]['qte']*($produit['p_prix']-($produit['p_prix']*$produit['p_promo']/100));
                    echo "
                    <tr>
                        <td align='left' width='100px'><img width='100px' src='images/produit/thumb/{$produit['p_thumb']}' class='ppi'></td>
                        <td align='left'>{$produit['p_title']}</td>
                        <td align='left' width='200px'>
                            <input type=hidden id='hiddennbstock' value='{$produit['p_stock']}' />
                            <input type=number min=1 max={$produit['p_stock']} class='qte_p' id='pannierqte' name='qtes[]' value={$_SESSION['pannier'][$i]['qte']}>
                            <br /><small class=remarque>({$produit['p_stock']} {$lang['stok available']})</small>
                        </td>
                        <td align='left' width='100px'>$prix DHs</td>
                        <td align='left' width='50px'><a href='pannier.php?action=delete&pid={$produit['p_id']}' class=trash><i class='fa fa-trash' aria-hidden='true'></i></a></td>
                    </tr>
                    ";
                    $total+=$prix;
                }
            ?>

        </tbody>
    </table>
    <br>
    <div class="right">
        <h6 class="left" style="margin-right:10px;">total : <?=$total?> DHs</h6><input type='submit' name='passerCmd' class="btn right" value="<?=$lang['commander']?>"/> <input type="submit" name="refresh" class="btn" value="<?=$lang['refresh']?>">
    </div>
    </form>
    <div class="clearfix"></div>

    <a href="pannier.php?action=deleteall" class="btn"><?=$lang['vider']?></a>
    <?php endif; ?>
</div>

</div>
<?php
include 'include/footer.php';
?>

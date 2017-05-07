<?php
include 'include/header.php';
// add new product
$msg='';
if(isset($_POST['add'])){
    if(!empty($_POST['titre']) and !empty($_POST['desc']) and !empty($_POST['prix']) and intval($_POST['cat'])!=0){
            $titre = clean($_POST['titre']);
            $prix = nbr(clean($_POST['prix']));
            $stock = nbr(clean($_POST['stock']));
            $promo = nbr(clean($_POST['promo']));
            $Cat = intval($_POST['cat']);
            $desc = clean($_POST['desc']);
            $type = strrchr($_FILES['thumb']['name'],'.');
            $thumb_name = RandString().$type;
            $thumb_tmpname = $_FILES['thumb']['tmp_name'];
            $video = '';
            if($_FILES['video']['name']!=''){
                @move_uploaded_file($_FILES['video']['tmp_name'],'../videos/'.$_FILES['video']['name']);
                $video = $_FILES['video']['name'];
            }

            // upload thumb
            @move_uploaded_file($thumb_tmpname,'../images/produit/thumb/'.$thumb_name);
            // inset into product
            $con->query("INSERT INTO `produit`
                (`p_title`,`p_desc`,`p_prix`,`p_stock`,`p_promo`,`p_video`,`p_thumb`,`id_cat`)
            VALUES ('$titre','$desc',$prix,$stock,$promo,'$video','$thumb_name',$Cat) ");
            $p_id = $con->insert_id;
            // upload images
            for ($i=0; $i < count($_FILES['images']['name']); $i++){
                $type = strrchr($_FILES['images']['name'][$i],'.');
                $pic_name = RandString().$type;
                @move_uploaded_file($_FILES['images']['tmp_name'][$i],'../images/produit/pictures/'.$pic_name);
                $con->query("INSERT INTO `images` VALUES ('',$p_id,'$pic_name')");
            }
            ### details ###
            if(!empty($_POST['det']) and !empty($_POST['detcon']))
                for ($i=0; $i < count($_POST['det']); $i++) {
                    $con->query("INSERT INTO `detail` VALUES ('','{$_POST['det'][$i]}','{$_POST['detcon'][$i]}',$p_id)");
                }
    }else {
        $msg = '<div class=error>entrer touts les information</div>';
    }
}
?>
<div class="container nav-wrapper">
  <div class="col s12">
    <a href="index.php" class="breadcrumb">dashboard</a>
    <a href="addproduit.php" class="breadcrumb">ajouter produit</a>
  </div>
</div>
<div class="container add_pproduit white">
    <form method="post" enctype="multipart/form-data">
    <div class="row">
            <div class="col s12 m6">
                <h5>ajouter une produit :</h5>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="first_name" type="text" name='titre' >
                        <label for="first_name">Titre de produit</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="first_name" type="number" name='prix' >
                        <label for="first_name">Prix</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="first_name" type="number" name='promo' >
                        <label for="first_name">promotion</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="first_name" type="number" name='stock' >
                        <label for="first_name">stock</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <div class="file-field input-field">
                        <div class="btn">
                        <span>Images</span>
                            <input type="file" name='images[]' multiple accept="image/*">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="textarea1" name='desc' class="materialize-textarea"></textarea>
                        <label for="textarea1">Description</label>
                    </div>
                </div>
        </div>
        <div class="col s12 m6">
            <div class="row">
                <div class="input-field col s12">
                  <select class="browser-default" name='cat'>
                    <option value="" disabled selected>-- categorie --</option>
                    <?php
                        $s_cat = $con->query("SELECT * FROM `categorie`");
                        while ($cat=$s_cat->fetch_assoc())
                            echo "<option value='{$cat['id_cat']}'>{$cat['title_cat']}</option>";
                    ?>
                  </select>
                </div>
            </div>
            <div class="file-field input-field">
            <div class="btn">
            <span>thumb</span>
                <input type="file" id='imgInp' name='thumb'>
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
            </div>

            <!-- video -->
            <div class="file-field input-field">
            <div class="btn">
            <span>video</span>
                <input type="file" name='video'>
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
            </div>
            <!-- /video -->


            <img id="blah" src="<?=$path?>images/thumb.png" alt="your image" />
            <h5>les details :</h5>
            <div id="details">
                <input type="hidden" id="detailnumber" value="1">
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" name="det[]" placeholder="detail 1">
                    </div>
                    <div class="input-field col s6">
                        <input type="text" name="detcon[]" placeholder="contenu 1">
                    </div>
                </div>
            </div>
            <button type="button" id='adddetail' class='btn waves-effect waves-light' name="button">+</button>
            <div class="row">
                <div class="input-field col s12">
                    <input type="submit" name="add" class='btn' value="Ajouter">
                </div>
            </div>
            <div class="row">
                <?=$msg?>
            </div>
        </div>
    </div>
    </form>
</div>
<?php
include 'include/footer.php';
?>

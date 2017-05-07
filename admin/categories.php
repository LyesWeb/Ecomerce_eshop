<?php
include 'include/header.php';
// add new cat
$msg='';
if(isset($_POST['add'])){
    if(!empty($_POST['cat'])){
        $cat = clean($_POST['cat']);
        if(!$con->query("INSERT INTO `categorie` VALUES ('','$cat')")){
            $msg = '<br /><div class=error>error</div>';
        }
    }else {
        $msg = '<br /><div class=error>entrer le titre de categorie</div>';
    }
}

?>
<div class="container nav-wrapper">
  <div class="col s12">
    <a href="index.php" class="breadcrumb">dashboard</a>
    <a href="addproduit.php" class="breadcrumb">categories</a>
  </div>
</div>
<div class="container add_pproduit white">
    <form method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col s12 m5">
            <h5>Ajouter categorie</h5>
            <form method="post">
                <div class="input-field col s6">
                    <input id="c" type="text" name='cat' class="validate">
                    <label for="c">categorie</label>
                </div>
                <div class="input-field col s12">
                    <input type="submit" value='ajouter' name='add' class="btn">
                </div>
                <div class="input-field col s12">
                    <?php echo $msg ?>
                </div>
            </form>

        </div>
        <div class="col s12 m7">
            <h5>Les categories :</h5>
            <table class="striped">
                <thead>
                    <th>#</th>
                    <th>categorie</th>
                    <th>delete</th>
                </thead>
                <tbody>
                    <?php
                        $res = $con->query("SELECT * FROM `categorie` ORDER BY `id_cat` DESC");
                        while ($cat = $res->fetch_assoc()) {
                            echo "
                            <tr>
                                <td>{$cat['id_cat']}</td>
                                <td>{$cat['title_cat']}</td>
                                <td><a href='categories.php?action=deletecat&idcat={$cat['id_cat']}'><i class='material-icons dp48'>delete</i></a></td>
                            </tr>
                            ";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    </form>
</div>
<?php
include 'include/footer.php';
?>

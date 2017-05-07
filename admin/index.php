<?php
include 'include/header.php';
if(!isset($_SESSION['a_id'])){
    header('Location: login.php');
    exit;
}
?>
<div class="container">
    <div class="row">
        <?php
            $q_produit = $con->query("SELECT * FROM `produit`");
            $n_p = $q_produit->num_rows;
            $q_client = $con->query("SELECT * FROM `client`");
            $n_c = $q_client->num_rows;
            $q_command = $con->query("SELECT * FROM `command` WHERE `cmd_stat`=0");
            $n_command = $q_command->num_rows;
        ?>
        <div class="col s3 m3">
            <div class="box purple lighten-2">
                clients
                <span><?=$n_c?></span>
                <i class="fa fa-users"></i>
            </div>
        </div>
        <div class="col s3 m3">
            <div class="box red lighten-2">
                produits
                <span><?=$n_p?></span>
                <i class="fa fa-shopping-cart"></i>
            </div>
        </div>
        <div class="col s3 m3">
            <div class="box blue lighten-2">
                commands
                <span><?=$n_command?></span>
                <i class="fa fa-list-ul"></i>
            </div>
        </div>
        <div class="col s3 m3">
            <div class="box teal lighten-2">
                chifre d'affire
                <?php
                    $g = $con->query("SELECT article_prix,article_qte FROM article");
                    $cg = 0;
                    while ($a = $g->fetch_assoc()) {
                        $cg+= $a['article_prix']*$a['article_qte'];
                    }
                ?>
                <span><?=$cg?> DHs</span>
                <i class="fa fa-fw fa-money"></i>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="blocDes white col s12 m12">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
    </div>
</div>
<?php
include 'include/footer.php';
?>

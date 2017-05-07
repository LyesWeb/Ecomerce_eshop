<?php
session_start();
if(isset($_SESSION['c_id'])){
    header('Location: 404.php');
    exit;
}

include 'include/header.php';
include 'include/register.code.php';
include 'include/login.code.php';
?>
<div class="container register_content white z-depth-1">
    <div class="row">
        <div class="col s12 m6">
            <h4><?=$lang['register']?></h4>
            <form method="post">
                <div class="input-field col s12">
                  <input placeholder='nom' name='nom' type="text" class="FRM" autocomplete="off">
                </div>
                <div class="input-field col s12">
                  <input placeholder='prenom' name='prenom' type="text" class="FRM" autocomplete="off">
                </div>
                <div class="input-field col s12">
                  <input placeholder='email' name='email' type="email" class="FRM" autocomplete="off">
                </div>
                <div class="input-field col s12">
                  <input placeholder='password' name='pass' type="password" class="FRM" autocomplete="off">
                </div>
                <div class="input-field col s12">
                  <input placeholder='password' name='repass' type="password" class="FRM" autocomplete="off">
                </div>
                <div class="input-field col s12">
                    <select name="sex" class="browser-default">
                        <option value="homme">homme</option>
                        <option value="femme">femme</option>
                    </select>
                </div>
                <div class="input-field col s12">
                    <input type="submit" class='btn' name="register" value="<?=$lang['register']?>">
                </div>
                <div class="input-field col s12">
                    <?=$msg?>
                </div>
            </form>
        </div>
        <div class="col s12 m6">
            <h4><?=$lang['login']?></h4>
            <form method="post">
                <div class="input-field col s12">
                  <input placeholder='email' name='email' type="text" class="FRM" autocomplete="off">
                </div>
                <div class="input-field col s12">
                  <input placeholder='password' name='pass' type="password" class="FRM" autocomplete="off">
                </div>
                <div class="input-field col s12">
                    <input type="submit" class='btn' name="login" value="<?=$lang['login']?>">
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
    </div>
</div>
<?php
include 'include/footer.php';
?>

<?php
if(isset($_POST['login'])){
    $loginMsg = '';
    $ok = false;
    if(!empty($_POST['email']) and !empty($_POST['pass'])){
        $email = clean($_POST['email']);
        $pass = md5(clean($_POST['pass']));
        $result = $con->query("SELECT * FROM `client` WHERE c_email='$email' and c_pass='$pass'");
        if($result->num_rows<=0){
            $loginMsg = "<div class=error><i class='material-icons'>info_outline</i> les information est incorrect</div>";
        }else {
            $client = $result->fetch_assoc();
            $_SESSION['c_id'] = $client['c_id'];
            $loginMsg = "<div class=ok><i class='material-icons'>done</i> vous avez bien s'identifier ...</div>";
            $ok = true;
        }
    }else {
        $loginMsg = "<div class=error><i class='material-icons'>info_outline</i> entrer touts les informations</div>";
    }
}
?>

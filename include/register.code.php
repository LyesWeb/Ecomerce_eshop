<?php
if(isset($_POST['register'])){
    $msg = '';
    if(!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['pass']) and !empty($_POST['repass']) and !empty($_POST['sex']) and !empty($_POST['email'])){
        $nom = clean($_POST['nom']);
        $prenom = clean($_POST['prenom']);
        $password = clean($_POST['pass']);
        $repassword = clean($_POST['repass']);
        $sex = clean($_POST['sex']);
        $email = clean($_POST['email']);
        if($password!==$repassword){
            $msg = '<div class=error>les motes de pass est incorrect</div>';
        }else {
            $password = md5($password);
            if($con->query("INSERT INTO `client` (`c_nom`,`c_prenom`,`c_email`,`c_pass`,`c_sex`) VALUES ('$nom','$prenom','$email','$password','$sex')")){
                $msg = '<div class=ok>vous avez inscrit avec sucssis</div>';
            }else {
                $msg = "<div class=error>vous n'navez inscrit</div>";
            }
        }
    }else {
        $msg = '<div class=error>entrer touts les informations</div>';
    }
}
?>

<?php
function _get($g){
    if(!isset($_GET[$g])) return 0;
    return abs(intval(htmlentities(trim($_GET[$g]))));
}
function nbr($nbr){
    return abs(intval(htmlentities(trim($nbr))));
}
function clean($string){
    global $con;
    return htmlentities(mysqli_real_escape_string($con,trim($string)));
}
function refrech($page,$time){
     echo "<meta http-equiv='refresh' content='".$time."; url=".$page."' />";
}
function RandString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>

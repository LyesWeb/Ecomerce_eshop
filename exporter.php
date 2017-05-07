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
$res = $con->query("SELECT * FROM produit NATURAL JOIN categorie");

$pro = fopen('produits.xml','w');
fwrite($pro,"<?xml version='1.0' encoding='UTF-8'?>\n<produits>");
while($produit = $res->fetch_assoc()) {
    fwrite($pro,"<produit prix='{$produit['p_prix']}'>
        <titre>{$produit['p_title']}</titre>
        <categorie>{$produit['title_cat']}</categorie>
        <image source='{$produit['p_thumb']}'/>
        <description>{$produit['p_desc']}</description>
    </produit>");
}
fwrite($pro,"\n</produits>");
fclose($pro);

?>

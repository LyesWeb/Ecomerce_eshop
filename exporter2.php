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
$con = new mysqli("localhost","root","ilyassking","ecomerce");
$res = $con->query("SELECT * FROM produit");
header("Content-Type: text/xml");
echo "<?xml version='1.0' encoding=\"UTF-8\"?>\n<produits>";
while ($produit = $res->fetch_assoc()) {
    echo "<produit prix='{$produit['p_prix']}'>
        <titre>{$produit['p_title']}</titre>
        <image source='{$produit['p_thumb']}'/>
        <description>{$produit['p_desc']}</description>
    </produit>";
}
echo "</produits>";

?>

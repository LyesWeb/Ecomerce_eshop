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

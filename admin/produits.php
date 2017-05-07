<?php
include 'include/header.php';
$res = $con->query("SELECT * FROM `produit` ORDER BY `p_id` DESC");
?>
<div class="container nav-wrapper">
  <div class="col s12">
    <a href="index.php" class="breadcrumb">dashboard</a>
    <a href="produits.php" class="breadcrumb">les produits</a>
  </div>
</div>
<div class="container produit_content white">
    <table class="highlight">
        <thead>
          <tr>
              <th>#</th>
              <th>titre</th>
              <th>prix</th>
              <th>stock</th>
              <th>promo</th>
          </tr>
        </thead>

        <tbody>
          <?php
            while ($pro = $res->fetch_assoc()) {
                echo "
                    <tr>
                        <td>{$pro['p_id']}</td>
                        <td>{$pro['p_title']}</td>
                        <td>{$pro['p_prix']}</td>
                        <td>{$pro['p_stock']}</td>
                        <td>{$pro['p_promo']}%</td>
                    </tr>
                ";
            }
          ?>
        </tbody>
      </table>
</div>
<?php
include 'include/footer.php';
?>

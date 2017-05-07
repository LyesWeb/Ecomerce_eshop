<?php
include 'include/header.php';
// $res = $con->query("SELECT * FROM client");
$res = $con->query("SELECT client.c_id,client.c_nom,client.c_prenom,client.c_sex,count(command.c_id) n FROM client LEFT JOIN command ON client.c_id=command.c_id GROUP BY client.c_id");
?>
<div class="container nav-wrapper">
  <div class="col s12">
    <a href="index.php" class="breadcrumb">dashboard</a>
    <a href="produits.php" class="breadcrumb">les clients</a>
  </div>
</div>
<div class="container produit_content white">
    <table class="highlight">
        <thead>
          <tr>
              <th>#</th>
              <th>nom</th>
              <th>prenom</th>
              <th>sex</th>
              <th>nombre de commands</th>
          </tr>
        </thead>

        <tbody>
          <?php
            while ($client = $res->fetch_assoc()) {
                echo "
                    <tr>
                        <td>{$client['c_id']}</td>
                        <td>{$client['c_nom']}</td>
                        <td>{$client['c_prenom']}</td>
                        <td>{$client['c_sex']}</td>
                        <td><a href='commandClient.php?cid={$client['c_id']}'>{$client['n']}</a></td>
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

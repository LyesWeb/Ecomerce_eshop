<?php
include 'include/header.php';
if(!isset($_SESSION['a_id'])){
    header('Location: login.php');
    exit;
}
if(!isset($_GET['cid'])){
    header('Location: ../404.php');
    exit;
}
$cid = _get('cid');

$res = $con->query("SELECT *
                    FROM `command`
                    INNER JOIN `client`
                    ON command.c_id=client.c_id WHERE client.c_id=$cid");
?>
<div class="container nav-wrapper">
  <div class="col s12">
    <a href="index.php" class="breadcrumb">dashboard</a>
    <a href="produits.php" class="breadcrumb">les commands</a>
  </div>
</div>
<div class="container produit_content white">
    <?php if ($res->num_rows<=0): ?>
        <div class="wranign"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> aucun command</div>
    <?php else: ?>
    <table class="highlight">
        <thead>
          <tr>
              <th>#</th>
              <th>date</th>
              <th>stat</th>
              <th>client</th>
              <th>details</th>
          </tr>
        </thead>

        <tbody>
          <?php
            while ($comm = $res->fetch_assoc()) {
                if ($comm['cmd_stat']) {
                    $stat = '<div class=payer>payer</div>';
                }else {
                    $stat = '<div class=nopayer>non payer</div>';
                }
                echo "
                    <tr>
                        <td>{$comm['cmd_id']}</td>
                        <td>{$comm['cmd_date']}</td>
                        <td>$stat</td>
                        <td><a href='client.php?cid={$comm['c_id']}'>{$comm['c_nom']} {$comm['c_prenom']}</a></td>
                        <td>
                        <a href='command.php?cmd={$comm['cmd_id']}'><i class='fa fa-eye' aria-hidden='true'></i></a>
                        </td>
                    </tr>
                ";
            }
          ?>
        </tbody>
      </table>
      <?php endif; ?>
</div>
<?php
include 'include/footer.php';
?>

<?php
include 'include/header.php';
if(!isset($_SESSION['a_id'])){
    header('Location: login.php');
    exit;
}
$res = $con->query("SELECT *,count(article.article_id) as n
                    FROM `client`
                    INNER JOIN `command`
                    ON client.c_id=command.c_id
                    INNER JOIN article
                    ON command.cmd_id=article.cmd_id
                    GROUP BY command.cmd_id");
?>
<div class="container nav-wrapper">
  <div class="col s12">
    <a href="index.php" class="breadcrumb">dashboard</a>
    <a href="produits.php" class="breadcrumb">les commands</a>
  </div>
</div>
<div class="container produit_content white">
    <table class="highlight">
        <thead>
          <tr>
              <th>#</th>
              <th>date</th>
              <th>stat</th>
              <th>client</th>
              <th width='20%'>nombre d'articles</th>
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
                        <td>{$comm['n']}</td>
                        <td>
                        <a href='command.php?cmd={$comm['cmd_id']}'><i class='fa fa-eye' aria-hidden='true'></i></a>
                        </td>
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

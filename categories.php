<?php
include 'include/header.php';
?>
<div class="container white" style="padding: 20px;">
    <ul class="md-list">
        <?php
            $catResult = $con->query("SELECT * FROM `categorie`");
            while ($cat = $catResult->fetch_assoc()) {
                echo "<li><a href='categorie.php?catid={$cat['id_cat']}'><i class='material-icons dp48'>done</i> {$cat['title_cat']}</a></li>";
            }
        ?>
    </ul>
</div>
<?php
include 'include/footer.php';
?>

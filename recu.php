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
include 'FPDF/fpdf.php';

$con = new mysqli('localhost','root','','ecomerce');
session_start();

$res = $con->query("SELECT * FROM client WHERE c_id={$_SESSION['c_id']}");
$client = $res->fetch_assoc();
##################
$mypdf = new FPDF();
$mypdf->AddPage();
$mypdf->SetFont("arial","B",12);
$mypdf->Image("images/logo2.png", 10, 25, 22,7);
$mypdf->Text(60, 30, "Command de client : {$client['c_nom']} {$client['c_prenom']}");
$mypdf->SetY(40);
$mypdf->setTextColor(24,90,114);
$mypdf->setFillColor(203,242,229);
$mypdf->Cell(20,10,"#",1,0,"C",1);
$mypdf->Cell(60,10,"produit",1,0,"C",1);
$mypdf->Cell(20,10,"quantite",1,0,"C",1);
$mypdf->Cell(40,10,"prix",1,0,"C",1);
$mypdf->Cell(50,10,"total",1,1,"C",1);
$glob=0;
for ($i=0; $i < count($_SESSION['pannier']); $i++) {
    $sp = $con->query("SELECT * FROM `produit` WHERE p_id={$_SESSION['pannier'][$i]['p_id']}");
    $p = $sp->fetch_assoc();
    if($_SESSION['pannier'][$i]['qte']>$p['p_stock']) $_SESSION['pannier'][$i]['qte']=$p['p_stock'];
    $prix = $p['p_prix']-($p['p_prix']*$p['p_promo']/100);
    $total = $prix*$_SESSION['pannier'][$i]['qte'];
    $glob+=$total;
    ###
    $mypdf->setTextColor(53,53,53);
    $mypdf->Cell(20,10," {$p['p_id']}",1,0,"l");
    $mypdf->Cell(60,10," {$p['p_title']}",1,0,"l");
    $mypdf->Cell(20,10,"{$_SESSION['pannier'][$i]['qte']}",1,0,"C");
    $mypdf->Cell(40,10," $prix DHs",1,0,"C");
    $mypdf->Cell(50,10," $total DHs",1,1,"C");
    $i++;
    ###
}

$tax = $glob*20/100;
$glob += $tax;
$mypdf->setFillColor(255,253,216);
## tax
$mypdf->Cell(20,10,"Tax",1,0,"l");
$mypdf->Cell(60,10,"",1,0,"C");
$mypdf->Cell(20,10,"",1,0,"C");
$mypdf->Cell(40,10,"",1,0,"C");
$mypdf->Cell(50,10,"$tax DHs",1,1,"C",1);
## total
$mypdf->Cell(20,10,"total",1,0,"l");
$mypdf->Cell(60,10,"",1,0,"C");
$mypdf->Cell(20,10,"",1,0,"C");
$mypdf->Cell(40,10,"",1,0,"C");
$mypdf->Cell(50,10,"$glob DHs",1,1,"C",1);

$mypdf->Output();

##### PDF ####

?>

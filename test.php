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
if (isset($_POST['ok']))

if($_FILES['v']['name']!=''){
echo $_FILES['v']['name'];
}else {
    echo "error";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="v" value="">
            <input type="submit" name="ok" value="ok">
        </form>
    </body>
</html>

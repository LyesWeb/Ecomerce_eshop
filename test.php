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

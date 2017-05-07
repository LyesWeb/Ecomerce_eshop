<?php
?>
<link href="css/icones.css" rel="stylesheet">
<!--Import materialize.css-->
<link type="text/css" rel="stylesheet" href="<?=$path?>css/materialize.min.css"  media="screen,projection"/>
<!-- animate.css -->
<link rel="stylesheet" type="text/css" href="<?=$path?>css/animate.css">
<!-- font awesome -->
<link rel="stylesheet" type="text/css" href="<?=$path?>css/font-awesome.min.css">
<!-- custom style -->

<link rel="stylesheet" type="text/css" href="<?=$path?>css/style.css">

<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<div class="error_page">

    <div class="error_page_header">
        <div class="uk-width-8-10 uk-container-center">
            404!
        </div>
    </div>
    <div class="error_page_content">
        <div class="uk-width-8-10 uk-container-center">
            <p class="heading_b">Page not found</p>
            <p class="uk-text-large">
                The requested URL <span class="uk-text-muted">/some_url</span> was not found on this server.
            </p>
            <a href="#" onclick="history.go(-1);return false;">Go back to previous page</a>
        </div>
    </div>


</div>
<style media="screen">
.error_page_header {
background: #1565c0;
padding: 80px 0 20px;
color: #fff;
font-size: 48px;
font-weight: 300;
margin-bottom: 40px;
}
.uk-container-center {
    margin-left: auto;
    margin-right: auto;    width: 80%;
}
</style>

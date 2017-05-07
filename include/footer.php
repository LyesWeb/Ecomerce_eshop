<footer class="footer">
    <div class="container">
        <center>
            touts les droits reserve &copy; 2016
        </center>
    </div>
</footer>
<?php $con->close(); ?>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="<?=$path?>js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?=$path?>js/materialize.min.js"></script>
<script type="text/javascript" src="<?=$path?>js/script.js"></script>
<script type="text/javascript">
    $(".dropdown-button").dropdown();
    $(".button-collapse").sideNav();
    $('.carousel.carousel-slider').carousel({fullWidth: true});
    $('.carousel').carousel({
        padding: 200
    });
    autoplay()
    function autoplay() {
        $('.carousel').carousel('next');
        setTimeout(autoplay, 4500);
    }
</script>
</body>
</html>

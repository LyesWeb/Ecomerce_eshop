function Scroll(){
var top = document.getElementById('purch');
var ypos = window.pageYOffset;
	if(ypos < 160) {
		top.style.top = "-54px";
	}
	else{
		top.style.top = "46px";
	}
}
window.addEventListener("scroll",Scroll);

jQuery(function($) {
  function fixDiv() {
    var $cache = $('#ads_left');
    if ($(window).scrollTop() > 170)
      $cache.css({
        'position': 'fixed',
        'top': '10px'
      });
    else
      $cache.css({
        'position': 'none',
        'top': 'auto'
      });
  }
  $(window).scroll(fixDiv);
  fixDiv();
  ////////
  $(".calc").mouseover(function(){
    $(".ecran").show();
    var src = $(".p_image img").attr("src");
    $(".ecran").css("background-image", "url('"+src+"')");
    $(".loop").show();
  });
  $(".calc").mouseout(function(){
    $(".ecran").hide();
    $(".loop").hide();
  });
  // move loop
  $(".calc").mousemove(function(e) {
    var offset = $(this).offset();
    var X = (e.pageX - offset.left)-140;
    var Y = (e.pageY - offset.top)-140;
    if(X<=0) X=0;
    if(Y<=0) Y=0;
    if(X>=220) X=220;
    if(Y>=220) Y=220;
    $('.loop').css("top", Y+"px");
    $('.loop').css("left", X+"px");
    $('.ecran').css("background-position-x", -X+"px");
    $('.ecran').css("background-position-y", -Y+"px");
  });
  $(".pImg").click(function(){
    var src = $(this).attr("src");
    $(".p_image img").attr("src",src);
  });
  ///////// qte controle ////////
  $(".qteM").click(function(){
    var qte = $("#qte").val();
    qte--;
    if(qte<=0) qte=1;
    $("#qte").val(qte);
  });
  $(".qteP").click(function(){
    var qte = $("#qte").val();
    qte++;
	var nbStock = $("#nbStock").val();
    if(qte>nbStock) qte=nbStock;
    $("#qte").val(qte);
  });
});
$(document).ready(function(){
    $('.tooltipped').tooltip({delay: 50});
});
$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
});
$(document).ready(function() {
    $('select').material_select();
});

$(document).ready(function() {
	$("#pannierqte").bind('keyup keydown mouseup click input', function () {
		var stk = $("#hiddennbstock").val();
	    var userstk = $("#pannierqte").val();
		if(userstk>stk){
			$("#pannierqte").val(stk);
		}
	});
});

$(document).ready(function() {
	$("#zoomin").click(function(){
		var w = $(".p_image img").css("width");
		var h = $(".p_image img").css("height");
		w=parseInt(w)+10;
		h=parseInt(h)+10;
		$(".p_image img").css({"width":w+"px","height":h+"px"});
	});
	$("#zoomout").click(function(){
		var w = $(".p_image img").css("width");
		var h = $(".p_image img").css("height");
		w=parseInt(w)-10;
		h=parseInt(h)-10;
		if(w<=500)w=500;
		if(h<=500)h=500;
		$(".p_image img").css({"width":w+"px","height":h+"px"});
	});
	$("#zoomreset").click(function(){
		$(".p_image img").css({"width":"500px","height":"500px"});
	});
});

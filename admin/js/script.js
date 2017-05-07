$(document).ready(function(){
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });

    $("#adddetail").click(function(){
        var c = document.getElementById('details');
        var i = $("#detailnumber").val();
        i++;
        $("#detailnumber").val(i);
        c.innerHTML+="<div class='row'> <div class='input-field col s6'> <input type='text' name='det[]' placeholder='detail "+i+"'> </div> <div class='input-field col s6'> <input type='text' name='detcon[]' placeholder='contenu "+i+"'> </div> </div>";
    });




});

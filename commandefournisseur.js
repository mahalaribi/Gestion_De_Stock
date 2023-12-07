// *********************************code fournisseur***********************************************
$(document).ready(function() {
    $("#mySelect").on('change',function() {
    var value = $(this).val();
    $.ajax({
    url: "commandefournisseurjavax.php",
    type: "POST",
    data:'request=' + value,
    beforeSend:function(){
    $("#data-container").html("<span>woorjkin...</span>");
    },
    success:function(data){
    $("#data-container").html(data);
    }
    });
    });
    });
    // *******************************article ***********************************************
    $(document).ready(function() {
    $("#mySelectarticle").on('change',function() {
    var article = $(this).val();
    $.ajax({
    url: "commandefournisseurjavax.php",
    type: "POST",
    data:'request=' + article,
    beforeSend:function(){
    $("#data-containerarticle").html("<span></span>");
    },
    success:function(data){
    $("#data-containerarticle").html(data);
    }
    });
    });
    });
    
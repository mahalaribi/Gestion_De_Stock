<?php include("connexion.php");?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	   <scripy src="stylesheet" href="bootstrap/css/bootstrap.js">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
       <link rel="stylesheet" href="style_main.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>














<script type="text/javascript">
$(document).ready(function() {
  $("#mySelectarticle").on('change',function() {
    var value = $(this).val();
    $.ajax({
     url: "jareb.php",
     type: "POST",
      data:'request=' + value,
     beforeSend:function(){
     $("#data-containerarticle").html("<span></span>");
    },
    success:function(data){
    $("#data-containerarticle").html(data);
     }
    });
   });
});
</script>

<select  id="mySelectarticle"  class="form-select cod-commande">
      <option value="value" disabled="" selected="">code article...</option>
      <option value="558">alia.</option>
      <?php 
                    $req=mysqli_query($conx,"SELECT * from article");
                    if(!$req)
                    {
                     die("invalide requete!");
                    }
                   
                    else
                    {
                      while($row = $req->fetch_assoc())    
                    {?>
                        <option value=<?php echo"$row[id_article]"?>><?=$row['id_article'] ," et " ,$row['designation'] ;?></option>
                     <?php }
                    }
                    ?>
      </select>
   
<div id="data-containerarticle">
<input type='button'>;
 <div>



</html>
<?php
include("connexion.php");
$msg=false;
if(isset($_POST['valider']))

{
    $code_categ=$_POST['code_categ'];
    $designation=$_POST['designation'];
    $date_cree = date("Y-m-d ");
    $date_modif=date("Y-m-d ");
    if(!empty($code_categ) && !empty($designation))
    {//verifier si le code trouve dans la base 
      $req1=mysqli_query($conx,"SELECT code from catégorie where code='$code_categ'");
      if(mysqli_num_rows ($req1)>0)
      {
        $msg='<div class="alert alert-danger div-alert" role="alert">le code est deja saisire dans la base</div>';
        echo $msg;
        
      }
      else{
        $req="INSERT into catégorie values ('$code_categ','$designation', '$date_cree','$date_modif')";
        $res=mysqli_query($conx,$req);
        header("location:liste-categorie.php");
        }
    }

}


?>
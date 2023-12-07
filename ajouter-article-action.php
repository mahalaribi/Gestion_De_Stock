<?php 
include("connexion.php");
$req=mysqli_query($conx,"SELECT id_article from article");
if(isset($_POST['valider'])&& isset($_FILES['image']))

{
    $date_creation = date("Y-m-d ");
   $date_modification=date("Y-m-d ");
    $id_article=$_POST['id_article'];
    $HT=$_POST['HT'];
    $TVA=$_POST['TVA'];
    $TTC=$_POST['TTC'];
    $designation=$_POST['designation'];
    $code_categ=$_POST['code_categ'];
    // Lire le contenu du fichier d'image
    $content = file_get_contents($_FILES['image']['tmp_name']);
    // Échapper les caractères spéciaux dans le contenu de l'image
    $content = mysqli_real_escape_string($conx, $content);
    if(!empty($id_article) && !empty($designation)&& !empty($HT)&& !empty($TTC)&& !empty($TVA)&& !empty($code_categ))
    {
      //verifier si le code trouve dans la base 
      $req1=mysqli_query($conx,"SELECT id_article from article where id_article='$id_article'");
      if(mysqli_num_rows ($req1)>0)
      {
        $msg='<div class="alert alert-danger div-alert" role="alert">le code est deja saisire dans la base</div>';
        echo $msg;
      }
      else
      {
       $req="INSERT into article values ('$id_article','$date_creation', '$date_modification','$designation','$TVA','$HT','$TTC','".$_FILES['image']['name']."','$code_categ','$content')";
       $res=mysqli_query($conx,$req);
       $req1="INSERT INTO mvt_stock values(null,'$date_creation', ' $date_modification',0,'$id_article')";
       $res=mysqli_query($conx,$req1);
        header("location:liste-article.php");
      }
    }
}

?>
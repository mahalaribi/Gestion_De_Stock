<?php 
include("connexion.php");
$req=mysqli_query($conx,"SELECT id_fournisseur from fournisseur");
if(isset($_POST['valider'])&& isset($_FILES['image']))

{
    $date_creation = date("Y-m-d ");
   $date_modification=date("Y-m-d ");
    $id_fournisseur=$_POST['id_fournisseur'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $code_postale=$_POST['code_postale'];
    $ville=$_POST['ville'];
    $pays=$_POST['pays'];
    $mail=$_POST['mail'];
    $adresse=$_POST['adresse'];
    $tel=$_POST['tel'];
    // Lire le contenu du fichier d'image
  $content = file_get_contents($_FILES['image']['tmp_name']);
  // Échapper les caractères spéciaux dans le contenu de l'image
  $content = mysqli_real_escape_string($conx, $content);
    if(!empty($id_fournisseur) && !empty($ville)&& !empty($nom)&& !empty($code_postale)&& !empty($prenom)&& !empty($pays)&& !empty($tel)&& !empty($mail)&& !empty($adresse))
    {
      //verifier si le code trouve dans la base 
      $req1=mysqli_query($conx,"SELECT id_fournisseur from fournisseur where id_fournisseur='$id_fournisseur'");
      if(mysqli_num_rows ($req1)>0)
      {
        $msg='<div class="alert alert-danger div-alert" role="alert">le code est deja saisire dans la base</div>';
        echo $msg;
      }
      else
      {
       $req="INSERT into fournisseur values ('$id_fournisseur','$date_creation', '$date_modification','$adresse','$nom','$prenom','$mail','$code_postale','$pays','$ville','$tel','".$_FILES['image']['name']."','$content')";
       $res=mysqli_query($conx,$req);
        header("location:liste-fournisseur.php");
      }
    }


}

?>
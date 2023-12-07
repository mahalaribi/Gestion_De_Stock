<?php
include("connexion.php");
$id_fournisseur="";
$prenom="";
$mail="";
$ville="";
$nom="";
$tel="";
$pays="";
$adresse="";
$code_postale="";
$image="";
if($_SERVER["REQUEST_METHOD"]=='GET'){ 
if(!isset($_GET['code_f']))
{
header("locations:liste-fournisseur.php");
exit;
}
$id_fournisseur=$_GET['code_f'];
$req="SELECT * from fournisseur where id_fournisseur='$id_fournisseur'";
$res=$conx->query($req);
$row=$res->fetch_assoc();
while(!$row)
{
    header("locations:liste-fournisseur.php");
   exit;
}
$id_fournisseur=$row['id_fournisseur'];
$prenom=$row['prenom'];
$mail=$row['mail'];
$ville=$row['ville'];
$nom=$row['nom'];
$code_postale=$row['code_postale'];
$adresse=$row['adresse'];
$tel=$row['num'];
$pays=$row['pays'];
$image=$row['image'];
}
else {
    $id_fournisseur=$_POST['id_fournisseur'];
    $prenom=$_POST['prenom'];
    $ville=$_POST['ville'];
    $tel=$_POST['tel'];
    $nom=$_POST['nom'];
    $mail=$_POST['mail'];
    $pays=$_POST['pays'];
    $adresse=$_POST['adresse'];
    $code_postale=$_POST['code_postale'];
    $date_modif=date("Y-m-d ");
     // Lire le contenu du fichier d'image
     $content = file_get_contents($_FILES['image']['tmp_name']);
     // Échapper les caractères spéciaux dans le contenu de l'image
      $content = mysqli_real_escape_string($conx, $content);
    $req2="UPDATE fournisseur set image='".$_FILES['image']['name']."',content='$content',  prenom='$prenom', date_modification=' $date_modif' , adresse='$adresse' ,mail='$mail', nom='$nom',num='$tel',ville='$ville',code_postale='$code_postale',pays='$pays' where id_fournisseur=' $id_fournisseur'";
    $res=$conx->query($req2);
    header("location:liste-fournisseur.php");
}

?>
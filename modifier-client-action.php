<?php
include("connexion.php");
$id_client="";
$prenom="";
$mail="";
$ville="";
$nom="";
$tel="";
$pays="";
$adresse="";
$code_postale="";
$content="";
if($_SERVER["REQUEST_METHOD"]=='GET'){ 
if(!isset($_GET['code_c']))
{
header("locations:liste-client.php");
exit;
}
$id_client=$_GET['code_c'];
$req="SELECT * from client where id_client='$id_client'";
$res=$conx->query($req);
$row=$res->fetch_assoc();
while(!$row)
{
    header("locations:liste-client.php");
   exit;
}
$id_client=$row['id_client'];
$prenom=$row['prenom'];
$mail=$row['mail'];
$ville=$row['ville'];
$nom=$row['nom'];
$code_postale=$row['code_postale'];
$adresse=$row['adresse'];
$tel=$row['tel'];
$pays=$row['pays'];
$image=$row['photo'];

}
else {
    $id_client=$_POST['id_client'];
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
    $req2="UPDATE client set photo='".$_FILES['image']['name']."',content='$content', prenom='$prenom', date_modification=' $date_modif' , adresse='$adresse' ,mail='$mail', nom='$nom',tel='$tel',ville='$ville',code_postale='$code_postale',pays='$pays' where id_client=' $id_client'";
    $res=$conx->query($req2);
    header("location:liste-client.php");
}

?>
<?php
include("connexion.php");
$id_article="";
$designation="";
$code_categ="";
$TVA="";
$HT="";
$TTC="";
$image="";
$content="";
if(isset($_FILES['image']))
{
// Lire le contenu du fichier d'image
$content = file_get_contents($_FILES['image']['tmp_name']);
// Échapper les caractères spéciaux dans le contenu de l'image
$content = mysqli_real_escape_string($conx, $content);
}
if($_SERVER["REQUEST_METHOD"]=='GET' ){ 
if(!isset($_GET['code_art']))
{
header("locations:liste-article.php");
exit;
}
$id_article=$_GET['code_art'];
$req="SELECT * from article where id_article='$id_article'";
$res=$conx->query($req);
$row=$res->fetch_assoc();
while(!$row)
{
    header("locations:liste-article.php");
   exit;
}
$id_article=$row['id_article'];
$designation=$row['designation'];
$code_categ=$row['code'];
$TVA=$row['TVA'];
$TTC=$row['TTC'];
$HT=$row['HT'];
$image=$row['image'];
$g=$_GET['code_art'];
}
else {
    $id_article=$_POST['id_article'];
    $designation=$_POST['designation'];
    $TVA=$_POST['TVA'];
    $TTC=$_POST['TTC'];
    $HT=$_POST['HT'];
    $code_categ=$_POST['code_categ'];
    $date_modif=date("Y-m-d ");
    $req2="UPDATE article set  designation='$designation', date_modification=' $date_modif' , code='$code_categ', HT='$HT',TTC='$TTC',TVA='$TVA' ,image='".$_FILES['image']['name']."',content='$content'  where id_article=' $id_article'";
    $res=$conx->query($req2);
    header("location:liste-article.php");
}

?>
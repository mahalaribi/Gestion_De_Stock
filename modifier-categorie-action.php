<?php
include("connexion.php");
$code="";
$designation="";
$date_modif=date("Y-m-d ");
if($_SERVER["REQUEST_METHOD"]=='GET'){ 
if(!isset($_GET['code'])){
header("locations:liste-categorie.php");
exit;
}
$code1=$_GET['code'];
$req="SELECT * from catégorie where code='$code1'";
$res=$conx->query($req);
$row=$res->fetch_assoc();
while(!$row)
{
    header("locations:liste-categorie.php");
   exit;
}
$code=$row['code'];
$designation=$row['designation'];
}
else {
    $code=$_POST['code_categ'];
    $designation=$_POST['designation'];
    $req2="UPDATE catégorie set  designation='$designation', date_modification=' $date_modif' where code='$code'";
    $res=$conx->query($req2);
    header("location:liste-categorie.php");
}
?>
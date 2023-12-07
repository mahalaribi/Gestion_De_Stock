<?php
include("connexion.php");
if(isset($_GET['codee']))
{
    $code=$_GET['codee'];
    $req1="DELETE from catégorie where code='$code'";
    $res = $conx->query($req1);
}
header('location:liste-categorie.php');
exit;
?>
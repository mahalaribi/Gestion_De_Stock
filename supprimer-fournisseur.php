<?php
include("connexion.php");
if(isset($_GET['code_f']))
{
    $code=$_GET['code_f'];
    $req1="DELETE from fournisseur where id_fournisseur='$code'";
    $res = $conx->query($req1);
}
header('location:liste-fournisseur.php');
exit;
?>
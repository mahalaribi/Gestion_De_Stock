<?php
include("connexion.php");
if(isset($_GET['code_commandef']))
{
    $code=$_GET['code_commandef'];
    $req1="DELETE from commande_fournisseur where code_commandef='$code'";
    $res = $conx->query($req1);
}
header('location:commandefournisseur.php');
exit;
?>
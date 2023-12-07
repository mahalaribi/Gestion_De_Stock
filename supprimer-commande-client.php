<?php
include("connexion.php");
if(isset($_GET['code_ommande']))
{
    $code=$_GET['code_ommande'];
    $req1="DELETE from commande_client where code_commande='$code'";
    $res = $conx->query($req1);
}
header('location:commandeclient.php');
exit;
?>
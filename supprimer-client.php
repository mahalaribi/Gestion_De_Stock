<?php
include("connexion.php");
if(isset($_GET['code_c']))
{
    $code=$_GET['code_c'];
    $req1="DELETE from client where id_client='$code'";
    $res = $conx->query($req1);
}
header('location:liste-client.php');
exit;
?>
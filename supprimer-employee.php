<?php
include("connexion.php");
if(isset($_GET['code_user']))
{
    $code=$_GET['code_user'];
    $req1="DELETE from user where id_user='$code'";
    $res = $conx->query($req1);
}
header('location:liste-des-employee.php');
exit;
?>
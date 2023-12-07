<?php
include("connexion.php");
if(isset($_GET['code_art']))
{
    $code=$_GET['code_art'];
    $req1="DELETE from article where id_article='$code'";
    $res = $conx->query($req1);
}
header('location:liste-article.php');
exit;
?>
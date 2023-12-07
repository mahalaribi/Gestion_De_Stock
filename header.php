<?php 

include("connexion.php");
$req="SELECT * from user where id_user='".$_SESSION["id"]."' "  ;
$res=$conx->query($req);
if(!$res)
{
 die("invalide requete!");
}
$row=$res->fetch_assoc();

$req="SELECT * from user where id_user='".$_SESSION["id"]."' "  ;
$res=$conx->query($req);
if(!$res)
{
 die("invalide requete!");
}
// // récupérer les termes de recherche depuis le formulaire
// $a = 'k';
// // construire la requête SQL
// $sql = "SELECT * FROM article WHERE  designation LIKE '%$a%' ";
// // exécuter la requête SQL
// $resultat = $conx->query($sql);
// // afficher les résultats de la recherche
// if ($resultat->num_rows > 0) {
//     while ($row2 = $resultat->fetch_assoc()) {
//         echo '<h3>' . $row2['designation'] . '</h3>';
//     }
// } else {
//     echo 'Aucun article trouvé';
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    .image-profil
        {
            margin:5px;
            margin-left:10px;
            width:95px;
            height: 80px;
        }
        .titre-header
        {
            margin-top:20px;
            margin-left:0px;
           
            
        }
        .recherche-header
        {
            max-width:800px;
            max-height:20px;
            margin-top:20px;
        }
        .power
        {
            
            margin-right:20px;
            margin-top:15px; 

        } 
</style>
</head>
<body>
<form acrion="GET">
<div class="d-flex justify-content-between">
        <div style="border-style: groove;">
        <a href="profil.php"><img class="image-profil rounded-circle"  src=" <?= $row['image'];?>"> </a>
        </div>
        <?php echo"  <div class='titre-header'><h2>$row[nom] $row[prenom]</h2></div>";?>
       
        <div class="power"><i class="bi bi-power"><a href="logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
           
            <path d="M7.5 1v7h1V1h-1z"/>
            <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
            </svg> </a></i>
        </div>
        </div>
        </form>
        
</body>
</html>
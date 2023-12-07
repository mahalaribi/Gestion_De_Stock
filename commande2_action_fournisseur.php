<?php 
include("connexion.php");
if(isset($_POST['ajouter']))
 {
       $id_commande=$_POST['code_commandef'];
       $id_article=$_POST['code_article'];
       $quantité=$_POST['quantité'];
       $prix_tot=$_POST['prix-total'];
       $date_modification1=date("Y-m-d");
       $date_creation1=date("Y-m-d");
       $produit=$quantité * $prix_tot;

   $sql2 = "SELECT * FROM commande_fournisseur where id_commandef='$id_commande'";
   // Exécution de la requête SQL
   $resultat2 = mysqli_query($conx, $sql2);
   // Récupération du résultat de la requête
   if ($resultat2) {
       $ligne2 = mysqli_fetch_array($resultat2);
       $code_commande=$ligne2['code_commandef'];;
   }
   $reqmvt="SELECT * from mvt_stock where id_article='$id_article'";
   $resmvt=mysqli_query($conx,$reqmvt);
   if(mysqli_num_rows ($resmvt)>0)
   {
   $mvt= mysqli_fetch_array($resmvt);
    $variation=$mvt['quanité']+$quantité;//variation mvt
       $req1="INSERT into commande_ligne_fournisseur values (Null,'$date_creation1', '$date_modification1','$quantité','$produit','$id_article','$code_commande')";
       $res1=mysqli_query($conx,$req1);
       header("location:ajoutercommande2-fournisseur.php");
       $mvtmodif="UPDATE mvt_stock set  quanité='$variation', date_modification=' $date_modification1'  where id_stock='$mvt[id_stock]'";
       $reqmdoif=mysqli_query($conx,$mvtmodif);
    
    }
}
?>
<?php 
include("connexion.php");
if(isset($_POST['ajouter']))
 {
    $date_creation =$_POST['date'];
    $date_modification=date("Y-m-d ");
    $id_client=$_POST['code_client'];
    $id_commande=$_POST['code_commande'];
    $etat_commande="EN PREPARATION";
      $req1=mysqli_query($conx,"SELECT id_commande from commande_client where id_commande='$id_commande'");
      // *****test**********
      if(mysqli_num_rows ($req1)>0)
      {
        $msg='<div class="alert alert-danger div-alert" role="alert">le code est deja saisire dans la base</div>';
        echo $msg;
      }
      else
      {
       $req="INSERT into commande_client values (null,'$date_creation', '$date_modification','$etat_commande','$id_client','$id_commande')";
       $res=mysqli_query($conx,$req);
      //  test insertion
      if(!$res)
      {
        echo"echo'il y'a un erreur dans l'insertion code commande";
       }
     
// test select 
      $sql = "SELECT code_commande FROM commande_client ORDER BY code_commande DESC LIMIT 1";
      // Exécution de la requête SQL
      $resultat = mysqli_query($conx, $sql);
      // Récupération du résultat de la requête
      if ($resultat) {
          $ligne= mysqli_fetch_array($resultat);
          $id_commande1= $ligne['code_commande'];
          }
// insertin ligne comande

       $id_article=$_POST['code_article'];
       $quantité=$_POST['quantité'];
       $reqmvt="SELECT * from mvt_stock where id_article='$id_article'";
       $resmvt=mysqli_query($conx,$reqmvt);
       if(mysqli_num_rows ($resmvt)>0)
       {
      $mvt= mysqli_fetch_array($resmvt);
      $msg="";
      if($mvt['quanité']<$quantité)
      {
        echo"saisir une autre article au une autre quantité inferieure a la dérniée";
      }
      else{
        $variation=$mvt['quanité']-$quantité;
       $prix_tot=$_POST['prix-total'];
       $date_modification1=date("Y-m-d");
       $date_creation1=date("Y-m-d");
       $produit=$quantité * $prix_tot;
       $req1="INSERT into commande_ligne_client values (Null,'$date_creation1', '$date_modification1','$quantité','$produit','$id_article','$id_commande1')";
       $res1=mysqli_query($conx,$req1);
       $mvtmodif="UPDATE mvt_stock set  quanité='$variation', date_modification=' $date_modification1'  where id_stock='$mvt[id_stock]'";
       $reqmdoif=mysqli_query($conx,$mvtmodif);
       header("location:ajoutercommande2-client.php");
      }
    }
   }
  
    }
?>
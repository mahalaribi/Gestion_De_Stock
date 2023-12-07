<?php 
include("connexion.php");
if(isset($_POST['ajouter']))
 {
    $date_creation =$_POST['date'];
    $date_modification=date("Y-m-d ");
    $id_fournisseur=$_POST['code_fournisseur'];
    $id_commande=$_POST['code_commandef'];
    $etat_commande="EN PREPARATION";
      $req1=mysqli_query($conx,"SELECT id_commandef from commande_fournisseur where id_commandef='$id_commande'");
      // *****test**********
      if(mysqli_num_rows ($req1)>0)
      {
        $msg='<div class="alert alert-danger div-alert" role="alert">le code est deja saisire dans la base</div>';
        echo $msg;
      }
      else
      {
       $req="INSERT into commande_fournisseur values (null,'$date_creation', '$date_modification','$etat_commande','$id_fournisseur','$id_commande')";
       $res=mysqli_query($conx,$req);
      //  test insertion
      if(!$res)
      {
        echo"echo'il y'a un erreur dans l'insertion code commande";
       }
       else{
        echo"avec succeéé";
      }
      // test select 
       $sql = "SELECT code_commandef FROM commande_fournisseur ORDER BY code_commandef DESC LIMIT 1";
      // Exécution de la requête SQL
      $resultat = mysqli_query($conx, $sql);
      // Récupération du résultat de la requête
      if ($resultat) {
          $ligne= mysqli_fetch_array($resultat);
          $id_commande1= $ligne['code_commandef'];
          }
      // insertin ligne comande
       $id_article=$_POST['code_article'];
       $quantité=$_POST['quantité'];
      $reqmvt="SELECT * from mvt_stock where id_article='$id_article'";
       $resmvt=mysqli_query($conx,$reqmvt);
       if(mysqli_num_rows ($resmvt)>0)
       {
      $mvt= mysqli_fetch_array($resmvt);
      $variation=$mvt['quanité']+$quantité;//variation mvt
       $produit=0;
       $prix_tot=$_POST['prix-total'];
       $date_modification1=date("Y-m-d");
       $date_creation1=date("Y-m-d");
       $produit=$quantité * $prix_tot;
       $req1="INSERT into commande_ligne_fournisseur values (Null,'$date_creation1', '$date_modification1','$quantité',$produit,'$id_article','$id_commande1')";
       $res1=mysqli_query($conx,$req1);
       $mvtmodif="UPDATE mvt_stock set  quanité='$variation', date_modification=' $date_modification1'  where id_stock='$mvt[id_stock]'";
       $reqmdoif=mysqli_query($conx,$mvtmodif);
       header("location:ajoutercommande2-fournisseur.php");
      }
    }
  }
?>
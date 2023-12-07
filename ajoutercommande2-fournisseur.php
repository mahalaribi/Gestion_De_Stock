<?php 
session_start();
include("commande-action-fournisseur.php");
include("connexion.php");
$date_creation = date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	   <scripy src="stylesheet" href="bootstrap/css/bootstrap.js">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
       <link rel="stylesheet" href="style_main.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
       <script src="commandeclient.js"></script>
       <style>
        .image-ajouter{
            max-width:40px;
            max-height:40px;
        }        
         .table
        {
            margin-top:2px;
            margin-left:30px;
            max-width:px;
        }
        .lister
        {
            margin-left:30px;
            margin-top:20px;
            color:#13123f;
        }
        .photo-action
        {
            max-height:30px;
            max-width:30px;
        }

        .btn1-ajouter
        {
        margin-right:60px;
        }

        .div-flex
        {
            margin-top:10px;
            margin-right:40px;
            margin-bottom:15px;
        }
        .cod-commande
        {
            margin-top:4px;
            margin-right:20px;
            max-width:600px;
            
        }
        .label1
        {
        margin-left:15px;
       color:black;
       }
        </style>
</head>
<body >
<div class="main-container ">
    <div class="row min-width  min-height-600 no-flex-wrap ">
        <!-- pour n'arriver pas a la ligne -->
        <div class="card marg-left col-md-2 ">
    
        <?php 
            require('left.php');
            ?>    
        </div>
    <div class="card col-md-10 pad back-main border-none">
      <div class="col pad flex-column justify-content-between">
        <div class="card min-height-90 mb-2">
            <?php 
            require('header.php');
            // pour appeler un page dans une autre page
            ?>
         
        </div>
    <div class="card main-height ">
    <div><h4 class="lister">Nouvelle commande fournisseur:</h4></div>
    <form name='form' method="POST" enctype="multipart/form-data" action="commande2_action_fournisseur.php">
    <!-- code ccommand -->
    <?php

   $sql2 = "SELECT * FROM commande_fournisseur cmd join fournisseur f  on cmd.id_fournisseur=f.id_fournisseur ORDER BY cmd.code_commandef DESC LIMIT 1";

   // Exécution de la requête SQL
   $resultat2 = mysqli_query($conx, $sql2);
   // Récupération du résultat de la requête
   if ($resultat2) {
       $ligne2 = mysqli_fetch_array($resultat2);
       $code_commande=$ligne2['id_commandef'];
       $derniere_valeur2 = $ligne2['code_commandef'];
       $code_fournisseur=$ligne2['id_fournisseur'];
   }
    ?>
    <div><div class="container card "style="max-width:1290px;margin-left:30px; border:wave;border-color:grey; ">
    <div class=" row" style="margin-top:8px; margin-bottom:8px;">
    <div class="col " style="border-right:solid; border-color:grey; margin-left:30px;max-width:350px">
       <input type="text" class="cod-commande form-control" value="<?php echo $code_commande;?>"name="code_commandef" placeholder="code-commande" aria-label="First name" readonly="readonly" >
      <input type="date"  class="form-control cod-commande" name="date" value="<?=$date_creation ;?>"aria-label="First name" readonly="readonly" required>
      <select  id="mySelect" name="code_client"  class="form-select cod-commande">
      <option value="<?=$code_fournisseur;?>" readonly="readonly" required selected><?=$code_fournisseur, ' ' ,$ligne2['nom'],' ',$ligne2['prenom'] ?></option>
      <?php 
                    $req=mysqli_query($conx,"SELECT * from fournisseur");
                    if(!$req)
                    {
                     die("invalide requete!");
                    }
                   
                    else
                    {
                      while($row = $req->fetch_assoc())    
                    {?>
                        <option value=<?php echo"$row[id_fournisseur]"?>><?=$row['id_fournisseur']," ",$row['nom'], " ", $row['prenom'] ;?></option>
                     <?php }
                    
                    }
                    ?>
      </select>

      </div>
      <div id="data-container" class="row" style="max-width:1000px;">
      <?="<div class='col ' style=' margin-top:15px;'>
    <i class='bi bi-person-fill'style='color:blue; margin-top:7px;'><svg xmlns='http://www.w3.org/2000/svg'  width='20' height='20' fill='currentColor' class='bi bi-person-fill' viewBox='0 0 16 16'>
      <path d='M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z'/>
      </svg></i> <label class='fw-bolde label1'>$ligne2[nom] et $ligne2[prenom]</label><br>
    <i class='bi bi-envelope-fill' style='color:blue; margin-top:10px;'><svg xmlns='http://www.w3.org/2000/svg'   width='20' height='20' fill='currentColor' class='bi bi-envelope-fill' viewBox='0 0 16 16'>
     <path d='M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z'/>
     </svg></i><label class='text-start label1'>  $ligne2[mail]</label><br>
     <i class='bi bi-telephone-fill'style='color:blue; margin-top:10px;'><svg xmlns='http://www.w3.org/2000/svg'   width='20' height='20' fill='currentColor' class='bi bi-telephone-fill' viewBox='0 0 16 16'>
      <path fill-rule='evenodd' d='M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z'/>
      </svg></i> <label class='text-start label1'>$ligne2[num]</label><BR>
    
   </div>
    <div class='col'  style='border-left:solid;border-color:grey;max-width:300px;'>
     <img  class='rounded-circle'src='$ligne2[image]' style='width:280px;height:130px;margin-right:40px;'>
    </div>";?>
    </div>

    </div>
    </div>
<!-- article acheter -->
    <div><div class="container card "style="margin-top:5px;max-width:1290px;margin-left:30px; max-height:60px;border:wave;border-color:grey; ">
    <div class=" row"style="margin-left:60px;max-width:1200px;border-color:grey;">
    <div class="col" style=" border-color:grey; margin-left:30px;max-width:350px;">
    <select style="margin-top:8px;"  id="mySelectarticle" name="code_article" class="form-select cod-commande">
      <option selected>Code_article...</option>
      <?php 
                    $req=mysqli_query($conx,"SELECT * from article");
                
                    if(!$req)
                    {
                     die("invalide requete!");
                    }
                    else
                    {
                      while($row = $req->fetch_assoc())    
                    {
                        echo"<option value='$row[id_article]'>$row[id_article] $row[designation] </option>";
                    }
                }
        ?>
      </select>
     <br>
      </div>
      <div class="col " style="border-right:; color:grey;max-width:350px;">
        <input type="number"  style="margin-top:8px;" class="cod-commande form-control" placeholder="quantité" name="quantité" aria-label="First name">
     </div>
      <div class="col"  id="data-containerarticle" style="max-width:200px;border-right:; color:grey; max-width:350px;">
        <input type="number" style="margin-top:8px;" class="cod-commande form-control" placeholder="prix" name="prix-total"  readonly="readonly" required>
      </div>
      <div class="col"  style="max-width:200px;">
      <button type="submit" name="ajouter" style="max-width:100;max-height:100px;margin-top:8px;margin-left:px;" class="btn btn-success"><i  class="bi bi-plus">
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
       <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
      </svg>
      </button>  </i>
      </div>
    </div>
    </div>
<!-- l'affichage des ligne -->
  <div class=" overflow-auto card "style="border:wave;border-color:grey;  margin-top:5px; max-width:1290px; min-height:30px;  max-height:190px; margin-left:30px;">
     <div style="margin-top:10px;margin-bottom:10px;">
        <?php
          $req="SELECT * from commande_ligne_fournisseur f join article a on a.id_article=f.id_article where f.code_commandef='$derniere_valeur2'";
          $res=mysqli_query($conx,$req);
                if(!$res)
                {
                 die("invalide requete!");
                }
                else
                {
                  $somme=0;
               while($row= $res->fetch_assoc()) 
                {
                 $somme=$somme+$row['total_prix'];
                    echo" 
                    <div class='container card 'style='border:wave; border-color:grey;margin-top:px;margin-bottom:3px; max-width:1250px;max-height:40px;margin-left:10px;'> 
                    <div class='row 'style='margin-top:10px; margin-bottom:10px;'>
                    <div class='col' style='border-right:solid; border-color:grey;'>$row[id_article]</div>
                    <div class='col'style='border-right:solid;border-color:grey;'>$row[designation]</div>
                    <div class='col'style='border-right:solid;border-color:grey;'>$row[quantite]</div>
                    <div class='col'style='border-right:solid;border-color:grey;'>$row[TTC]</div>
                    <div class='col'>$row[total_prix]</div>
                    </div>
                    </div>";
                }
            }
         ?>
     </div>
    </div>
    <!-- total commande -->
    <div class=" card "style="border:wave;border-color:grey;   max-width:1300px;margin-left:30px;margin-top:5px;">
    <h3 style="color:black;margin-left:700px;">total de la commande commande: <?=$somme;?>$</h3>
   </div>
    <!-- boutton -->
    <div> 
       <div class="div-flex d-flex justify-content-end">
          <a href="commandefournisseur.php"> <button type="button"class="btn btn1-ajouter btn-primary"  name="valider"><i class="bi bi-check-circle"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
           <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
           <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
           </svg>ajouter</i></button>
           </a>
           <button type="reset" class="btn  btn-danger" name="anuuler"><i class="bi bi-dash-circle"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
            </svg>annuler</i></button>
         </div>
    </div>
    <!-- fermer container -->
</div>

              </form>
      </div>
     </div>
    </div>
   </div>
  </body>
</html> 
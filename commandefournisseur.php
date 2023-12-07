<?php 
session_start();
include("connexion.php");
$start=0;
$rows_per_page=2;
//get the total of rows
$req="SELECT distinct * from fournisseur f join commande_fournisseur cmd on f.id_fournisseur=cmd.id_fournisseur";
$res=mysqli_query($conx,$req);
$nr_of_rows=$res->num_rows;
//calculating the nbr of rows
$pages=ceil($nr_of_rows/$rows_per_page);
//if the user lick on the paginatuion button we set a new statrting point
if(isset($_GET['pagenr10']))
{
  $page = $_GET['pagenr10'] - 1;
  $start=$page*$rows_per_page;
}
$req2="SELECT cmd.date_création,f.nom,f.prenom,f.num,f.image,cmd.id_commandef,cmd.etat_commande,cmd.code_commandef  from fournisseur f join commande_fournisseur cmd on f.id_fournisseur=cmd.id_fournisseur  order by cmd.code_commandef DESC limit $start,$rows_per_page";
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
       <style>
        
        .image-ajouter{
            max-width:40px;
            max-height:40px;

            
        }        
         .table
        {
            margin-left:30px;
            max-width:1150px;
        }
        .lister
        {
            margin-left:65px;
            margin-top:28px;
            color:#13123f;
        }
        .photo-action
        {
            max-height:30px;
            max-width:30px;
        }
    

        </style>
</head>
<body>
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
                <div><h4 class="lister">Liste des commandes fournisseurs:</h4></div>
            <a href="ajoutercommande-fournisseur.php"><div style="margin-left:1100px;" class=""> <button type="button" class="btn btn-primary"><i class="bi bi-plus"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                 <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                 </svg></i>Ajouter</button></div></a>
            <form class="" style=" max-width:1215px;margin-left:55px; margin-top:px;  ">
        <table class="table">
        <thead>
   
        <tbody>
         <?php 
          $resultat="SELECT * from commande_ligne_fournisseur ";
          $res2= $conx->query($resultat);
          $somme=0;
          $tot=0;
          while($rowc=$res2->fetch_assoc())
          {
           $somme=$somme+1;
           $tot=$tot+ $rowc['total_prix'];
          }
          $res = $conx->query($req2);
          
       if(!$res)
       {
        die("invalide requete!");
       }
       while($row=$res->fetch_assoc())

      //  $requete="SELECT * from commande_ligne_client where code_commande='$row[code_commande]'";
      //  $row2=$res->fetch_assoc()
       echo"
       <tr>
       <td><img style='max-width:80px;max-height:80px;'src='$row[image]'> </td>

       <td><i style='color:blue;'  class='bi bi-info'><svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-info' viewBox='0 0 16 16'>
       <path d='m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z'/>
        </svg> </i>$row[nom]<br>  
        <i style='color:blue;'  class='bi bi-info'><svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-info' viewBox='0 0 16 16'>
        <path d='m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z'/>
         </svg></i> $row[prenom]<br>   
          <i style='color:blue;' class='bi bi-telephone'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-telephone' viewBox='0 0 16 16'>
          <path d='M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z'/>
           </svg> </i> $row[num]
           </td>
           <td>
           <div style='margin-top:5px;'>
           <i style='color:;'class='bi bi-exclude'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-exclude' viewBox='0 0 16 16'>
           <path d='M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm12 2H5a1 1 0 0 0-1 1v7h7a1 1 0 0 0 1-1V4z'/>
           </svg></i> $row[id_commandef]<br>
          </div>
          <div style='margin-top:5px;'>
           <i style='color:grey; class='bi bi-calendar2-date-fill'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-calendar2-date-fill' viewBox='0 0 16 16'>
           <path d='M9.402 10.246c.625 0 1.184-.484 1.184-1.18 0-.832-.527-1.23-1.16-1.23-.586 0-1.168.387-1.168 1.21 0 .817.543 1.2 1.144 1.2z'/>
           <path d='M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5zm-4.118 9.79c1.258 0 2-1.067 2-2.872 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684c.047.64.594 1.406 1.703 1.406zm-2.89-5.435h-.633A12.6 12.6 0 0 0 4.5 8.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675V7.354z'/>
            </svg> </i>$row[date_création]</div>
            
           <div style='margin-top:5px;'>
           <i style='color:green;'class='bi bi-plus-square-fill'><svg xmlns='http://www.w3.org/2000/svg' width='10' height='13' fill='currentColor' class='bi bi-plus-square-fill' viewBox='0 0 16 16'>
           <path d='M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z'/>
           </svg></i> Entrer</div>
           </td>
            <td>
            <div  style='margin-top:30px;'>
            <a href='modifier-article.php'><img class='photo-action' src='img/update.png'></a>
            <a href='supprimer-commande-fournisseur.php?code_commandef=$row[code_commandef]'><img class='photo-action' src='img/delete.jfif'></a>
            <a  style='border:none;' data-bs-target='#exampleModalToggle' data-bs-toggle='modal'><img class='photo-action' src='img/detail.png'></a>
            </div>
            </td>
            </tr > 
            <tr ><td colspan='4'>
         <div class='card-footer'>
           <div class='row'>
            <div class='col-md-6 text-left'>
                <h5>$somme Article de commande</h5>
            </div>
            <div class='col-md-6 text-center'>
                <h5 style='margin-left:250px;'>Total de commande:$tot</h5>
            </div>
           </div>
          </div> 
 
          
            </td></tr> ";?>
       <!-- ouvrire détaille -->
        <div class='modal fade' id='exampleModalToggle' aria-hidden='true' aria-labelledby='exampleModalToggleLabel' tabindex='-1'>
       <div class='modal-dialog modal-dialog-centered'>
      <div class='modal-content'>
        <div class='modal-body'>
        <div  style='max-height:400px; overflow-y:scroll;'>
        <h6><i style='color:red;' class='bi bi-file-earmark-text'><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor' class='bi bi-file-earmark-text' viewBox='0 0 16 16'>
        <path d='M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z'/>
        <path d='M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z'/>
      </svg></i> Detaille du commande:</h6>
      <?php
       $resultat="SELECT * from commande_ligne_fournisseur c join article a on a.id_article=c.id_article order by id_lignef desc  ";
       $res4= $conx->query($resultat);
        if(!$res2)
         {
          die("invalide requete!");
         }
         while($row=$res4>fetch_assoc())
           echo"
          <div class=' d-flex mt-2 mb-10'>
          <div style='border-style: groove; margin-right:2px; ' class=' w-50 p-2'>$row[id_article]</div>
          <div style='border-style: groove; margin-right:2px;'class='w-75 p-2'>$row[designation]</div>
          <div style='border-style: groove; margin-right:2px;'class='p-2'>$row[quantite]</div>
          <div style='border-style: groove; margin-right:2px;'class='p-2'>$row[TTC]</div>
          <div style='border-style: groove;  margin-right:2px; 'class='w-25 p-2'>$row[total_prix]</div>
        </div>";
      ?> 
    <!-- fermeture detaille-->
            </div>
            </div>
           </div>
        </tbody>
       </table>
    </form>
    
    <div class='row mb-3'><div class='col-md-12 text-center '>
      <?php
      if(!isset($_GET['pagenr10']))
      {
        $page=1;
      }
      else{
        $page=$_GET['pagenr10'];
      }
      ?>
    <span class="fw-semibold">Showing  <?php echo $page?> of <?php echo $pages?>  pages</span> 
     <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
  <li class="page-item"><a class="page-link" href="?pagenr10=1">first</a></li>
  <?php 
  if(isset($_GET['pagenr10']) && $_GET['pagenr10'] > 1)
  {
  ?>
  <li class="page-item"><a class="page-link" href="?pagenr10=<?php echo $_GET['pagenr10'] -1 ?>">Previous</a>
</li>
  <?php
    } 
   else{ 
    ?>
   <li class="page-item"><a class="page-link">Pervious</a></li>
   <?php
     }
     ?>
     <?php
     for($counter = 1;$counter <= $pages;$counter ++){
     ?>
    <li class="page-item"><a class="page-link" href="?pagenr10=<?php echo $counter?>"><?php echo $counter?></a></li>
   <?php
   }?>
    
    <?php 
  if(!isset($_GET['pagenr10']) ){
  ?>
  <li class="page-item"><a class="page-link" href="?pagenr10=2">Next</a></li>
  <?php }else{
    if($_GET['pagenr10']>= $pages) {
      ?>
     <li class="page-item"><a class="page-link" href="">Next</a></li>
      <?php 
    }else{?>
        <li class="page-item"><a class="page-link" href="?pagenr10=<?php echo $_GET['pagenr10'] + 1 ?>">Next</a></li>
      <?php
      }
  }
  ?>

    <li class="page-item"><a class="page-link" href="?pagenr10=<?php echo $pages?>">last</a></li>

  </ul>
</nav>
    </div>
    
   






    </div>
</div>
</div>


</body>
</html>


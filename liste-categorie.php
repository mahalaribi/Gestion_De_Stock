<?php 
session_start();
include("connexion.php");
$start=0;
$rows_per_page=6;
//get the total of rows
$req="SELECT * from  catégorie";
$res=mysqli_query($conx,$req);
$nr_of_rows=$res->num_rows;
//calculating the nbr of rows
$pages=ceil($nr_of_rows/$rows_per_page);
//if the user lick on the paginatuion button we set a new statrting point
if(isset($_GET['pagenr4']))
{
  $page = $_GET['pagenr4'] - 1;
  $start=$page*$rows_per_page;
}
$req2="SELECT * from catégorie limit $start,$rows_per_page";
?><!DOCTYPE html>
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
            margin-top:8px;
            margin-left:80px;
            max-width:1200px;
        }
        .lister
        {
            margin-left:70px;
            margin-top:40px;
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
            <div><h4 class="lister">Liste des catégorie:</h4></div>
        <table class="table caption-top">
        <caption><a href="ajouter-categorie.php"><img class="image-ajouter" src="img/ajouter.png"/></a></caption>
        <thead>
        <tr>
            <th scope="col">Code_categorie</th>
            <th scope="col">Designation</th>
            <th scope="col">Date_céation</th>
            <th scope="col">Date_modification</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
       <?php
       $res = $conx->query($req2);
       if(!$res)
       {
        die("invalide requete!");
       }
       while($row=$res->fetch_assoc())
       echo"
       <tr>

       <td>$row[code]</td>
       <td>$row[designation1]</td>
       <td>$row[date_création]</td>
       <td>$row[date_modification]</td>
       <td><a href='modifier-categorie.php?code=$row[code]'><img class='photo-action' src='img/update.png'></a>
           <a href='supprimer_categorie.php?codee=$row[code]'><img class='photo-action' src='img/delete.jfif'></a>
       </td>
       </tr>
       ";
        ?>
        </tbody>
    </table>

    <div class='row mb-3'><div class='col-md-12 text-center '>
      <?php
      if(!isset($_GET['pagenr4']))
      {
        $page=1;
      }
      else{
        $page=$_GET['pagenr4'];
      }
      ?>
    <span class="fw-semibold">showing  <?php echo $page?> of <?php echo $pages?>  pages</span> 
     <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
  <li class="page-item"><a class="page-link" href="?pagenr4=1">first</a></li>
  <?php 
  if(isset($_GET['pagenr4']) && $_GET['pagenr4'] > 1)
  {
  ?>
  <li class="page-item"><a class="page-link" href="?pagenr4=<?php echo $_GET['pagenr4'] -1 ?>">Previous</a>
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
    <li class="page-item"><a class="page-link" href="?pagenr4=<?php echo $counter?>"><?php echo $counter?></a></li>
   <?php
   }?>
    
    <?php 
  if(!isset($_GET['pagenr4']) ){
  ?>
  <li class="page-item"><a class="page-link" href="?pagenr4=2">Next</a></li>
  <?php }else{
    if($_GET['pagenr4']>= $pages) {
      ?>
     <li class="page-item"><a class="page-link" href="">Next</a></li>
      <?php 
    }else{?>
        <li class="page-item"><a class="page-link" href="?pagenr4=<?php echo $_GET['pagenr4'] + 1 ?>">Next</a></li>
      <?php
      }
  }
  ?>
    <li class="page-item"><a class="page-link" href="?pagenr4=<?php echo $pages?>">last</a></li>
    </ul>
    </nav>
   </div>
 </div>
 
    </div>  
    </div>
   </div> 
  </div>
 </body>
</html>
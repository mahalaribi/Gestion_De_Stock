<?php 
include("connexion.php");
session_start();
$start=0;
$rows_per_page=3;
//get the total of rows
$req="SELECT * from  client";
$res=mysqli_query($conx,$req);
$nr_of_rows=$res->num_rows;
//calculating the nbr of rows
$pages=ceil($nr_of_rows/$rows_per_page);
//if the user lick on the paginatuion button we set a new statrting point
if(isset($_GET['pagenr1']))
{
  $page = $_GET['pagenr1'] - 1;
  $start=$page*$rows_per_page;
}
$req2="SELECT * from client limit $start,$rows_per_page";
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
            margin-top:10px;
            margin-left:60px;
            max-width:1200px;
        }
        .lister
        {
            margin-left:50px;
            margin-top:30px;
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
            <div><h4 class="lister">Liste des clients:</h4></div>
        <table class="table caption-top">
        <caption><a href="ajouter-client.php"><img class="image-ajouter" src="img/ajouter.png"/></a></caption>
        <thead>
    <tr>
    <th scope="col">Image</th>
      <th scope="col">Propriété</th>
      <th scope="col">Téléphone et Email</th>
      <th scope="col">Adresse_codepostale</th>
      <th scope="col">ays_ville</th>
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
       <tr >
       <td><img style='max-width:80px;max-height:80px;'src='$row[photo]'> </td>
       <td><img style='max-width:20px;max-height:15px;'src='img/information.png'> $row[id_client]<br><img style='max-width:20px;max-height:15px;'src='img/information.png'>$row[prenom]<br><img style='max-width:20px;max-height:15px;'src='img/information.png'> $row[nom]</td>
       <td><img style='max-width:30px;max-height:30px;'src='img/tel.jpg'> $row[tel]<br><img style='max-width:20px;max-height:20px;'src='img/mail.png'> $row[mail]</td>
       <td><img style='max-width:30px;max-height:30px;'src='img/postale.png'> $row[adresse]<br><img style='max-width:20px;max-height:20px;'src='img/postcode.png'> $row[code_postale]</td>
       <td><img style='max-width:30px;max-height:30px;'src='img/location.jpg'> $row[pays]<br><img style='max-width:30px;max-height:30px;'src='img/location.jpg'> $row[ville]</td>
      <td>
          <br> 
         <a href='modifier-client.php?code_c=$row[id_client]'><img class='photo-action' src='img/update.png'></a>
         <a href='supprimer-client.php?code_c=$row[id_client]'><img class='photo-action' src='img/delete.jfif'></a>
         <a style='border:none;' data-bs-target='#exampleModalToggle' data-bs-toggle='modal'><img class='photo-action' src='img/detail.png'></a>
         <div class='modal fade' id='exampleModalToggle' aria-hidden='true' aria-labelledby='exampleModalToggleLabel' tabindex='-1'>
         <div class='modal-dialog modal-dialog-centered'>
           <div class='modal-content'>
             <div class='modal-header'>
               <h1 class='modal-title fs-5' ><i style='color:blue;' class='bi bi-calendar3'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-calendar3' viewBox='0 0 16 16'>
              <path d='M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z'/>
              <path d='M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/>
               </svg></i> List des dates :</h1>
               <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'> </button>
             </div>
             <div class='modal-body'>
       <table class='table ' style='max-width:200px;'>
           <thead>
           <tr>
             <th scope='col'>Date_modification</th>
             <th scope='col'>Date_cretion </th>
           </tr>
         </thead>   
             <tr>
              <td>$row[date_modification]</td>
              <td>$row[date_creation]</td>
           </tr>
           </table>
            </div>
           </div>
         </div>
       </div>
       </td>
       </tr>"; ?> 
        </tbody>
    </table>

    
    <div class='row mb-3'><div class='col-md-12 text-center '>
      <?php
      if(!isset($_GET['pagenr1']))
      {
        $page=1;
      }
      else{
        $page=$_GET['pagenr1'];
      }
      ?>
    <span class="fw-semibold">showing  <?php echo $page?> of <?php echo $pages?>  pages</span> 
     <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
  <li class="page-item"><a class="page-link" href="?pagenr1=1">first</a></li>
  <?php 
  if(isset($_GET['pagenr1']) && $_GET['pagenr1'] > 1)
  {
  ?>
  <li class="page-item"><a class="page-link" href="?pagenr1=<?php echo $_GET['pagenr1'] -1 ?>">Previous</a>
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
    <li class="page-item"><a class="page-link" href="?pagenr1=<?php echo $counter?>"><?php echo $counter?></a></li>
   <?php
   }?>
    
    <?php 
  if(!isset($_GET['pagenr1']) ){
  ?>
  <li class="page-item"><a class="page-link" href="?pagenr1=2">Next</a></li>
  <?php }else{
    if($_GET['pagenr1']>= $pages) {
      ?>
     <li class="page-item"><a class="page-link" href="">Next</a></li>
      <?php 
    }else{?>
        <li class="page-item"><a class="page-link" href="?pagenr1=<?php echo $_GET['pagenr1'] + 1 ?>">Next</a></li>
      <?php
      }
  }
  ?>

    <li class="page-item"><a class="page-link" href="?pagenr1=<?php echo $pages?>">last</a></li>

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
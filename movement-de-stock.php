<?php 
session_start();
include("connexion.php");
$start=0;
$rows_per_page=3;
//get the total of rows
$req="SELECT distinct * from client c join commande_client cmd on c.id_client=cmd.id_client";
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
$req1="SELECT * from  mvt_stock m join article a on m.id_article=a.id_article order  by id_stock DESC limit $start,$rows_per_page";

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
            margin-top:12px;
            margin-left:30px;
            max-width:1150px;
        }
        .lister
        {
            margin-left:55px;
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
            <div><h4 class="lister">Movement de stock:</h4></div>
            <form  style="max-width:1250px;margin-left:55px; margin-top:5px; max-height:460px;">
        <table class="table">
        <thead>
   
        <tbody>
         <?php include("connexion.php");
       $res = $conx->query($req1);
       if(!$res)
       {
        die("invalide requete!");
       }
       while($row=$res->fetch_assoc())
       echo"
       <div>

       </div>
       <tr>
       <td><img style='max-width:80px;max-height:80px;'src='$row[image]'> </td>
       <td><i style='color:blue;'  class='bi bi-info'><svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-info' viewBox='0 0 16 16'>
       <path d='m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z'/>
        </svg></i> $row[id_article]<br>  

        <i style='color:blue;'  class='bi bi-info'><svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-info' viewBox='0 0 16 16'>
        <path d='m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z'/>
         </svg> </i>$row[designation]<br>   
         <i style='color:blue;'  class='bi bi-info'><svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-info' viewBox='0 0 16 16'>
         <path d='m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z'/>
          </svg></i>HT: $row[HT]$<br>
          <i style='color:blue;'  class='bi bi-info'><svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-info' viewBox='0 0 16 16'>
       <path d='m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z'/>
        </svg></i>TTC: $row[TTC]$
        </td>

           <td><i class='bi bi-box-seam' style='color:blue; margin-left:40px;'><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor' class='bi bi-box-seam' viewBox='0 0 16 16'>
            <path d='M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z'/>
            </svg><br><h5 style='margin-top:20px;'><h5 style='color:black;'>Stock actuel $row[quanité]</h5></i></td> <div class='accordion' id='accordionExample'>
            </td>
           
          
       </tr>        

      <div class='modal fade' id='exampleModalToggle' aria-hidden='true' aria-labelledby='exampleModalToggleLabel' tabindex='-1'>
     <div class='modal-dialog modal-dialog-centered'>
    <div class='modal-content'>
      <div class='modal-body'>
      <div  style='max-height:300px; overflow-y:scroll;'>
      <div class=' d-flex mt-2 mb-10'>
      <div style='border-style: groove; margin-right:2px; ' class=' w-50  p-2'><i style='color:blue;'class='bi bi-calendar-check'><svg xmlns='http://www.w3.org/2000/svg' width='10' height='13' fill='currentColor' class='bi bi-calendar-check' viewBox='0 0 16 16'>
      <path d='M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z'/>
      <path d='M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z'/>
       </svg></i>$row[date_création]
       </div>
      <div style='border-style: groove; margin-right:2px;'class='p-2'>$row[quanité]</div>
    </div>
      </div>
    </div>
  </div>
</div>
";?> 
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
    <span class="fw-semibold">showing  <?php echo $page?> of <?php echo $pages?>  pages</span> 
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
</div>
</div>
</body>
</html>

<?php
session_start();
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

$start=0;
$rows_per_page=3;
//get the total of rows
$req1="SELECT * from  mvt_stock m join article a on m.id_article=a.id_article ";
$res1=mysqli_query($conx,$req1);
$nr_of_rows=$res1->num_rows;
//calculating the nbr of rows
$pages=ceil($nr_of_rows/$rows_per_page);
//if the user lick on the paginatuion button we set a new statrting point
if(isset($_GET['pagenr1']))
{
  $page = $_GET['pagenr1'] - 1;
  $start=$page*$rows_per_page;
}
$req2="SELECT * from  mvt_stock m join article a on m.id_article=a.id_article where quanité>0  limit $start,$rows_per_page";
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
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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
            max-width:1100px;
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
        .div-actuel
        {
            margin-top:20px;
            margin-bottom:5px;
            max-width:400px;
            max-height:400px;
            background:white;
            border:wave;
            border-color:grey;
            margin-right:px;
        }
        .list{
            margin-left:60px;
            margin-bottom:10px;  
        }
        </style>
         <script type="text/javascript">
            $(document).ready(function() {
                $("#search").keyup(function(){
                    var input=$(this).val();
                    //alert(input);
                    if(input != "")
                    {
                        $.ajax({
                            url:"recherche.php",
                            method:"POST",
                            data:{input:input},

                            success: function(data){
                                $("#searchresult").html(data);
                            }
                        });
                    }
                    else{
                        $("#searchresult").css("display","none");
                    }
                });
            });
        </script> 
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
      <div class="d-flex justify-content-between">
        <div>
        <a href="profil.php"><img class="image-profil rounded-circle"  src=" <?= $row['image'];?>"> </a>
        </div>
        <?php echo"  <div class='titre-header'><h2>$row[nom] $row[prenom]</h2></div>";?>
        <div class="input-group mb-3 recherche-header">
           <input type="text" autocomplete="off" name="recherche" class="form-control" placeholder="recherche" id="search" aria-describedby="basic-addon1">
   
           <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
           <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg></i></span>
        </div>
        <div class="power"><i class="bi bi-power"><a href="logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
            <path d="M7.5 1v7h1V1h-1z"/>
            <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
            </svg> </a></i>
        </div>
        </div>
        </div>
        <div class="card main-height ">   
        <div id="searchresult">
        <table style="margin-top:10px;  margin-left:120px; max-width:1100px;" class='table'>   
        <thead>
        <tr>
      <?php 
        echo"<div><h4 class='lister'>Liste des articles  disponisble:</h4></div>";    
        $res= $conx->query($req2);
        if(!$res)
        {
         die("invalide requete!");
        }
        while($row=$res->fetch_assoc())
        echo"
      <th style='' scope='col'>
      <div class='card div-actuel'style=''>
      <img style='max-width:260px;max-height:160px;margin-left:50px; margin-top:9px; margin-bottom:5px;'src='$row[image]'>
      <br>
      <div class='list' style=''>
      <i style='color:blue  ;'  class='bi bi-info'><svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-info' viewBox='0 0 16 16'>
      <path d='m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z'/>
      </svg>Code d'article: </i> $row[id_article]<br>
      <i style='color:blue ;'  class='bi bi-info'><svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-info' viewBox='0 0 16 16'>
      <path d='m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z'/>
      </svg>Designation : </i> $row[designation]<br>
      <i style='color:blue  ;'  class='bi bi-info'><svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-info' viewBox='0 0 16 16'>
      <path d='m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z'/>
      </svg>quantité: </i> $row[quanité]<br>
      <i class='bi bi-currency-dollar'style='color:red;'  ><svg xmlns='http://www.w3.org/2000/svg'width='16' height='16' fill='currentColor' class='bi bi-currency-dollar' viewBox='0 0 16 16'>
      <path d='M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z'/>
      </svg>HT:  </i>$row[HT] <br> <i class='bi bi-currency-dollar'style='color:red;'  ><svg xmlns='http://www.w3.org/2000/svg'width='16' height='16' fill='currentColor' class='bi bi-currency-dollar' viewBox='0 0 16 16'>
      <path d='M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z'/>
      </svg>TVA: </i> $row[TVA] <br>
      <i class='bi bi-currency-dollar'style='color:red;'  ><svg xmlns='http://www.w3.org/2000/svg'width='16' height='16' fill='currentColor' class='bi bi-currency-dollar' viewBox='0 0 16 16'>
      <path d='M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z'/>
      </svg> TTC:</i> $row[TTC]
      </div>
       <br>
      </div>
      </th>";?>
     </tr>
     </thead>
  </table>
    <div class='row mb-3' ><div class='col-md-12 text-center 'style="margin-top:10px;">
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
    <li class="page-item"><a class="page-link" href="?pagenr1=<?php echo $pages?>">Last</a></li>
     </ul>
   </nav>
  </div>
           </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>



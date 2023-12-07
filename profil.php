<?php
include("connexion.php");
session_start();
$req="SELECT * from user where id_user='".$_SESSION["id"]."' "  ;
$res=$conx->query($req);
if(mysqli_num_rows($res)>0)
{ 
$row=$res->fetch_assoc();
$id=$row['id_user'];
}
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
    
        .lister
        {
            margin-left:30px;
            margin-top:30px;
        }
        .input-ajout
        {
            margin:9px;
            margin-left:20px;
            max-width:420px;
            margin-bottom
        }
        .btn1-ajouter
        {
        margin-right:60px;
        }

        .div-flex
        {
            margin-right:90px;
            margin-bottom:15px;
        }
        </style>
</head>
<body>
<div class="main-container ">
    <div class="row min-width  min-height-600 no-flex-wrap ">
        <!-- pour n'arriver pas a la ligne -->
        <div class="card marg-left col-md-2 ">
        <?php  require('left.php'); ?>    
    </div>
    <div class="card col-md-10 pad back-main border-none">
      <div class="col pad flex-column justify-content-between">
        <div class="card min-height-90 mb-2">
            <?php 
            require('header.php');
             // pour appeler un page dans une autre page ?>
        </div>
         <div class="card main-height ">
           <form name='form' style=""class="" action='profile-action.php' method='post'>
           <div class="row m-3" >
            <div class="card  text-center col-md-4 "  style="margin-left:30px;margin-top:30px;">
                <div class="col">
                    <div class="mb-3 mt-4" >
                      <img src="<?=$row['image'];?>" class="rounded-circle" style="max-width:150px;max-hieght:150px;"/>
                    </div>
                    <div>
                    <?php
                              $req="SELECT * from user where id_user='".$_SESSION["id"]."' "  ;
                              $res=$conx->query($req);
                              if(!$res)
                              {
                               die("invalide requete!");
                              }
                              $row=$res->fetch_assoc();
                              
                     echo"
                        <h2>$row[nom] $row[prenom]</h2>
                        <small>ville,adresse,1234</small>
                    </div><br>
                    ";?>
                  
                    <div class="col mb-3 ">
                      <?php
                              
                              
                     echo"
                     <button type='button' class='btn btn-primary'><i class='bi bi-brush'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-brush' viewBox='0 0 16 16'>
                     <path d='M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.118 8.118 0 0 1-3.078.132 3.659 3.659 0 0 1-.562-.135 1.382 1.382 0 0 1-.466-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.394-.197.625-.453.867-.826.095-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.201-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.176-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04zM4.705 11.912a1.23 1.23 0 0 0-.419-.1c-.246-.013-.573.05-.879.479-.197.275-.355.532-.5.777l-.105.177c-.106.181-.213.362-.32.528a3.39 3.39 0 0 1-.76.861c.69.112 1.736.111 2.657-.12.559-.139.843-.569.993-1.06a3.122 3.122 0 0 0 .126-.75l-.793-.792zm1.44.026c.12-.04.277-.1.458-.183a5.068 5.068 0 0 0 1.535-1.1c1.9-1.996 4.412-5.57 6.052-8.631-2.59 1.927-5.566 4.66-7.302 6.792-.442.543-.795 1.243-1.042 1.826-.121.288-.214.54-.275.72v.001l.575.575zm-4.973 3.04.007-.005a.031.031 0 0 1-.007.004zm3.582-3.043.002.001h-.002z'/>
                      </svg></i><a  style='color:white;'href='modifierprofil.php?code_u=$row[id_user]'>Modifer un profil</button><br>4

                      <br><button type='button' class='btn btn-danger'><i class='bi bi-lock'></i><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-lock' viewBox='0 0 16 16'>
                      <path d='M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z'/>
                        </svg><a  style='color:white;'href='modifermotdepasse.php?code_u=$row[id_user]'>Modifier mot de passe</a></button> ";?>
                        
                    </div>

                 </div>
                </div> 
                <div style="margin-left:20px;margin-top:30px;"class="card  col-md-7">
                <table class="table">
                  <tbody>
                     <tr>
                     <?php
                              $req="SELECT * from user where id_user='".$_SESSION["id"]."' "  ;
                              $res=$conx->query($req);
                              if(!$res)
                              {
                               die("invalide requete!");
                              }
                              $row=$res->fetch_assoc();
                        echo"
                        <th scope='row'>Nom complet</th>
                         <td> $row[nom] $row[prenom]</td>
                       </tr>
                       <tr>
                        <th scope='row'>Email</th>
                         <td>$row[email]</td>
                       </tr>
                       <tr>
                        <th scope='row'>Pays</th>
                         <td>$row[pays]</td>
                       </tr>
                       <tr>
                        <th scope='row'>Ville</th>
                         <td>$row[ville]</td>
                       </tr>
                       <tr>
                        <th scope='row'>Adresse</th>
                         <td>$row[adresse]</td>
                       </tr>
                       <tr>
                        <th scope='row'>Code-postale</th>
                         <td>$row[code_postale]</td>
                       </tr>";?>
                  </tbody>
                  </table>
            </form>
        </div>
  </div>
</div>
</div>
</div>


</body>
</html>

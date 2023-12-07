<?php
include("connexion.php");
session_start();
$id_user="";
$last_mdp="";
$new_mdp="";
$confirm_mdp="";
if($_SERVER["REQUEST_METHOD"]=='GET'){ 
if(!isset($_GET['code_u']))
{
header("locations:profil.php");
exit;
}
$id_user=$_GET['code_u'];
$req="SELECT * from user where id_user='$id_user'";
$res=$conx->query($req);
$row=$res->fetch_assoc();
while(!$row)
{
    header("locations:profil.php");
   exit;
}
$id_user=$row['id_user'];
}
else {
    $id_user=$_POST['id_user'];
    $last_mdp=$_POST['lastpassword'];
    $new_mdp=$_POST['newpassword'];
    $confirm_mdp=$_POST['confirmpassword'];
    $req="SELECT * from user where id_user='$id_user'";
    $res=$conx->query($req);
    $row=$res->fetch_assoc();
    
      if($last_mdp!=$row['mdp'])
    {
        $msg=  ' <div >
        <p style="color:red;">Password incorrect!</p>
      </div>';
     
    }
    elseif($new_mdp!=$confirm_mdp or $new_mdp==$row['mdp']&&$row['mdp']==$confirm_mdp)
    {
        $msg=  ' <div >
        <p style="color:red;">Confirmer Password !</p>
      </div>';  
      
    }
    else
    {

    $date_modif=date("Y-m-d ");
    $req2="UPDATE user set mdp='$new_mdp', date_modification='$date_modif',confirmmdp='$confirm_mdp' where id_user=' $id_user'";
    $res=$conx->query($req2);
    header("location:profil.php");
     }

}
$req="SELECT * from user where id_user='".$_SESSION["id"]."' "  ;
$res=$conx->query($req);
if(!$res)
{
 die("invalide requete!");
}
$row=$res->fetch_assoc();
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
           <form name='form' style=""class="" action='' method='post'>
           <div class="row m-3" >
            <div class="card  text-center col-md-4 "  style="margin-left:30px;margin-top:30px;">
                <div class="col">
                    <div class="mb-3 mt-4" >
                      <img src="<?=$row['image']?>"class="rounded-circle" style="max-width:150px;max-hieght:150px;"/>
                    </div>
                    <div>
                    <?php
                     echo"
                        <h2>$row[nom] $row[prenom]</h2>
                        <small>$row[ville],$row[adresse],$row[code_postale]</small>
                    </div><br>
                    ";?>
                  </div>
                </div> 
                <div style="margin-left:20px;margin-top:30px;"class="card  col-md-7">
                <h4 style="margin-top:15px;">Changer mot de passe:</h4>
                <?php
                   if(isset($msg)){ echo $msg;}
                 ?>
                <div  style="margin-top:15px;">
                    <input type="hidden" style="margin-top:15px;margin-bottom:15px;" value='<?= $id_user;?>'  name="id_user" class="form-control" placeholder="id_user" id="inputPassword4" required>
                     <input style="margin-top:15px;margin-bottom:15px;" type="password" name="lastpassword" class="form-control" placeholder="Last-Password" id="inputPassword4" required>
                     <input type="password" style="margin-top:15px;margin-bottom:15px;" name="newpassword" class="form-control" placeholder="New-Password" id="inputPassword4" required>
                     <input type="password" style="margin-top:15px;margin-bottom:15px;" name="confirmpassword" class="form-control" placeholder="Confirm-Password" id="inputPassword4" required>
                </div>
                <div class="  col mb-3"  style="margin-top:15px;margin-left:130px" >
                    <button  style="margin-top:20px;margin-bottom:15px; margin-left:80px;" type="submit" class="btn btn-primary"><i class="bi bi-chevron-down"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                       <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                     </svg></i>Enregistre</button>
                    <button style="margin-top:20px;margin-bottom:15px; margin-left:80px;" type="button" class="btn btn-danger"><i class="bi bi-x"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                     <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                         </svg></i>Annuler</button>
                </div>
            </form>
        </div>
  </div>
</div>
</div>
</div>


</body>
</html>

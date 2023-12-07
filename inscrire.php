<?php
include("connexion.php");

if(isset($_POST['valide']))
{
  if(!empty($_POST['mail']) && !empty($_POST['mdp']))
  {
  $date_creation = date("Y-m-d ");
  $date_modification=date("Y-m-d ");
  $mail=$_POST['mail'];
  $pass=$_POST['mdp'];
  $nom=$_POST['nom'];
  $prenom=$_POST['prenom'];
  $adresse=$_POST['adresse'];
  $ville=$_POST['ville'];
  $pays=$_POST['pays'];
  $code_postale=$_POST['code_postale'];
  $confirmmdp=$_POST['confirmmdp'];
  $req1=mysqli_query($conx,"SELECT * from user where email='$mail' ");
    if(mysqli_num_rows ($req1)>0)
    {
     $msg=  ' <div ><p style="color:red;">Email déja saisire tapez un autre!</p></div>';
    }
    elseif($pass!=$confirmmdp)
    {
      $msg=  ' <div ><p style="color:red;">Confirmer le mot de passe!</p></div>';
    }
    else 
    {
      $req=mysqli_query($conx,"INSERT into user values (NULL,'$date_creation', '$date_modification','$pays','$ville','$mail','$pass','user','$nom','$prenom','$confirmmdp','$adresse','$code_postale','img/profil.jpg','contenue de picture')");
       header("location:login.php");
    }

  }


}


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
        .div-login
        {
            max-width:600px;
            margin-left:540px;
            margin-top:40px;
        
        }
  
        .div-input2
        {
            max-width:400px;
            margin-left:100px;
            margin-top:20px;
        }
        .flex-input
        {
            margin-top:30px;
            margin-bottom:20px;
        }
    </style>
</head>
<body>
<form name="f" method="POST">
<div class="card   div-login">
<div class="card-header text-center" >

    <h3>s'inscrire</h3>
  </div>
  <div class="text-center" style="margin-top:5px;color:red;">
     <?php
       if(isset($msg)){ echo $msg;}
       ?>
     
</div>
  <div class=" div-input2">
    <input type="text" name="nom" class="form-control" placeholder="Nom" required >
  </div>
  <div class=" div-input2">
    <input type="text" name="prenom" class="form-control" placeholder="Prenom" required >
  </div>
  <div class=" div-input2">
    <input type="text" class="form-control" name="pays" placeholder="Pays" required>
  </div>
  <div class=" div-input2">
     <select class="form-select" name="ville">
      <option selected>Choisir une ville</option>
      <option value="Tunisie">Tunisie</option>
      <option value="Bizerte">Bizerte</option>
      <option value="Ben-arousse">Ben arousse</option>
      <option value="Ariana">Ariana</option>
      <option value="Manouba">Manouba</option>
      <option value="nabeul">nabeul</option>
      <option value="Sousse">Sousse</option>
      <option value="Monastir">Monastir</option>
      <option value="Djerba">Djerba </option>
      <option value="Jandouba">Jandouba</option>
      <option value="Gafsa">Gafsa</option>
      <option value="Mednine">Mednine</option>
      <option value="Tozeur">Touzeur</option>
      <option value="khasserine">khasserine</option>
      <option value="Tatouine">Tatouine</option>
      <option value="Gbeli">Gbeli</option>
      <option value="Gabesse">Gabesse</option>
      <option value="Mahdia">Mahdia</option>
      <option value="Sfax">Sfax</option>
      <option value="Sidi bouzide">Sfax</option>
      <option value="karouen">Sfax</option>
      <option value="kef">Sfax</option>
      <option value="Seliana">Sfax</option>
      <option value="Beja">Sfax</option>
      </select>
  </div>
  <div class=" div-input2">
    <input type="text" class="form-control" name="adresse" placeholder="Adresse" aria-label="adresse"required>
  </div>
  <div class=" div-input2">
    <input type="text" class="form-control" name="code_postale" placeholder="Code-postale" required>
  </div>
  <div class="div-input2">
    <input type="email" class="form-control" name="mail" placeholder="Email" id="inputEmail4"required>
  </div>
  <div class="div-input2">
    <input type="password" class="form-control" name="mdp" placeholder="Password" id="inputPassword4"required>
  </div>
  <div class="div-input2">
    <input type="password" class="form-control" name="confirmmdp" placeholder="Confirm password" id="inputPassword4"required>
  </div>
  <!-- <div class="div-input2">
  <input class="input-ajout form-control filee" type="file" name="image" required>
  </div> -->
  <div class="d-flex flex-input justify-content-around">
          <div>
       <button type="reset" class="btn btn-link"><a href="login.php"><i class="bi bi-check-lg"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
        </svg></i>se Connecter?</a></button>
     </div>
     <div>
       <button type="submit" name="valide"  class="btn btn-primary">
        <i class="bi bi-pencil"></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
       <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
       </svg>S'inscrire</button> 
          </div>
    </div>
   
</div>
      </div>
</body>
</html>

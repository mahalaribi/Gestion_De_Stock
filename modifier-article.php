<?php 
session_start();
?>
<!DOCTYPE html>
<?php
include("modifier-article-action.php");
?>
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
       <script>
        function recalculer()
        {
        //déclarons trois variables temporaires
        var val1=0;
        var val2=0;
        // et une variable pour le total
        var total1=0;
        //pour les menus, le test n'est pas nécessaire
        val1=parseFloat(document.getElementById('HT').value);
        val2=parseFloat(document.getElementById('TVA').value);
        //calculons le total
        total1=val1+val2;
        //plaçons-le dans le chmaps resultat
        document.getElementById('TTC').value=total1;
        //le tour est joué  
        }
        </script>

       <style>
        
        .image-ajouter{
            max-width:40px;
            max-height:40px;

        }
        .table
        {
            margin-top:30px;
            margin-left:60px;
            max-width:800px;
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
        <div><h4 class="lister"><i class="bi bi-info-lg"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-info-lg" viewBox="0 0 16 16">
            <path d="m9.708 6.075-3.024.379-.108.502.595.108c.387.093.464.232.38.619l-.975 4.577c-.255 1.183.14 1.74 1.067 1.74.72 0 1.554-.332 1.933-.789l.116-.549c-.263.232-.65.325-.905.325-.363 0-.494-.255-.402-.704l1.323-6.208Zm.091-2.755a1.32 1.32 0 1 1-2.64 0 1.32 1.32 0 0 1 2.64 0Z"/>
            </svg>Modifier article :</i></h4></div>
        <form name='form' enctype="multipart/form-data" style="max-width:930px;margin-left:230px;margin-top:5px;"class="card"action='modifier-article-action.php' method='post'>
        <img style="margin-left:50px;margin-top:10px;max-width:150px;max-height:150px;margin-bottom:5px;" src="<?=$image;?>">
         <div class="row g-3">
            <div class="col">
                <input type="hidden" class=" input-ajout form-control" value="<?=$id_article;?>" name="id_article"  placeholder="id_articleicle" required>
                <input type="text" class="input-ajout form-control" value="<?=$TVA;?>"name="TVA" id="TVA" onchange="recalculer()" placeholder="TVA"  required>
                <input type="text" class="input-ajout form-control" value="<?=$HT;?>" name="HT"id="HT" onchange="recalculer()" placeholder="HT" required>
                <div class="mb-3"><input class="input-ajout form-control filee" type="file" name="image"></div>
            </div>

            <div class="col">
               <input type="text" class="form-control input-ajout " readonly="readonly" value="<?=$TTC;?>"  name="TTC"  id="TTC" placeholder="TTC" required>
                <input type="text" class="form-control input-ajout " name="designation" value="<?=$designation;?>" placeholder="designation" required>
                <div class="col-auto">
                   <select class="input-ajout form-select"  name="code_categ" placeholder="code_categorie" id="autoSizingSelect">
                    <?php 
                    $req=mysqli_query($conx,"SELECT * from catégorie");
                
                    if(!$req)
                    {
                     die("invalide requete!");
                    }
                    else
                    {
                      while($row = $req->fetch_assoc())    
                    {
                        echo"<option value='$row[code]'>$row[designation1]</option>";
                        if($row['code']==$code_categ)
                        $msg=$row['designation'];   
                    }
                    }
                    ?>
                     <option placeholder="choisir catégorie" value="<?=$code_categ;?>" selected> <?=$msg;?></option>
                   </select> 
                </div>
            </div>
          </div>
         <div class="div-flex d-flex justify-content-end">
           <button type="submit"  class="btn btn1-ajouter btn-primary" name="valider"><i class="bi bi-check-circle"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
           <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
           <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
           </svg>Modifier</i></button>
           
           <button type="reset" class="btn  btn-danger" name="anuuler"><i class="bi bi-dash-circle"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
            </svg>annuler</i></button>
         </div>
         
       </form>
        </div>
    </div>
    </div>
   </div>
</div>
</body>
</html>

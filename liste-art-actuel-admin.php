<?php
session_start();

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
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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
        .div-actuel
        {
            margin-top:5px;
            margin-left:200px;
            margin-bottom:5px;
            max-width:400px;max-height:300px;
        }
        .list{
            margin-left:120px;
            margin-bottom:;
            
        }

        </style>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#live_search").keyup(function(){
                    var input=$(this).val();
                    //alert(input);
                    if(input != "")
                    {
                        $.ajax({
                            url:"jareb.php",
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
            require('left-admin.php');
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
            <div><h4 class="lister">liste des articles actuel:</h4></div>
       <form class='card overflow-auto'style='max-width:900px;max-height:480px; margin-left:220px; overflow-y:scroll; '>
       <div class='card div-actuel'style=''>
       <img style='max-width:260px;max-height:160px;margin-left:70px; margin-top:5px; 'src='img/article.png'>
       <br>
      <div class='list' style='margin-bottom:10px;'>
       <i style='color:blue;'  class='bi bi-info'><svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-info' viewBox='0 0 16 16'>
       <path d='m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z'/>
        </svg> code article</i><br>
        <i style='color:blue;'  class='bi bi-info'><svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-info' viewBox='0 0 16 16'>
       <path d='m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z'/>
        </svg> code article</i><br>
        <i style='color:blue;'  class='bi bi-info'><svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-info' viewBox='0 0 16 16'>
       <path d='m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z'/>
        </svg> code article</i><br>
        <i style='color:blue;'  class='bi bi-info'><svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-info' viewBox='0 0 16 16'>
       <path d='m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z'/>
        </svg> code article</i>
      </div>
      <br>
    </div>
    </form>
        </div>
        <!-- <input type="text" class=" form-control" name="live_search" id="live_search"placeholder="live_search" autocomplete="off"> -->

    </div>
    </div>
</div>
</div>


    </body>



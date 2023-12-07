 <?php 
include("connexion.php");
if(isset($_POST['input'])){
$input=$_POST['input'];
$res=mysqli_query($conx,"SELECT * from article where designation like '{$input}%' OR id_article like '{$input}%' limit 6");
if(mysqli_num_rows($res)>0){?>
<table class="table table-bordered table-striped mt-4" >
    <tr>
    <th>code article</th>
    <th>designation</th>
    <th>HT</th>
    <th>TVA</th>
    <th>TTC</th>
    </tr>
<?php 
while($row=mysqli_fetch_assoc($res))
{
    $id=$row['id_article'];
    $des=$row['designation'];
    $TVA=$row['TVA'];
    $TTC=$row['HT'];
    $HT=$row['TTC'];
}
?>
<tr>
    <td><?=$id;?></td>
    <td><?=$des;?></td>
    <td><?=$HT;?></td>
    <td><?=$TVA;?></td>
    <td><?=$TTC;?></td>
    
</tr>
<?php
}else{
    echo"<h6 style='color:red;'>not found...</h6>";
}
}
?>
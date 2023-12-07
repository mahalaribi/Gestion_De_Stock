<style>
  .label1
  {
    margin-left:15px;
    color:black;
  }
</style>
    <?php
    include("connexion.php"); 
    if(isset($_POST['request']))
    {
     $option = $_POST['request'];
     $sql = "SELECT * FROM client WHERE id_client = '$option'";
    $result = mysqli_query($conx,$sql);
    }
   ?>
   <?php 
    if(mysqli_num_rows($result) > 0) {
      while($row = $result->fetch_assoc())    
      {
    echo"       
    <div class='col ' style=' margin-top:15px;'>
    <i class='bi bi-person-fill'style='color:blue; margin-top:7px;'><svg xmlns='http://www.w3.org/2000/svg'  width='20' height='20' fill='currentColor' class='bi bi-person-fill' viewBox='0 0 16 16'>
      <path d='M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z'/>
      </svg></i> <label class='fw-bolde label1'>$row[nom] et $row[prenom]</label><br>
    <i class='bi bi-envelope-fill' style='color:blue; margin-top:10px;'><svg xmlns='http://www.w3.org/2000/svg'   width='20' height='20' fill='currentColor' class='bi bi-envelope-fill' viewBox='0 0 16 16'>
     <path d='M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z'/>
     </svg></i><label class='text-start label1'>  $row[mail]</label><br>
     <i class='bi bi-telephone-fill'style='color:blue; margin-top:10px;'><svg xmlns='http://www.w3.org/2000/svg'   width='20' height='20' fill='currentColor' class='bi bi-telephone-fill' viewBox='0 0 16 16'>
      <path fill-rule='evenodd' d='M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z'/>
      </svg></i> <label class='text-start label1'>$row[tel]</label><BR>
     <i class='bi bi-hourglass-split'style='color:green; margin-top:10px;'><svg xmlns='http://www.w3.org/2000/svg'   width='20' height='20' fill='currentColor' class='bi bi-hourglass-split' viewBox='0 0 16 16'>
      <path d='M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z'/>
      </svg> <label class='text-start label1'>EN PREPARATION</label></i>
   </div>
    <div class='col'  style='border-left:solid;border-color:grey;max-width:300px;'>
     <img  class='rounded-circle'src='$row[photo]' style='width:280px;height:130px;margin-right:40px;'>
    </div>";
}
}
    ?>
    
    <?php
    include("connexion.php"); 
    if(isset($_POST['request']))
    {
     $option = $_POST['request'];
     $sql = "SELECT * FROM article WHERE id_article = '$option'";
    $result = mysqli_query($conx,$sql);
    }
   ?>
   <?php 
    if(mysqli_num_rows($result) > 0) {
      while($row = $result->fetch_assoc())    
      {
    echo"       
    <input type='text' style='margin-top:8px;' class='cod-commande form-control'placeholder='prix' value='$row[TTC]' name='prix-total'aria-label='First name'readonly='readonly'>
    ";
}
}
   
    ?>
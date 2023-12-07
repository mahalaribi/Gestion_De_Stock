<?php $resultat='SELECT* from commande_ligne_client desc id_lignec ';
      $res = $conx->query($resultat);
      if(!$res)
       {
        die('invalide requete!');
       }
       while($row=$res->fetch_assoc())
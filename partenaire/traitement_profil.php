<?php 
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=vitrine','root');
//$bdd = new PDO('mysql:host=localhost;dbname=prixkdo_vitrine','prixkdo','P@ssword@10');


if(isset($_SESSION['id']) AND $_SESSION['id'] > 0 )
{
$session = intval($_SESSION['id']);
  $con = $bdd ->prepare('SELECT * FROM principal');
  $con->execute(array($session));
  $userinfo = $con->fetch();
if (isset($_POST['logo'])) {
    if (isset($_FILES['newimage_logo']) AND !empty($_FILES['newimage_logo']['name']) AND $_FILES['newimage_logo'] != $userinfo['image_logo'] ) {
        
        $tailleMax = 2097152;
        $extensionsValides = array('jpg' , 'jpeg', 'png');

        if ($_FILES['newimage_logo']['size']<=$tailleMax) {
            $extensionUpload = strtolower(substr(strrchr($_FILES['newimage_logo']['name'],'.'),1));
            if (in_array($extensionUpload, $extensionsValides)) {
                $noms = uniqid($_SESSION['id'],true);
    $chemin = "../administration/profil/img/".$_SESSION['id']."_".$noms.".".$extensionUpload;
    $resultat = move_uploaded_file($_FILES['newimage_logo']['tmp_name'], $chemin);
                if ($resultat) {
                  $slides = $bdd ->prepare('INSERT INTO partenaire(logo) values (?)');
                  $slides->execute(array( 
                        $chemin
                      ));
                  $msg= "message enregistre"
                  $message ="Vos informations ont été bien envoyer";
                }
            
    

            }else{
              $msg = "danger";
        $message="Extention non valide";
    }
        }else{
          $msg = "danger";
        $message="Taille ne doit pas dépasse les 2mo";
    }
    }else{
      $msg = "danger";
        $message="Veuillez rentrer une image valide";
    }
}
}

 

 ?>
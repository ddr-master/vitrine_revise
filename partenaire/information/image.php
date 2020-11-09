<?php 
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=vitrine','root');
//$bdd = new PDO('mysql:host=localhost;dbname=prixkdo_vitrine','prixkdo','P@ssword@10');

if(isset($_GET['id']) AND $_GET['id'] > 0 )

{
  $session = intval($_GET['id']);
$commentaires = $bdd->prepare('SELECT * FROM partenaire where id=?');
  $commentaires->execute(array($session));

$c = $commentaires->fetch();

if (isset($_POST['logo'])) {
  
    if (isset($_FILES['newimage_logo']) AND !empty($_FILES['newimage_logo']['name']) AND $_FILES['newimage_logo'] != $c['logo'] ) {
        
        $tailleMax = 2097152;
        $extensionsValides = array('jpg' , 'jpeg', 'png');

        if ($_FILES['newimage_logo']['size']<=$tailleMax) {
            $extensionUpload = strtolower(substr(strrchr($_FILES['newimage_logo']['name'],'.'),1));

            if (in_array($extensionUpload, $extensionsValides)) {
                $noms = uniqid($_SESSION['id'],true);

    $chemin = "img/".$_SESSION['id']."_".$noms.".".$extensionUpload;
    $resultat = move_uploaded_file($_FILES['newimage_logo']['tmp_name'], $chemin);
                if ($resultat) {

                  $principale= 0;
                    $session = $c['id'];
                    
                 $slides = $bdd ->prepare('INSERT INTO image_partenaire(image,id_partenaire,principale) VALUES (?,?,?)');
                  $slides->execute(array($chemin,$session,$principale));
                 
                  $msg= "success";
                  $message ="Image  ont été bien envoyer";
                 
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
 <!DOCTYPE html>
 <html>
 <head>
  
   <title>image slide</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

 </head>
 <body>
 <h3 class="alert alert-<?php echo $msg ?> text-center" style="margin-top: 20%; "><?php echo $message; ?></h3>
<div class="container" >
</div>
 </body>
 </html>
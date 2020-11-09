<?php 
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=vitrine','root');
//$bdd = new PDO('mysql:host=localhost;dbname=prixkdo_vitrine','prixkdo','P@ssword@10');



if(isset($_SESSION['id']) AND $_SESSION['id'] > 0 )
{

$session = intval($_SESSION['id']);//
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
    $chemin = "/information/img/".$_SESSION['id']."_".$noms.".".$extensionUpload;
    $resultat = move_uploaded_file($_FILES['newimage_logo']['tmp_name'], $chemin);
                if ($resultat) {
$message="";
$activite=htmlentities($_POST['activite']);
$telephone="aucun";
$mobile="aucun";
$ville="aucun";
$commune="aucun";
$quartier="aucun";
$web="aucun";
$map="aucun";
$localisation="aucun";
$categorie="aucun";
$special="aucun";
$description="aucun";
$reduction="aucun";
$facebook="aucun";
$whatsapp="aucun";
$instagramm="aucun";
$youtube="aucun";
$confirmer=0;
$meilleur=0;

if (isset($_POST['activite']) AND !empty($_POST['activite'])) {

  $slides = $bdd ->prepare('INSERT INTO partenaire(logo,activite,id_partenaire,telephone,mobile,ville,commune,quartier,web,map,localisation,categorie,special,description,reduction,facebook,whatsapp,instagramm,youtube,confirme,meilleur) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
                  $slides->execute(array( 
                        $chemin,$activite,$session,$telephone,$mobile,$ville,$commune,$quartier,$web,$map,$localisation,$categorie,$special,$description,$reduction,$facebook,$whatsapp,$instagramm,$youtube,$confirmer,$meilleur
                      ));
                  header("Location: ../profil.php?id=".$_SESSION['id']);
                  $msg= "success";
                  $message ="Vos informations ont été bien envoyer";
                
}else{
  $msg= "message enregistre";
                  $message ="Vos informations ont été bien envoyer";
}
                  
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
}else{
      $msg = "danger";
        $message="Ne laisser pas le champ vide";
    }
}

 
 ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <style>
  #profileDisplay{
  display: black;
  width: 30%;
  margin: 10px auto;
  border-radius: 50%;
}
          </style>
</head>
<body>
  <h3 class="alert alert-<?php echo $msg ?>"><?php echo $message; ?></h3>
<div class="container" style="margin-top: 100px; width: 500px; background-color: grey;">
  
 
 
  <form method="POST" action="#" enctype="multipart/form-data">
    <div class="form-group text-center">
          <img src="../../administration/profil/assets/img/find_user.png" onclick="triggerClick()" id="profileDisplay"/><br>
          <label for="profileImage" style="color: white; font-size: 19px;">cliquer sur l'image pour Selectionner un logo</label>
          
          <input type="file" name="newimage_logo" onchange ="displayImage(this)" id="profileImage" style="display:none;">
          </div>
          <div class="form-group">
         <label style="color: white; font-size: 19px;">Nom de votre activité ou entreprise </label>
      <input class="form-control" type="text" name="activite" placeholder="Entrez le nom du partenaire" />
                                        </div>
             <button type="submit" name="logo" class="btn btn-primary">Enregistrer </button>
  </form>
</div>

<!-- CSS only -->

<script type="text/javascript">
  function triggerClick(){
  document.querySelector('#profileImage').click();

}

function displayImage(e){
  if (e.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e){
      document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
      
    }
    reader.readAsDataURL(e.files[0]);
  }

}
</script>
<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>

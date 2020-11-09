<?php 
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=vitrine','root');
//$bdd = new PDO('mysql:host=localhost;dbname=prixkdo_vitrine','prixkdo','P@ssword@10');



if(isset($_GET['id']) AND $_GET['id'] > 0 )
{
  $session = intval($_GET['id']);
  $con = $bdd ->prepare('SELECT * FROM principal');
  $con->execute(array($session));
  $userinfo = $con->fetch();

//modifier titre du text immobile du slide
    if (isset($_POST['caroussel'])) {
      $titre = htmlentities($_POST['titre']);

      if (isset($_POST['titre']) AND !empty($_POST['titre'])) {
          $slides=$bdd->prepare('UPDATE principale SET titre =? WHERE id=?');
          $slides->execute(array( 
                        $titre, $_GET['id']
                      ));
          $msg="success";
          $message="le titre a bien été modifier";
      }else{
        $msg="success";
        $message ="ne laisser pas le champ vide";
      }
    }
//fin de la modification du titre du text immobile du slide

    //modification du text explicatif
    if (isset($_POST['carousse'])) {
      $explicatif = htmlentities($_POST['explicatif']);

      if (isset($_POST['explicatif']) AND !empty($_POST['explicatif'])) {
          $slides=$bdd->prepare('UPDATE principale SET explicatif =? WHERE id=?');
          $slides->execute(array( 
                        $explicatif, $_GET['id']
                      ));
          $msg="success";
          $message="le paragraphe a bien été modifier";
      }else{
        $msg="success";
        $message ="ne laisser pas le champ vide";
      }
    }
//fin du paragraphe

//Début de modification de l'image principale du slide
    if (isset($_POST['slide'])) {
      if (isset($_FILES['newimage_logo']) AND !empty($_FILES['newimage_logo']['name']) AND $_FILES['newimage_logo'] != $userinfo['image_logo'] ) {
        
        $tailleMax = 2097152;
        $extensionsValides = array('jpg' , 'jpeg', 'png');

        if ($_FILES['newimage_logo']['size']<=$tailleMax) {
            $extensionUpload = strtolower(substr(strrchr($_FILES['newimage_logo']['name'],'.'),1));
            if (in_array($extensionUpload, $extensionsValides)) {
                $nom = uniqid($session, true);
                $chemin ="img/".$_SESSION['id']."_".$nom.".".$extensionUpload;
                $resultat =move_uploaded_file($_FILES['newimage_logo']['tmp_name'], $chemin);
                if ($resultat) {
                  $slides = $bdd ->prepare('UPDATE principale SET slide1 =? WHERE id=?');
                  $slides->execute(array( 
                        $chemin, $_GET['id']
                      ));
                  $msg ="success";
                  $message ="L'image principale du slide a bien été envoyer";
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
  //Fin de modification de l'image principale du slide


//Début de modification des autres images du slide
    if (isset($_POST['slid'])) {
      if (isset($_FILES['newimage_logo']) AND !empty($_FILES['newimage_logo']['name']) AND $_FILES['newimage_logo'] != $userinfo['image_logo'] ) {
        
        $tailleMax = 2097152;
        $extensionsValides = array('jpg' , 'jpeg', 'png');

        if ($_FILES['newimage_logo']['size']<=$tailleMax) {
            $extensionUpload = strtolower(substr(strrchr($_FILES['newimage_logo']['name'],'.'),1));
            if (in_array($extensionUpload, $extensionsValides)) {
                $nom = uniqid($session, true);
                $chemin ="img/".$_SESSION['id']."_".$nom.".".$extensionUpload;
                $resultat =move_uploaded_file($_FILES['newimage_logo']['tmp_name'], $chemin);
                if ($resultat) {
                  $slides = $bdd ->prepare('UPDATE principale SET slide =? WHERE id=?');
                  $slides->execute(array( 
                        $chemin, $_GET['id']
                      ));
                  $msg ="success";
                  $message ="L'image principale du slide a bien été envoyer";
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
  //Fin de la modification des autres images du slide


//Début de modification des autres images du slide
    if (isset($_POST['sli'])) {
      if (isset($_FILES['newimage_logo']) AND !empty($_FILES['newimage_logo']['name']) AND $_FILES['newimage_logo'] != $userinfo['image_logo'] ) {
        
        $tailleMax = 2097152;
        $extensionsValides = array('jpg' , 'jpeg', 'png');

        if ($_FILES['newimage_logo']['size']<=$tailleMax) {
            $extensionUpload = strtolower(substr(strrchr($_FILES['newimage_logo']['name'],'.'),1));
            if (in_array($extensionUpload, $extensionsValides)) {
                $nom = uniqid($session, true);
                $chemin ="img/".$_SESSION['id']."_".$nom.".".$extensionUpload;
                $resultat =move_uploaded_file($_FILES['newimage_logo']['tmp_name'], $chemin);
                if ($resultat) {
                  $slides = $bdd ->prepare('UPDATE principale SET slid =? WHERE id=?');
                  $slides->execute(array( 
                        $chemin, $_GET['id']
                      ));
                  $msg ="success";
                  $message ="L'image principale du slide a bien été envoyer";
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
  //Fin de la modification des autres images du slide

            
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Modification | slide page principale</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
  <style>
            #profileDisplay{
  display: black;
  width: 60%;
  margin: 10px auto;
  border-radius: 50%;
}
          </style>
    <div id="wrapper">
        <?php include "menu.php"; ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                
                 <!-- /. ROW  -->
                 <hr />
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Modification slide de la page principale
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="alert alert-<?php echo $msg ?>"><?php echo $message; ?></h3>

                                        <!-- Nom de la categorie traitement/ajouter_categories.php -->
       
              <!--Modification de l'image statique sur le slide explicatif-->
            <form role="form" action="#" method="POST">
                <div class="form-group">
                          <label>modifier </label>
                    <div class="form-group text-center" style="background-color: grey; color : white">
                    
              <label for="profileImage" >le titre statique du slide</label>
                    </div>

                    <input type="input" name="titre" placeholder="changer le titre">
                </div>
                                      
            <button type="submit" name="caroussel" class="btn btn-primary">Modifier</button>

            </form>
    <!--fin du modification du menu 1-->
                                    <br />
          <!--Modification de l'image statique sur le slide -->
            <form role="form" action="#" method="POST">
                <div class="form-group">
                          <label>modifier </label>
                    <div class="form-group text-center" style="background-color: grey; color : white">
                    
              <label for="profileImage" >paragraphe statique du slide</label>
                    </div>

                    <input type="input" name="explicatif" placeholder="changer le titre">
                </div>
                                      
            <button type="submit" name="carousse" class="btn btn-primary">Modifier</button>

            </form>
    <!---->

    <!--Debut dans la modification de l'image slide principale-->
 <br />
    <form role="form" action="#" method="POST" enctype="multipart/form-data">
        <div class="form-group text-center" style="background-color: grey; color : white">
          <label>modifier image principale du slide</label>
          </div>
                <div class="form-group text-center">
                    <img src="assets/img/find_user.png" onclick="triggerClick()" id="profileDisplay"/><br>
                    <label for="profileImage">Selectionner un logo</label>
                    
                    <input type="file" name="newimage_logo" onchange ="displayImage(this)" id="profileImage" style="display:none;">
                </div>
                                           
       
                       
      <button type="submit" name="slide" class="btn btn-primary">Ajouter</button>

        </form>
   <!-- Fin de  la modification de l'image slide principale -->
                                   
    <!--fin du modification du menu 4-->
                                    <br />        
                            </div>
                            <div class="col-lg-6">
    <!--Debut dans la modification des autres slides 2-->
 <br />
    <form role="form" action="#" method="POST" enctype="multipart/form-data">
        <div class="form-group text-center" style="background-color: grey; color : white">
          <label>modifier </label>
          </div>
                <div class="form-group text-center">
                    
                    <label for="profileImag">les autres image du slide</label>
                    
                    <input type="file" name="newimage_logo">
                </div>
                                                           
      <button type="submit" name="sli" class="btn btn-primary">Ajouter</button>

        </form>
   <!-- Fin de  la modification de l'image slide principale -->

   <!--Debut dans la modification de l'image slide principale-->
 <br />
    <form role="form" action="#" method="POST" enctype="multipart/form-data">
        <div class="form-group text-center" style="background-color: grey; color : white">
          <label>modifier </label>
          </div>
                <div class="form-group text-center">
                    
                    <label for="profileImag">les autres image du slide</label>
                    
                    <input type="file" name="newimage_logo">
                </div>
                                           
        
                       
      <button type="submit" name="slid" class="btn btn-primary">Ajouter</button>

        </form>
   <!-- Fin de  la modification de l'image slide principale -->
      <br /> 
                            </div>
                        </div>
                    </div></div><!-- End Form Elements -->
                </div>
            </div>
                
    
             <!-- /. PAGE INNER  -->
            </div>

         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
     <script src="scripts.js"></script>
    
   
</body>
</html>
<?php 
}else{
    echo "hello";
}
?>

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
                  $slides = $bdd ->prepare('UPDATE principale SET logo =? WHERE id=?');
                  $slides->execute(array( 
                        $chemin, $_GET['id']
                      ));
                  $msg ="success";
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
  //supprimer hotel

 //modifier menu 1
    if (isset($_POST['categori'])) {
      $akwaba = htmlentities($_POST['akwaba']);

      if (isset($_POST['akwaba']) AND !empty($_POST['akwaba'])) {
          $slides=$bdd->prepare('UPDATE principale SET menu1 =? WHERE id=?');
          $slides->execute(array( 
                        $akwaba, $_GET['id']
                      ));
          $msg="success";
          $message="le menu1 a bien été modifier";
      }else{
        $msg="alert";
        $message ="ne laisser pas le champ vide";
      }
    }

    //modifier menu 2
    if (isset($_POST['categor'])) {
      $reduction = htmlentities($_POST['reduction']);

      if (isset($_POST['reduction']) AND !empty($_POST['reduction'])) {
          $slides=$bdd->prepare('UPDATE principale SET menu2 =? WHERE id=?');
          $slides->execute(array( 
                        $reduction, $_GET['id']
                      ));
          $msg="success";
          $message="le menu2 a bien été modifier";
      }else{
        $msg="alert";
        $message ="ne laisser pas le champ vide";
      }
    }

    //modifier menu 3
    if (isset($_POST['catego'])) {
      $partenaire = htmlentities($_POST['partenaire']);

      if (isset($_POST['partenaire']) AND !empty($_POST['partenaire'])) {
          $slides=$bdd->prepare('UPDATE principale SET menu3 =? WHERE id=?');
          $slides->execute(array( 
                        $partenaire, $_GET['id']
                      ));
          $msg="success";
          $message="le menu3 a bien été modifier";
      }else{
        $msg="alert";
        $message ="ne laisser pas le champ vide";
      }
    }

    //modifier menu 4
    if (isset($_POST['categ'])) {
      $contact = htmlentities($_POST['contact']);

      if (isset($_POST['contact']) AND !empty($_POST['contact'])) {
          $slides=$bdd->prepare('UPDATE principale SET menu4 =? WHERE id=?');
          $slides->execute(array( 
                        $contact, $_GET['id']
                      ));
          $msg="success";
          $message="le menu4 a bien été modifier";
      }else{
        $msg="alert";
        $message ="ne laisser pas le champ vide";
      }
    }

    //modifier menu 5
    if (isset($_POST['cate'])) {
      $devenir_partenaire = htmlentities($_POST['devenir_partenaire']);

      if (isset($_POST['devenir_partenaire']) AND !empty($_POST['devenir_partenaire'])) {
          $slides=$bdd->prepare('UPDATE principale SET menu5 =? WHERE id=?');
          $slides->execute(array( 
                        $devenir_partenaire, $_GET['id']
                      ));
          $msg="success";
          $message="le menu5 a bien été modifier";
      }else{
        $msg="alert";
        $message ="ne laisser pas le champ vide";
      }
    }

    //modifier menu 6
    if (isset($_POST['cat'])) {
      $espace_partenaire = htmlentities($_POST['espace_partenaire']);

      if (isset($_POST['espace_partenaire']) AND !empty($_POST['espace_partenaire'])) {
          $slides=$bdd->prepare('UPDATE principale SET menu6 =? WHERE id=?');
          $slides->execute(array( 
                        $espace_partenaire, $_GET['id']
                      ));
          $msg="success";
          $message="le menu6 a bien été modifier";
      }else{
        $msg="alert";
        $message ="ne laisser pas le champ vide";
      }
    }
            
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Modification | page principale</title>
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
                            Modification de page principale
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="alert alert-<?php echo $msg ?>"><?php echo $message; ?></h3>
<style>
            #profileDisplay{
  display: black;
  width: 60%;
  margin: 10px auto;
  border-radius: 50%;
}
          </style>
                                        <!-- Nom de la categorie traitement/ajouter_categories.php -->
                                    <form role="form" action="#" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>modifier votre logo</label>
                    <div class="form-group text-center">
                    <img src="assets/img/find_user.png" onclick="triggerClick()" id="profileDisplay"/><br>
                    <label for="profileImage">Selectionner un logo</label>
                    
                    <input type="file" name="newimage_logo" onchange ="displayImage(this)" id="profileImage" style="display:none;">
                </div>
                                           
                                        </div>
                                        <!-- fin Nom de la categorie -->

                                        <!-- Début code de la categorie -->                          
                                        <!-- icon de la categorie -->

                                        <button type="submit" name="categorie" class="btn btn-primary">Ajouter</button>

                                    </form>
                                   
                                    <br />  
    <!--Modification du menu1-->
            <form role="form" action="#" method="POST">
                <div class="form-group">
                          <label>modifier </label>
                    <div class="form-group text-center" style="background-color: grey; color : white">
                    
              <label for="profileImage" >Modifier le menu</label>
                    </div>

                    <input type="input" name="akwaba" placeholder="changer le menu akwaba">
                </div>
                                      
            <button type="submit" name="categori" class="btn btn-primary">Modifier</button>

            </form>
    <!--fin du modification du menu 1-->
                                    <br />
      <!--Modification du menu 2-->
            <form role="form" action="#" method="POST">
                <div class="form-group" >
                          <label>modifier </label>
                    <div class="form-group text-center" style="background-color: green; color : white">
                    
              <label for="profileImage">Modifier le menu2</label>
                    </div>

                    <input type="input" name="reduction" placeholder="profiter des réductions">
                </div>
                                      
            <button type="submit" name="categor" class="btn btn-primary">Modifier</button>

            </form>
    <!--fin du modification du menu 2-->
    <!--Modification du menu 3-->
            <form role="form" action="#" method="POST">
                <div class="form-group">
                          <label>modifier </label>
                    <div class="form-group text-center" style="background-color: red; color : white">
                    
              <label for="profileImage">Modifier le menu3</label>
                    </div>

                    <input type="input" name="partenaire" placeholder="devenir partenaire">
                </div>
                                      
            <button type="submit" name="catego" class="btn btn-primary">Modifier</button>

            </form>
    <!--fin du modification du menu 4-->
                                    <br />        
                            </div>
                            <div class="col-lg-6">
                               <!--Modification du menu 4-->
            <form role="form" action="#" method="POST">
                <div class="form-group">
                          <label>modifier </label>
                    <div class="form-group text-center" style="background-color: blue; color : white">
                    
              <label for="profileImage">Modifier le menu4</label>
                    </div>

                    <input type="input" name="contact" placeholder="changer le menu 4">
                </div>
                                      
            <button type="submit" name="categ" class="btn btn-primary">Modifier</button>

            </form>
    <!--fin du modification du menu 4-->

    <!--Modification du menu 5-->
            <form role="form" action="#" method="POST">
                <div class="form-group">
                          <label>modifier </label>
                    <div class="form-group text-center" style="background-color: black; color : white">
                    
              <label for="profileImage">Modifier le menu5</label>
                    </div>

                    <input type="input" name="devenir_partenaire" placeholder="changer le menu 5">
                </div>
                                      
            <button type="submit" name="cate" class="btn btn-primary">Modifier</button>

            </form>
    <!--fin du modification du menu 5-->

    <!--Modification du menu 6-->
            <form role="form" action="#" method="POST">
                <div class="form-group">
                          <label>modifier </label>
                    <div class="form-group text-center" style="background-color: black; color : white">
                    
              <label for="profileImage">Modifier le menu6</label>
                    </div>

                    <input type="input" name="espace_partenaire" placeholder="changer le menu6">
                </div>
                                      
            <button type="submit" name="cat" class="btn btn-primary">Modifier</button>

            </form>
    <!--fin du modification du menu 6-->
                            </div>
                            
                    
                                           
                  
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

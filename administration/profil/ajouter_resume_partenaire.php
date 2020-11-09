<?php 
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=vitrine','root');
//$bdd = new PDO('mysql:host=localhost;dbname=prixkdo_vitrine','prixkdo','P@ssword@10');

if(isset($_GET['id']) AND $_GET['id'] > 0 )
{
  $getid = intval($_GET['id']);
  $con = $bdd ->prepare('SELECT * FROM admin WHERE id = ?');
  $con->execute(array($getid));
  $userinfo = $con->fetch();

  if (isset($_POST['partenaire'])) {
   
//insertion des images
if (isset($_FILES['logo']) AND !empty($_FILES['logo']['name']))
 {
$tailleMax = 2097152;
$extensionsValides = array('jpg', 'jpeg', 'gif','png');
if ($_FILES['logo']['size'] <= $tailleMax)
 {
  $extensionUpload = strtolower(substr(strrchr($_FILES['logo']['name'],'.'), 1));
  if (in_array($extensionUpload, $extensionsValides))
  {
    $noms = uniqid($_SESSION['id'],true);
    $chemin = "img/".$_SESSION['id']."_".$noms.".".$extensionUpload;
    $resultat = move_uploaded_file($_FILES['logo']['tmp_name'], $chemin);
    if ($resultat){


     //insertion des slides
if (isset($_FILES['slide_one']) AND !empty($_FILES['slide_one']['name']))
 {
$tailleMax = 2097152;
$extensionsValides = array('jpg', 'jpeg', 'gif','png');
if ($_FILES['slide_one']['size'] <= $tailleMax)
 {
  $extensionUpload = strtolower(substr(strrchr($_FILES['slide_one']['name'],'.'), 1));
  if (in_array($extensionUpload, $extensionsValides))
  {
    $no = uniqid($_SESSION['id'],true);
    $chemins = "img/".$_SESSION['id']."_".$no.".".$extensionUpload;
    $resultats = move_uploaded_file($_FILES['slide_one']['tmp_name'], $chemins);
    if ($resultats){


       //insertion des slides 2
if (isset($_FILES['slide_two']) AND !empty($_FILES['slide_two']['name']))
 {
$tailleMax = 2097152;
$extensionsValides = array('jpg', 'jpeg', 'gif','png');
if ($_FILES['slide_two']['size'] <= $tailleMax)
 {
  $extensionUpload = strtolower(substr(strrchr($_FILES['slide_two']['name'],'.'), 1));
  if (in_array($extensionUpload, $extensionsValides))
  {
    $n = uniqid($_SESSION['id'],true);
    $chemi = "img/".$_SESSION['id']."_".$n.".".$extensionUpload;
    $resulta = move_uploaded_file($_FILES['slide_two']['tmp_name'], $chemi);
    if ($resulta){

      //insertion des slides 3
if (isset($_FILES['slide_three']) AND !empty($_FILES['slide_three']['name']))
 {
$tailleMax = 2097152;
$extensionsValides = array('jpg', 'jpeg', 'gif','png');
if ($_FILES['slide_three']['size'] <= $tailleMax)
 {
  $extensionUpload = strtolower(substr(strrchr($_FILES['slide_three']['name'],'.'), 1));
  if (in_array($extensionUpload, $extensionsValides))
  {
    $mon = uniqid($_SESSION['id'],true);
    $chem = "img/".$_SESSION['id']."_".$mon.".".$extensionUpload;
    $result = move_uploaded_file($_FILES['slide_three']['tmp_name'], $chem);
    if ($result){

      if (isset($_POST['partenaire'])) {
           $description = htmlentities($_POST['description']);
                 $nom = htmlentities($_POST['nom']);
                 $categories = htmlentities($_POST['categories']);
                 $lien = htmlentities($_POST['lien']);
                 $horaire = htmlentities($_POST['horaire']);
                 $ville = htmlentities($_POST['ville']);
                 $contact = htmlentities($_POST['contact']); 
                 $resume = htmlentities($_POST['resume']); 
                 $tarif = htmlentities($_POST['tarif']); 
                 $promotion = htmlentities($_POST['promotion']); 
                                               
            if (isset($_POST['description']) AND !empty($_POST['description']))  {  
             $yop = $bdd->prepare('INSERT INTO partenaire (logo, nom, categories, lien, description, horaire,ville,contact,slide_one,slide_two,slide_three,resume,tarif,promotion) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
           $yop->execute(array($chemin, $nom, $categories, $lien, $description, $horaire, $ville,$contact,$chemins, $chemi,$chem,$resume,$tarif,$promotion)); 
                                                  
                                                 $msg= "envoyer";
                                                 $info ="success";
                                                }else{
                                                  $msg= "partenaire non enregistrer";
                                                 $info ="danger";
                                                }
                                             }else{
                                               $msg= "Vous ne pouvez pas laisser le champs vide";
                                                 $info ="danger";
                                             }
    
     
                                           
                
    }else
    {
      $msg = "erreur durant l'importation de votre fichier";
       $info ="danger";
    }
  }
  else {
    $msg = "Votre photo de profil doit être au format jpg, jpeg, gif, png";
     $info ="danger";
  }
}
else {
  $msg = "Votre photo de profil ne doit pas dépasser 2 mo";
   $info ="danger";
}

 }
// FIN DU DE L'enregistrements
     
                                           
                
    }else
    {
      $msg = "erreur durant l'importation de votre fichier";
       $info ="danger";
    }
  }
  else {
    $msg = "Votre photo de profil doit être au format jpg, jpeg, gif, png";
     $info ="danger";
  }
}
else {
  $msg = "Votre photo de profil ne doit pas dépasser 2 mo";
   $info ="danger";
}

 }
// FIN DU DE L'enregistrements
                                           
                
    }else
    {
      $msg = "erreur durant l'importation de votre fichier";
       $info ="danger";
    }
  }
  else {
    $msg = "Votre photo de profil doit être au format jpg, jpeg, gif, png";
     $info ="danger";
  }
}
else {
  $msg = "Votre photo de profil ne doit pas dépasser 2 mo";
   $info ="danger";
}

 }
// FIN DU DE L'enregistrements



      //$updateavatar =  $bdd->prepare('UPDATE membres SET avatar = :avatar WHERE id= :id');
      //$updateavatar->execute(array(
      //  'avatar'=> $_SESSION['id'].".".$extensionUpload,
      //  'id' => $_SESSION['id']
      //));
      //header('Location: administration.php?id='.$_SESSION['id']);
    }else
    {
      $msg = "erreur durant l'importation de votre fichier";
       $info ="danger";
    }
  }
  else {
    $msg = "Votre photo de profil doit être au format jpg, jpeg, gif, png";
     $info ="danger";
  }
}
else {
  $msg = "Votre photo de profil ne doit pas dépasser 2 mo";
   $info ="danger";
}

 }
// FIN DU DE L'enregistrements
  }

 ?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ajout Resumer partenaire| vitrine</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
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
                            Ajout de partenaire
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="alert alert-<?php echo $info;?>"><?php echo $msg;?></h3>

                                        <!-- Nom de la categorie traitement/ajouter_categories.php -->
                                    <form role="form" action="#" method="POST" enctype="multipart/form-data">
                                    	


					<style>
						#profileDisplay{
	display: black;
	width: 60%;
	margin: 10px auto;
	border-radius: 50%;
}
					</style>
					<div class="form-group text-center">
					<img src="assets/img/find_user.png" onclick="triggerClick()" id="profileDisplay"/><br>
					<label for="profileImage">Selectionner un logo</label>
					
					<input type="file" name="logo" onchange ="displayImage(this)" id="profileImage" style="display:none;">
          </div>


                                        <div class="form-group">
                                            <label>Nom </label>
                                            <input class="form-control" type="text" name="nom" placeholder="Entrez le nom du partenaire" />
                                        </div>
                                        <!-- fin Nom du partenaire -->

                                           

                                          <div class="form-group">
                                            <label>Catégories </label>
                                            <select class="form-control" name="categories">
                                              <option>Choisir une catégoire</option>
                                              <?php 
                                              $con = $bdd ->query('SELECT * FROM categories');
                                                while ($c = $con->fetch()) {
                                               ?>

                                              <option><?php echo $c['code']; ?></option>
                                            <?php } ?>
                                            </select>
                                          </div>

                                          <div class="form-group">
                                            <label>Vidéeo </label>
                                            <input class="form-control" type="text" name="lien" placeholder="Entrez le lien de votre Vidéeo" />
                                          </div>

                                        <!-- Début description du partenaire -->                          
                                        <div class="form-group">
                                            <label>Résumé</label>
                                            <input class="form-control" type="text" name="description" placeholder="Description du partenaire" />
                                        </div>
                                        <!-- Fin description du partenaire -->

                                        

                                        <!-- Debut Horaire ouverture/fermeture -->
                                        <div class="form-group">
                                            <label>Horaire ouverture/fermeture</label>
                                            <input class="form-control" type="text" name="horaire" placeholder="Les horaires d'ouverture et fermeture" />
                                        </div>
                                        <!-- Horaire ouverture/fermeture -->

                                        <!-- Debut contact partenaire -->
                                        <div class="form-group">
                                            <label>Ville</label>
                                            <input class="form-control" type="text" name="ville" placeholder="Ville dans laquelle se trouve le partenaire" />
                                        </div>
                                        <!-- contact partenaire -->

                                        <!-- Debut contact partenaire -->
                                        <div class="form-group">
                                            <label>Contact</label>
                                            <input class="form-control" type="text" name="contact" placeholder="contact du partenaire" />
                                        </div>
                                        <!-- contact partenaire -->

                                        	<!-- Debut contact partenaire -->
                                        <div class="form-group">
                                            <label>Slide1</label>
                                            <input class="form-control" type="file" name="slide_one" placeholder="contact du partenaire" />
                                        </div>
                                        <!-- contact partenaire -->

                                        	<!-- Debut contact partenaire -->
                                        <div class="form-group">
                                            <label>Slide2</label>
                                            <input class="form-control" type="file" name="slide_two" placeholder="contact du partenaire" />
                                        </div>
                                        <!-- contact partenaire -->

                                        	<!-- Debut contact partenaire -->
                                        <div class="form-group">
                                            <label>Slide3</label>
                                            <input class="form-control" type="file" name="slide_three" placeholder="contact du partenaire" />
                                        </div>
                                        <!-- contact partenaire -->

                                        <!-- Debut contact partenaire -->
                                        <div class="form-group">
                                            <label>Description</label>
                                            <input class="form-control" type="text" name="resume" placeholder="Description de l'activite du partenaire" />
                                        </div>
                                        <!-- contact partenaire -->

                                        <!-- Debut contact partenaire -->
                                        <div class="form-group">
                                            <label>Tarifs</label>
                                            <input class="form-control" type="text" name="tarif" placeholder="Les tarifs" />
                                        </div>
                                        <!-- contact partenaire -->

                                        <!-- Debut contact partenaire -->
                                        <div class="form-group">
                                            <label>Promotion</label>
                                            <input class="form-control" type="text" name="promotion" placeholder="Les promotion en cours" />
                                        </div>
                                        <!-- contact partenaire -->
                                        <button type="submit" name="partenaire" class="btn btn-primary">Ajouter</button>

                                    </form>
                                    <br />  
                             </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
                
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="scripts.js"></script>
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
 <?php 
}
  ?>
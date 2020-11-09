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

//lien youtube

if (isset($_POST['face'])) {

  $categorie = htmlentities($_POST['categorie']);
  $youtube = htmlentities($_POST['youtube']);

$min="#https://www.youtube.com/watch\?v\=#i";

$find ="#^https://www.youtube.com/watch\?v\=#";

$fin = "#https://www.youtube.com/embed#";


if (preg_match_all($min,$youtube)) {

 if (preg_match_all($find,$youtube)) {

  $fini = preg_replace($min,"https://www.youtube.com/embed/",$youtube); 
  
     $da = $bdd ->prepare('INSERT INTO reseaux(youtube,id_partenaire,id_categories) VALUES (?,?,?)');


$da ->execute(array($fini,$session,$categorie));

   }else{
    echo "string";
   }

 }else{
    echo "votre nom doit commencer par 'https://www.youtube.com'";
  }
  }
    
        
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Video | page partenaire</title>
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
                            Ajouter une vidéo
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="alert alert-<?php echo $msg ?>"><?php echo $message; ?></h3>
                       
    <!--Insertion des vidéos youtube-->
            <form role="form" action="#" method="POST">
                <div class="form-group">
                          <label>modifier </label>
                    <div class="form-group text-center" style="background-color: grey; color : white">
                    
              <label for="profileImage" >Ajouter vidéo</label>
                    </div>

                    <select  name="categorie" class="form-control form-control-sm" placeholder="changer le menu akwaba">
                      <option>selctionné une catégorie</option>
                      <?php 
                     
$com = $bdd ->prepare('SELECT * FROM categories');
 $com->execute(array($session));

while ($userinf= $com->fetch()) {
 
 if ($userinf['confirme']==1) {
                       ?>
                    <option value="<?php echo $userinf['id'];?>"><?php echo $userinf['code'];?></option>
          <?php } } ?>
                  
                    </select><br>
         
                    <input type="input" class="form-control form-control-sm" name="youtube" placeholder="coller et copier le lien youtube">
                </div>
                                      
            <button type="submit" name="face" class="btn btn-primary">Modifier</button>

            </form>
    <!--fin Insertion des vidéos youtube-->
   
     
                            </div>
                            <div class="col-lg-6">
                               <!--Affichage de vidéo-->
                               <?php 
            $likes = $bdd->prepare('SELECT * FROM reseaux');
            $likes->execute(array($session));
            $useri= $likes->fetch();

$likes = $bdd->prepare('SELECT * FROM reseaux INNER JOIN categories ON categories.id=reseaux.id_categories');
$likes->execute(array($session));

while ($userin= $likes->fetch()) {
                                ?>
           <iframe width="375" height="349" src="<?php echo $userin['youtube'] ?>" frameborder="0" allowfullscreen style="border: 10px solid #440d0f;height: 340px; background-color:#440d0f;"></iframe>
           

   <a href="suprimer_modifier_text_partenaire.php?supprimer=<?php echo $userin['id_categories'] ?>" class="btn btn-danger">Arrêter la diffusion <?php echo $userin['code'] ?></a>
 
           
         <?php } ?>
    <!--fin Affichage de vidéo-->
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

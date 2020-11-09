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

$commentaires = $bdd->prepare('SELECT * FROM partenaire INNER JOIN image_partenaire ON partenaire.id=image_partenaire.id_partenaire');
  $commentaires->execute(array($session));
 $comn = $commentaires->fetch();


  
if (isset($_POST['log'])) {

     if (isset($_FILES['newimage_logo']) AND !empty($_FILES['newimage_logo']['name']) AND $_FILES['newimage_logo'] != $userinfo['image_logo'] ) {
        
        $tailleMax = 2097152;
        $extensionsValides = array('jpg' , 'jpeg', 'png');
        if ($_FILES['newimage_logo']['size']<=$tailleMax) {
            $extensionUpload = strtolower(substr(strrchr($_FILES['newimage_logo']['name'],'.'),1));
            if (in_array($extensionUpload, $extensionsValides)) {
                $noms = uniqid($_SESSION['id'],true);
    $chemin = "information/img/".$_SESSION['id']."_".$noms.".".$extensionUpload;
    $resultat = move_uploaded_file($_FILES['newimage_logo']['tmp_name'], $chemin);
                if ($resultat) {
                  
$message="";
$activite=htmlentities($_POST['activite']);
$telephone="aucun";
$mobile="aucun";
$commune=0;
$web="aucun";
$map="aucun";
$localisation="aucun";
$categorie=0;
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

  $slides = $bdd ->prepare('INSERT INTO partenaire(logo,activite,id_utilisateurs,telephone,mobile,id_commune,web,map,localisation,id_categories,special,description,reduction,facebook,whatsapp,instagramm,youtube,confirme,meilleur) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
                  $slides->execute(array( 
                        $chemin,$activite,$session,$telephone,$mobile,$commune,$web,$map,$localisation,$categorie,$special,$description,$reduction,$facebook,$whatsapp,$instagramm,$youtube,$confirmer,$meilleur
                      ));
                  
echo "string bien v";
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

 if (isset($_POST['hello'])) {
 
  $jours = htmlentities($_POST['jours']);
$Houverture=htmlentities($_POST['Houverture']);
$Mouverture=htmlentities($_POST['Mouverture']);
$Hfermerture=htmlentities($_POST['Hfermerture']);
$Mfermerture=htmlentities($_POST['Mfermerture']);
/*$Mfermerture=htmlentities($_POST['Mfermerture']);

 */
$da = $bdd ->prepare('INSERT INTO horaire(jours,Houverture,Mouverture,Hfermeture,Mfermeture,id_partenaire) VALUES (?,?,?,?,?,?)');

$da ->execute(array($jours,$Houverture,$Mouverture,$Hfermerture,$Mfermerture,$session));
}

//lien youtube

if (isset($_POST['face'])) {

  $youtube = htmlentities($_POST['youtube']);

$min="#https://www.youtube.com/watch\?v\=#i";

$find ="#^https://www.youtube.com/watch\?v\=#";

$fin = "#https://www.youtube.com/embed#";


if (preg_match_all($min,$youtube)) {
 if (preg_match_all($find,$youtube)) {

  $fini = preg_replace($min,"https://www.youtube.com/embed/",$youtube); 
  
     $da = $bdd ->prepare('INSERT INTO reseaux(youtube,id_partenaire) VALUES (?,?)');


$da ->execute(array($fini,$session));
   }else{
    echo "string";
   }

 }else{
    echo "votre nom doit commencer par 'https://www.youtube.com'";
  }
  }

 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Espace partenaire</title>
  <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Administration | partenaire</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

   
<body>
  <style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap');
html {
  scroll-behavior: smooth;
}

nav{
  padding: 0;
  margin: 0;
}
nav.new{
 height: 70px;
  position: fixed;
   z-index: 9999; 
   background-color: white;
}

.navbar-nav .nav-item a.nav-link{
    font-weight: bold;
    position: relative;
    list-style: none;
}

a#parte.btn.my-2.my-sm-0{
    background-color: #FF7D00;
    border-radius:7px;
    border: 3px solid  #FF7D00;
    color: white
}
a#parte.btn.my-2.my-sm-0:hover{
    border: 3px solid  #FF7D00;
    background-color: #fff;
    color: #FF7D00;
}

a#part.btn.my-2.my-sm-0{
    color: #FF7D00;
    border-radius:7px;
    border: 3px solid  #FF7D00;
}
a#part.btn.my-2.my-sm-0:hover{
    border: 3px solid  ;
    background-color: #FF7D00;
    color: #fff !important;
    transition: all ease-in-out;
}

.navbar-nav .nav-item a.nav-link:hover{
    color: #FF7D00 !important;
    transition: .9s;

}


.navbar-nav .nav-item a.nav-link:after{
    content:'';
    position: absolute;
    left: 0%;
    bottom: 0;
    top: 50px;
    transform: translateX(-50%) scaleX(0);
    -webkit-transform: translate(-50%) scaleX(0);
    -webkit-transform-origin: 50% 50%;
    transform-origin: 50% 50%;
    width: 100%;
    height: 2px;
    background-color: rgba(255,255,255,0.9);
    -webkit-transition: transform 250ms;
    transition: transform 250ms;

}

.navbar-nav .nav-item a.nav-link:hover:after{
  background-color: #f68c1f;
  height: 5px;
-webkit-transform: translateX(-50%) scaleX(1);
  transform: translateX(-1%) scale(1);
}

/*fin du Menu qui s'affiche sur l'image d'acceuil de l'index 
nav.new{
 height: 70px;
  position: fixed;
   z-index: 9999; 
   background-color: white;
}*/
  @media (min-width: 320px) and (max-width: 680px) {
  nav.container-fluid ul {
background-color: black;
  }
  nav.container-fluid .menu a.nav-link{

color: #FF7D00;
  }
  nav.container-fluid img{
width: 60px;
height: 40px;
margin-top: -20px;
margin-left: 10px;
position: absolute;
  }

  nav.container-fluid button{
    position: relative;

  }
  nav.container-fluid button{
    position: relative;
   
  }
  .navbar-nav .nav-item a.nav-link{   
    font-size: 20px;
    text-align: center;
}
a#parte.btn.my-2.my-sm-0{   
    font-size: 16px;
}
a#part.btn.my-2.my-sm-0{   
    font-size: 16px;
    width: 100%;
    margin-top: 0;
}

  
}

  </style>
  <div>
    <!--Nav bar principale ou se trouve le logo-->
    <nav class="new container-fluid navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="index.php"><img style="height: 70px; width: 150px;position :absolute;left: 50%;transform: translate(-50%, -50%);" class="image" src="../images/logo.png
"></a>
  <?php 
$session = intval($_SESSION['id']);
$commentaires = $bdd->prepare('SELECT * FROM partenaire  where id_utilisateurs=?');
  $commentaires->execute(array($session));

$c = $commentaires->fetch();
       ?>
      
</nav><br><br><br>
<nav style="background-color: #eee6e6; " class="container-fluid navbar navbar-expand-lg navbar-light ">
  <a class="navbar-brand" href="index.php"><img style="border-radius: 100%;width: 60px" class="" src="<?php echo $c['logo'] ?>"><p><?php echo $c['activite'] ?></p></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse menu" id="navbarSupportedContent" style="font-family: 'Montserrat', sans-serif;">
    <ul class="menu navbar-nav mr-auto">
      <li class="nav-item active" >
        <a class="nav-link" href="">Espace publicitaire</a>
      </li>
      <li class="nav-item" >
        <a class="nav-link" style="color:#FF7D00" href="comptes.php">Mes comptes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="info.html"> Messages</a>
      </li>
      <!--li class="nav-item">
        <a class="nav-link" href="partenaire.php"><?php echo $userinfo['menu3'] ?></a>
      </li-->
      <li class="nav-item">
        <a class="nav-link" href="info.html">Paramètre</a>
      </li>
    </ul>
    
        
    <a class="btn  my-2 my-sm-0" href="partenaire.php" id="parte"><?php echo $userinfo['menu5'] ?></a>&nbsp;&nbsp;

    <a class="btn  my-2 my-sm-0" href="deconnexion.php" id="part" type="submit">déconnexion</a>
   
   
  </div>
  
</nav>
  </div>
  
<style type="text/css">
  * {box-sizing: border-box}
body {font-family: "Lato", sans-serif;}

/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 30%;
  height: 300px;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #eee6e6;
  color: #FF7D00;;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 1px solid red;
  width: 70%;
  border-left: none;
  height: 500px;
}
</style>

</style>
</head>
<body>



<div class="tab" style="margin-top: 10%;">
  <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Ajouter / modifier logo</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Mes coordonnées</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Situation geographique</button>
  <button class="tablinks" onclick="openCity(event, 'Toky')">Images publicitaires</button>
  <button class="tablinks" onclick="openCity(event, 'Tok')">Mes horaires</button>
  <button class="tablinks" onclick="openCity(event, 'To')">Réseaux sociaux</button>
  <button class="tablinks" onclick="openCity(event, '')"></button>
</div>

<div id="London" class="tabcontent" style="margin-top: 10%;">

  <div class="row">
    <div class="col-lg-6">
      <div class="container" style=" width: 250px; background-color: grey;">
  
      <form method="POST" action="#" enctype="multipart/form-data">
    <div class="form-group text-center">
          <img src="../administration/profil/assets/img/find_user.png" onclick="triggerClick()" id="profileDisplay" style="width: 50%;" />
          <label for="profileImage" style="color: white; font-size: 19px;">cliquer pour ajouter une image</label>
          
          <input type="file" name="newimage_logo" onchange ="displayImage(this)" id="profileImage" style="display:none;">
          </div>
          <div class="form-group">
         <label style="color: white; font-size: 19px;">Nom de votre entreprise </label>
      <input class="form-control" type="text" name="activite" placeholder="Entrez le nom du partenaire" />
          </div>
             <button type="submit" name="log" class="btn btn-primary">Enregistrer </button>
      </form>
</div>
</div>
    
    <div class="col-lg-6" >
      <?php 
$session = intval($_SESSION['id']);
$commentaires = $bdd->prepare('SELECT * FROM partenaire  where id_utilisateurs=?');
  $commentaires->execute(array($session));

$c = $commentaires->fetch();
       ?>
      <img src="<?php echo $c['logo'] ?>" style="width: 100px; margin-top: 10%; margin-left: 30%">
      <h6 style="width: 100px; margin-top: 10%; margin-left: 30%; background-color: grey; color: white; font-weight: bold"><?php echo $c['activite'] ?></h6>
    </div> 
  </div>
  
</div>
<!-- designe de la partie contact-->
<div id="Paris" class="tabcontent" style="margin-top: 10%;">
  <div class="row">
    <div class="col-lg-6">
      <a class="btn btn-primary" href="information/coordoner.php?id=<?php echo $c['id'] ?>" style="margin-top: 35%; margin-left:35%">Modifier contact</a>
    </div>
    <div class="col-lg-6">
      <h1>Mes coordonnées</h1>
      <h5 style="background-color: #eee6e6; color: orange">numéro de téléphone 1</h5>
      <p><?php echo $c['telephone'] ?></p>
      <h5 style="background-color: #eee6e6; color: orange">numéro de téléphone 2</h5>

      <p><?php echo $c['mobile'] ?></p>
      <?php 
    $session = $c['id_commune'];
      $commentaires = $bdd->prepare('SELECT * FROM commune WHERE id=?');
  $commentaires->execute(array($session));
 $comn = $commentaires->fetch();
  ?>
      <h5 style="background-color: #eee6e6; color: orange">Ville d'activité</h5>
      <p>Abidjan</p>
      <h5 style="background-color: #eee6e6; color: orange">Commune d'activité</h5>
      <p><?php echo  $comn['nom_commune'] ?></p>
    </div>
  </div>
</div>
<!-- designe de la partie contact-->


<!-- Mes spécialités-->
<div id="Tokyo" class="tabcontent" style="margin-top: 10%;">
  <div class="row">
    <div class="col-lg-6">
      <a class="btn btn-primary" href="information/specialite.php?id=<?php echo $c['id'] ?>" style="margin-top: 35%; margin-left:35%">modifier spécialité</a>
    </div>
    <div class="col-lg-6">
      <h2>Situation géographique</h2>
      <h5 style="background-color: #eee6e6; color: orange">Catégorie de votre activité</h5>
      <?php
      $session= $c['id_categories'];
$con = $bdd ->prepare('SELECT code FROM categories where id= ?');
  $con->execute(array($session));
 $userin = $con->fetch();
            ?>
      <p><?php echo  $userin['code']; ?></p>

      <h5 style="background-color: #eee6e6; color: orange">Spécialité</h5>
      <p><?php echo $c['special'] ?></p>
      <h5 style="background-color: #eee6e6; color: orange">Description</h5>
      <p><?php echo $c['description'] ?></p>
      <h5 style="background-color: #eee6e6; color: orange">Avantage et reduction</h5>
      <p><?php echo $c['reduction'] ?></p>
    </div>
  </div>
</div>
<!-- Situation géographique-->

<!-- Image de publicite pour le slide-->

<div id="Toky" class="tabcontent" style="margin-top: 10%;">
  <div class="row">
    <div class="col-lg-6">
      <form method="POST" action="information/image.php?id=<?php echo $c['id'] ?>" enctype="multipart/form-data" style="margin-top: 10%;">
  <div class="form-group">
    <label for="exampleFormControlFile1" style="background-color: #eee6e6; padding: 10px; color: white; color:#FF7D00">Ajouter image publicitaire</label>
    <input type="file" name="newimage_logo" class="form-control-file" id="exampleFormControlFile1"><br>
    
  <button type="submit" class="btn btn-primary" name="logo" style="background-color: #f68c1e;border: 1px solid #f68c1e;">Ajouter une image publicitaire</button>

    
  </div>
</form>
  <div class="alert-danger">
    <?php 
$session = intval($_GET['id']);
$commentaires = $bdd->prepare('SELECT * FROM partenaire WHERE id_utilisateurs=?');
  $commentaires->execute(array($session));

$c = $commentaires->fetch();?>
    <?php 
$sessio =$c['id'];
$commentaires = $bdd->prepare('SELECT * FROM image_partenaire where id_partenaire=? AND principale=1');
  $commentaires->execute(array($sessio));
 $co = $commentaires->rowcount(); 
$confirm = $con->fetch(); ?>

    
     <?php if ($co == 0) { ?>
       <p style="padding: 20px;">Aucune image ne s'affichera dans le slide de votre espace partenaire si vous ne spécifiez pas votre image principale.<br>
    <a class="btn btn-primary" href="catalogue.php?id=<?php echo $c['id'] ?>">Définir une image principale</a></p>
    <?php } ?>
  
</div>
<!-- affichage de l'image principale-->

<?php 
$sessio = $c['id'];
$con = $bdd->prepare('SELECT * FROM image_partenaire WHERE id_partenaire = ? AND principale = 1');
$con ->execute(array($sessio));
$confirme = $con->rowcount();
while ($confirm = $con->fetch()) {  ?>
 

<?php if ($confirme == 1): ?>
        <p><img style="width: 100%; font-weight: bold" src="information/<?php echo $confirm['image'] ?>"><a style="font-weight: bold" class="btn btn-info" href="suppression/date.php?annuler=<?php echo $confirm['id'] ?>">Ne plus définir comme image principale</a></p>
      <?php endif ?>
  <?php } ?>
<!-- affichage de l'image principale-->

    </div>
    
    <div class="col-lg-6">
      <h5 style="background-color: #eee6e6; padding: 10px; color: white; color:#FF7D00">Mes images publicitaires</h5>
      <?php 
$sessio = $c['id'];
$commentaires = $bdd->prepare('SELECT * FROM image_partenaire where id_partenaire=?');
  $commentaires->execute(array($sessio));
  while ($co = $commentaires->fetch()){


     ?>
      <?php if ($co['image']): ?>
        <p><img style="width: 100%;" src="information/<?php echo $co['image'] ?>"> <a class="btn btn-danger" href="suppression/date.php?supprimer=<?php echo $co['id'] ?>">supprimer</a></p>
      <?php endif ?>
<?php 
}

     ?>
      
    </div>
  </div>
</div>
<!-- fin formulaire et affichage Image de publicite pour le slide-->

<!-- Horaire-->
<div id="Tok" class="tabcontent" style="margin-top: 10%;">

  <p><?php include "menu1.php" ?> </p>
  
</div>
<!-- Horaire-->

<div id="To" class="tabcontent" style="margin-top: 10%;">
  
  <header class="text-center" style="background-color: #f3c2c4; position: fixed-top; color:white"><h3>Réseaux sociaux</h3>
     </header>
     <div class="row">
      <div class="col-lg-6">
        <p>Copier le lien dans l'url de youtube et coller dans le formulaire votre video s"affichera</p>
      <form action="#" method="POST">
  <div class="form-group">
    <label for="exampleFormControlInput1">Entrer lien youtube</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="youtube" placeholder="Exemple: https://www.youtube.com/watch?v=-22uczx3Tb4&t=1322s">
  </div>

  <button class="btn btn-primary" type="submit" name="face">Envoyer votre vidéo</button>
</form>
      </div>
       <div class="col-lg-6">
         <?php $con = $bdd ->prepare('SELECT * FROM reseaux WHERE id_partenaire = ?');
    $con->execute(array($session));
    $userifo = $con->fetch(); ?>
     <div class="col-lg-3" style=" margin: 10px;">
      <iframe width="375" height="349" src="<?php echo $userifo['youtube'] ?>" frameborder="0" allowfullscreen style="border: 10px solid #440d0f;height: 340px; background-color:#440d0f;"></iframe>
       </div>
     </div>
     
     </div>
</div>

<div id="To" class="tabcontent">
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>
</div>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
 </body>'
</html>
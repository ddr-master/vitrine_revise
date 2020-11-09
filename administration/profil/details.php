<?php 
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=vitrine','root');
//$bdd = new PDO('mysql:host=localhost;dbname=prixkdo_vitrine','prixkdo','P@ssword@10');


if(isset($_GET['id']) AND $_GET['id'] > 0 )
{
  $session = ($_GET['id']);
  $con = $bdd ->prepare('SELECT * FROM partenaire WHERE id_partenaire = ?');
  $con->execute(array($session));
  $userinfo = $con->fetch();

 //////////////////////////////////////////////////
// faire des confirmations avec la variable
if (isset($_GET['confirme']) AND !empty($_GET['confirme'])) {
    $confirmer = (int) $_GET['confirme'];

     $req = $bdd->prepare('UPDATE partenaire SET confirme = 1 WHERE id = ?');
    $req->execute(array($confirmer));
    
    $message ="Partenaire ajouter";
  }
 ?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>
body {
  font-family: Arial;
  margin: 0;
  
}

* {
  box-sizing: border-box;
}

img {
  vertical-align: middle;
}

/* Position the image container (needed to position the left and right arrows) */
.container {
  position: relative;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.column {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}
</style>
<body>
<div class="alert alert-success" role="alert">
  <?php echo $message; ?>
</div>
<h2 style="text-align:center"><?php echo $userinfo['activite']; ?></h2>

<div class="container">
  <?php 

    $con = $bdd ->prepare('SELECT * FROM image_partenaire WHERE id_partenaire=?');
    $con->execute(array($session));                                    
    while ($userinf = $con->fetch()) {  ?>
     
  <div class="mySlides">
    <div class="numbertext">1 / 6</div>
    <img src="../../partenaire/information/<?php echo $userinf['image'] ?>" class="img-fluid" alt="Responsive image" style="height: 500px; width: 100%;">
  </div>
<?php } ?>
<!--
  <div class="mySlides">
    <div class="numbertext">2 / 6</div>
    <img src="image/slide3.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">3 / 6</div>
    <img src="image/slide2.jpg" style="width:100%">
  </div>
    
  <div class="mySlides">
    <div class="numbertext">4 / 6</div>
    <img src="image/slide1.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">5 / 6</div>
    <img src="image/louer.jpg" style="width:100%">
  </div>
    
  <div class="mySlides">
    <div class="numbertext">6 / 6</div>
    <img src="image/forest-315184_1280.jpg" style="width:100%">
  </div>
    -->
  <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>

  <div class="caption-container">
    <p id="caption"></p>
  </div>

  <div class="row">
    <?php 
    $con = $bdd ->prepare('SELECT * FROM image_partenaire where id_partenaire=?');
    $con->execute(array($session));
   
    $userinf = $con->rowCount();
    

for($i=0; $i< $userinf; $i++){ 
$user = $con->fetch()
  ?>
  <div class="column">
      <img class="demo cursor" src="../../partenaire/information/<?php echo $user['image'] ?>" style="width:100%;height: 100px;" onclick="currentSlide(<?php echo $i+1;?>)" alt="">
    </div>
<?php }


$con = $bdd ->prepare('SELECT * FROM image where id_partenaire=?');
    $con->execute(array($session));
   
   $user = $con->fetch();
 ?>

    <!--
    <div class="column">&
      <img class="demo cursor" src="image/slide3.jpg" style="width:100%" onclick="currentSlide(2)" alt="Cinque Terre">
    </div>
    <div class="column">
      <img class="demo cursor" src="image/slide2.jpg" style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
    </div>
    <div class="column">
      <img class="demo cursor" src="image/slide1.jpg" style="width:100%" onclick="currentSlide(4)" alt="Northern Light">
    </div>
    <div class="column">
      <img class="demo cursor" src="image/louer.jpg" style="width:100%" onclick="currentSlide(5)" alt="Nature and sunrise">
    </div>    
    <div class="column">
      <img class="demo cursor" src="image/forest-315184_1280.jpg" style="width:100%" onclick="currentSlide(6)" alt="Snowy Mountains">
    </div>-->
  </div>
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
   <br>
   <br>
   <div class="container">
    <?php 

    $con = $bdd ->prepare('SELECT * FROM partenaire WHERE id=?');
    $con->execute(array($session));                                    
   $userinf = $con->fetch();  ?>
     <table class="table">
  <thead class="thead-dark">
    <h1 style="background-color: grey; color: white; text-align: center">Information détaillée du partenaire</h1>
  </thead>
  <tbody>
    <tr >
      <th scope="row">Nom</th>
      <td class="col-lg-6"><?php echo $userinf['activite']; ?></td>
      
    </tr>
    <tr style="background-color: #9d9291;">
      <th scope="row">Contact</th>
      <td><?php echo $userinf['telephone']; ?></td>
      
    </tr >
    <tr>
      <th scope="row">Mobile</th>
      <td><?php echo $userinf['mobile']; ?></td>
      
    </tr>
   <?php 
   $session = $userinf['id_commune'];
      $commentaires = $bdd->prepare('SELECT * FROM commune WHERE id=?');
  $commentaires->execute(array($session));
 $comn = $commentaires->fetch();

  ?>
    
    <tr>
      <th scope="row">Commune</th>
      <td><?php echo $comn['nom_commune']; ?></td>
      
    </tr>
  
    <tr>
      <th scope="row">Site internet</th>
      <td><?php echo $userinf['web']; ?></td>
    </tr>
    <tr>
      <th scope="row">marquage de la carte</th>
      <td><?php echo $userinf['map']; ?></td>
      
    </tr>
    <tr>
      <th scope="row">Localisation</th>
      <td><?php echo $userinf['localisation']; ?></td>
      
    </tr>
     <tr>
      <th scope="row">Categories</th>
      <?php 
   $session = $userinf['id_categories'];
      $commentaires = $bdd->prepare('SELECT * FROM categories WHERE id=?');
  $commentaires->execute(array($session));
 $comn = $commentaires->fetch();
  ?>
      <td><?php echo $comn['code']; ?></td>
      
    </tr>
    <tr>
      <th scope="row">Spécialité</th>
      <td><?php echo $userinf['special']; ?></td>
      
    </tr>
    <tr>
      <th scope="row">Description</th>
      <td><?php echo $userinf['description']; ?></td>
      
    </tr>
    <tr>
      <th scope="row">Réduction</th>
      <td><?php echo $userinf['reduction']; ?></td>
      
    </tr>
   
  </tbody>
</table><br>

<?php 
$session = ($_GET['id']);
  $con = $bdd ->prepare('SELECT * FROM partenaire WHERE id= ?');
  $con->execute(array($session));
  $userinfo = $con->fetch();

   

if ($userinfo['confirme']==1) {
  
 ?>
<a href="confirmation.php?confirmer=<?php echo $userinfo['id'] ?>" class="btn btn-danger btn-lg btn-block">Annuler la confirmation</a><br><br>

<?php 
if ($userinfo['meilleur']==1) {?>
  
<a href="confirmation.php?meilleure=<?php echo $userinfo['id'] ?>" class="btn btn-danger btn-lg btn-block">Annuler de la partie Meilleure Partenaire</a><br><br>

<?php }else{ ?>

<a href="confirmation.php?meilleur=<?php echo $userinf['id'] ?>" class="btn btn-primary btn-lg btn-block">Meilleure Partenaire</a><br><br>
<?php }}else{?>

<a href="confirmation.php?confirme=<?php echo $userinfo['id'] ?>" class="btn btn-primary btn-lg btn-block">Confirme</a><br><br>
<?php } ?>
<!--Insere les partenaires dans un bloc bien definie-->

</body>
</html>
<?php 
}
else{
  header("Location: ../index.html");
}

 ?>

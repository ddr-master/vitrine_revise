<?php 
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=vitrine','root');
//$bdd = new PDO('mysql:host=localhost;dbname=prixkdo_vitrine','prixkdo','P@ssword@10');

if (isset($_GET['id']) AND $_GET['id'] >0) {

 $session = intval($_GET['id']);
$commentaires = $bdd->prepare('SELECT * FROM partenaire where id_partenaire=?');
  $commentaires->execute(array($session));

$c = $commentaires->fetch(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Vitrine - espace partenaire </title>
  <link rel="stylesheet" href="./style.css">
<!-- CSS only -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- JS, Popper.js, and jQuery -->

</head>
<body>
<!-- partial:index.partial.html -->
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

<div class="wrapper">
    <div class="sidebar">
      <div class="bg_shadow"></div>
        <div class="sidebar__inner">
           <div class="close">
          <i class="fas fa-times"></i>
        </div>
        <div class="profile_info">
            <div class="profile_img">
              <img src="information/img/<?php echo $c['logo']; ?>" alt="profile_img">
            </div>
            <div class="profile_data">
                <p class="name"><?php echo $c['fichier']; ?></p>  
                <p class="role"><?php echo $c['categories']; ?></p>
                <div class="btn"><?php echo $c['localisation']; ?></div>
            </div>
        </div>
        <ul class="siderbar_menu">
            <li><a href="#" class="active">
              <div class="icon"><i class="fas fa-laptop"></i></div>
              <div class="title">contact: <?php echo $c['contact']; ?></div>
              </a></li>  
          <li><a href="#" class="active">
              <div class="icon"><i class="fas fa-newspaper"></i></div>
              <div class="title"style="color: orange; font-weight: bold">Horaire: <?php echo $c['heure']; ?></div>
              </a></li>   
        </ul>
      </div>
    </div>
   
    <div class="main_container">
       <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
<?php $commentaires = $bdd->prepare('SELECT * FROM partenaire where id_partenaire=?');
  $commentaires->execute(array($session));
$co = $commentaires->fetch();


 ?>
    <div class="carousel-item active">
      <img class="d-block w-100" src="../images/pub.jpg" alt="First slide" style="height: 600px;">
      <div class="carousel-caption d-none d-md-block">
    <h5>Hello everyone</h5>
    <p>...</p>
  </div>
   
    </div>
<?php $commentaires = $bdd->prepare('SELECT * FROM partenaire where id_partenaire=?');
  $commentaires->execute(array($session));
while ($co = $commentaires->fetch()) {


 ?>
    <div class="carousel-item">
      <img class="d-block w-100" src="../<?php echo $co['logo']; ?>" alt="Second slide" style="height: 600px;">
      <div class="carousel-caption d-none d-md-block">
    <h5><?php echo $co['titre'] ?></h5>
    <p>...</p>
  </div>

    </div>
<?php } ?>
    
  </div>
</div>
      <div class="top_navbar">
          <div class="hamburger">
              <div class="hamburger__inner">
                  <i class="fas fa-bars"></i>  
              </div>  
          </div>
         <ul class="menu">
            <li><a href="../index.php" class="active">Retour sur le site</a></li>
            <!--li><a href="#">Contact</a></li>
            <li><a href="#">About</a></li-->
         </ul>
         <ul class="right_bar">
            <li><i class="fas fa-search"></i></li>
            <li><i class="fas fa-sign-out-alt"></i></li> 
         </ul>
      </div>
      
      <div class="container">
    
        <div class="item">
              <h6 class="display-4 text-center"><strong><small>Localisation</small></strong></h6>
          <br>
          <div>
            <p style="line-height: 140%;"><?php echo $c['localisation'] ?></p><br><br>
          <p style="line-height: 140%;"><?php echo $c['mieux'] ?></p>
          </div>
          
          
        </div>
        <div class="item">
          <h6 class="display-4 text-center"><strong>Contact</strong></h6>
          <p><?php echo $c['contact'] ?></p>
        </div>
        <div class="item">
          <h6 class="display-4 text-center"><strong>Réduction</strong></h6>

          <p style="line-height: 140%;"><?php echo $c['avantage'] ?></p>
        </div>
        <div class="item">
          <h6 class="display-4 text-center"><strong>Heure d'ouverture</strong></h6>

          <p style="line-height: 140%;"><?php echo $c['heure'] ?></p>
        </div>
        <!--Locaux-->
        <div class="item">
          <h6 class="display-4 text-center"><strong>Nos locaux</strong></h6>
          <?php $commentaires = $bdd->prepare('SELECT * FROM partenaire where id_partenaire=?');
  $commentaires->execute(array($session));
while ($co = $commentaires->fetch()) {


 ?>
          <div class="card-group">


<img class="card-img-top" src="../<?php echo $co['logo'] ?>" alt="Card image cap" style="height: 500px;">
  <div class="card-body bg-primary">
    <h3 class="card-title" style="color: white; font-family: 'Roboto', sans-serif;   "><?php echo $co['titre'] ?></h3>
    <p class="card-text" style="color: white; font-family: 'Roboto', sans-serif;   line-height: 140%; font-weight: bold"><?php echo $co['commentaire'] ?></p>
    
  </div>

     </div>
   <?php } ?>

        </div>
        <!--fin de l'insertion de nos Locaux-->

        <div class="item">
          <h6 class="display-4 text-center"><strong>Réseaux sociaux</strong></h6>

         <div class="card-group">
  <div class="card" style="width: 8rem;">
  <img class="card-img-top" src="https://media.threatpost.com/wp-content/uploads/sites/103/2020/02/05114803/whatsapp-1357489_1920-e1580921300765.jpg" alt="Card image cap" style="">
  <div class="card-body">
    
    <a href="<?php echo $c['whatsapp'] ?>" class="btn btn-primary">contactez nous-nous</a>
  </div>
</div>
  <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="https://marketingland.com/wp-content/ml-loads/2015/07/facebook-newF-logo-fade-1920.png" alt="Card image cap">
  <div class="card-body">
    <a href="<?php echo $c['facebook'] ?>" class="btn btn-primary">Vistez-nous</a>
  </div>
</div>

<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="https://i.insider.com/59a59b08248849308f50942a?width=1200&format=jpeg">
  <div class="card-body">
    <a href="<?php echo $c['youtube'] ?>" class="btn btn-primary">Voir mieux</a>
  </div>
</div>
  
</div>


         <a href=""><i class="fab fa-whatsapp"></i></a>
        </div>
        <!--
        <div class="item">
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque nemo quaerat vel iure quam repudiandae tempora velit sed ducimus obcaecati eum hic dignissimos porro, accusantium at corrupti dolor aut non suscipit eveniet cumque quo culpa?
        </div>
        <div class="item">
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque nemo quaerat vel iure quam repudiandae tempora velit sed ducimus obcaecati eum hic dignissimos porro, accusantium at corrupti dolor aut non suscipit eveniet cumque quo culpa?
        </div> -->
      </div>
     
    </div>

</div>
<style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>

<div class="container">
  <h3>My Google Maps Demo</h3>
    <!--The div element for the map -->
    <div id="map"></div>
    <script>
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: -25.344, lng: 131.036};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 4, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
    </script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
    <script defer
    src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
    </script>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script><script  src="./script.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.js"></script>
</body>
</html>
<?php 

 }
 ?>

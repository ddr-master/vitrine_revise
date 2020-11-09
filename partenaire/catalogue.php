<?php 
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=vitrine','root');
//$bdd = new PDO('mysql:host=localhost;dbname=prixkdo_vitrine','prixkdo','P@ssword@10');
if(isset($_GET['id']) AND $_GET['id'] > 0 )
{

/*$session = $_GET['id_partenaire'];
$commentaires = $bdd->prepare('SELECT * FROM partenaire INNER JOIN image_partenaire ON partenaire.id=image_partenaire.id_partenaire');
  $commentaires->execute(array($session));
 $comn = $commentaires->fetch();
*/
 $session = $_GET['id'];
$commentaires = $bdd->prepare('SELECT * FROM image_partenaire');
  $commentaires->execute(array($session));
 $comn = $commentaires->fetch();
 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Espace partenaire</title>
  <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Catalogue</title>
   
    
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
    <nav class="new container-fluid navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="index.php"><img style="height: 70px; width: 150px; position :absolute;left: 50%;transform: translate(-50%, -50%);" class="image" src="../images/logo.png"></a>
   <?php 
$session ='';
$commentaires = $bdd->prepare('SELECT * FROM partenaire where id=?');
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
        <a class="nav-link" style="color:#FF7D00" href="profil.php">Espace publicitaire</a>
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
    
        
    <a class="btn  my-2 my-sm-0" href="partenaire.php" id="parte"></a>&nbsp;&nbsp;

    <a class="btn  my-2 my-sm-0" href="deconnexion.php" id="part" type="submit">déconnexion</a>
   
   
  </div>
  
</nav>
  </div>
  <style type="text/css">
  .hello {
  position: relative;
  width: 50%;
}

.imag {
  opacity: 1;
  display: block;
  width: 100%;
  height: 250px;
  transition: .5s ease;
  backface-visibility: hidden;
}

.btn {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  
}

.hello:hover .imag {
  opacity: 0.3;
}

.hello:hover .btn {
  opacity: 1;
}

.text {
  background-color: #4CAF50;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
}
</style>
  <h1 class="text-center" style="background-color: black; color: white;">Choisir une image principale</h1><br>
  <div class="row" style="padding:10px;">
    
      <?php 
 $session=$_GET['id'];    
$commentaires = $bdd->prepare('SELECT * FROM image_partenaire where id_partenaire=?');
  $commentaires->execute(array($session));

  while ($co = $commentaires->fetch()){
     ?>
    <div class="col-lg-6 hello">
      
      <?php if ($co['image']): ?>
        <p><img class="imag" src="information/<?php echo $co['image'] ?>"> <a class="btn btn-success" href="suppression/date.php?confirmer=<?php echo $co['id'] ?>">utiliser comme image principale </a></p>
      
      
    </div>
    <?php endif ?>
<?php  }

     ?>
  </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
 </body>'
</html>
<?php  } ?>
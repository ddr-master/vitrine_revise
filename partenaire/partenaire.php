<?php 
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=vitrine','root');
//$bdd = new PDO('mysql:host=localhost;dbname=prixkdo_vitrine','prixkdo','P@ssword@10');

if (isset($_GET['id']) AND $_GET['id'] >0) {

 $session = intval($_GET['id']);
$commentaires = $bdd->prepare('SELECT * FROM partenaire where id=?');
  $commentaires->execute(array($session));

$c = $commentaires->fetch(); 

$session = $c['id'];
$commentaires = $bdd->prepare('SELECT * FROM reseaux where id_partenaire=?');
  $commentaires->execute(array($session));

$co = $commentaires->fetch(); 
$video=$co['id_partenaire'];
 ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Espace partenaire </title>
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="../css/owl/owl.carousel.min.css">

<link rel="stylesheet" type="text/css" href="../css/owl/owl.theme.default.min.css">
<style type="text/css">
  .profile{
     position: absolute;  
  }
  .pro{
     position: absolute;  
    position: fixed;
    width: 15%;
   
    margin-left: 30px;
    transition: all 0.1s ease-in-out;
  }
  .sticky{
  position: -webkit-sticky;
  position: sticky;

  padding: 0px;
  font-size: 20px;
  }
</style>
</head>
<body>
  <?php $con = $bdd ->prepare('SELECT * FROM image_partenaire WHERE id_partenaire = ? AND principale=1');
  $con->execute(array($session));
  $userinfo = $con->fetch(); ?>
<!-- partial:index.partial.html -->
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
 <img class="profile" src="information/" style=" ">
 <!-- le deside du menu à gauche de l'écran-->
<div class="wrapper">
    <div class="sidebar" style="margin-top: 1000px;">

      <div class="bg_shadow"></div>
        <div class="sidebar__inner">
           <div class="close">
          <i class="fas fa-times"></i>
        </div>

        <div class="profile_info sticky">
            <div class="profile_img">
              <img src="<?php echo $c['logo'] ?>">
            </div>
            <div class="profile_data">
                <p class="name" style="margin-bottom: 0; font-size: 20px;"><?php echo $c['activite'] ?></p>  
                <small></small>
                <small style="margin-bottom: 0; color:white; font-weight:bold;"><?php 
$session =$c['id_categories'];
      $commentaires = $bdd->prepare('SELECT * FROM categories WHERE id=?');
  $commentaires->execute(array($session));
 $comn = $commentaires->fetch();

                 ?><?php echo $comn['code'] ?></small> <br> 
                <small style="margin-bottom: 0; color:white;">* * * * * </small> <br> 
                <small style="margin-bottom: 0; color:white;">Viste: <b>
</b></small> <br> 
                 
            </div>
        </div>
        <ul class="siderbar_menu">
          
            <li><a href="#" class="active">
              <div class="title" style="text-decoration: underline;">Contacts</div>
              <small><?php echo $c['telephone'] ?></small><br>
              <small><?php echo $c['mobile'] ?></small><br>
              
              </a></li>  
          <li><a href="#" class="active">
            <?php 
$session =$c['id_commune'];
      $commentaires = $bdd->prepare('SELECT * FROM commune WHERE id=?');
  $commentaires->execute(array($session));
 $comn = $commentaires->fetch();


             ?>
            <small><?php echo $comn['nom_commune'] ?><br><?php 
$sessio = $comn['id_ville'];
            $commentaires = $bdd->prepare('SELECT * FROM villes WHERE id=?');
  $commentaires->execute(array($sessio));
 $com = $commentaires->fetch();
  ?> <?php echo $com['nom_ville'] ?></small>
              
              </a></li>  
          <li><a href="#" class="active">
              <div class="title" style="text-decoration: underline;">Horaire </div>
              </a>
            </li>  
          
        </ul>
      </div>
    </div>
 <!-- fin du menu à gauche de l'écran-->

    <div class="">
    
      <?php include('head.php'); ?>
  
 <div class="container">
<div class="hello">
   <div class="row">
     
     <?php 
$con = $bdd ->prepare('SELECT * FROM image_partenaire WHERE id_partenaire = ? AND confirme=1');
  $con->execute(array($session));
  $userinfo = $con->fetch();
     ?>
     <div class="col-lg-6">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width: 100%;">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" style="width: 125%; height: 350px;padding: 10px;">
    <div class="carousel-item active" >
       <?php 
     $session = $_GET['id'];
$con = $bdd ->prepare('SELECT * FROM image_partenaire WHERE id_partenaire = ? AND principale=1');
  $con->execute(array($session));
  $userinfo = $con->fetch();?>
      <img class="d-block w-100" src="information/<?php echo $userinfo['image'] ?>" alt="<?php echo $userinfo['id'] ?>" style=" height: 350px;">
    </div>
     <?php 
     $session = $_GET['id'];
$con = $bdd ->prepare('SELECT * FROM image_partenaire WHERE id_partenaire = ? AND principale=0');
  $con->execute(array($session));
  while ($userinfo = $con->fetch()) {?>
    <div class="carousel-item">
      <img class="d-block w-100" src="information/<?php echo $userinfo['image'] ?>" alt="Second slide" style=" height: 350px;">
    </div>
  <?php } ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

</div>

     </div>
     <!--Debut de la requête pour afficher une diffusion dans toute les catégories-->
     <?php 

$cat =$c['id_categories'];
     $con = $bdd ->prepare('SELECT * FROM reseaux WHERE id_partenaire = 1 AND id_categories=37');
  $con->execute(array($cat));
  $userifo = $con->fetch(); ?>
 <!--Fin de la requête pour afficher une diffusion dans toute les catégories-->

 <!--Fin de la requête pour afficher une diffusion dans une seule catégories-->

<?php 
$session =$c['id_categories'];
  $con = $bdd ->prepare('SELECT * FROM reseaux WHERE id_partenaire = 1 AND id_categories=?');
  $con->execute(array($session));
  $useri = $con->fetch();

 ?>
 <?php 
$sessi=$c['id'];
  $con = $bdd ->prepare('SELECT * FROM reseaux WHERE id_partenaire = ?');
  $con->execute(array($session));
  $usei = $con->fetch();
$coul=$usei['id_partenaire'];
 ?>
 <!--Fin de la requête pour afficher une diffusion dans une seule catégories-->

  <?php
  $session =$userifo['id_categories'];
      $commentaires = $bdd->prepare('SELECT * FROM categories WHERE id=?');
  $commentaires->execute(array($session));
 $comn = $commentaires->fetch();

$cont = $comn['nom'];

if ($cont == "tout") { ?>
  <!--Afficher les données dans toutes les catégorie-->
  <div class="col-lg-3" style="margin: 10px; margin-left: 65px;">
      <iframe width="375" height="349" src="<?php echo $userifo['youtube'] ?>" frameborder="0" allowfullscreen style="border: 10px solid #440d0f;height: 340px; background-color:#440d0f;"></iframe> 
    </div>
  <!--fin de l'affichage des données dans toutes les catégorie-->

  <!--Debut de l'affichage des données dans seulement une seule catégorie-->

 <?php }elseif ($c['id_categories']==$useri['id_categories']) {
   $session =$c['id_categories'];

  $con = $bdd ->prepare('SELECT * FROM reseaux WHERE id_partenaire = 1 AND id_categories=?');
  $con->execute(array($session));
  $useri = $con->fetch(); 
   ?>
   <div class="col-lg-3" style="margin: 10px; margin-left: 65px;">
      <iframe width="375" height="349" src="<?php echo $useri['youtube'] ?>" frameborder="0" allowfullscreen style="border: 10px solid #440d0f;height: 340px; background-color:#440d0f;"></iframe> 
      </div>
   <!--Fin de l'affichage des données dans seulement une seule catégorie-->
      
  <?php 
  

$sessi=$c['id'];
  $con = $bdd ->prepare('SELECT * FROM reseaux WHERE id_partenaire = ?');
  $con->execute(array($session));
  $usei = $con->fetch();
$coul=$usei['id_partenaire'];

}elseif ($c['id']==$video){
    $session=$c['id'];
  $con = $bdd ->prepare('SELECT * FROM reseaux WHERE id_partenaire = ?');
  $con->execute(array($session));
  $usri = $con->fetch();
 
?>

   <?php echo $useri['id']; ?>
   <div class="col-lg-3" style="margin: 10px; margin-left: 65px;">
      <iframe width="375" height="349" src="<?php echo $usri['youtube'] ?>" frameborder="0" allowfullscreen style="border: 10px solid #440d0f;height: 340px; background-color:#440d0f;"></iframe> 
      </div>
<?php }else{ ?>
  <!--Fin de l'affichage des données dans seulement une seule catégorie-->
<div class="col-lg-3" style="margin: 10px; margin-left: 65px;">
      <iframe width="375" height="349" src="https://www.youtube.com/embed/Mb6j9nItSik" frameborder="0" allowfullscreen style="border: 10px solid #440d0f;height: 340px; background-color:#440d0f;"></iframe> 
      </div>
<?php } ?>

 <!--https://www.youtube.com/embed/Mb6j9nItSik
 



<div class="col-lg-3" style="margin: 10px; margin-left: 80px;">
      <iframe width="375" height="349" src="<?php echo $userif['youtube'] ?>" frameborder="0" allowfullscreen style="border: 10px solid #440d0f;height: 340px; background-color:#440d0f;"></iframe> 
      </div>
 -->   
     
    
  
   </div>
     
       
     
    
  </div>
  </div>

        <?php $commentaires = $bdd->prepare('SELECT * FROM partenaire where id=?');
  $commentaires->execute(array($session));

$c = $commentaires->fetch(); ?>
      <div class="container">
        <div class="row">
          <div class="col-3"></div>
          <div class="col-lg-9" style="margin-top: 50px;">
             <div class="item" style="position: relative;">
          <div class="line"><h5 style="color: #FF7D00; font-weight: bold">Descriptions </h5></div>
         <?php echo  $c['description'] ?>
        </div>
        <div class="item" style="width: 100%">
          <div class="line"><h5 style="color: #FF7D00; font-weight: bold;margin-top: 50px;">Offres</h5></div>
           <?php echo  $c['reduction'] ?>
        </div>
        <div class="item">
          <div class="lin"><h5></h5></div>
        </div>
        
          </div>
        </div> 
      </div>
      
<div class="container" style="margin-top: 50px;">
  <div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-9">
      <div class="second">
    <h1 style="text-decoration : underline"><?php echo $c['id']; ?>Autres partenaires de la même catégorie</h1>
    <?php 
$session =$c['id_categories'];
      $commentaires = $bdd->prepare('SELECT * FROM categories WHERE id=?');
  $commentaires->execute(array($session));
 $comn = $commentaires->fetch();
 ?>
<h1 style="color: #FF7D00; font-weight: bold;margin-top: 50px;"><?php echo $comn['code']; ?></h1><br><br><br><br>
    <div class="wrapper">
            <div class="owl-carousel owl-theme">

              <?php 


$con = $bdd ->prepare('SELECT * FROM partenaire');
    $con->execute(array($session));
   while ($user = $con->fetch()) {

if ($user['id_categories'] ==$session) {


    ?>
     <div class="partenaire">
      <a href="partenaire/partenaire.php?id=<?php echo $user['id']  ?>">
        <div class="lo">
        <img src="<?php echo $user['logo'] ?>" style="">
      </div>
      
      <div class="text" style="padding: 5px;">
        <h5 style="" class="text-center" ><?php echo $user['activite'] ?></h5>
<?php 
$session = $user['id_commune'];
      $commentaires = $bdd->prepare('SELECT * FROM commune WHERE id=?');
  $commentaires->execute(array($session));
 $comn = $commentaires->fetch();
 ?>
 <h5 class="title text-center" ><?php echo $comn['nom_commune'] ?></h5>
      </div>
      </a>

     </div>
    
    
 
<?php  }} ?>
        
            </div>
      
        </div>
</div>
    </div>
  </div>
</div>

      </div>

    </div>


<div class="row" style="margin-top:50px;">
  <div class="col-lg-3"></div>
  <div class="col-lg-9">
    <div class="main_container">
       <div class="profile_img" >
              <img src="https://i.imgur.com/A1Fjq0d.png" alt="profile_img" style="width:50px;">
              <b>Le magicien </b>
            </div>
  <input class="item form-control form-control-lg" type="text" placeholder="Ajouter un commentaire">
</div>
  </div>
</div>
<div class="row">
   <div class="col-lg-3"></div>
  <div class="col-lg-4" style="border: 2px solid black; margin-top: 50px; ">
    <div class="profile_img" >
              <img src="https://i.imgur.com/A1Fjq0d.png" alt="profile_img" style="width:50px;">
              <b>Le magicien</b>
    </div>

    rem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque nemo quaerat vel iure quam repudiandae tempora velit sed ducimus
    <div class="profile_img" >
              <img src="https://i.imgur.com/A1Fjq0d.png" alt="profile_img" style="width:50px;">
              <b>Le magicien</b>
             rem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque nemo quaerat vel iure quam repudiandae tempora velit sed ducimus
            </div>
  
  <div class="profile_img" >
              <img src="https://i.imgur.com/A1Fjq0d.png" alt="profile_img" style="width:50px;">
              <b>Le magicien</b>
            </div>
  rem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque nemo quaerat vel iure quam repudiandae tempora velit sed ducimus
  <div class="profile_img" >
              <img src="https://i.imgur.com/A1Fjq0d.png" alt="profile_img" style="width:50px;">
              <b>Le magicien</b>
            </div>
  rem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque nemo quaerat vel iure quam repudiandae tempora velit sed ducimus <br><br>
  <a href="" style="top: 25px; text-align: centerd">Voir tout les commentaires</a>
</div>
  </div>
<script type="text/javascript">
const profile = document.querySelector('.profile');

window.addEventListener('scroll', () => {
  if (window.scrollY > 50) {
    profile.classList.add('pro');
  }else{
    profile.classList.remove('pro');
  }
})

</script>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script><script  src="./script.js"></script>
  <!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="../js/owl/jquery.min.js"></script>
<script src="../js/owl/owl.carousel.min.js"></script>
<script src="../js/owl/jquery.js"></script>
</body>
</html>
<?php } ?>

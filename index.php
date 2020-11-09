<?php 
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=vitrine','root');
 //$bdd = new PDO('mysql:host=localhost;dbname=prixkdo_vitrine','prixkdo','P@ssword@10');


$session = "";
  $con = $bdd ->prepare('SELECT * FROM principale WHERE id = 1');
  $con->execute(array($session));
  $userinfo = $con->fetch();

 ?>
<!DOCTYPE html>
<html>
<head>
    <?php include "index/head.php"; ?>
     <style type="text/css">
      .containe{
       width: 100%;
      padding: 20px;
      margin: 10px auto;
      display: flex;
      flex-direction: row;
      justify-content: center;
    }

    .box{
      width: 250px;
      margin: 0 10px;
      box-shadow: 0 0 20px 2px rgba(0,0,0, .1);
      transition: 1s;
      background-color: #800000;
      padding: 2px;
      border-radius: 10px;
    }
    .box .lo{
      background-color: white;
      padding: 10px;
      border-radius: 7px 7px 0 0;
    }

    .box img{
      display: block;
      width: 100%;
      border-radius: 5px;
 
        height: 100px;
      }    
    
.box .text h5{
      padding-left: 5px;
      color: white; 
      font-weight: bold;
     }
     .box{
    top: 1000%;
     }
    .box:hover{
      transform:scale(1.1);
      z-index: 2;
    }

    @media (min-width: 267px) and (max-width: 680px){
      .second h1{
        margin-top: -29px;
        font-size: 18px;
        text-align: center;

      }
      .second .text{
        margin-top: 100px
        font-size: 20px;
        text-align: center;

      }
      .containe{
       display: block;
      
      margin-top: -30px;
    }
      
    .box{
      display: inline-flex;
      width: 48%;
     margin-top: -3px;
      box-shadow: 0 0 20px 2px rgba(0,0,0, .1);
      transition: 1s;
      background-color: #800000;
      padding: 5px;
  margin: 2px 0px 50px 0;
      border-radius: 10px;
    }
    .box img{
       display: inline-flex;
       width: 87%;
       margin-left:6%;
        height: 58px;
    }
    .box text{
       font-size: 10px;
    }
    }

    @media only screen and (min-width:1090px){
      .slid #carouselExampleIndicators img{
    height: 400px;

}
    
    }
        @media only screen and (min-width:1400px){
          
      .slid #carouselExampleIndicators img{
    height: 500px;
   
}


    }
    </style>



</head>
<body>

<!--debut de l'entête de la navigation-->
   <?php include "index/header.php"; ?>
<!--fin du debut de l'entête de la navigation-->

<!--La partie du slide de navigation-->
    <?php include "index/slide.php"; ?>
<!--fin de la partie du slide de navigation-->

<!-- Début de la partie de création des catégorie-->
<?php include "index/categorie.php"; ?>
<!-- fin  de la partie de création des catégorie-->

<!-- Nos meilleurs partenaires-->
<?php 
 
$com = $bdd ->prepare('SELECT * FROM bloc where nom_bloc="Nos meilleurs partenaires" AND activer = 1');
 $com->execute(array($session));
 $userinf= $com->fetch();

 if ($userinf['activer']==1) {

   ?>
<div class="container" style="margin-top: 30px;">
    <div class="second">
        <h1><?php echo $userinf['nom_bloc'] ?></h1>
         <div class="containe">
                <?php 


$con = $bdd ->prepare('SELECT * FROM partenaire where confirme =1 AND meilleur=1');
    $con->execute(array($session));
    $useri = $con->rowcount();
   while ($user = $con->fetch()) {
if ($user['confirme']==1) {
    
if ($useri == 6) {

    ?>
 <div class="box"><a style="text-decoration: none;" href="partenaire/partenaire.php?id=<?php echo $user['id']  ?>" >
      <div class="lo">
        <img src="partenaire/<?php echo $user['logo'] ?>">
      </div>
      
      <div class="text">
        <h5  class="text-center"><?php echo $user['activite'] ?></h5>
       <?php $session = $user['id_commune'];
      $commentaires = $bdd->prepare('SELECT * FROM commune WHERE id=?');
  $commentaires->execute(array($session));
 $comn = $commentaires->fetch();
 ?>
 <h5 class="title text-center" ><?php echo $comn['nom_commune'] ?></h5>
      </div>
      </a>
    </div>

    
<?php   }  } 
}
}
 ?>
   </div>  
   </div>  
   </div>  
<!--fin de  Nos meilleurs partenaires-->      

<!--Début de nouveauté-->    
<?php 
 
$com = $bdd ->prepare('SELECT * FROM bloc where nom_bloc="Nouveauté" AND activer = 1');
 $com->execute(array($session));
 $userinf= $com->fetch();

 if ($userinf['activer']==1) {

   ?>         
<div class="container">
    <div class="second  meilleur">
        
          <h1><?php echo $userinf['nom_bloc'] ?></h1>
       
        <div class="wrapper">
            <div class="owl-carousel hello owl-theme">

              <?php 


$con = $bdd ->prepare('SELECT * FROM partenaire');
    $con->execute(array($session));
   while ($user = $con->fetch()) {

if ($user['confirme'] == 1) {


    ?>
     <div class="partenaire">
      <a href="partenaire/partenaire.php?id=<?php echo $user['id']  ?>">
      <div class="lo">
        <img src="partenaire/<?php echo $user['logo'] ?>" style="">
      </div>
      
      <div class="text" style="padding: 10px;">
        <h5 class="text-center"><?php echo $user['activite'] ?></h5>
<?php 
$session = $user['id_commune'];
      $commentaires = $bdd->prepare('SELECT * FROM commune WHERE id=?');
  $commentaires->execute(array($session));
 $comn = $commentaires->fetch();
 ?>
        <h5 class="title text-center"><?php echo $comn['nom_commune'] ?></h5>
      </div>
      </a>

     </div>
    
    
 
<?php  } } }?>
    

    
            </div>
      
        </div>
</div>
</div>
<!--fin de début de nouveauté-->             


<div class="container">
    <div class="second">
        
          <h1>Découverte (les villes)</h1><h6><a style="color: #FF7D00; text-decoration: none" href="plus.php">voir+</a></h6>
       
        <div class="wrapper">
            <div class="owl-carousel owl-theme">

              <?php 


$con = $bdd ->prepare('SELECT * FROM ville');
    $con->execute(array($session));
   while ($user = $con->fetch()) {




    ?>
     <div class="partenaire" style="">
      <a href="categorie.php?id=<?php echo $user['id'] ?>">
        <div class="lo">
        <img style="width: 125%; margin-left: -21px;" src="administration/profil/<?php echo $user['image'] ?>">
      </div>
      
      <div class="text" style="padding: 10px;">
        <h5 style="font-size: 15px;" class="text-center" ><?php echo $user['nom_ville'] ?></h5>
      </div>
      </a>

     </div>
<?php  } ?>
    
    
            </div>
      
        </div>
</div>
</div><br><br>




<!--Espace publicitaire-->
<?php 
     $getid="";
$con = $bdd ->prepare('SELECT * FROM categories');
  $con->execute(array($getid));
 $userinfo = $con->fetch();

 ?>

<div class="container" id="<?php echo $userinfo['nom'] ?>e">
  <?php 
$session = "";
  $con = $bdd ->prepare('SELECT * FROM principale ');
  $con->execute(array($session));
  $userinfo = $con->fetch();

 ?>
    <div class="card">
        <div class="row">
            <div class="col-lg-7">
            <div class="card-body">
      <h5 class="card-title lead"><?php echo $userinfo['titre_pub'] ?></h5>
      <p class="card-text"><?php echo $userinfo['paragraphe_pub'] ?></p>
      
    </div>
        </div>
    <div class="col-lg-5">
        <img class="card-img-top" src="images/ID9553.png" alt="Card image cap">
    </div>
    
        </div>
    </div>
    </div>
<!--fin de l'espace publicitaire-->

<!--Style et modes-->
<?php 
$con = $bdd ->prepare('SELECT * FROM categories WHERE nom = "MODE" AND confirme=1');
$con->execute(array($session));
$conf= $con->fetch();

if ($conf['confirme']==1) {
  

?>
<div class="container" id="BEAUTEe">
    <div class="second">
        <?php $con = $bdd ->prepare('SELECT * FROM categories');
$con->execute(array($session));
$conf= $con->fetch(); ?>

          <h1><?php echo $conf['code']; ?></h1><h6><a style="color:#FF7D00;" href="specialite.php?categorie=STYLE ET MODE">voir+</a></h6>
       
        <div class="wrapper">
            <div class="owl-carousel hello owl-theme">

              <?php 


$con = $bdd ->prepare('SELECT * FROM partenaire');
    $con->execute(array($session));
   while ($user = $con->fetch()) {

if ($user['id_categories'] ==20) {


    ?>
     <div class="partenaire">
      <a href="partenaire/partenaire.php?id=<?php echo $user['id'];  ?>">
        <div class="lo">
        <img src="partenaire/<?php echo $user['logo'] ?>" style="">
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
    
    
 
<?php  }} }?>
        
            </div>
      
        </div>
</div>
</div>
<!--fin de Style et modes-->

<!--BEAUTE ET SPA-->
<?php 
$con = $bdd ->prepare('SELECT * FROM categories WHERE nom = "BEAUTE" AND confirme=1');
$con->execute(array($session));
$conf= $con->fetch();

if ($conf['confirme']==1) {
 

 ?>
<div class="container" id="RESTAURANTSe">
    <div class="second">
        <?php 
$con = $bdd ->prepare('SELECT * FROM categories WHERE nom = "BEAUTE"');
$con->execute(array($session));
$conf= $con->fetch();
         ?>
         <h1><?php echo $conf['code'] ?></h1><h6><a style="color:#FF7D00;" href="specialite.php?categorie=BEAUTE ET SPA">voir+</a></h6>
       
        <div class="wrapper">
            <div class="owl-carousel hello owl-theme">

               <?php 


$con = $bdd ->prepare('SELECT * FROM partenaire');
    $con->execute(array($session));
   while ($user = $con->fetch()) {


if ($user['id_categories'] ==21) {


    ?>
     <div class="partenaire">
      <a href="partenaire/partenaire.php?id=<?php echo $user['id']  ?>">
        <div class="lo">
        <img src="partenaire/information/<?php echo $user['logo'] ?>" style="">
      </div>
      
      <div class="text" style="padding: 5px;">
        <h5 style="" class="text-center" ><?php echo $user['activite'] ?></h5><?php 
$session = $user['id_commune'];
      $commentaires = $bdd->prepare('SELECT * FROM commune WHERE id=?');
  $commentaires->execute(array($session));
 $comn = $commentaires->fetch();
 ?>
 <h5 class="title text-center" ><?php echo $comn['nom_commune'] ?></h5>
      </div>
      </a>

     </div>
    
    
 
<?php } } }?>
    
    
    
            </div>
      
        </div>
</div>
</div>

<!--RESTAURANT ET FAST FOOD-->
<?php 
$con = $bdd ->prepare('SELECT * FROM categories WHERE nom = "RESTAURANTS" AND confirme=1');
$con->execute(array($session));
$conf= $con->fetch();

if ($conf['confirme']==1) {
 

 ?>
<div class="container" id="AUTOMOBILEe">
    <div class="second">
        <?php 
$con = $bdd ->prepare('SELECT * FROM categories WHERE nom = "RESTAURANTS"');
$con->execute(array($session));
$conf= $con->fetch();
         ?>
          <h1><?php echo $conf['code']; ?></h1><h6><a style="color:#FF7D00;" href="specialite.php?categorie=RESTAURANT ET FAST FOOD">voir+</a></h6>
       
        <div class="wrapper">
            <div class="owl-carousel hello owl-theme">

              <?php 


$con = $bdd ->prepare('SELECT * FROM partenaire');
    $con->execute(array($session));
   while ($user = $con->fetch()) {

if ($user['id_categories'] ==22) {


    ?>
     <div class="partenaire">
      <a href="partenaire/partenaire.php?id=<?php echo $user['id_partenaire']  ?>">
        <div class="lo">
        <img src="partenaire/information/<?php echo $user['logo'] ?>" style="">
      </div>
      
      <div class="text" style="padding: 5px;">
        <h5 style="" class="text-center" ><?php echo $user['activite'] ?></h5><?php 
$session = $user['id_commune'];
      $commentaires = $bdd->prepare('SELECT * FROM commune WHERE id=?');
  $commentaires->execute(array($session));
 $comn = $commentaires->fetch();
 ?>
 <h5 class="title text-center" ><?php echo $comn['nom_commune'] ?></h5>
      </div>
      </a>

     </div>
    
    
 
<?php  } } }?>
    
    
            </div>
      
        </div>
</div>
</div>

<!--AUTOMOBILE-->
<?php 
$con = $bdd ->prepare('SELECT * FROM categories WHERE nom = "AUTOMOBILE" AND confirme=1');
$con->execute(array($session));
$conf= $con->fetch();

if ($conf['confirme']==1) {
  

 ?>
<div class="container" id="BARe">
    <div class="second">
     <?php 
$con = $bdd ->prepare('SELECT * FROM categories WHERE nom = "AUTOMOBILE"');
$con->execute(array($session));
$conf= $con->fetch();
      ?>   
          <h1>

  <?php echo $conf['code'] ?>
</h1><h6><a style="color:#FF7D00;" href="specialite.php?categorie=AUTOMOBILE">voir+</a></h6>
       
        <div class="wrapper">
            <div class="owl-carousel hello owl-theme">

             <?php 


$con = $bdd ->prepare('SELECT * FROM partenaire');
    $con->execute(array($session));
   while ($user = $con->fetch()) {

if ($user['id_categories'] ==23) {


    ?>
     <div class="partenaire">
      <a href="partenaire/partenaire.php?id=<?php echo $user['id_partenaire']  ?>">
        <div class="lo">
        <img src="partenaire/information/<?php echo $user['logo'] ?>" style="">
      </div>
      
      <div class="text" style="padding: 5px;">
        <h5 style="" class="text-center" ><?php echo $user['activite'] ?></h5><?php 
$session = $user['id_commune'];
      $commentaires = $bdd->prepare('SELECT * FROM commune WHERE id=?');
  $commentaires->execute(array($session));
 $comn = $commentaires->fetch();
 ?>
 <h5 class="title text-center" ><?php echo $comn['nom_commune'] ?></h5>
      </div>
      </a>

     </div>
    
    
 
<?php } } }?>
    
   
    
            </div>
      
        </div>
</div>
</div>

<!--BAR LOUNGE ET NIGHT CLUB-->
<?php 
$con = $bdd ->prepare('SELECT * FROM categories WHERE nom ="BAR" AND confirme=1');
$con->execute(array($session));
$conf= $con->fetch();

if ($conf['confirme']==1) {

 ?>
<div class="container" id="HOTELe">
    <div class="second">
        
      <?php 
$con = $bdd ->prepare('SELECT * FROM categories WHERE nom ="BAR"');
$con->execute(array($session));
$conf= $con->fetch();

       ?>    <h1>

<?php echo $conf['code'] ?>
</h1><h6><a style="color:#FF7D00;" href="specialite.php?categorie=BAR LOUNGE ET NIGHT CLUB">voir+</a></h6>
       
        <div class="wrapper">
            <div class="owl-carousel hello owl-theme">

              <?php 


$con = $bdd ->prepare('SELECT * FROM partenaire');
    $con->execute(array($session));
   while ($user = $con->fetch()) {

if ($user['id_categories'] ==24) {


    ?>
     <div class="partenaire">
      <a href="partenaire/partenaire.php?id=<?php echo $user['id_partenaire']  ?>">
        <div class="lo">
        <img src="partenaire/information/<?php echo $user['logo'] ?>" style="">
      </div>
      
      <div class="text" style="padding: 5px;">
        <h5 style="" class="text-center" ><?php echo $user['activite'] ?></h5><?php 
$session = $user['id_commune'];
      $commentaires = $bdd->prepare('SELECT * FROM commune WHERE id=?');
  $commentaires->execute(array($session));
 $comn = $commentaires->fetch();
 ?>
 <h5 class="title text-center" ><?php echo $comn['nom_commune'] ?></h5>
      </div>
      </a>

     </div>
    
    
 
<?php  } } }?>
    
            </div>
      
        </div>
</div>
</div>

<!--HOTEL ET HOTEL ET RESIDENCE -->
<?php 
$con = $bdd ->prepare('SELECT * FROM categories WHERE nom ="HOTEL" AND confirme=1');
$con->execute(array($session));
$conf= $con->fetch();
 if ($conf['confirme']==1) {
  
 ?>
<div class="container" id="SANTE e">
    <div class="second">
        <?php 
$con = $bdd ->prepare('SELECT * FROM categories WHERE nom ="HOTEL"');
$con->execute(array($session));
$conf= $con->fetch();
         ?>
          <h1>

<?php echo $conf['code'] ?>
</h1><h6><a style="color:#FF7D00;" href="specialite.php?categorie=HOTEL ET RESIDENCE">voir+</a></h6>
       
        <div class="wrapper">
            <div class="owl-carousel hello owl-theme">

              <?php 


$con = $bdd ->prepare('SELECT * FROM partenaire');
    $con->execute(array($session));
   while ($user = $con->fetch()) {

if ($user['id_categories'] ==25) {


    ?>
     <div class="partenaire">
      <a href="partenaire/partenaire.php?id=<?php echo $user['id_partenaire']  ?>">
        <div class="lo">
        <img src="partenaire/information/<?php echo $user['logo'] ?>" style="">
      </div>
      
      <div class="text" style="padding: 5px;">
        <h5 style="" class="text-center" ><?php echo $user['activite'] ?></h5><?php 
$session = $user['id_commune'];
      $commentaires = $bdd->prepare('SELECT * FROM commune WHERE id=?');
  $commentaires->execute(array($session));
 $comn = $commentaires->fetch();
 ?>
 <h5 class="title text-center" ><?php echo $comn['nom_commune'] ?></h5>
      </div>
      </a>

     </div>
    
    
 
<?php } } }?>
    
            </div>
      
        </div>
</div>
</div>

<!--ESPACE SANTE -->
<?php 
$con = $bdd ->prepare('SELECT * FROM categories WHERE nom ="SANTE" AND confirme=1');
$con->execute(array($session));
$conf= $con->fetch();
 if ($conf['confirme']==1) {
  
 ?>

<div class="container" id="LOISIRSe">
    <div class="second">
  <?php 
$con = $bdd ->prepare('SELECT * FROM categories WHERE nom ="SANTE"');
$con->execute(array($session));
$conf= $con->fetch();
   ?>
          <h1>

<?php echo $conf['code']; ?>
</h1><h6><a style="color:#FF7D00;" href="specialite.php?categorie=ESPACE SANTE">voir+</a></h6>
       
        <div class="wrapper">
            <div class="owl-carousel hello owl-theme">

              <?php 


$con = $bdd ->prepare('SELECT * FROM partenaire');
    $con->execute(array($session));
   while ($user = $con->fetch()) {

if ($user['id_categories'] ==27) {


    ?>
     <div class="partenaire">
      <a href="partenaire/partenaire.php?id=<?php echo $user['id_partenaire']  ?>">
        <div class="lo">
        <img src="partenaire/information/<?php echo $user['logo'] ?>" style="">
      </div>
      
      <div class="text" style="padding: 5px;">
        <h5 style="" class="text-center" ><?php echo $user['activite'] ?></h5><?php 
$session = $user['id_commune'];
      $commentaires = $bdd->prepare('SELECT * FROM commune WHERE id=?');
  $commentaires->execute(array($session));
 $comn = $commentaires->fetch();
 ?>
 <h5 class="title text-center" ><?php echo $comn['nom_commune'] ?></h5>
      </div>
      </a>

     </div>
    
    
 
<?php  } } }?>
    
            </div>
      
        </div>
</div>
</div>

<!--SPORT ET LOISIRS-->
<?php 
$con = $bdd ->prepare('SELECT * FROM categories WHERE nom ="LOISIRS" AND confirme=1');
$con->execute(array($session));
$conf= $con->fetch();
 if ($conf['confirme']==1) {
  
 ?>
<div class="container" id="AMEUBLEMENTe">
    <div class="second">
     <?php 
$con = $bdd ->prepare('SELECT * FROM categories WHERE nom ="LOISIRS"');
$con->execute(array($session));
$conf= $con->fetch();
      ?>   
          <h1>

<?php echo $conf['code'] ?>
</h1><h6><a style="color:#FF7D00;" href="specialite.php?categorie=SPORT ET LOISIRS">voir+</a></h6>
       
        <div class="wrapper">
            <div class="owl-carousel hello owl-theme">

              <?php 


$con = $bdd ->prepare('SELECT * FROM partenaire');
    $con->execute(array($session));
   while ($user = $con->fetch()) {

if ($user['id_categories'] ==28) {


    ?>
     <div class="partenaire">
      <a href="partenaire/partenaire.php?id=<?php echo $user['id']  ?>">
        <div class="lo">
        <img src="partenaire/<?php echo $user['logo'] ?>" style="">
      </div>
      
      <div class="text" style="padding: 5px;">
        <h5 style="" class="text-center" ><?php echo $user['activite'] ?></h5><?php 
$session = $user['id_commune'];
      $commentaires = $bdd->prepare('SELECT * FROM commune WHERE id=?');
  $commentaires->execute(array($session));
 $comn = $commentaires->fetch();
 ?>
 <h5 class="title text-center" ><?php echo $comn['nom_commune'] ?></h5>
      </div>
      </a>

     </div>
    
    
 
<?php } } }?>
    
            </div>
      
        </div>
</div>
</div>

<!--AMEUBLEMENT-->
<?php 
$con = $bdd ->prepare('SELECT * FROM categories WHERE nom ="AMEUBLEMENT" AND confirme=1');
$con->execute(array($session));
$conf= $con->fetch();
 if ($conf['confirme']==1) {
  
 ?>
<div class="container" id="EDUCATIONe">
    <div class="second">
       <?php 
$con = $bdd ->prepare('SELECT * FROM categories WHERE nom ="AMEUBLEMENT"');
$con->execute(array($session));
$conf= $con->fetch();
  
        ?> 
          <h1>

<?php echo $conf['code'] ?>
</h1><h6><a style="color:#FF7D00;" href="specialite.php?categorie=AMEUBLEMENT">voir+</a></h6>
       
        <div class="wrapper">
            <div class="owl-carousel hello owl-theme">

              <?php 


$con = $bdd ->prepare('SELECT * FROM partenaire');
    $con->execute(array($session));
   while ($user = $con->fetch()) {

if ($user['id_categories'] ==30) {


    ?>
     <div class="partenaire">
      <a href="partenaire/partenaire.php?id=<?php echo $user['id']  ?>">
        <div class="lo">
        <img src="partenaire/<?php echo $user['logo'] ?>" style="">
      </div>
      
      <div class="text" style="padding: 5px;">
        <h5 style="" class="text-center" ><?php echo $user['activite'] ?></h5><?php 
$session = $user['id_commune'];
      $commentaires = $bdd->prepare('SELECT * FROM commune WHERE id=?');
  $commentaires->execute(array($session));
 $comn = $commentaires->fetch();
 ?>
 <h5 class="title text-center" ><?php echo $comn['nom_commune'] ?></h5>
      </div>
      </a>

     </div>
    
    
 
<?php } } }?>
    
            </div>
      
        </div>
</div>
</div>

<!--EDUCATION-->
<?php 
$con = $bdd ->prepare('SELECT * FROM categories WHERE nom ="EDUCATION" AND confirme=1');
$con->execute(array($session));
$conf= $con->fetch();
 if ($conf['confirme']==1) {
  
 ?>
<div class="container" id="ANIMALERIEe">
    <div class="second">
       <?php 
$con = $bdd ->prepare('SELECT * FROM categories WHERE nom ="EDUCATION"');
$con->execute(array($session));
$conf= $con->fetch();
        ?> 
          <h1>
            <?php echo $conf['code'] ?>


</h1><h6><a style="color:#FF7D00;" href="specialite.php?categorie=EDUCATION">voir+</a></h6>
       
        <div class="wrapper">
            <div class="owl-carousel hello owl-theme">

              <?php 


$con = $bdd ->prepare('SELECT * FROM partenaire');
    $con->execute(array($session));
   while ($user = $con->fetch()) {

if ($user['id_categories'] ==30) {


    ?>
     <div class="partenaire">
      <a href="partenaire/partenaire.php?id=<?php echo $user['id']  ?>">
        <div class="lo">
        <img src="partenaire/<?php echo $user['logo'] ?>" style="">
      </div>
      
      <div class="text" style="padding: 5px;">
        <h5 style="" class="text-center" ><?php echo $user['activite'] ?></h5><?php 
$session = $user['id_commune'];
      $commentaires = $bdd->prepare('SELECT * FROM commune WHERE id=?');
  $commentaires->execute(array($session));
 $comn = $commentaires->fetch();
 ?>
 <h5 class="title text-center" ><?php echo $comn['nom_commune'] ?></h5>
      </div>
      </a>

     </div>
    
    
 
<?php } } }?>
    
            </div>
      
        </div>
</div>
</div>


<!--ANIMALERIE-->
<?php 
$con = $bdd ->prepare('SELECT * FROM categories WHERE nom ="ANIMALERIE" AND confirme=1');
$con->execute(array($session));
$conf= $con->fetch();
 if ($conf['confirme']==1) {
  
 ?>
<div class="container" id="BIJOUTERIEe">
    <div class="second">
       <?php 
$con = $bdd ->prepare('SELECT * FROM categories WHERE nom ="ANIMALERIE"');
$con->execute(array($session));
$conf= $con->fetch();  
        ?> 
          <h1><?php echo $conf['code'] ?>


</h1><h6><a style="color:#FF7D00;" href="specialite.php?categorie=ANIMALERIE">voir+</a></h6>
       
        <div class="wrapper">
            <div class="owl-carousel hello owl-theme">

              <?php 


$con = $bdd ->prepare('SELECT * FROM partenaire');
    $con->execute(array($session));
   while ($user = $con->fetch()) {

if ($user['id_categories'] ==31) {


    ?>
     <div class="partenaire">
      <a href="partenaire/partenaire.php?id=<?php echo $user['id']  ?>">
        <div class="lo">
        <img src="partenaire/<?php echo $user['logo'] ?>" style="">
      </div>
      
      <div class="text" style="padding: 5px;">
        <h5 style="" class="text-center" ><?php echo $user['activite'] ?></h5><?php 
$session = $user['id_commune'];
      $commentaires = $bdd->prepare('SELECT * FROM commune WHERE id=?');
  $commentaires->execute(array($session));
 $comn = $commentaires->fetch();
 ?>
 <h5 class="title text-center" ><?php echo $comn['nom_commune'] ?></h5>
      </div>
      </a>

     </div>
    
    
 
<?php } } }?>
    
            </div>
      
        </div>
</div>
</div>


<!--BIJOUTERIE-->
<?php 
$con = $bdd ->prepare('SELECT * FROM categories WHERE nom ="BIJOUTERIE" AND confirme=1');
$con->execute(array($session));
$conf= $con->fetch();
 if ($conf['confirme']==1) {
  
 ?>
<div class="container" id="HORLOGERIEe">
    <div class="second">
        <?php 
$con = $bdd ->prepare('SELECT * FROM categories WHERE nom ="BIJOUTERIE"');
$con->execute(array($session));
$conf= $con->fetch();
 
         ?>
          <h1><?php echo $conf['code'] ?>


</h1><h6><a style="color:#FF7D00;" href="specialite.php?categorie=BIJOUTERIE">voir+</a></h6>
       
        <div class="wrapper">
            <div class="owl-carousel hello owl-theme">

              <?php 


$con = $bdd ->prepare('SELECT * FROM partenaire');
    $con->execute(array($session));
   while ($user = $con->fetch()) {

if ($user['id_categories'] ==32) {

if ($user['confirme']==1) {
    ?>
     <div class="partenaire">
      <a href="partenaire/partenaire.php?id=<?php echo $user['id']  ?>">
        <div class="lo">
        <img src="partenaire/<?php echo $user['logo'] ?>" style="">
      </div>
      
      <div class="text" style="padding: 5px;">
        <h5 style="" class="text-center" ><?php echo $user['activite'] ?></h5><?php 
$session = $user['id_commune'];
      $commentaires = $bdd->prepare('SELECT * FROM commune WHERE id=?');
  $commentaires->execute(array($session));
 $comn = $commentaires->fetch();
 ?>
 <h5 class="title text-center" ><?php echo $comn['nom_commune'] ?></h5>
      </div>
      </a>

     </div>
    
    
 
<?php } } }}?>
    
            </div>
      
        </div>
</div>
</div>


<!--HORLOGERIE-->
<?php 
$con = $bdd ->prepare('SELECT * FROM categories WHERE nom ="HORLOGERIE" AND confirme=1');
$con->execute(array($session));
$conf= $con->fetch();
 if ($conf['confirme']==1) {
  
 ?>
<div class="container" id="TRANSPORTe">
    <div class="second">
        <?php 
$con = $bdd ->prepare('SELECT * FROM categories WHERE nom ="HORLOGERIE"');
$con->execute(array($session));
$conf= $con->fetch();
 
  
 ?>
          <h1><?php echo $conf['code'] ?>


</h1><h6><a style="color:#FF7D00;" href="specialite.php?categorie=HORLOGERIE">voir+</a></h6>
       
        <div class="wrapper">
            <div class="owl-carousel hello owl-theme">

              <?php 


$con = $bdd ->prepare('SELECT * FROM partenaire');
    $con->execute(array($session));
   while ($user = $con->fetch()) {

if ($user['id_categories'] ==33) {
    if ($user['confirme']==1) {

    ?>
     <div class="partenaire">
      <a href="partenaire/partenaire.php?id=<?php echo $user['id']  ?>">
        <div class="lo">
        <img src="partenaire/<?php echo $user['logo'] ?>" style="">
      </div>
      
      <div class="text" style="padding: 5px;">
        <h5 style="" class="text-center" ><?php echo $user['activite'] ?></h5><?php 
$session = $user['id_commune'];
      $commentaires = $bdd->prepare('SELECT * FROM commune WHERE id=?');
  $commentaires->execute(array($session));
 $comn = $commentaires->fetch();
 ?>
 <h5 class="title text-center" ><?php echo $comn['nom_commune'] ?></h5>
      </div>
      </a>

     </div>
    
    
 
<?php } }} }?>
    
            </div>
      
        </div>
</div>
</div>


<!--TRANPORT-->
<?php 
$con = $bdd ->prepare('SELECT * FROM categories WHERE nom ="TRANSPORT" AND confirme=1');
$con->execute(array($session));
$conf= $con->fetch();
 if ($conf['confirme']==1) {
  
 ?>
<div class="container" id="PATISSERIEe">
    <div class="second">
      <?php 
$con = $bdd ->prepare('SELECT * FROM categories WHERE nom ="TRANSPORT"');
$con->execute(array($session));
$conf= $con->fetch();
 
  
 ?>
          <h1><?php echo $conf['nom'] ?>


</h1><h6><a style="color:#FF7D00;" href="specialite.php?categorie=TRANSPORT">voir+</a></h6>
       
        <div class="wrapper">
            <div class="owl-carousel hello owl-theme">

              <?php 


$con = $bdd ->prepare('SELECT * FROM partenaire');
    $con->execute(array($session));
   while ($user = $con->fetch()) {

if ($user['id_categories'] ==34) {

 if ($user['confirme']==1) {
    ?>
     <div class="partenaire">
      <a href="partenaire/partenaire.php?id=<?php echo $user['id_partenaire']  ?>">
        <div class="lo">
        <img src="partenaire/<?php echo $user['logo'] ?>" style="">
      </div>
      
      <div class="text" style="padding: 5px;">
        <h5 style="" class="text-center" ><?php echo $user['activite'] ?></h5><?php 
$session = $user['id_commune'];
      $commentaires = $bdd->prepare('SELECT * FROM commune WHERE id=?');
  $commentaires->execute(array($session));
 $comn = $commentaires->fetch();
 ?>
 <h5 class="title text-center" ><?php echo $comn['nom_commune'] ?></h5>
      </div>
      </a>

     </div>
    
    
 
<?php } }} }?>
    
            </div>
      
        </div>
</div>
</div>


<!--PATISSERIE-->
<?php 
$con = $bdd ->prepare('SELECT * FROM categories WHERE nom ="PÂTISSERIE" AND confirme=1');
$con->execute(array($session));
$conf= $con->fetch();
 if ($conf['confirme']==1) {
  
 ?>
<div class="container" id="SERVICESe">
    <div class="second">
        <?php 
$con = $bdd ->prepare('SELECT * FROM categories WHERE nom ="PÂTISSERIE"');
$con->execute(array($session));
$conf= $con->fetch();
 ?>
          <h1><?php echo $conf['code'] ?>


</h1><h6><a style="color:#FF7D00;" href="specialite.php?categorie=BOULANGERIE ET PATISSERIE">voir+</a></h6>
       
        <div class="wrapper">
            <div class="owl-carousel hello owl-theme">

              <?php 


$con = $bdd ->prepare('SELECT * FROM partenaire');
    $con->execute(array($session));
   while ($user = $con->fetch()) {

if ($user['id_categories'] ==35) {
 if ($user['confirme']==1) {

    ?>
     <div class="partenaire">
      <a href="partenaire/partenaire.php?id=<?php echo $user['id']  ?>">
        <div class="lo">
        <img src="partenaire/<?php echo $user['logo'] ?>" style="">
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
    
    
 
<?php } }} }?>
    
            </div>
      
        </div>
</div>
</div>

<!--SERVICES-->
<?php 
$con = $bdd ->prepare('SELECT * FROM categories WHERE nom ="SERVICES" AND confirme=1');
$con->execute(array($session));
$conf= $con->fetch();
 if ($conf['confirme']==1) {
  
 ?>
<div class="container" id="SERVICESe">
    <div class="second">
        <?php 
$con = $bdd ->prepare('SELECT * FROM categories WHERE nom ="SERVICES"');
$con->execute(array($session));
$conf= $con->fetch();
 
 ?>
          <h1><?php echo $conf['code'] ?>


</h1><h6><a style="color:#FF7D00;" href="specialite.php?categorie=SERVICES">voir+</a></h6>
       
        <div class="wrapper">
            <div class="owl-carousel hello owl-theme">

              <?php 


$con = $bdd ->prepare('SELECT * FROM partenaire');
    $con->execute(array($session));
   while ($user = $con->fetch()) {

if ($user['id_categories'] ==36) {
 if ($user['confirme']==1) {

    ?>
     <div class="partenaire">
      <a href="partenaire/partenaire.php?id=<?php echo $user['id']  ?>">
        <div class="lo">
        <img src="partenaire/<?php echo $user['logo'] ?>" style="">
      </div>
      
      <div class="text" style="padding: 5px;">
        <h5 style="" class="text-center" ><?php echo $user['activite'] ?></h5><?php 
$session = $user['id_commune'];
      $commentaires = $bdd->prepare('SELECT * FROM commune WHERE id=?');
  $commentaires->execute(array($session));
 $comn = $commentaires->fetch();
 ?>
 <h5 class="title text-center" ><?php echo $comn['nom_commune'] ?></h5>
      </div>
      </a>

     </div>
    
    
 
<?php } }} }?>
    
            </div>
      
        </div>
</div>
</div>



<?php include 'footer.php' ?>
  
   
   <script type="text/javascript">
     var div = document.getElementById('.owl-next');

     div.style.display="none";
   </script>
<script>
<?php
 $getid="";
$con = $bdd ->prepare('SELECT * FROM categories');
  $con->execute(array($getid));
 while ($userinfo = $con->fetch()){

 ?>
  var x = document.getElementById("<?php echo $userinfo['nom']; ?>");
  x.style.display="";
<?php } ?>
</script>
<script type="text/javascript">
  document.getElementById("myButton1").value="New Button Text";
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js'></script><script  src="./script.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-3.5.1.js"></script>
<script src="js/owl/jquery.min.js"></script>
<script src="js/owl/owl.carousel.min.js"></script>
<script src="js/owl/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.js"></script>
</body>
</html>
<?php 
session_start();
 $bdd = new PDO('mysql:host=localhost;dbname=vitrine','root');
//$bdd = new PDO('mysql:host=localhost;dbname=prixkdo_vitrine','prixkdo','P@ssword@10');


$session = "";
  $con = $bdd ->prepare('SELECT * FROM principale WHERE id = 1');
  $con->execute(array($session));
  $userinfo = $con->fetch();


if (isset($_POST['submit']))
 {
  
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $passe = sha1($_POST['passe']);
  $message="";
  if (!empty($pseudo) AND !empty($passe)) {
    $requser = $bdd ->prepare('SELECT * FROM partenaire WHERE pseudo = ? AND passe = ? ');
    $requser ->execute(array($pseudo, $passe));
    $userexist = $requser ->rowcount();

    if ($userexist == 1) {
      $userinfo = $requser ->fetch();
      $_SESSION['id'] = $userinfo['id'];
      $_SESSION['pseudo'] = $userinfo['pseudo'];
header("Location: partenaire/profil.php?id=".$_SESSION['id']);
    }else {
      $msg="danger";
      $message =  "Pseudo ou Mot de passe incorrect. Veuillez verifiez!!";
      header("Location: partenaire/message.php?id=".$_SESSION['id']);
    }

  }else {
    $msg="danger";
    $message = 'Veuillez renseignez correctemnt vos identifiants';
header("Location: partenaire/message.php?id=".$_SESSION['id']);

  }
}

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
    .box:hover{
      transform:scale(1.1);
      z-index: 2;
    }
    @media (min-width: 320px) and (max-width: 680px){
      .second h1{
        font-size: 20px;
        text-align: center;

      }
      .containe{
       display: block;
      
      margin-top: -30px;
    }
      .box{
        margin-left: 90px;
      width: 150px;
      margin-top: 10px;
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
  <!--debut de l'entête de la navigation-->
  <nav class="new container-fluid navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="index.php"><img class="image" src="administration/profil/img/1_15f469229646434.93895829.png
"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse menu" id="navbarSupportedContent" style="font-family: 'Montserrat', sans-serif;">
    <ul class="menu navbar-nav mr-auto">
      <li class="nav-item" >
        <a class="nav-link" href="index.php"><?php echo $userinfo['menu1'] ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="reduction.php" href="contact.html"> <?php echo $userinfo['menu2'] ?></a>
      </li>
      <!--li class="nav-item">
        <a class="nav-link" href="partenaire.php"><?php echo $userinfo['menu3'] ?></a>
      </li-->
      <li class="nav-item active">
        <a class="nav-link" href="" style="color:#FF7D00"><?php echo $userinfo['menu4']; ?></a>
      </li>
    </ul>
    
        
    <a class="btn  my-2 my-sm-0" href="partenaire.php" id="parte"><?php echo $userinfo['menu5'] ?></a>&nbsp;&nbsp;

    <a class="btn  my-2 my-sm-0" href="connexion.php" id="part" type="submit"><?php echo $userinfo['menu6'] ?></a>
   
   
  </div>
  
</nav>
<!--fin du debut de l'entête de la navigation-->

<!--fin du debut de l'entête de la navigation-->

<!--La partie du slide de navigation-->
    <div class="slid">
    
      <div class="slideb">
      <img src="images/orange.png">
      </div>
    <div class="larg">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  
  <div class="container">
     <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/1.jpg" alt="First slide" style="left:50%;height: 400px;"> 
    </div>
   
  </div>
  
  </div>
  
  
</div>
    </div>

  </div>
<!--fin de la partie du slide de navigation-->


<!-- Nos meilleurs partenaires-->
  
<div class="container" style="margin-top: 100px; color:black;">
  <div class="second">
    <h1 class="text-center">Présentation</h1>
    
      <div class="container">
        <p style="color: black;padding: 10px;">VtioteutsermoMuciussenectutehabitus) deparumperesttumVtioteutsermoMuciussenectutehabitus) deparumperesttumVtioteutsermoMuciussenectutehabitus) deparumperesttumVtioteutsermoMuciussenectutehabitus) deparumperesttumVtioteutsermoMuciussenectutehabitus) deparumperesttumVtioteutsermoMuciussenectutehabitus) deparumperesttumVtioteutsermoMuciussenectutehabitus) deparumperesttum.VtioteutsermoMuciussenectutehabitus) deparumperesttumVtioteutsermoMuciussenectutehabitus) deparumperesttumVtioteutsermoMuciussenectutehabitus) deparumperesttumVtioteutsermoMuciussenectutehabitus) deparumperesttumVtioteutsermoMuciussenectutehabitus) deparumperesttumVtioteutsermoMuciussenectutehabitus) deparumperesttumVtioteutsermoMuciussenectutehabitus) deparumperesttum.</p>
      </div>
</div>
</div>
<div class="container" style="background-color:#FF7D00; padding: 50px;color: #000; font-size: 30px;">
  <h1 class="text-center" style="color: white; font-weight: bold;">NOUS CONTACTER</h1>
    <p style="">
      <i class="fa fa-envelope"></i> Email<br>support@prixkdo.net
    </p>
    <p >
      <i class="fa fa-phone"></i>Téléphone:<br>  +225 59 73 55 35 / +225 67 78 37 91
    </p>
    <p>
      <i class="fa fa-map-marker" aria-hidden="true"></i>
 Localisation: <br>Abidjan Côte d'ivoire, Rivéra palmeraie.
    </p>

</div>
<!-- Nos meilleurs partenaires-->
             


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
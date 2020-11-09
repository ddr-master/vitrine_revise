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
  <meta charset="utf-8">
  <title>Bénéficier des réductions | </title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<!--le design de owl caroussel-->
<link rel="stylesheet" type="text/css" href="css/owl/owl.carousel.min.css">

<link rel="stylesheet" type="text/css" href="css/owl/owl.theme.default.min.css">
<!--le design de owl caroussel-->

    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@1,900&display=swap" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet"> 
<style type="text/css">

    
  </style>
</head>
<body>

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
      <li class="nav-item  active">
        <a class="nav-link" href="reduction.php" href="contact.html" style="color:#FF7D00"> <?php echo $userinfo['menu2'] ?></a>
      </li>
      <!--li class="nav-item">
        <a class="nav-link" href="partenaire.php"><?php echo $userinfo['menu3'] ?></a>
      </li-->
      <li class="nav-item">
        <a class="nav-link" href="contact.php"><?php echo $userinfo['menu4']; ?></a>
      </li>
    </ul>
    
        
    <a class="btn  my-2 my-sm-0" href="partenaire.php" id="parte"><?php echo $userinfo['menu5'] ?></a>&nbsp;&nbsp;

    <a class="btn  my-2 my-sm-0" href="connexion.php" id="part" type="submit"><?php echo $userinfo['menu6'] ?></a>
   
   
  </div>
  
</nav>
<!--fin du debut de l'entête de la navigation-->

<!--La partie du slide de navigation-->
  <div class="slid">
    
      <div class="slideb">
      <img src="images/rouge.png">
      </div>
    <div class="larg">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width: 90%">
  
  <div class="container">
    
      <video autoplay muted loop id="myvideo" style="width: 900px; height: 500px; margin-left: 150px;">
        <source src="Vitrine PrixKdo.mp4" type="video/mp4">
      </video>
  </div>
  
  
</div>
    </div>

  </div>
<!--fin de la partie du slide de navigation-->
<br><br><br><br><br><br><br><br>
<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne" style="background-color: #761115;">
      <h5 class="mb-0" >
        <a class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
         <h1 style="color:white;">01.Se procurer la carte PrixKDO</h1>
        </a>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        <div class="row" style="background-color: #ecebeb;">
          <div class="col-lg-6">
      <h2>Etape 1:</h2>
      <p style="color: black;font-size: 25px;">Passer vos commandes via le site <a href="https://prixkdo.net/">www.prixkdo.net</a> en remplissant le formulaire ou appelez notre service client au xxx </p>

      <h2>Etape 2:</h2>
      <p style="color: black; font-size: 25px;">Faites–vous livrer vos cartes</p>

      <h2>Etape 3:</h2>
      <p style="color: black;font-size: 25px;">Recevez votre sms d’activation</p>
    </div>
    <div class="col-lg-6" style="margin-top: 100px; width:100px;">
      <img src="images/etape-1.png" style="width:100%;">
    </div>
        </div> 
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo" style="background-color: #761115;">
      <h5 class="mb-0">
        <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <h1 style="color:white">02.Parcourir la boutique en ligne</h1>
        </a>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        <div class="row" style="background-color: #ecebeb;">
          <div class="col-lg-6" style="margin-top: 400px;">
      <img src="images/etape-2.png" style="width:100%;">
    </div>
    <div class="col-lg-6" style="margin-top: 100px; width:100px;">
      
      <h2>Etape 1:</h2>
      <p style="color: black;font-size: 25px;">Rendez-vous sur le site  <a href="">www.prixkdo.net</a></p>

      <h2>Etape 2:</h2>
      <p style="color: black; font-size: 25px;">Renseignez votre identifiant (8 derniers chiffres de la carte) et le mot de passe de votre carte ; profitez de prix barrés sur l’ensemble des produits.</p>

      <h2>Etape 3:</h2>
      <p style="color: black;font-size: 25px;">Ajouter des produits à votre panier.</p>
      
      <h2>Etape 4:</h2>
      <p style="color: black;font-size: 25px;">Renseignez vos informations de facturation de livraison</p>

      <h2>Etape 5:</h2>
      <p style="color: black;font-size: 25px;">Validez votre commande et profitez de réductions grâce à votre carte.</p>
      
    </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree" style="background-color: #761115;">
      <h5 class="mb-0">
        <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          <h1 style="color:white;">03.Ou se rendre chez un partenaire</h1>
        </a>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        <div class="row" style="background-color: #ecebeb;">
         <div class="col-lg-6" style="margin-top: 100px;">
      
      <h2>Etape 1:</h2>
      <p style="color: black;font-size: 25px;">Choisissez votre enseigne></p>

      <h2>Etape 2:</h2>
      <p style="color: black; font-size: 25px;">Rendez-vous chez le partenaire choisis;</p>

      <h2>Etape 3:</h2>
      <p style="color: black;font-size: 25px;">Présentez votre carte dès votre arrivée à la réception; profitez de réductions et avantages grâce à votre carte.</p>
    
    </div>
    <div class="col-lg-6" style="width:100px;">
      <img src="images/etape-3.png" style="width:100%;">
      
    </div>
      </div>
      </div>
    </div>
  </div>
</div>


<div class="more" style="margin-left: 500px;">
   <a href="" class="btn" style="background-color: #FF7D00;color:white">Commandez votre carte</a>
</div>
<div class="container" id="image" style="padding-left: 50px; padding-top: 50px;color: white; font-size: 32px; font-weight: bold;">
    Comment bénéficier des réduction en vidéo
      
<img src="images/video.png">

      
</div>
<div class="container play" id="video" style="padding-left: 50px; padding-top: 50px; color: red; font-size: 32px; font-weight: bold;align-content: center;display:none; " >
    Comment se procurer la carte prixkdo?
      <video width="100" controls autoplay class="container" style="width: 900px; height: 500px; margin-left: 50px;">
  <source src="Vitrine PrixKdo.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>
      
</div>
    
  </div>
  <script type="text/javascript">
    var image= document.getElementById('image');
    var video= document.getElementById('video');
        image.addEventListener("click",function(){
          image.style.display="none";
          video.style.display="block";
        })
    
  </script>
<?php include 'footer.php' ?>
  
<script src="js/main.js">
  
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js'></script><script  src="./script.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script src="js/owl/jquery.min.js"></script>
<script src="js/owl/owl.carousel.min.js"></script>
<script src="js/owl/jquery.js"></script>
</body>
</html>
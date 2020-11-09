<?php 
session_start();
 $bdd = new PDO('mysql:host=localhost;dbname=vitrine','root');


$session = "";
  $con = $bdd ->prepare('SELECT * FROM principale WHERE id = 1');
  $con->execute(array($session));
  $userinfo = $con->fetch();

  $getid = "";
$con = $bdd ->prepare('SELECT * FROM text_partenaire where confirme = 1');
  $con->execute(array($getid));
 $userinf = $con->fetch();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>vitrine corriger</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="authentification/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="authentification/css/style.css">

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
<body >

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
        <a class="nav-link" href=""><?php echo $userinfo['menu1'] ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="reduction.php"> <?php echo $userinfo['menu2'] ?></a>
      </li>
      <!--li class="nav-item">
        <a class="nav-link" href="partenaire.php"><?php echo $userinfo['menu3'] ?></a>
      </li-->
      <li class="nav-item">
        <a class="nav-link" href="contact.php"><?php echo $userinfo['menu4']; ?></a>
      </li>
    </ul>
    
        
    <a class="btn  my-2 my-sm-0" href="partenaire.php" id="parte" style="color: black;"><?php echo $userinfo['menu5'] ?></a>&nbsp;&nbsp;

    <a class="btn  my-2 my-sm-0" href="connexion.php" id="part" type="submit"><?php echo $userinfo['menu6'] ?></a>
   
   
  </div>
  
</nav>
<!--fin du debut de l'entête de la navigation-->

<!--La partie du slide de navigation-->
	<div class="slid">
		
			<div class="slideb">
			<img src="images/background.png">
			</div>
		<div class="large">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/1.jpg" alt="First slide" style="height: 500px;"> 
    </div>
   
  </div>
  
  
</div>
		</div>

	</div>
<!--fin de la partie du slide de navigation-->




<div class="container" style="margin-top: 250px; color:black;">
	<div class="second">
		<h1 class="text-center">Pourquoi devenir partenaire?</h1>
		
			<div class="container">
        <p style="background-color: #0000007d;padding: 10px; font-weight: bold;"><?php 
        	echo $userinf['message'];
         ?> </p>
      </div>
   
</div>
</div>
<button type="button" id="butto" class="btn btn-primary btn-lg btn-block">Devenir partenaire</button>

<div class="container" id="partenaire" style="display:none; margin-top: -150px;">
  <div class="second">
  
      <div class="container">
      	<div id="registration" >
	<h2>Création de compte partenaire</h2>
	<form  action="partenaire/traitement.php" method="POST" >
		<fieldset >
			<!--Input for pseudo-->
			<label for="pseudo" style>Pseudo</label>
			<div class="contenu">
				<i class="icone fa fa-user"></i><input class="text" id="pseudo" type="text" name="pseudo" placeholder="veuillez entrer votre pseudo">
			</div>
			<!--Input for name-->

			<!--Input for name-->
			<label for="name" style>Nom du partenaire</label>
			<div class="contenu">
				<i class="icone fa fa-user"></i><input class="text" id="name" type="text" name="nom" placeholder="Nom du partenaire">
			</div>
			<!--Input for name-->

			<!--Design pour le contact-->
			<label for="tel">Telephone</label>
			<div class="contenu">
			<i class="icone fa fa-phone"></i>	
			<input id="telephone" class="telephone" type="text" name="telephone"  placeholder="Votre contact">
			</div>
			<!--fin du Design pour le contact-->
	<label for="tel">email</label>
			<div class="contenu">
			<i class="icone fa fa-envelope-square"></i>	
			<input id="email" class="email" type="text" name="email"  placeholder="Votre adresse email">
			</div>
			
			<!--fin du Design pour le contact-->

			<!--design du mot de passe-->
				<label for="motPasse">Mot de passe</label>
				<div class="contenu">
					<i class="icone fa fa-key"></i>
					<input id="passe" class="passe" type="password" name="passe" placeholder="entrer mot de passe"><br>
				</div>
			<!--design du mot de passe-->

			<!--Confirmation du mot de passe-->
				<label for="motPasse">confirmation Mot de passe</label>

				<div class="contenu">
					<i class="icone fa fa-key"></i>
					<input class="confirmation" id="confirmation" type="password" name="passe1" placeholder="confirmer votre mot de passe">
				</div>
			<!--Confirmation du mot de passe-->
<div class="row"  style="display: flex; padding-top: 10px;">
	<div class="col-lg-3">
		<!--terme et condition-->
				<input id="acceptTerms" type="checkbox" name="acceptTerms">
			<!--terme et condition-->
	</div>
	<div class="col-lg-9">
		<!--text des termes-->
			 	<label for="acceptTerms">
			 		J'accepte les <a href="">termes et conditions</a>  <a></a>
			 	</label>
			 <!--text des termes-->

	</div>
</div>
			

			 
			 <!--button de validation-->
			 	<button id="enregistrer" name="submit" type="submit">Crée votre compte</button>
			 <!--button de validation-->
		</fieldset>
		
	</form>

 
</div><br>

      </div>
   
</div>
</div>

<?php include 'footer.php' ?>
	<script type="text/javascript">
		document.getElementById("butto").addEventListener("click", function() {
  document.getElementById("butto").style.display = "none";
  document.getElementById("partenaire").style.display = "block";
});
		
	</script>
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
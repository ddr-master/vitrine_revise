<?php 
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=vitrine','root');

if(isset($_SESSION['id']) AND $_SESSION['id'] > 0 )
{
 
 if (isset($_POST['texting'])) {
 	$brainstorming= htmlspecialchars($_POST['brainstorming']);
$getid = $_SESSION['id'];
 	$con = $bdd ->prepare('SELECT * FROM titre WHERE id=?');
 $con->execute(array($getid));
 $userinfo = $con->fetch();

 	if (isset($_POST['brainstorming']) AND !empty($_POST['brainstorming']) AND $_POST['brainstorming'] != $userinfo['titre_brainstrorming'])
 	{
 		$insertnom = $bdd->prepare("UPDATE titre SET titre_brainstrorming = ? WHERE id = 1");
  $insertnom->execute(array($brainstorming));
  

 	}
 }
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Brainstorming</title>
	<!-- CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
<style type="text/css">
	.box{
		background-color: grey;
		color :white;
		}
	li{
    font-size: 2vw;
  		}
	@media screen and (min-width: 1440px){
	li{->
    font-size: 3vw;
  	}
}
</style>
</head>
<body>
	<div id="dialog" title="Basic dialog">
  <p>This is the default dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
</div>
<div class="container-fluid">
	<div class="text-center box">
		<p>
  <a  style="color:white; text-decoration: none;" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><br>
    <h1><?php echo $userinfo ['titre_brainstrorming'] ?></h1>
  </a>
</p>
<div class="collapse" id="collapseExample">
 <form method="POST" action="#">
  
  <div class="form-group">
    <input type="text" class="form-control" name="brainstorming" id="exampleInputPassword1" placeholder="Ajouter le titre de votre brainstorming">
  </div>
  
  <button type="submit" class="btn btn-primary" name="texting">Ajouter</button>
</form>
</div>
		<a class="btn btn-light" href="editeur.php" role="button">Paramètre d'édition</a>
	</div>
	<div class="container">

		<p class="texte">
			<ol>
				<?php 
$getid = $_SESSION['id'];
 	$con = $bdd ->prepare('SELECT * FROM brainstorming');
  $con->execute(array($getid));
 
  while ($userinfo = $con->fetch()) {
 	

				 ?>
				<li>
					<?php echo $userinfo['message'] ?>
				</li><br>
				<?php  } ?>
				<li>
				
			</li>
		</ol></p> <br><br><br>	<br><br><br>	
		</p>
	</div>
</div>
<!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php 
}else{
	header("Location: connexion.php");
	echo "string";
}
 ?>

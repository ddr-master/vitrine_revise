<?php 
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=vitrine','root');
/*
if (isset($_POST['submit'])) {
	$message=htmlspecialchars($_POST['message']);

if (isset($_POST['message']) AND !empty($_POST['message'])) {
	$commentaire =$bdd ->prepare('INSERT INTO brainstorming(message) VALUES(?)');

	$commentaire->execute(array($message));
}else{
	echo "ne laisser pas le champ vide";
}
	
}


  if (isset($_GET['supprimer']) AND !empty($_GET['supprimer'])) {
  	$supprimer = (int) $_GET['supprimer'];

  	$req = $bdd->prepare('DELETE FROM brainstorming WHERE id=?');
  	$req ->execute(array($supprimer));
  }

  if (isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
  	$supprimer = (int) $_GET['supprime'];

  	$req = $bdd->prepare('DELETE FROM brainstorming');
  	$req ->execute(array($supprimer));
  }*/
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Editeur|brainstorming</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript">
      $(document).ready(function(){

      	$('.formulaire').submit(function(){
      		var nom = $('.form-control').val();
$.post('insert.php',function(nom) {
  $('.afficher').html(nom);
});

      		return false;
      	});
    });
    </script>
	<style>
* {box-sizing: border-box;}

.containe{
  position: relative;
  width: 400%;
  max-width: 500px;

}
&é"'(-è_çààokjkhgvgfghjliuuiugugiglmiulgumigl;iugliugiugviug"
.image {
  display: block;
  width: 100%;
  height: auto;
}

.overlay {
  position: absolute; 
  bottom: 0; 
  background: rgb(0, 0, 0);
  background: rgba(0, 0, 0, 0.5); /* Black see-through */
  color: #f1f1f1; 
  width: 100%;
  transition: .5s ease;
  opacity:0;
  color: white;

  font-size: 20px;
  padding: 20px;
  text-align: center;
}

.containe:hover .overlay {
   opacity: 1;
}
</style>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-xs-6 col-lg-6 col-md-6 col-sm-12" style="position: fixed; top: 20%; background-color: grey;">
<form method="POST" class="formulaire">
  	<div class="form-group">
    	<label for="exampleFormControlTextarea1">Inserez votre texte</label>
    	<textarea class="form-control" id="message" name="message" rows="3" placeholder="Lorsque vous envoyez, les informations seront afficher directement à gauche et sur le site visible par les utilisateurs"></textarea>
  	</div>
  	<div class="text-center">
      <button type="submit" value="submit" class="btn btn-primary" name="submit">Afficher le texte
      </button>
    </div>
</form>
<div class="afficher"></div>
	</div>
	<div class="col-xs-6 col-lg-6 col-md-6 col-sm-12" style="height:800px; width: 100px;overflow-x: hidden;overflow-y: auto; margin-left: 600px;margin-top: 5%;">
		<p class="texte">
			<a href="editeur.php?supprime=<?php echo $userinfo['id']; ?>" class="btn btn-danger btn-lg btn-block">Vider tout le contenue</a>

			<ol >
			<?php 
$getid = $_SESSION['id'];
 	$con = $bdd ->prepare('SELECT * FROM brainstorming');
  $con->execute(array($getid));
 
  while ($userinfo = $con->fetch()) {
 	

				 ?>
				<li class="containe">
					<?php echo $userinfo['message'] ?>
<div class="overlay"><a style="margin-right: 10px;" class="btn btn-danger" href="editeur.php?supprimer=<?php echo $userinfo['id']; ?>">supprimer</a><a class="btn btn-success" href="modification.php?id=<?php echo $userinfo['id']; ?>">Modifier</a></div><br><br><br><br>
				<?php  } ?>
				</li><br><br><br><br>
				
				 
			<li>
				
			</li>
		</ol></p> <br><br><br>	<br><br><br>	
	</div>
	</div>	
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
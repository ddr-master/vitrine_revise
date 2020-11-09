<?php 
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=vitrine','root');


if(isset($_GET['id']) AND $_GET['id'] > 0 )
{
if (isset($_POST['submit'])) {
 	
$getid = $_GET['id'];
 	$con = $bdd ->prepare('SELECT * FROM brainstorming WHERE id=?');
  $con->execute(array($getid));
 $userinfo = $con->fetch();

 $getid = $_GET['id'];
$new_message= htmlspecialchars($_POST['new_message']);
 	if (isset($_POST['new_message']) AND !empty($_POST['new_message']) AND $_POST['new_message'] != $userinfo['message'])
 	{
 		$insertnom = $bdd->prepare("UPDATE brainstorming SET message = ? WHERE id = $getid");
  $insertnom->execute(array($new_message));	
echo $new_message;
}
 }
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Modification|brainstorming</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
	<style>
* {box-sizing: border-box;}

.containe{
  position: relative;
  width: 400%;
  max-width: 500px;

}

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
<body style="">
<div class="container">
	<div class="row">
		<?php 
$getid = $_GET['id'];
 	$con = $bdd ->prepare('SELECT * FROM brainstorming WHERE id=?');
  $con->execute(array($getid));
 
  $userinf= $con->fetch();
 	

		 ?>
		<div class="col-xs-6 col-lg-6 col-md-6 col-sm-12" style="position: fixed; top: 20%; background-color: grey;">
<form action="#" method="POST">
  	<div class="form-group">
    	<label for="exampleFormControlTextarea1">Modifier votre texte</label>
    	<textarea class="form-control" name="new_message" value="hello" rows="3"><?php echo $userinf['message'] ?></textarea>
  	</div>
  	<div class="text-center">
      <button type="submit" class="btn btn-primary" name="submit">Modifier le texte
      </button>
    </div>
</form>
	</div>
	<div class="col-xs-6 col-lg-6 col-md-6 col-sm-12" style="height:800px; width: 100px;overflow-x: hidden;overflow-y: auto; margin-left: 600px;margin-top: 5%;">
		<p class="texte">
			<ol >
			<?php 
$getid = $_SESSION['id'];
 	$con = $bdd ->prepare('SELECT * FROM brainstorming');
  $con->execute(array($getid));
 
  while ($userinfo = $con->fetch()) {
 	

				 ?>
				<li class="containe">
					<?php echo $userinfo['message'] ?>
<div class="overlay"><?php echo $userinfo['id'] ?></div><br><br><br><br>
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
<?php } ?>
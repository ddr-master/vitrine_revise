<?php 
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=vitrine','root');
//$bdd = new PDO('mysql:host=localhost;dbname=prixkdo_vitrine','prixkdo','P@ssword@10');

if(isset($_SESSION['id']) AND $_SESSION['id'] > 0 )
{

$session = intval($_SESSION['id']);//
  $con = $bdd ->prepare('SELECT * FROM principal');
  $con->execute(array($session));
  $userinfo = $con->fetch();

if (isset($_POST['logo'])) {
	$telephone = htmlentities($_POST['telephone']);
	$mobile = htmlentities($_POST['mobile']);
	$commune = htmlentities($_POST['commune']);
	

	if (isset($_POST['telephone']) AND isset($_POST['mobile']) AND isset($_POST['commune'])) {
		
		$con =$bdd ->prepare('UPDATE partenaire SET telephone =?, mobile=?, id_commune=? WHERE id_utilisateurs=?');
	}
	
          $con->execute(array( 
                        $telephone,$mobile,$commune, $session
                      ));
          header("Location: ../profil.php?id=".$_SESSION['id']);
}else{
		$msg= "danger";
                  $message ="Ne laisser pas le champ vide";
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<style>
						#profileDisplay{
	display: black;
	width: 30%;
	margin: 10px auto;
	border-radius: 50%;
}
					</style>
</head>
<body style="background-color: #dce3ea">
	<h3 class="alert alert-<?php echo $msg ?>"><?php echo $message; ?></h3>
<div class="container" style="margin-top: 100px; width: 500px; background-color: grey;">
	
 
 
	<form method="POST" action="#" enctype="multipart/form-data">
		<h1 style="color: white;">Inscrivez vos différents coordonnée</h1>
		 <div class="form-group">
         <label style="color: white; font-size: 19px;">Numero de téléphone fixe ou mobile</label>
      <input class="form-control" type="text" name="telephone" placeholder="Entrez le nom du partenaire" />
       </div>

          <div class="form-group">
         <label style="color: white; font-size: 19px;">Numero de téléphone mobile </label>
      <input class="form-control" type="text" name="mobile" placeholder="Entrez le nom du partenaire" />
       </div>

       <div class="form-group">
         <label style="color: white; font-size: 19px;">Précisez la commune</label>
         <select  class="form-control" name="commune">
           <option>Choisir une commune</option>
           <?php 
           $session="";
              $commune = $bdd ->prepare('SELECT * FROM commune');
              $commune->execute(array($session));
              while($com = $commune->fetch()){
            ?>
            <option value="<?php echo $com['id'];?>"><?php echo $com['nom_commune'];?></option>
            <?php } ?>
         </select>
    
       </div>

        
             <button type="submit" name="logo" class="btn btn-primary">Enregistrer </button>
	</form>
</div>
<div style="padding-top: 90px;">
	
</div>
<!-- CSS only -->

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
<?php } ?>
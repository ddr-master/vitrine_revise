<?php 
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=vitrine','root');
//$bdd = new PDO('mysql:host=localhost;dbname=prixkdo_vitrine','prixkdo','P@ssword@10');

if(isset($_SESSION['id']) AND $_SESSION['id'] > 0 )
{

$session = intval($_SESSION['id']);
  $con = $bdd ->prepare('SELECT * FROM principal');
  $con->execute(array($session));
  $userinfo = $con->fetch();

if (isset($_POST['logo'])) {
	$categorie = htmlentities($_POST['categorie']);
  $special = htmlentities($_POST['special']);
	$description = htmlentities($_POST['description']);
	$reduction = htmlentities($_POST['reduction']);
	


	if (isset($_POST['categorie']) AND isset($_POST['special']) AND isset($_POST['description']) AND isset($_POST['reduction'])) {
		
		$con =$bdd ->prepare('UPDATE partenaire SET id_categories =?, special=?, description=?,reduction=? WHERE id_utilisateurs =?');
     $con->execute(array( 
                        $categorie,$special,$description,$reduction,$session
                      ));
          header("Location: ../profil.php?id=".$_SESSION['id']);
	}else{
  $msg= "danger";
                  $message ="Vous n'avez pas renseigner votre description";
}     
}else{
  $msg= "danger";
                  $message ="Ne laissez pas le champ vide";
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
	
<div class="container" style="margin-top: 100px; width: 500px; background-color: grey;">
	
 <h3 class="alert alert-<?php echo $msg ?>"><?php echo $message; ?></h3>
 
	<form method="POST" action="#">
		<h1 style="color: white;">Inscrivez vos différents coordonnée</h1>
		 <div class="form-group">
         <label style="color: white; font-size: 19px;">Choisir une categorie:</label>
         <select name="categorie">
           <option >Choisir une categorie</option>
           <?php 
$con = $bdd ->prepare('SELECT * FROM categories');
  $con->execute(array($session));
 while($userin = $con->fetch()){
            ?>

            <option value="<?php echo $userin['id'] ?>"><?php echo $userin['code'] ?></option>

<?php } ?>         
</select>
       </div>

       <div class="form-group">
         <label style="color: white; font-size: 19px;">Spécialité</label>
         
    <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Quelle est votre spécialité dans votre activité?" name="special" rows="3"></textarea>

    <label style="color: white; font-size: 19px;">Description du partenaire</label>
         <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Description du partenaire" name="description" rows="3"></textarea>
      
         <label style="color: white; font-size: 19px;">Avantage et réduction</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Avantage et réduction" name="reduction" rows="3"></textarea>

  </div>
      
             <button type="submit" name="logo" class="btn btn-primary">Enregistrer </button>
             </form>
       </div>
       

          
       

       
	
  <a href="../../index.php?id=$_SESSION['id']" class="btn btn-primary"></a>
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
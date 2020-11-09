<?php 
$bdd = new PDO('mysql:host=localhost;dbname=vitrine','root');

if(isset($_GET['ville']) AND isset($_GET['categorie']))
{
 

 ?>
<!DOCTYPE html>
<html>
<head>
<style>
div.gallery{
  margin: 5px;
  border: 1px solid #ccc;
  float: left;
  width: 280px;
  
}

div.gallery:hover {
  transform:scale(0.9);
      z-index: 2;
}

div.gallery img {
  width: 100%;
  height: 250px;
}

div.desc {
  padding: 15px;
  text-align: center;
  background-color: #FF7D00;
  color: white;
}
</style>
</head>
<body>
	<div class="container" style="background-color: blue; color: white;">
		<h1>Selection votre partenaire</h1>
	</div>
<?php 
$session= $_GET['categorie'];
$sessio= $_GET['ville'];
$con = $bdd ->prepare('SELECT * FROM partenaire where categorie=? AND ville=?');
    $con->execute(array($session,$sessio));
   while ($user = $con->fetch()) {

 ?>
<div class="gallery">
  <a target="_blank" href="partenaire/partenaire.php?id=<?php echo $user['id_partenaire']; ?>">
    <img src="partenaire/information/<?php echo $user['logo'] ?>" alt="Cinque Terre" width="1600" height="1400">
  
  <div class="desc"><?php echo $user['activite'] ?></div>
</div></a>
<?php  } ?>


</body>
</html>
<?php } ?>

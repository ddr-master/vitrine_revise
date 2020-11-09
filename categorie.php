<?php 
$bdd = new PDO('mysql:host=localhost;dbname=vitrine','root');
//$bdd = new PDO('mysql:host=localhost;dbname=prixkdo_vitrine','prixkdo','P@ssword@10');
if(isset($_GET['id']))
{
 $session=$_GET['id'];

$con = $bdd ->prepare('SELECT * FROM ville where id=?');
    $con->execute(array($session));
   $user = $con->fetch();

echo $user['id'];
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
  height: 150px;
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
		<h1>Selection une categorie pour consulter toute les partenaires liés</h1>
	</div>
<?php 
$session= $_GET['ville'];
$con = $bdd ->prepare('SELECT * FROM partenaire where id_commune=? GROUP BY categorie');
    $con->execute(array($session));
   while ($user = $con->fetch()) {

if ($user['confirme'] == 1) {


 ?>
<div class="gallery">
  <a target="_blank" href="partenaire_ville.php?ville=<?php echo $user['ville'] ?>&categorie=<?php echo $user['categorie'] ?>">
    <img src="image/logoprixkdo.png" alt="Cinque Terre" width="1600" height="400">
  
  <div class="desc"><?php echo $user['categorie'] ?></div>
</div></a>
<?php } } ?>


</body>
<?php include 'footer.php' ?>
</html>
<?php } ?>

<?php 
$bdd = new PDO('mysql:host=localhost;dbname=vitrine','root');

$session="";
$con = $bdd ->prepare('SELECT * FROM ville');
    $con->execute(array($session));
   $userf = $con->fetch();
 ?>
<!DOCTYPE html>
<html>
<head>
<style>
div.<?php echo $userf['nom_ville'] ?> {
  margin: 5px;
  border: 1px solid #ccc;
  float: left;
  width: 380px;
  
}

div.<?php echo $userf['nom_ville'] ?>:hover {
  transform:scale(0.9);
      z-index: 2;
}

div.<?php echo $userf['nom_ville'] ?> img {
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
<?php include "index/head.php"; ?>
</head>
<body>
  <?php $session = "";
  $con = $bdd ->prepare('SELECT * FROM principale WHERE id = 1');
  $con->execute(array($session));
  $userinfo = $con->fetch(); ?>
<!--debut de l'entête de la navigation-->
   <?php include "index/header.php"; ?>
<!--fin du debut de l'entête de la navigation-->
	<div class="container" style="background-color: blue; color: white;">
		<h1>Selection une ville pour consulter toute les catégories</h1>
	</div>
<?php 
$session=' ';
$con = $bdd ->prepare('SELECT * FROM ville');
    $con->execute(array($session));
   while ($user = $con->fetch()) {


 ?>
<div class="<?php echo $userf['nom_ville'] ?>">
  <a target="_blank" href="categorie.php?ville=<?php echo $user['nom_ville'] ?>">
    <img src="administration/profil/<?php echo $user['image'] ?>" alt="Cinque Terre" width="1600" height="1400">
  </a>
  <div class="desc"><?php echo $user['nom_ville'] ?></div>
</div>
<?php }  ?>
<br><br><br><br><br><br><br><br><br><br><br><br>
<?php include 'footer.php' ?>
</body>
</html>

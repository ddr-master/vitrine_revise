<?php 
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=vitrine','root');

if(isset($_SESSION['id']) AND $_SESSION['id'] > 0 )
{
$session = intval($_SESSION['id']);
  $con = $bdd ->prepare('SELECT * FROM principal');
  $con->execute(array($session));
  $userinfo = $con->fetch();


  if (isset($_GET['supprimer']) AND !empty($_GET['supprimer'])) {
    $supprimer = (int) $_GET['supprimer'];

    $req = $bdd->prepare('DELETE FROM image_plicitaire where id_partenaire=?');
    $req->execute(array($supprimer));
    $msg = "Publication supprimée avec success!!";
    $alert = "success";
  }
  if (isset($_GET['supprimer']) AND !empty($_GET['supprimer'])) {
    $supprimer = (int) $_GET['supprimer'];

    $req = $bdd->prepare('DELETE FROM autres_image where id=?');
    $req->execute(array($supprimer));
    $msg = "Publication supprimée avec success!!";
    $alert = "success";
  }
}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
 	<title>suppression</title>
 </head>
 <body>
 <div class="alert-success text-center" style="width: 500px;">
 	<p>Votre image principale à bien été supprimer</p><br><a class="btn btn-primary" href="../profil.php?id=<?php echo $userinfo['id'];?>">Retour</a>
 </div>
 </body>
 </html>
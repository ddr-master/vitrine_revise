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


  if (isset($_GET['supprimer']) AND !empty($_GET['supprimer'])) {
    $supprimer = (int) $_GET['supprimer'];

    $req = $bdd->prepare('DELETE FROM horaire where id=?');
    $req->execute(array($supprimer));
    $msg = "Date supprimée avec success!!";
    $alert = "success";
  }

  if (isset($_GET['supprimer']) AND !empty($_GET['supprimer'])) {
    $supprimer = (int) $_GET['supprimer'];

    $req = $bdd->prepare('DELETE FROM image_partenaire where id=?');
    $req->execute(array($supprimer));
    $msg = "Publication supprimée avec success!!";
    $alert = "success";
  }
  if (isset($_GET['confirmer']) AND !empty($_GET['confirmer'])) {
    $confirmer = (int) $_GET['confirmer'];

    $req = $bdd->prepare('UPDATE  image_partenaire SET principale = 1 where id=?');
    $req->execute(array($confirmer));
    $msg = "Image principale selectionnée avec success!!";
    $alert = "success";
  }

  if (isset($_GET['annuler']) AND !empty($_GET['annuler'])) {
    $annuler = (int) $_GET['annuler'];

    $req = $bdd->prepare('UPDATE  image_partenaire SET principale = 0 where id=?');
    $req->execute(array($annuler));
    $msg = "L'image n'est principale n'est plus associé!!";
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
 <div class="alert-success">
 	<p class="text-center" style="margin-top: 25%;"><?php echo $msg ; ?></p><br><a class="btn btn-primary" style="margin-left: 50%;" href="../profil.php?id=<?php echo $session; ?>">Retour</a>
 </div>
 </body>
 </html>
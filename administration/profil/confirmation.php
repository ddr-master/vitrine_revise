<?php 
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=vitrine','root');
//$bdd = new PDO('mysql:host=localhost;dbname=prixkdo_vitrine','prixkdo','P@ssword@10');


if (isset($_GET['confirme']) AND !empty($_GET['confirme'])) {
    $confirmer = (int) $_GET['confirme'];

    $req = $bdd->prepare('UPDATE contenue SET id_partenaire= 1 WHERE id = ?');
    $req->execute(array($confirmer));
    
    $message = "Bien afficher sur le site internet";
    }

    if (isset($_GET['confirme']) AND !empty($_GET['confirme'])) {
    $confirmer = (int) $_GET['confirme'];

    $req = $bdd->prepare('UPDATE partenaire SET confirme = 1 WHERE id = ?');
    $req->execute(array($confirmer));
    
    $message = "Bien afficher sur le site internet";
    }

    if (isset($_GET['confirmer']) AND !empty($_GET['confirmer'])) {
    $confirmer = (int) $_GET['confirmer'];

    $req = $bdd->prepare('UPDATE partenaire SET confirme = 0 WHERE id = ?');
    $req->execute(array($confirmer));
    
    $message = "Bien afficher sur le site internet";
    }
   

    if (isset($_GET['meilleur']) AND !empty($_GET['meilleur'])) {
    $confirmer = (int) $_GET['meilleur'];

    $req = $bdd->prepare('INSERT INTO contenue(id_partenaire,id_bloc) VALUES(?,?)');
    $req->execute(array($confirmer,$session));
   echo "well";
    $message ="Bien ajouter dans la catgories meilleurs partenaire";
    }

    if (isset($_GET['meilleure']) AND !empty($_GET['meilleure'])) {
    $confirmer = (int) $_GET['meilleure'];

    $req = $bdd->prepare('UPDATE partenaire SET meilleur = 0 WHERE id_partenaire = ?');
    $req->execute(array($confirmer));
    
    $message ="Bien ajouter dans la catgories meilleurs partenaire";
    }
   

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

 </head>
 <body>
 <div class="alert alert-success" role="alert">
  <?php echo $message; ?>
</div>
 </body>
 </html>
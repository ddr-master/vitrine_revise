<?php 
session_start();
 $bdd = new PDO('mysql:host=localhost;dbname=vitrine','root');
//$bdd = new PDO('mysql:host=localhost;dbname=prixkdo_vitrine','prixkdo','P@ssword@10');


$session = "";
  $con = $bdd ->prepare('SELECT * FROM principale WHERE id = 1');
  $con->execute(array($session));
  $userinfo = $con->fetch();


if (isset($_POST['submit']))
 {
  
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $passe = sha1($_POST['passe']);
  $message="";
  if (!empty($pseudo) AND !empty($passe)) {
    $requser = $bdd ->prepare('SELECT * FROM utilisateurs WHERE pseudo = ? AND passe = ? ');
    $requser ->execute(array($pseudo, $passe));
    $userexist = $requser ->rowcount();

    if ($userexist == 1) {
      $userinfo = $requser ->fetch();
      $_SESSION['id'] = $userinfo['id'];
      $_SESSION['pseudo'] = $userinfo['pseudo'];
header("Location: partenaire/profil.php?id=".$_SESSION['id']);
    }else {
      $msg="danger";
      $message =  "Pseudo ou Mot de passe incorrect. Veuillez verifiez!!";
      header("Location: partenaire/message.php?id=".$_SESSION['id']);
    }

  }else {
    $msg="danger";
    $message = 'Veuillez renseignez correctemnt vos identifiants';
header("Location: partenaire/message.php?id=".$_SESSION['id']);

  }
}

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Connexion </title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center" style="position :absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #f8f7f9;">
    <form class="form-signin" method="POST" action="connexion.php">
      <img class="mb-4" src="images/logo.png" alt="" width="162" height="102">
      <h1 class="h3 mb-3 font-weight-normal">Se connecter</h1>
      <label for="inputEmail" class="sr-only">Pseudo</label>
      <input type="text" id="inputEmail" name="pseudo" class="form-control" placeholder="entre votre pseudo" required autofocus><br>
      <label for="inputPassword" class="sr-only">Mot de passe</label>
      <input type="password" id="inputPassword" name="passe" class="form-control" placeholder="Entre votre mot de passe" required><br>
      <!--
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      -->
      <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit" style="background-color: #f68c1e;border: 1px solid #f68c1e;">Se connecter</button>
      <p class="mt-5 mb-3 text-muted">&copy;copyright 2019-2020</p>
    </form>
  </body>
  
</html>

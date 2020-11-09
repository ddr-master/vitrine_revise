<?php
session_start();//connexion à la base de donné
try {
  $bdd = new PDO('mysql:host=localhost;dbname=vitrine','root');

} catch (\Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['submit']))
 {
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $passe = sha1($_POST['passe']);
  if (!empty($pseudo) AND !empty($passe)) {
    $requser = $bdd ->prepare('SELECT * FROM admin WHERE pseudo = ? AND passe = ? ');
    $requser ->execute(array($pseudo, $passe));
    $userexist = $requser ->rowcount();

    if ($userexist == 1) {
      $userinfo = $requser ->fetch();
      $_SESSION['id'] = $userinfo['id'];
      $_SESSION['pseudo'] = $userinfo['pseudo'];
header("Location: profil/index.php?id=".$_SESSION['id']);
    }else {
      $message =  "Pseudo ou Mot de passe incorrect. Veuillez verifiez!!";
    }

  }else {
    $message = 'Veuillez renseignez correctemnt vos identifiants';
  }
}

 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <meta http-equiv="refresh" content="5;URL=index.php">
     <title>Verification des informations</title>
     <link rel="stylesheet" href="asset/css/style.css">
     <style>
     .main {
   height: 50%;
   width: 50%;
   padding: 0px;
   top:10px;
   border: 15px groove darkred;
   margin-left: 20%;
   margin-top:70px;
   background-color: white;
 }
     </style>

   </head>
   <body>
 <div class="main">
 <h1 style="color:red;text-align:center;"> <?php echo $message; ?> </h1>
 </div>

   </body>
 </html>

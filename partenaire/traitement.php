<?php 
$bdd = new PDO('mysql:host=localhost;dbname=vitrine','root');
//$bdd = new PDO('mysql:host=localhost;dbname=prixkdo_vitrine','prixkdo','P@ssword@10');

if (isset($_POST['submit'])) {
	
	$pseudo = htmlentities($_POST['pseudo']);
	$nom = htmlentities($_POST['nom']);
	$telephone = htmlentities($_POST['telephone']);
	$email = htmlentities($_POST['email']);
	$passe = sha1($_POST['passe']);
	$passe1 = sha1($_POST['passe1']);

	if (isset($pseudo) AND !empty($pseudo) AND isset($nom) AND !empty($nom) AND isset($telephone) AND !empty($telephone) AND isset($email) AND !empty($email) AND isset($email) AND !empty($passe) AND isset($passe) AND !empty($passe1) AND isset($passe1)) {

		$min ="/^[a-z]+$/";
		if (preg_match_all($min, $pseudo)) {

$reqpseudo = $bdd->prepare("SELECT * FROM utilisateurs WHERE pseudo=?");
              $reqpseudo->execute(array($pseudo));
              $pseudoexist = $reqpseudo->rowCount();
              if ($pseudoexist == 0) {
			//verification si le nom est en miniscule
			if (preg_match_all($min, $nom)) {
				//verification si c'est bien un numero de telephone
				$mins ="/\d{13}/";
				if (preg_match_all($mins, $telephone)) {
			
			//tester voir si l'email est actif 
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			;
				
				if ($passe == $passe1) {
					
					$slides=$bdd->prepare('INSERT INTO utilisateurs(pseudo,nom, 	telephone,email,passe,date) VALUES(?,?,?,?,?,NOW())');
          $slides->execute(array( 
                        $pseudo,$nom,$telephone,$email,$passe
                      ));
					$msg ="success";
			$message ="Bien enregistrer";
				}else{
				$msg ="danger";
			$message ="Votre mot de passe doit etre au minimum 8 caractère";
			}
				}else{
				$msg ="danger";
			$message ="Votre email n'est pas correcte";
			}
				}else{
				$msg ="danger";
			$message ="Votre numero de telepnone n'est pas correcte";
			}
				
			}else{
			$msg ="danger";
		$message ="Votre nom dois être en miniscule";
		}
			//verification si le nom est en miniscule
}else{
	$msg ="danger";
		$message ="Ce pseudo existe déjà choissez un autre";
}
	}else{
			$msg ="danger";
		$message ="Votre pseudo dois être en miniscule et un seul mot";
	}


		}else{
		$msg ="danger";
		$message ="Ne laisser pas le champ vide";
	}
	}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Page de traitement</title>
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<meta http-equiv="refresh" content="4; URL=../partenaire.php" />

<!-- JS, Popper.js, and jQuery -->
 </head>
 <body>
 <h3 class="alert alert-<?php 

                                     echo $msg ?>"><?php echo $message; ?></h3>
 </body>
 </html>
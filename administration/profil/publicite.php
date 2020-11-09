<?php 
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=vitrine','root');
//$bdd = new PDO('mysql:host=localhost;dbname=prixkdo_vitrine','prixkdo','P@ssword@10');


if(isset($_GET['id']) AND $_GET['id'] > 0 )
{
  $session = intval($_GET['id']);
  $message="";
  $con = $bdd ->prepare('SELECT * FROM principal');
  $con->execute(array($session));
  $userinfo = $con->fetch();

 
	if (isset($_POST['categori'])) {

		//testons pour verifier s'il y a présence d'image
	    if (isset($_FILES['newimage_logo']) AND !empty($_FILES['newimage_logo']['name']) AND $_FILES['newimage_logo'] != $userinfo['image_logo']) 
			{
				echo "string";
		//testons la taille de l'image
	    	$tailleMax = 14680064;
	    	$extensionsValides = array('jpg', 'jpeg','png');
	    	if ($_FILES['newimage_logo']['size']<=$tailleMax) {
	    		$extensionUpload = strtolower(substr(strrchr($_FILES['newimage_logo']['name'],'.'),1));
	    		if (in_array($extensionUpload, $extensionsValides)) {
	    			$nom = uniqid($session,true);
	    			$chemin ="img/".$_SESSION['id']."_".$nom.".".$extensionUpload;
	    			$resultat =move_uploaded_file($_FILES['newimage_logo']['tmp_name'],$chemin);
	    			if ($resultat) {

	    				//declaration des variables
	    				$titre_pub= htmlentities($_POST['titre_pub']);
	    				$paragraphe_pub = htmlentities($_POST['paragraphe_pub']);

	    				if (isset($_POST['titre_pub']) AND !empty($_POST['titre_pub']) AND isset($_POST['paragraphe_pub']) AND !empty($_POST['paragraphe_pub'])) 
	    				{
	    					$ins = $bdd->prepare('UPDATE principale SET image_pub=?,titre_pub=?,paragraphe_pub=? ');
	    					$ins->execute(array($chemin,$titre_pub,$paragraphe_pub));
	    					$msg="success";
	    			$message="Publication enregistrer";
	    				}else
	    				{
	    					$msg = "danger";
	    					$message ="ne laissez pas le champ vide";
	    				}
	    			}
	    		}else{
	    			$msg="danger";
	    			$message="Extension autoriser jpg, jpeg, png";
	    		}
	    		
	    		}else{
	    			$msg="danger";
	    			$message="Votre image ne doit pas dépasser les 2mo";
	    		}
	    //Fin du test de de la taille de l'image

	    	}else{
	    		$msg="danger";
	    		$message=" vous n'avez pas ajouter d'image";
	    	}
	    	//fin du test de présence d'image
	    }    

            
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Modification | page principale</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <?php include "menu.php"; ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                
                 <!-- /. ROW  -->
                 <hr />
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Ajouter categorie
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                 
                                  
                                 
                                     <h3 class="alert alert-<?php 

                                     echo $msg ?>"><?php echo $message; ?></h3>
                                   
<style>
            #profileDisplay{
  display: black;
  width: 60%;
  margin: 10px auto;
  border-radius: 50%;
}
          </style>                     
                                        <!-- icon de la categorie -->

                                        
                                    <br />  
    <!--Modification du menu1-->
    <label for="profileImage">Enregistrer une publicite</label>
					
            <form role="form" action="#" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                      <div class="form-group text-center">
					<img src="assets/img/find_user.png" onclick="triggerClick()" id="profileDisplay"/><br>
					
					<input type="file" name="newimage_logo" onchange ="displayImage(this)" id="profileImage" style="display:none;">
          </div>    
                    <div class="form-group text-center" style="background-color: grey; color : white">
                    
              <label for="profileImage" >Titre de la publicite</label>
                    </div>

                    <div>
                      <label>Message de la publicté</label><br>
                      <input type="input" class="form-control" name="titre_pub" placeholder="entrer le nom de la categorie">
                    </div>
<br>
                    <div>
                      <label>code de la categorie</label><br>

                      <textarea type="input" name="paragraphe_pub" placeholder="code de la categorie" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                                      
            <button type="submit" name="categori" class="btn btn-primary">Publier</button>

            </form>
    <!--fin du modification du menu 1-->
      
                            </div>
                            
                    
                                           
                  
                            </div>
                        </div>
                    </div></div><!-- End Form Elements -->
                </div>
            </div>
                
    
             <!-- /. PAGE INNER  -->
            </div>

         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
     <script src="scripts.js"></script>
    
   
</body>
</html>
<?php 
}else{
    echo "hello";
}
?>

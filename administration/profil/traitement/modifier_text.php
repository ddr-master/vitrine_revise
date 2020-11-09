<?php 
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=vitrine','root');
//$bdd = new PDO('mysql:host=localhost;dbname=prixkdo_vitrine','prixkdo','P@ssword@10');

if(isset($_GET['id']) AND $_GET['id'] > 0 )
{
  $getid = intval($_GET['id']);
  

$con = $bdd ->prepare('SELECT * FROM text_partenaire');
  $con->execute(array($getid));
 $userinfo = $con->fetch();


if (isset($_POST['newmessage']) AND !empty($_POST['newmessage']) AND $_POST['newmessage'] != $userinfo['message'])
{ 
  $newmessage = htmlspecialchars($_POST['newmessage']);
  $insertnom = $bdd->prepare("UPDATE text_partenaire SET message = ?");
  $insertnom->execute(array($newmessage));
 
  //header('Location: index.php?id='.$_SESSION['id']);
//echo $insertnom;
  $message = "Toutes les modification";
  $info ='success';
  //header('Location: ../suprimer_modifier_categorie.php?id='.$_SESSION['id']);
}else{
	$message = "Aucune modification n'a été faites";
	$info ='danger';
}



 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Modifier de catégorie | vitrine</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />

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
                            Modfication de la catégorie
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="alert alert-<?php echo $info; ?>"><?php echo $message; ?></h3>

                                        <!-- Nom de la categorie traitement/ajouter_categories.php -->
                                    <form role="form" action="#" method="POST">
                                        <div class="form-group">
                                            <label>Le nom de la catégorie</label>
                                            <input class="form-control" type="text" name="newmessage" value="<?php echo $userinfo['message']; ?>" />
                                        </div>
                                        <!-- fin Nom de la categorie -->

                                        

                    
                                        <button type="submit" name="categorie" class="btn btn-primary">Ajouter</button>

                                    </form>
                                    <br />                             
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
                
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script>
    
   
</body>
</html>
<?php 

}
else{
	echo "reconnectez-vous";
 }
 ?>

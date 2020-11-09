<?php 
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=vitrine','root');
//$bdd = new PDO('mysql:host=localhost;dbname=prixkdo_vitrine','prixkdo','P@ssword@10');


if(isset($_GET['id']) AND $_GET['id'] > 0 )
{
  $getid = intval($_GET['id']);
  $con = $bdd ->prepare('SELECT * FROM admin WHERE id = ?');
  $con->execute(array($getid));
  $userinfo = $con->fetch();
 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $userinfo["pseudo"]; ?></title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
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
                <div class="row">
                    <div class="col-md-12">
                     <h2>Tableau de bord</h2>   
                        <h5>Vitrine prixkdo</h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">  
                <a style="text-decoration: none;" href="consultation.php?id=<?php echo $_SESSION['id'] ?>">      
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                   <i class="fa fa-users"></i>
                </span>
                <?php 
                $con = $bdd ->prepare('SELECT * FROM partenaire ');
                $con->execute(array($getid));
                $partenaires = $con->rowCount();
                 ?>

                <div class="text-box" >
                    <p class="main-text"><?php echo $partenaires ?> Partenaires</p>
                    <p class="text-muted">totals</p>
                </div>
             </div>
             </a>  
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">  
                    <a style="text-decoration: none;" href="partenaire_en_ligne.php">        
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                   <i class="fa fa-object-group" aria-hidden="true"></i>
                </span>
                <?php 
                $con = $bdd ->prepare('SELECT * FROM partenaire where confirme = 1');
                $con->execute(array($getid));
                $partenaires = $con->rowCount();
                 ?>
                <div class="text-box" >
                    <p class="main-text"><?php echo $partenaires ?> partenaires</p>
                    <p class="text-muted">En ligne</p>
                </div>
             </div>
             </a> 
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                    <a style="text-decoration: none;" href="partenaire_en_attente.php">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fas fa-user-clock"></i>
                </span>
                <?php 
                $con = $bdd ->prepare('SELECT * FROM partenaire where confirme = 0');
                $con->execute(array($getid));
                $partenaires = $con->rowCount();
                 ?>
                <div class="text-box" >
                    <p class="main-text"><?php echo $partenaires ?> partenaires</p>
                    <p class="text-muted">En attente</p>
                </div>
             </div>
             </a>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                    <a style="text-decoration: none;" href="suprimer_modifier_categorie.php">        
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-sort-amount-desc" aria-hidden="true"></i>
                </span>
                <?php 
                $con = $bdd ->prepare('SELECT * FROM categories');
                $con->execute(array($getid));
                $categories = $con->rowCount();
                 ?>
                <div class="text-box" >
                    <p class="main-text"><?php echo $categories ?> catégories</p>
                    <p class="text-muted">Totales</p>
                </div>
             </div>
             </a>  
		     </div>
             <div class="col-md-3 col-sm-6 col-xs-6">           
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                </span>
                <?php 
                $con = $bdd ->prepare('SELECT * FROM categories where confirme = 1');
                $con->execute(array($getid));
                $categories = $con->rowCount();
                 ?>
                <div class="text-box" >
                    <p class="main-text"><?php echo $categories ?> catégories</p>
                    <p class="text-muted">En ligne</p>
                </div>
             </div>
             </div>
             <div class="col-md-3 col-sm-6 col-xs-6">           
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-toggle-off" aria-hidden="true"></i>
                </span>
                <?php 
                $con = $bdd ->prepare('SELECT * FROM categories where confirme = 0');
                $con->execute(array($getid));
                $categories = $con->rowCount();
                 ?>
                <div class="text-box" >
                    <p class="main-text"><?php echo $categories ?> catégories</p>
                    <p class="text-muted">Hors ligne</p>
                </div>
             </div>
             </div>
			</div>
                 <!-- /. ROW  -->
                <hr />                
               
                 <!-- /. ROW  -->
                
                 <!-- /. ROW  -->
                   
                 <!-- /. ROW  -->           
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
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
<?php 
}else{
    echo "hello";
}
?>

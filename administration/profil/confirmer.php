<?php  
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=vitrine','root');
//$bdd = new PDO('mysql:host=localhost;dbname=prixkdo_vitrine','prixkdo','P@ssword@10');


if(isset($_SESSION['id']) AND $_SESSION['id'] > 0 )
{
  $getid = intval($_SESSION['id']);
  $con = $bdd ->prepare('SELECT * FROM admin WHERE id = ?');
  $con->execute(array($getid));
  $userinfo = $con->fetch();

 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Liste de tout les blocs ajouter dans les meilleurs partenaires</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
   
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
    <div id="wrapper">
        <?php include "menu.php"; ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">

                  <?php

                            $likes = $bdd->prepare('SELECT * FROM partenaire WHERE confirme = 1 AND meilleur = 0');           
                            $likes->execute(array($getid));
                        $likes = $likes->rowCount();
                             ?>
                    <div class="col-md-12">
                     <h2>Liste de tout les comptes partenaires (<?php echo $likes ?>)</h2>   
                        <h5>Bienvenue à la section d'administration de la vitrine prix kdo</h5>
                       <a class="btn btn-primary" href="meilleur_partenaire.php?id=<?php echo $_SESSION['id'] ?>">Retour</a>
                    </div>
                </div>
                 <!-- /. ROW  -->
                
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Ajouter au bloc meilleur
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Logo</th>
                                            <th>Activité</th>
                                            
                                            <th>Afficher</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
$con = $bdd ->prepare('SELECT * FROM partenaire WHERE confirme = 1 AND meilleur = 0');
  $con->execute(array($getid));
 while ($userinfo = $con->fetch()){

            if (isset($_GET['confirm']) AND !empty($_GET['confirm'])) {
    $supprimer = (int) $_GET['confirm'];

    $req = $bdd->prepare('UPDATE partenaire SET meilleur = 1 WHERE id=?');
    $req->execute(array($supprimer));

  }
          ?>

                              <tr class="odd gradeX">
                                <td><?php echo $userinfo['id']; ?></td>
                                            <td><img style="width: 100px;" src="../../partenaire/information/<?php echo $userinfo['logo']; ?>"></td>
                                            <td><?php echo $userinfo['activite']; ?></td>
                                            
                                            <td><?php 
                                              $confirme= $userinfo['confirme'];
                                                  if ($confirme == 1) { ?>
                                                   <a href="confirmer.php?confirm=<?= $userinfo['id']; ?>"type="button" class="btn btn-danger">Ajouter à meilleur</a>
                                                 <?php  }  ?>
                                               </td>
                                        </tr>
                                        
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
            </div>
                <!-- /. ROW  -->
        </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
<?php 


}else{
    echo "bye";
}
?>

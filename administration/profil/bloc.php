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
    <title>Modifier_supprimer_une categorie</title>
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
                    <div class="col-md-12">
                     <h2>Ajouter ou modifier Un bloc</h2>   
                        <h5>Bienvenue à la section d'administration de la vitrine prix kdo</h5>
                       <p>Les blocs sont les contenus des partenaires en définissant leur contenue aux-quelles</p><a class="btn btn-danger" href="ajouter_bloc.php?id=<?= $userinfo['id']; ?>">Ajouter un bloc</a>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Modifier ou supprimer
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nom</th>
                                            <th>Afficher</th>
                                            <th>Modifer</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
$con = $bdd ->prepare('SELECT * FROM bloc');
  $con->execute(array($getid));
 while ($userinfo = $con->fetch()){

            if (isset($_GET['supprimer']) AND !empty($_GET['supprimer'])) {
    $supprimer = (int) $_GET['supprimer'];

    $req = $bdd->prepare('DELETE FROM bloc WHERE id = ?');
    $req->execute(array($supprimer));
  }
  if (isset($_GET['confirme']) AND !empty($_GET['confirme'])) {
    $confirmer = (int) $_GET['confirme'];

     $req = $bdd->prepare('UPDATE bloc SET activer = 1 WHERE id = ?');
    $req->execute(array($confirmer));
    
    $message ="Bloc ajouter";
  }

  if (isset($_GET['confirm']) AND !empty($_GET['confirm'])) {
    $confirmer = (int) $_GET['confirm'];

     $req = $bdd->prepare('UPDATE bloc SET activer = 0 WHERE id = ?');
    $req->execute(array($confirmer));
    
    $message ="Bien ajouter dans la catgories meilleurs partenaire";
  }
           ?>
  

                                        <tr class="odd gradeX">
                                            <td><?php echo $userinfo['id']; ?></td>
                                            <td><?php echo $userinfo['nom_bloc']; ?></td>
                                            
                                            <td>
                                              <?php 
                                              $confirme= $userinfo['activer'];
                                                  if ($confirme == 0) { ?>
                                                   <a href="bloc.php?confirme=<?= $userinfo['id']; ?>"type="button" class="btn btn-success">Non</a>
                                                 <?php  }else{  ?>
<a href="bloc.php?confirm=<?= $userinfo['id']; ?>"type="button" class="btn btn-danger">Enlever</a>
                                                  <?php }  ?>

                                              
                                                
                                              

                                            <td><a href="traitement/modifier_bloc.php?id=<?= $userinfo['id']; ?>"type="button" class="btn btn-primary">Modifier</a></td>

                                            <td><a href="bloc.php?supprimer=<?= $userinfo['id']; ?>" type="button" class="btn btn-danger">Supprimer</a></td>
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
    echo "Reconnectez vous";
}
?>
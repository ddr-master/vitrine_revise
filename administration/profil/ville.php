<?php 
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=vitrine','root');
//$bdd = new PDO('mysql:host=localhost;dbname=prixkdo_vitrine','prixkdo','P@ssword@10');


if(isset($_SESSION['id']) AND $_SESSION['id'] > 0 )
{
  $session = intval($_SESSION['id']);
  $message="";
  $con = $bdd ->prepare('SELECT * FROM principal');
  $con->execute(array($session));
  $userinfo = $con->fetch();

 
  if (isset($_POST['ville'])) {

    //testons pour verifier s'il y a présence d'image
      if (isset($_FILES['newimage_logo']) AND !empty($_FILES['newimage_logo']['name']) AND $_FILES['newimage_logo'] != $userinfo['image_logo']) 
      {
       
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
              $titre_ville= htmlentities($_POST['titre_ville']);
              $confirme= 0;
             

              if (isset($_POST['titre_ville']) AND !empty($_POST['titre_ville'])) 
              {
                $slides = $bdd ->prepare('INSERT INTO ville_partenaire(image,ville,confirme) VALUES (?,?,?)');
                  $slides->execute(array( 
                        $chemin,$titre_ville,$confirme
                      ));
                   echo "string";
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
    <title>Liste de toutes les villes</title>
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

                            $likes = $bdd->prepare('SELECT * FROM ville_partenaire');           
                            $likes->execute(array($session));
                        $likes = $likes->rowCount();
                             ?>
                    <div class="col-md-12">
                     <h2>Nombres de ville (<?php echo $likes ?>)</h2>   
                        <h5>Bienvenue à la section d'administration de la vitrine prix kdo</h5>
                       <?php  ?>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Ajouter une ville
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter une ville</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="#" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Ajoute image</label>
    <input type="file" class="form-control" name="newimage_logo" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">titre de l'image</label>
    <input type="text" class="form-control" name="titre_ville" id="exampleInputPassword1" placeholder="renseigner titre de l'image">
  </div>
  
  <button type="submit" class="btn btn-primary" name="ville">Ajouter la ville</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      
      </div>
    </div>
  </div>
</div>
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
                                            <th>Images</th>
                                            <th>Ville</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
$con = $bdd ->prepare('SELECT * FROM ville_partenaire ORDER BY ville DESC');
  $con->execute(array($session));
 while ($userinfo = $con->fetch()){

            if (isset($_GET['supprimer']) AND !empty($_GET['supprimer'])) {
    $supprimer = (int) $_GET['supprimer'];

    $req = $bdd->prepare('DELETE FROM ville_partenaire WHERE id = ?');
    $req->execute(array($supprimer));
  }
           ?>
  

                              <tr class="odd gradeX">
                                <td><?php echo $userinfo['id']; ?></td>
                                            <td><img src="<?php echo $userinfo['image']; ?>" style="width: 500px;"></td>
                                            <td><?php echo $userinfo['ville']; ?></td>
                                            <td><a href="ville.php?supprimer=<?= $userinfo['id']; ?>" type="button" class="btn btn-danger">Supprimer</a></td>
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

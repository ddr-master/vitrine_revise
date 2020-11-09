<?php 
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=vitrine','root');


if(isset($_GET['id']) AND $_GET['id'] > 0 )
{
  $session = intval($_GET['id']);
  $message="";
  $con = $bdd ->prepare('SELECT * FROM principal');
  $con->execute(array($session));
  $userinfo = $con->fetch();

 
    


    //modifier menu 6
    if (isset($_POST['categori'])) {
      $nom_du_bloc= htmlentities($_POST['nom_du_bloc']);
     
      $activer = 0;

      if (isset($_POST['nom_du_bloc'])) {
          $slides=$bdd->prepare('INSERT INTO bloc(nom_bloc,activer) VALUES(?,?)');
          $slides->execute(array( 
                        $nom_du_bloc,$activer
                      ));
          $msg="success";
          $message="le bloc à bien été enregistrer";
      }else{
        $msg="alert";
        $message ="ne laisser pas le champ vide";
      }
    }
            
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ajouter_bloc | page principale</title>
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
                            Ajouter bloc
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
            <form role="form" action="#" method="POST">
                <div class="form-group">
                          
                    <div class="form-group text-center" style="background-color: grey; color : white">
                    
              <label for="profileImage" >Bloc</label>
                    </div>

                    <div>
                      <label>Nom du bloc</label><br>
                      <input type="input" name="nom_du_bloc" placeholder="entrer le nom de la categorie">
                    </div>
                </div>
                                      
            <button type="submit" name="categori" class="btn btn-primary">Ajouter bloc</button>

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

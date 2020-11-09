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

 
    


    //modifier menu 6
    if (isset($_POST['categori'])) {
      $message= htmlentities($_POST['message']);
      
      $confirme = 0;

      if (isset($_POST['message']) AND !empty($_POST['message'])) {
          $slides=$bdd->prepare('INSERT INTO text_partenaire(message,confirme) VALUES(?,?)');
          $slides->execute(array( 
                        $message, $confirme
                      ));
          $msg="success";
          $messag="text partenaire à bien été enregistrer veuillez confirmer pour l'afficher sur le net";
      }else{
        $msg="alert";
        $messag ="ne laisser pas le champ vide";
      }
    }
            
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ajouter | text partenaire</title>
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
                            Ajouter text partenaire
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                 
                                  
                                 
                                     <h3 class="alert alert-<?php 

                                     echo $msg ?>"><?php echo $messag; ?></h3>
                                   
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
                    
              <label for="profileImage" >Ajouter du texte</label>
                    </div>

                    <div class="form-group">
    
    <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="entrer le text" rows="3" name="message"></textarea>
  </div>
                </div>
                                      
            <button type="submit" name="categori" class="btn btn-primary">Ajouter</button>

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

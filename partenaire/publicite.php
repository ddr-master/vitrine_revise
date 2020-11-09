<div id="home" class="tab-pane fade in active text-center" style="background-color: #ddd8d7;">
<header style="background-color: rgb(169, 21, 30); position: fixed-top; color:white"><h3>Espace publication</h3></header>
      
      <p style="font-size: 26px; font-weight: bold; color: black;">Les images que vous ajoutez ici s'afficherons dans le slide de votre page partenaire </p>
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <?php 
                            $likes = $bdd->prepare('SELECT * FROM image_plicitaire WHERE id_partenaire=?');           
                            $likes->execute(array($session));
                        $likes = $likes->rowCount();
                            
if ($likes == 0) {?>
 <p style="margin-top: 20px; background-color: grey; color: white">Slide principale 1/1 images<div class="form-group">
    <!--Ajout de d'image-->
                <form action="#" method="POST" enctype="multipart/form-data">
                  <label for="exampleFormControlInput1">Ajouter Slide principal</label>
    <input type="file" class="form-control" id="exampleFormControlInput1" name="newimage_logo" placeholder="Ajouter le logo qui s'affichera sur l'annonce">
  </div><button class="btn btn-primary" name="logo">Ajouter</button>
                </form>
              </p>
  <?php }else{?>
   
   <?php 
 $likes = $bdd->prepare('SELECT * FROM image_plicitaire WHERE id_partenaire=?');           
                            $likes->execute(array($session));
                        $likes = $likes->rowCount();

                         $like = $bdd->prepare('SELECT * FROM autres_image WHERE id_partenaire=?');           
                            $like->execute(array($session));
                        $like = $like->rowCount();
                            
if ($like<  6)
{
    ?>
<p style="margin-top: 20px; background-color: green; color: white">Autre images <?php echo $like ?>/6<div class="form-group">
    <!--Ajout d'autres d'image-->
                <form action="profil.php" method="POST" enctype="multipart/form-data">
                  <label for="exampleFormControlInput1">Ajouter Autre slides publicitaires</label>
    <input type="file" class="form-control" id="exampleFormControlInput1" name="newimage_logo" placeholder="Ajouter le logo qui s'affichera sur l'annonce">
  </div><button class="btn btn-primary" name="log">Ajouter</button>
                </form>
              </p>
  
 <?php }else{
           ?>
  <p class="alert-success" style="font-size: 26px; font-weight: bold; color: red;">Vous avez atteint le nombre maximal d'image à afficher pour ajouter d'autre image veuillez supprimer dans la listes à droites</p>
<?php }} ?>
    <!--Ajout de logo-->
            </div>
            <div class="col-lg-6" style="background-color: white;">
              <p style="margin-top: 20px;"><h4 style="background-color: rgb(169, 21, 30); color: white;">Affichage de vos images</h4>

    <!--Afficher et supprimer les images-->            
                <h2 ></h2>
                <p>
          <?php 

                            $likes = $bdd->prepare('SELECT * FROM image_plicitaire WHERE id_partenaire=?');           
                            $likes->execute(array($session));
                        $likes = $likes->rowCount();

//move into pocket all images
                         $like = $bdd->prepare('SELECT * FROM autres_image WHERE id_partenaire=?');           
                            $like->execute(array($session));
                        $like = $like->rowCount();
                            
if ($likes == 0) {?>
 <div class="alert-info" style="margin-top: 10px; width: 100%; height: 100px; "><h4 style="color:red;">Aucune image de publicité n'a été ajoutée</h4></div>
  <?php }else{?>
<a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Afficher vos images enregistré ( <?php echo $likes +$like; ?>/7)
  </a>
  
 <?php }
           ?>
  
</p>
<div class="collapse" id="collapseExample" style="align-content: center">
   <?php 
$con = $bdd ->prepare('SELECT * FROM image_plicitaire where id_partenaire=?');
  $con->execute(array($session));
 
 $userinfo = $con->fetch();{
     ?>

     <div class="card" style="width: 18rem; margin-left: 100px;">
  <img class="card-img-top" src="<?php echo $userinfo['image_principale'] ?>" alt="Card image cap">
  <div class="card-body">
    <a class="btn btn-danger" href="suppression/p_image.php?supprimer=<?php echo $userinfo['id_partenaire'] ?>">Supprimer image principale</a>
  </div>
</div>
  <!--Affichage des images-->
   
    <!--Suppression des images-->

<?php } ?>
  <div class="image">
    <?php 
$con = $bdd ->prepare('SELECT * FROM autres_image where id_partenaire=?');
  $con->execute(array($session));
  ;
  $lik=1;
  while ($userinfo = $con->fetch()) {
   
 
     ?>
     <div class="card" style="width: 18rem; margin-left: 100px;">
  <img class="card-img-top" src="<?php echo $userinfo['image_secondaire'] ?>" alt="Card image cap">
  <div class="card-body">
    <a class="btn btn-danger" href="suppression/p_image.php?supprimer=<?php echo $userinfo['id'] ?>">Supprimer Autre image<?php echo $lik  ?></a>
  </div>
</div>
     
    <!--Suppression des images-->
   
 
<?php $lik++;} ?>
  </div>

</div>
            </div>
          </div>
        </div>
      </div>
<!-- Début de la partie de création des catégorie-->
<?php 
$com = $bdd ->prepare('SELECT * FROM bloc WHERE nom_bloc="categories"');
 $com->execute(array($session));
 $userinf= $com->fetch();

 if ($userinf['activer']==1) {

 ?>
    <div class="container-fluid sticky" id="categorie">

    <div class="first meilleur" >
       <div style=" background-color: white;" >
          <h2 id="titre" class="text-center" style="color:#FF7D00"><?php echo $userinf['nom_bloc'] ?><span>-></span></h2><h6></h6>
        <div class="wrapper">
            <div class="owl-carousel owl-nav owl-theme">
              <?php 
$com = $bdd ->prepare('SELECT * FROM categories');
 $com->execute(array($session));

while ($userinf= $com->fetch()) {
 
 if ($userinf['confirme']==1) {
               ?>
    <div id="<?php echo $userinf['nom']; ?>" >
        <a href="#<?php echo $userinf['nom']; ?>e" class="btn my-2 my-sm-0" id="part"><?php echo $userinf['code']; ?></a>
    </div>
    
    <?php } } ?>

            </div>
        
        </div>
       </div>
    </div>
</div>
<?php } ?>
<style type="text/css">
    div.sticky {
  position: -webkit-sticky;
  position: sticky;
  top: 10px;
  z-index: 9;
}
 @media (min-width: 320px) and (max-width: 680px){
   div.sticky {
  position: -webkit-sticky;
  position: sticky;
  top: -50px;
  z-index: 9;
  width: 100%;

    padding-right: 5px;
    padding-left: 0px;

}
 }
/*1.64828187*/
</style>

<!-- fin  de la partie de création des catégorie-->
<script type="text/javascript">
  $('.carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
</script>
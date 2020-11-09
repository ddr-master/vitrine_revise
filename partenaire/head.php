<?php $con = $bdd ->prepare('SELECT * FROM principale WHERE id = 1');
  $con->execute(array($session));
  $userinfo = $con->fetch(); ?>
          <!--debut de l'entête de la navigation-->
  <nav class="container-fluid navbar navbar-expand-lg navbar-light" style="z-index: 9999; background-color: white;">
  <a class="navbar-brand" href="../index.php"><img src="../administration/profil/<?php echo $userinfo['logo']; ?>"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse menu" id="navbarSupportedContent" style="font-family: 'Montserrat', sans-serif;">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active" >
        <a class="nav-link" style="color:#FF7D00" href="../index.php">Akwaba</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../reduction.php"> bénéficier de réduction</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../partenaire.php">devenir partenaire</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../nousContacter.php">Nous contacter</a>
      </li>
    </ul>
    
      
    <a class="btn  my-2 my-sm-0" id="parte" type="submit" style=" background-color: #FF7D00;border-radius:7px; border: 3px solid  #FF7D00; color: white" >Devenir partenaire</a> &nbsp;&nbsp;&nbsp;

    <a class="btn  my-2 my-sm-0" id="parte" type="submit" style=" color: #FF7D00;border-radius:7px; border: 3px solid  #FF7D00; background-color: white;" >Espace partenaire</a>
   
   
  </div>
</nav>
<!--fin du debut de l'entête de la navigation-->
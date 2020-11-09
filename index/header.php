 <nav class="new container-fluid navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="index.php"><img class="image" style="width: 150px;" src="images/logo.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse menu " id="navbarSupportedContent" style="font-family: 'Montserrat', sans-serif;">
    <ul class="menu navbar-nav m-auto">
      <li class="nav-item active" >
        <a class="nav-link" style="color:#FF7D00" href="index.php"><?php echo $userinfo['menu1'] ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="reduction.php"> <?php echo $userinfo['menu2'] ?></a>
      </li>
      <!--li class="nav-item">
        <a class="nav-link" href="partenaire.php"><?php echo $userinfo['menu3'] ?></a>
      </li-->
      <li class="nav-item">
        <a class="nav-link" href="contact.php"><?php echo $userinfo['menu4']; ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php"><?php echo $userinfo['menu4']; ?></a>
      </li>
      <li class="nav-item">
        <a class="btn  my-2 my-sm-0" href="partenaire.php" id="parte"><?php echo $userinfo['menu5'] ?></a>
      </li>&nbsp;&nbsp;
      <li class="nav-item">
        <a class="btn  my-2 my-sm-0" style="background-color: white; color:#FF7D00" href="connexion.php" id="parte">Connexion</a>
      </li>

    </ul>
    
   
  </div>
  
</nav>
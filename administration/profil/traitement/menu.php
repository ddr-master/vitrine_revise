<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Vitrine</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Dernier access: 08h 37mn &nbsp; <a href="deconnexion.php" class="btn btn-danger square-btn-adjust">Se déconnecter</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img src="../1priiiiiiiiiiiiix.png" class="user-image img-responsive"/>
                    </li>
                
                    
                    <li>
                        <a class="active-menu"  href="index.php"><i class="fas fa-tachometer-alt fa-2x"></i>Tableau de bord</a>
                    </li>
                    <li>
                        <a href="principale.php"><i class="fas fa-people-carry fa-2x"></i>Page principale<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#"></a>
                            </li>
                            <li>
                                <a href="../principale.php?id=<?php echo $userinfo['id'] ?>">Modifier menu</a>
                            </li>
                            <li>
                                <a href="../slide.php?id=<?php echo $_SESSION['id'] ?>">Modifier slide et texte</span></a>
                            </li>
                            <li>
                                <a href="../ajouteCategorie.php?id=<?php echo $_SESSION['id'] ?>">Ajouter catégorie</span></a>
                            </li>
                            <li>
                                <a href="../suprimer_modifier_categorie.php?id=<?php echo $_SESSION['id'] ?>">Modifier / supprimer Categories</span></a>
                            </li>
                            <li>
                                <a href="../ville.php?id=<?php echo $_SESSION['id'] ?>">Modifier / supprimer Villes</span></a>
                            </li>
                             <li>
                                <a href="../publicite.php?id=<?php echo $_SESSION['id'] ?>">Espace partenaire</span></a>
                            </li>
                             <li>
                                <a href="../bloc.php?id=<?php echo $_SESSION['id'] ?>">Bloc</span></a>
                            </li>
                        </ul>
                    </li> 
                    <li>
                        <a href="#"><i class="fas fa-people-carry fa-2x"></i>Page devenir partenaire<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="../text_partenaire.php?id=<?php echo $_SESSION['id'] ?>">Ajouter text</span></a>
                            </li>
                            
                            <li>
                                <a href="../suprimer_modifier_text_partenaire.php?id=<?php echo $_SESSION['id'] ?>">Modifier / supprimer</span></a>
                            </li>
                        </ul>
                    </li>   
                    <li>
                        <a href="#"><i class="fas fa-people-carry fa-2x"></i>Partenaire<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="../partenaire.php?id=<?php echo $_SESSION['id'] ?>">Liste partenaires</span></a>
                            </li>
                            <li>
                                <a href="../consultation.php?id=<?php echo $_SESSION['id'] ?>">Publication</a>
                            </li>
                            <li>
                                <a href="../suprimer_modifier_categorie.php?id=<?php echo $_SESSION['id'] ?>">Modifier / supprimer</span></a>
                            </li>
                        </ul>
                    </li>  
                    <li>
                        <a href="#"><i class="fas fa-people-carry fa-2x"></i>Partenaires<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="../../suprimer_modifier_categorie.php?id=<?php echo $_SESSION['id'] ?>">Modifier / supprimer</span></a>
                            </li>
                            <li>
                                <a href="../../ajouter_resume_partenaire.php?id=<?php echo $_SESSION['id'] ?>">Ajouter Resumé</a>
                            </li>
                            <li>
                                <a href="../../ajouter_description_partenaire.php?id=<?php echo $_SESSION['id'] ?>">Ajouter Description</a>
                            </li>
                            <li>
                                <a href="../../suprimer_modifier_partenaire.php?id=<?php echo $_SESSION['id'] ?>">Modifier / supprimer</span></a>
                            </li>
                        </ul>
                    </li>  
                     
                </ul>
               
            </div>
            
        </nav>  
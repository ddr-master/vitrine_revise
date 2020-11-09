<?php 
if (isset($_GET['confirme']) AND !empty($_GET['confirme'])) {
    $confirmer = (int) $_GET['confirme'];

    $req = $bdd->prepare('UPDATE partenaire SET confirme = 1 WHERE id = ?');
    $req->execute(array($confirmer));
    }

 ?>
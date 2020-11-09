<?php 
$bdd = new PDO('mysql:host=localhost; dbname=vitrine','root');
//$bdd = new PDO('mysql:host=localhost;dbname=prixkdo_vitrine','prixkdo','P@ssword@10');

$con = $bdd ->prepare('SELECT * FROM horaire WHERE id_partenaire=?');
  $con->execute(array($session));
  $userin = $con->fetch();

 ?>
<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 28px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
<header style="background-color: #f68c1f; position: fixed-top; color:white"><h3>Nos horaires d'ouverture et de fermeture</h3></header>
      
      <p style="font-size: 26px; font-weight: bold; color: black;">Définisser vos horaires d'ouverture</p>
        <div class="container">
          <div class="row">
          	<div style="overflow-x:auto;">
  <table>
    <tr>
      <th></th>
       <?php 
$con = $bdd ->prepare('SELECT * FROM horaire WHERE id_partenaire=?');
  $con->execute(array($session));

while($userin = $con->fetch()){?>
	 <td><?php echo $userin['jours'] ?></td>
<?php }

       ?>
      
    </tr>
    <tr>
      <td style="background-color: black; color: white; text-transform: uppercase" >Heure d'ouverture</td>
      <?php 
$con = $bdd ->prepare('SELECT * FROM horaire WHERE id_partenaire=?');
  $con->execute(array($session));

while($userin = $con->fetch()){
      $ferm = $userin['Mouverture'];
  if ($ferm < 10 ) {?>
  
  <td><?php echo $userin['Houverture'].' : 0'.$userin['Mouverture'] ?></td>

<?php   }else{?> 
<td><?php echo $userin['Houverture'].' : '.$userin['Mouverture'] ?></td>

<?php }
}
       ?>
     
      
      
    </tr>
    <tr>
      <td style="background-color: black; color: white;text-transform: uppercase" >Heure de fermeture</td>
     
      <?php 
$con = $bdd ->prepare('SELECT * FROM horaire WHERE id_partenaire=?');
  $con->execute(array($session));

while($userin = $con->fetch()){
      $ferm = $userin['Mfermeture'];
  if ($ferm < 10 ) {?>
  
  <td><?php echo $userin['Hfermeture'].' : 0'.$userin['Mfermeture'] ?></td>

<?php   }else{?> 
<td><?php echo $userin['Hfermeture'].' : '.$userin['Mfermeture'] ?></td>

<?php }
}
       ?>
     
    </tr>
    <tr>
      <td style="background-color: black; color: red;text-transform: uppercase" >Action</td>
     
      <?php 
$con = $bdd ->prepare('SELECT * FROM horaire WHERE id_partenaire=?');
  $con->execute(array($session));

while($userin = $con->fetch()){?>
   <td><a class="btn btn-danger" href="suppression/date.php?supprimer=<?php echo $userin['id'] ?>">supprimer <?php echo $userin['jours']; ?></a></td>
   
<?php }

       ?>
     
    </tr>
  </table>
</div><br>
</div><br>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Ajouter  une date</button>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999999999">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="profil.php" method="POST">
        	<div class="row">

        		<div class="col-lg-6">
        			<label for="recipient-name" class="col-form-label">Heure d'ouverture</label>
        			<select>
        				
        	
        			</select>
            <select name="Houverture">
        				<?php 
        				$heure = 00;

        				while ($heure<=23) {?>
        					<option ><?php echo $heure." H" ?></option>
        			 <?php $heure++;}?>
        	</select>
        	<select name="Mouverture">
        				<?php 
        				$heur = 00;

        				while ($heur<=59) {?>
        					<option ><?php echo $heur." min" ?></option>
        			 <?php $heur++;}?>
        	</select>
           
        		</div>
        		<div class="col-lg-6">
        			<label for="recipient-name" class="col-form-label">Heure de fermeture</label>
        			<select>
        				
        	
        			</select>
            <select name="Hfermerture">
        				<?php 
        				$heu = 00;

        				while ($heu<=23) {?>
        					<option ><?php echo $heu."H" ?></option>
        			 <?php $heu++;}?>
        	</select>
        	<select name="Mfermerture">
        				<?php 
        				$he = 00;

        				while ($he<=59) {?>
        					<option ><?php echo $he." min" ?></option>
        			 <?php $he++;}?>
        	</select>
        		</div>
        	</div>
           <select name="jours" class="form-control" >
           	<option>-----selectionner un jour de la semaine------</option>
           	<option>Lundi</option>
           	<option>Mardi</option>
           	<option>Mercredi</option>
           	<option>Jeudi</option>
           	<option>Vendredi</option>
           	<option>Samedi</option>
           	<option>Dimanche</option>
           </select>
           <button name="hello" class="btn btn-primary">Sauvegarder</button>
        </form>
      </div><br>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        
      </div>
    </div>
  </div>
</div>
</div>
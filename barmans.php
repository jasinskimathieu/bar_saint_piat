<?php
$bdd = new PDO("mysql:host=localhost;dbname=bar_saint_piat", "root", "");
$bdd->query("SET lc_time_names = 'fr_FR'");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
  <title>Bar Saint-Piat</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <LINK href="style.css" rel="stylesheet" type="text/css">
</head>

<body>

<ul class="systeme_onglets">
  <li class="onglet_0 onglet"><a href="index.php">Opérations</a>
  <li class="onglet_0 onglet"><a href="consommateurs.php">Consommateurs</a>
  <li class="onglet_0 onglet"><a href="boissons.php">Boissons</a>
  <li class="onglet_0 onglet"><a href="recapitulatif.php">Récapitulatif</a>
</ul>
<h1>Ajouter un Aubergiste</h1>
            <form method="POST" action="">
            	<table style="width:100%;">
            		<tr>
            			<td style="width:50%;"><label class="consomateur">Pr&eacute;nom du barman : </label><input type="text" name="prenom_consommateur" class="consomateur"/></td>
            			<td style="width:50%;"><label class="consomateur">Nom du barman : </label><input type="text" name="nom_consommateur" class="consomateur"/></td>
            		</tr>
            		<tr>
            			<td colspan="4"><input type="submit" value="Ajouter un barman" name="submit_consommateur" class="submit"/></td>
            		</tr>
            	</table>
            </form> 
            <?php 
            	if(isset($_POST['submit_consommateur'])){
            		$nom = $_POST["nom_consommateur"];
            		$prenom = $_POST["prenom_consommateur"];
            		$sql = $bdd->query("INSERT INTO barmans (NOM, PRENOM) VALUES ('$nom', '$prenom')");
            		echo "<p class='green'>Le barman a bien &eacute;t&eacute; ajout&eacute;</p>";
            	}
            ?>
            <br/><br/><hr/><br/>
            <h1>Liste des barmans</h1> 
            <table class='tab_list'>
            	<tr>
            		<td><b>Nom des aubergistes</b></td>
            		<td><b>Supprimer</b></td>
            	</tr>
            	<?php
            	$req = $bdd->query("SELECT * FROM barmans");
            	while($liste_buveurs = $req->fetch())
            	{
            		$id_consommateur = $liste_buveurs['ID'];
            		echo "
            		<tr>
            			<td>".$liste_buveurs['NOM']. " ".$liste_buveurs['PRENOM']."</td>
            			<td><a href='delete_barman.php?id=".$id_consommateur."'><span class='x'>X</span></a></td>
            		</tr>
            		";
            	}

            	?>
            </table>
</body>
</html>
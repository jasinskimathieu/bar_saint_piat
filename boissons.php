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
            <h1>Liste des breuvages</h1> 
            <table class='tab_list'>
            	<tr>
            		<td><b>Nom de la boisson</b></td>
            		<td><b>Prix</b></td>
            		<td><b>Supprimer</b></td>
            		<td><b>Modifier</b></td>
            	</tr>
            	<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
            	<tr>
            	</tr>
            	<?php
            	$req = $bdd->query("SELECT * FROM boissons");
            	while($liste_boissons = $req->fetch())
            	{
            		$id = $liste_boissons['ID'];
            		echo "
            		<tr>
            			<td>".$liste_boissons['NOM_BOISSON']. "</td><td>".$liste_boissons['PRIX']."€</td>
            			<td><a href='delete_boisson.php?id=".$id."'><span class='x'>X</span></a></td>
            			<td><a href='edit_boisson.php?id=".$id."'><span class='x'>M</span></a></td>
            		</tr>
            		";
            	}

            	?>
            </table>
                 <br/><br/><hr/><br/>      
<h1>Ajouter une boisson</h1>
            <form method="POST" action="">
            	<table style="width:100%;">
            		<tr>
            			<td style="width:50%;"><label class="consomateur">Nom du breuvage : </label><input type="text" name="nom_boisson" class="consomateur"/></td>
            			<td style="width:50%;"><label class="consomateur">Prix du breuvage : </label><input type="text" name="prix_boisson" class="consomateur"/></td>
            		</tr>
            		<tr>
            			<td style="width:100%;" colspan="2"><select name="type_boisson" class="consomateur"><option value="1">Boisson alcoolisée</option><option value="2">Soft</option><option value="3">Nourriture</option></select></td>
            		</tr>
            		<tr>
            			<td style="width:100%;" colspan="2"><input type="submit" value="Ajouter une boisson" name="submit_boisson" class="submit"/></td>
            		</tr>
            	</table>
            </form> 
            <?php 
            	if(isset($_POST['submit_boisson'])){
            		$nom = $_POST["nom_boisson"];
            		$prix = str_replace(",", ".", $_POST["prix_boisson"]);
            		$type = $_POST["type_boisson"];
            		$sql = $bdd->query("INSERT INTO boissons (NOM_BOISSON, PRIX, TYPE_BOISSON) VALUES ('$nom', '$prix', '$type')");
            		echo "<p class='green'>La boisson a bien &eacute;t&eacute; ajout&eacute;</p>";
            	}
            ?>
</body>
</html>
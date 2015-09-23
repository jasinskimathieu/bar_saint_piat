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
<div class='content'>
<?php 
$somme = 0;
if(isset($_POST['paye'])){
	$id_buveur = $_POST['id_buveur'];
	$nom_r = $bdd->query("SELECT * FROM buveurs WHERE ID=$id_buveur");
	$nom_buveur = $nom_r->fetch();
	$nom = $nom_buveur['PRENOM'] . " " . $nom_buveur['NOM'];
	echo "<p>" . $nom . " a commandé : </p>";

	$boissons_r = $bdd->query("SELECT * FROM boissons");
	while($boissons = $boissons_r->fetch())
	{
		echo "<ul>";
		$id = $boissons['ID'];
		if($_POST[$id] != 0)
		{
			$nom_boisson = $boissons['NOM_BOISSON'];
			$quantite = $_POST[$id];
			$prix =  $boissons['PRIX'];
			$somme = $somme + ($quantite * $prix);
			echo "<li>" . $quantite . " " . $nom_boisson . "</li>";
		}
		echo "</ul>";
	}
	echo "<p><b>Valeur total à payer : " . $somme . "€</b></p>";
	?>
	<form action='enregistrement.php' method='POST'>
		<input type="hidden" name="id_buveur"  value="<?php echo $id_buveur; ?>"/>
		<input type="hidden" name="somme" value="<?php echo $somme; ?>"/>
		<input type="submit" name="payement_direct" value="Enregistrer la commande" class="submit"/>
	</form>
	<?php
}
if(isset($_POST['compte'])){
	$id_buveur = $_POST['id_buveur'];
	$nom_r = $bdd->query("SELECT * FROM buveurs WHERE ID=$id_buveur");
	$nom_buveur = $nom_r->fetch();
	$nom = $nom_buveur['PRENOM'] . " " . $nom_buveur['NOM'];
	echo "<p>" . $nom . " a commandé : </p>";

	$boissons_r = $bdd->query("SELECT * FROM boissons");
	while($boissons = $boissons_r->fetch())
	{
		echo "<ul>";
		$id = $boissons['ID'];
		if($_POST[$id] != 0)
		{
			$nom_boisson = $boissons['NOM_BOISSON'];
			$quantite = $_POST[$id];
			$prix =  $boissons['PRIX'];
			$somme = $somme + ($quantite * $prix);
			echo "<li>" . $quantite . " " . $nom_boisson . "</li>";
		}
		echo "</ul>";
	}
	echo "<p><b>Valeur total à mettre sur le compte : " . $somme . "€</b></p>";
	?>
	<form action='enregistrementbis.php' method='POST'>
		<input type="hidden" name="id_buveur"  value="<?php echo $id_buveur; ?>"/>
		<input type="hidden" name="somme" value="<?php echo $somme; ?>"/>
		<input type="submit" name="compte_bar" value="Enregistrer la commande" class="submit"/>
	</form>
	<?php
}
?>


</div>
</body>
</html>
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

<form action='operations.php' method='POST'>
<table style="width:100%;">
	<tr>
		<td>
			<select name="id_buveur" class="consomateur-operation">
				<?php
				$liste_cons_r = $bdd->query("SELECT * FROM buveurs ORDER BY NOM");
				while($liste_cons = $liste_cons_r->fetch()){
				echo "<option class='consomateur' value='".$liste_cons['ID']."'>".$liste_cons['NOM']." ".$liste_cons['PRENOM']."</option>";
				}
				?>
			</select>
		</td>
		<td><input type='submit' value='Payer directement' class='submit-operation' name='paye'></td>
		<td><input type='submit' value='Mettre sur le compte' class='submit-operation' name='compte'></td>
	</tr>
</table>
<br/><br/>
<div class='inline'>
<table style="width:33%; padding-left:6%;">
<?php
	$boisson_r = $bdd->query("SELECT * FROM boissons WHERE TYPE_BOISSON=1");
	while($boisson = $boisson_r->fetch())
	{
		echo "<tr><td><label class='consomateurss'>".$boisson['NOM_BOISSON']."</label></td><td><input class='consomateurss' name='".$boisson['ID']."' type='number' value='0'/></td></tr>";
	}
?>
</table>
<table style="width:33%; padding-left:6%;">
<?php
	$boisson_r = $bdd->query("SELECT * FROM boissons WHERE TYPE_BOISSON=2");
	while($boisson = $boisson_r->fetch())
	{
		echo "<tr><td><label class='consomateurss'>".$boisson['NOM_BOISSON']."</label></td><td><input class='consomateurss' name='".$boisson['ID']."' type='number' value='0'/></td></tr>";
	}
?>
</table>
<table style="width:33%; padding-left:6%;">
<?php
	$boisson_r = $bdd->query("SELECT * FROM boissons WHERE TYPE_BOISSON=3");
	while($boisson = $boisson_r->fetch())
	{
		echo "<tr><td><label class='consomateurss'>".$boisson['NOM_BOISSON']."</label></td><td><input class='consomateurss' name='".$boisson['ID']."' type='number' value='0'/></td></tr>";
	}
?>
</table>
</div>
</form>

</body>
</html>
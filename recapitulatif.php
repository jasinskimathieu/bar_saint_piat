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

<div class="content">
	<form action='' method="POST">
		<select name="id_buveur" class="consomateur-operation">
			<?php
			$liste_cons_r = $bdd->query("SELECT * FROM buveurs ORDER BY NOM");
			while($liste_cons = $liste_cons_r->fetch()){
			echo "<option class='consomateur' value='".$liste_cons['ID']."'>".$liste_cons['NOM']." ".$liste_cons['PRENOM']."</option>";
			}
			?>
		</select>
		<input type="submit" name="recap" class="submit" value="Voir le récapitulatif"/>
	</form>
	<br/><br/>
	<table  style="margin-left:23%; text-align:center;" cellpadding="5px">
		<tr>
			<td style="width:20%"><b>Date</b></td>
			<td style="width:20%"><b>Type d'opération</b></td>
			<td style="width:20%"><b>Somme</b></td>
		</tr>
	<?php
		if(isset($_POST['recap'])){
			$id_consommateur = $_POST['id_buveur'];
			$recap_r = $bdd->query("SELECT DATE_FORMAT(DATE_JOUR, '%d %M %Y') AS DATE_J, ID_CONSOMMATEUR, TYPE_OPERATION, PRIX FROM operations WHERE ID_CONSOMMATEUR=$id_consommateur ORDER BY DATE_JOUR");
			while($recap = $recap_r->fetch())
			{
				if($recap['TYPE_OPERATION'] ==1)
					$class="compte";
				else if($recap['TYPE_OPERATION'] ==2)
					$class="argent";
				else if($recap['TYPE_OPERATION'] ==3)
					$class="direct";
				echo "<tr><td> <span class='$class'>".$recap['DATE_J']."</span></td>";
				$id = $recap['TYPE_OPERATION'];

				$op_r = $bdd->query("SELECT * FROM type_operation WHERE ID=$id");
				$op = $op_r->fetch();
				$operation = $op['OPERATIONS'];

				echo "<td> <span class='$class'>".$operation."</span></td>";
				echo "<td> <span class='$class'><b>".$recap['PRIX']."€</b></span></td></tr>";

			}
		}
	?>
	</table>
</div>

</body>
</html>
<?php
$bdd = new PDO("mysql:host=localhost;dbname=bar_saint_piat", "root", "");
$bdd->query("SET lc_time_names = 'fr_FR'");
		if(isset($_POST["compte_bar"]))
		{
			$id_buveur = $_POST['id_buveur'];
			$somme = $_POST['somme'];
			$sql = $bdd->query("INSERT INTO operations(TYPE_OPERATION, ID_CONSOMMATEUR, PRIX) VALUES (1, $id_buveur, $somme)");
			$conso_r = $bdd->query("SELECT * FROM buveurs WHERE ID=$id_buveur");
			$conso = $conso_r->fetch();
			$balance = $conso['BALANCE'];
			$balance = $balance - $somme;
			$req = $bdd->query("UPDATE buveurs SET BALANCE=$balance WHERE ID=$id_buveur");
		} header("Location:index.php");

?>
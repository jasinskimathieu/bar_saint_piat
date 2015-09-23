<?php
$bdd = new PDO("mysql:host=localhost;dbname=bar_saint_piat", "root", "");
$bdd->query("SET lc_time_names = 'fr_FR'");
		if(isset($_POST["payement_direct"]))
		{
			$id_buveur = $_POST['id_buveur'];
			$somme = $_POST['somme'];
			$sql = $bdd->query("INSERT INTO operations(TYPE_OPERATION, ID_CONSOMMATEUR, PRIX) VALUES (3, $id_buveur, $somme)");
		} header("Location:index.php");

?>
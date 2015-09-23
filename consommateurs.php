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
<h1>Liste des buveurs de houblons</h1> 
            <table class='tab_list'>
                <tr>
                    <td><b>Nom des ivrognes</b></td>
                    <td><b>Compte bar</b></td>
                    <td><b>Ajouter argent</b></td>
                    <td><b>Supprimer</b></td>
                </tr>
                <?php
                $req = $bdd->query("SELECT * FROM buveurs ORDER BY NOM");
                while($liste_buveurs = $req->fetch())
                {
                    $id_consommateur = $liste_buveurs['ID'];
                    echo "
                    <tr>
                        <td>".$liste_buveurs['NOM']. " ".$liste_buveurs['PRENOM']."</td>
                        <td>".$liste_buveurs['BALANCE']. "€</td>
                        <td><a href='ajout_argent.php?id=".$id_consommateur."'><span class='x'>A</span></a></td>
                        <td><a href='delete_consommateur.php?id=".$id_consommateur."'><span class='x'>X</span></a></td>
                    </tr>
                    ";
                }

                ?>
            </table>
            <br/><br/><hr/><br/>
<h1>Ajouter un déglutineur de bière </h1>
            <form method="POST" action="">
            	<table style="width:100%;">
            		<tr>
                        <td style="width:50%;"><label class="consomateur">Nom du déglutineur / Equipe : </label><input type="text" name="nom_consommateur" class="consomateur"/></td>
            			<td style="width:50%;"><label class="consomateur">Pr&eacute;nom du déglutineur : </label><input type="text" name="prenom_consommateur" class="consomateur"/></td>
            		</tr>
            		<tr>
            			<td colspan="4"><input type="submit" value="Ajouter un déglutineur ou une &eacute;quipe" name="submit_consommateur" class="submit"/></td>
            		</tr>
            	</table>
            </form> 
            <?php 
            	if(isset($_POST['submit_consommateur'])){
            		$nom = $_POST["nom_consommateur"];
            		$prenom = $_POST["prenom_consommateur"];
            		$sql = $bdd->query("INSERT INTO buveurs (NOM, PRENOM) VALUES ('$nom', '$prenom')");
            		echo "<p class='green'>Le buveur a bien &eacute;t&eacute; ajout&eacute;</p>";
            	}
            ?>            
</body>
</html>
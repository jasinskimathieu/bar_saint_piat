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
<?php
$id = $_GET['id'];
$sql = $bdd->query("SELECT * FROM barmans WHERE ID = $id");
$buveur = $sql->fetch();

?>
<div class="corps">
    <h1>Suppression d'un aubergiste !</h1>
    <p>Voulez-vous vraiment supprimer <b><?php echo $buveur['PRENOM'] . " " . $buveur['NOM']; ?></b> de la liste des barmans</p>
    <form action="" method="POST">
        <input type="submit" value="Oui" name="submit_yes" class="submit">
        <input type="submit" value="Non" name="submit_no" class="submit">
    </form>
    <?php 
    if(isset($_POST['submit_yes'])){
        $del = $bdd->query("DELETE FROM barmans WHERE ID=$id");
        header("Location:barmans.php");
    }
    else if(isset($_POST['submit_no'])){
        header("Location:barmans.php");
    }

    ?>
</div>
</body>
</html>
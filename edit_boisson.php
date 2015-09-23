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
$sql = $bdd->query("SELECT * FROM boissons WHERE ID = $id");
$boisson = $sql->fetch();

?>
<div class="corps">
    <h1>Modification d'une boisson !</h1>
    <form action="" method="POST">
        <label class="consomateur">Prix de la/du <?php echo $boisson['NOM_BOISSON'] ?></label><input type="text" name="prix" class="consomateur">
        <input type="submit" value="Modifier le prix" name="edit" class="submit">
    </form>
    <?php 
    if(isset($_POST['edit'])){
        $prix = str_replace(",", ".", $_POST["prix"]);
        $ed = $bdd->query("UPDATE boissons SET PRIX=$prix WHERE ID=$id");
        header("Location:boissons.php");
    }
    ?>
</div>
</body>
</html>
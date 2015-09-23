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
$sql = $bdd->query("SELECT * FROM buveurs WHERE ID = $id");
$buveur = $sql->fetch();

?>
<div class="corps">
    <h1>Ajouter de l'argent</h1>
    <form action="" method="POST">
        <label class="consomateur">Somme d'argent à ajouter pour <?php echo $buveur['PRENOM'] . " " . $buveur['NOM']; ?></label><input type="text" name="prix" class="consomateur">
        <input type="submit" value="Ajouter de l'argent" name="edit" class="submit">
    </form>
    <?php 
    if(isset($_POST['edit'])){
        $prix = str_replace(",", ".", $_POST["prix"]);
        $balance = $buveur['BALANCE'];
        $balance = $balance + $prix;
        $ed = $bdd->query("UPDATE buveurs SET BALANCE=$balance WHERE ID=$id");
        $sql = $bdd->query("INSERT INTO operations (TYPE_OPERATION, ID_CONSOMMATEUR, PRIX) VALUES (2, $id, $prix)");
        header("Location:consommateurs.php");
    }
    ?>
</div>
</body>
</html>
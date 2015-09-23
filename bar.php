<script type="text/javascript">
    //<!--
            function change_onglet(name)
            {
                    document.getElementById('onglet_'+anc_onglet).className = 'onglet_0 onglet';
                    document.getElementById('onglet_'+name).className = 'onglet_1 onglet';
                    document.getElementById('contenu_onglet_'+anc_onglet).style.display = 'none';
                    document.getElementById('contenu_onglet_'+name).style.display = 'block';
                    anc_onglet = name;
            }
    //-->
</script>
<?php
$bdd = new PDO("mysql:host=localhost;dbname=bar_saint_piat", "root", "");
$bdd->query("SET lc_time_names = 'fr_FR'");
?>
<div class="systeme_onglets">
        <div class="onglets">
        	<span class="onglet_0 onglet" id="onglet_seriea" onclick="javascript:change_onglet('seriea');">Op&eacute;rations</span>
            <span class="onglet_0 onglet" id="onglet_serieb" onclick="javascript:change_onglet('serieb');">Consommateurs</span>
            <span class="onglet_0 onglet" id="onglet_seriec" onclick="javascript:change_onglet('seriec');">Barmans</span>
            <span class="onglet_0 onglet" id="onglet_seried" onclick="javascript:change_onglet('seried');">R&eacute;capitulatif</span>
            <span class="onglet_0 onglet" id="onglet_seriee" onclick="javascript:change_onglet('seriee');">Boissons</span>
        </div>
        <div class="contenu_onglets">
            <div class="contenu_onglet" id="contenu_onglet_seriea">  
            	      
            </div>
            <div class="contenu_onglet" id="contenu_onglet_serieb">
            <h1>Ajouter un consommateur</h1>
            <form method="POST" action="">
            	<table style="width:100%;">
            		<tr>
            			<td style="width:25%;"><label class="consomateur">Pr&eacute;nom du consommateur | Equipe</label></td>
            			<td style="width:25%;"><input type="text" name="prenom_consommateur" class="consomateur"/></td>
            			<td style="width:25%;"><label class="consomateur">Nom du consommateur | Lettre</label></td>
            			<td style="width:25%;"><input type="text" name="nom_consommateur" class="consomateur"/></td>
            		</tr>
            		<tr>
            			<td colspan="4"><input type="submit" value="Ajouter un consommateur ou une &eacute;quipe" name="submit_consommateur" class="submit"/></td>
            		</tr>
            	</table>
            </form> 
            <?php 
            	if(isset($_POST['submit_consommateur'])){
            		$nom = $_POST["nom_consommateur"];
            		$prenom = $_POST["prenom_consommateur"];
            		$sql = $bdd->query("INSERT INTO buveurs (NOM, PRENOM) VALUES ('$nom', '$prenom')");
            		echo "<p class='green'>Le consommateur a bien &eacute;t&eacute; ajout&eacute;</p>";
            	}
            ?>
            <h1>Liste des consommateurs</h1> 
            <table class='tab_list'>
            	<tr>
            		<td><b>Nom du consommateur</b></td>
            		<td><b>Supprimer</b></td>
            	</tr>
            	<?php
            	$req = $bdd->query("SELECT * FROM buveurs");
            	while($liste_buveurs = $req->fetch())
            	{
            		echo "
            		<tr>
            			<td>".$liste_buveurs['NOM']. " ".$liste_buveurs['PRENOM']."</td>
            			<td><span class='x'>X</span></td>
            		</tr>
            		";
            	}

            	?>
            </table>
            </div>
            <div class="contenu_onglet" id="contenu_onglet_seriec">
            <h1>Ajouter un barman</h1>
            <form method="POST" action="">
            	<table style="width:100%;">
            		<tr>
            			<td style="width:25%;"><label class="consomateur">Pr&eacute;nom du barman | Equipe</label></td>
            			<td style="width:25%;"><input type="text" name="prenom_barman" class="consomateur"/></td>
            			<td style="width:25%;"><label class="consomateur">Nom du barman | Lettre</label></td>
            			<td style="width:25%;"><input type="text" name="nom_barman" class="consomateur"/></td>
            		</tr>
            		<tr>
            			<td colspan="4"><input type="submit" value="Ajouter un barman ou une &eacute;quipe" name="submit_barman" class="submit"/></td>
            		</tr>
            	</table>
            </form> 
            <?php 
            	if(isset($_POST['submit_barman'])){
            		$nom = $_POST["nom_barman"];
            		$prenom = $_POST["prenom_barman"];
            		$sql = $bdd->query("INSERT INTO barmans (NOM, PRENOM) VALUES ('$nom', '$prenom')");
            		echo "<p class='green'>Le barman a bien &eacute;t&eacute; ajout&eacute;</p>";
            	}
            ?>
            <h1>Liste des barmans</h1> 
            <table class='tab_list'>
            	<tr>
            		<td><b>Nom du barman</b></td>
            		<td><b>Supprimer</b></td>
            	</tr>
            	<?php
            	$req = $bdd->query("SELECT * FROM barmans");
            	while($liste_buveurs = $req->fetch())
            	{
            		echo "
            		<tr>
            			<td>".$liste_buveurs['NOM']. " ".$liste_buveurs['PRENOM']."</td>
            			<td><span class='x'>X</span></td>
            		</tr>
            		";
            	}

            	?>
            </table>
            </div>
            <div class="contenu_onglet" id="contenu_onglet_seried">
            <p>reussi</p>
            </div>
            <div class="contenu_onglet" id="contenu_onglet_seriee">
                        <h1>Ajouter une boisson</h1>
            <form method="POST" action="">
            	<table style="width:100%;">
            		<tr>
            			<td style="width:25%;"><label class="consomateur">Nom de la boisson</label></td>
            			<td style="width:25%;"><input type="text" name="nom_boisson" class="consomateur"/></td>
            			<td style="width:25%;"><label class="consomateur">Prix</label></td>
            			<td style="width:25%;"><input type="text" name="prix_boisson" class="consomateur"/></td>
            		</tr>
            		<tr><td><br/><br/></td><td></td><td></td><td></td></tr>
            		<tr>
            			<td style="width:25%;"><label class="consomateur">Type de consommation</label></td>
            			<td style="width:25%;"><select name="type_boisson">
            										<option value="1">Boissons Alcoolis&eacute;es</option>
            										<option value="2">Softs</option>
            										<option value="3">Nourriture</option>
            								   </select></td>
            			<td style="width:50%;" colspan="2"><input type="submit" value="Ajouter une boisson" name="submit_boisson" class="submit_boisson"/></td>
            		</tr>
            	</table>
            </form> 
            <?php 
            	if(isset($_POST['submit_boisson'])){
            		$nom_boisson = $_POST["nom_boisson"];
            		$prix_boisson = $_POST["prix_boisson"];
            		$type_boisson = $_POST["type_boisson"];
            		$sql = $bdd->query("INSERT INTO boissons (NOM_BOISSON, PRIX, TYPE_BOISSON) VALUES ('$nom_boisson', '$prix_boisson', $type_boisson)");
            		echo "<p class='green'>La boisson a bien &eacute;t&eacute; ajout&eacute;e</p>";
            	}
            ?>
            <h1>Liste des boissons</h1> 
            <table class='tab_list'>
            	<tr>
            		<td><b>Nom de la boisson</b></td>
            		<td><b>Prix</b></td>
            		<td><b>Supprimer</b></td>
            	</tr>
            	<?php
            	$req1 = $bdd->query("SELECT * FROM boissons");
            	while($liste_boissons = $req1->fetch())
            	{
            		echo "
            		<tr>
            			<td>".$liste_boissons['NOM_BOISSON']."</td>
            			<td>".$liste_boissons['PRIX']."</td>
            			<td><span class='x'>X</span></td>
            		</tr>
            		";
            	}

            	?>
            </table>
            </div>
        </div>
</div>
<script type="text/javascript">
    //<!--
    var anc_onglet = 'seriea';
    change_onglet(anc_onglet);
    //-->
</script>
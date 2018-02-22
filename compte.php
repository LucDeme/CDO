
<?php
include("./navbar.php");
include("./menu.php");

try
{
	echo '<br />';
    $bdd = new PDO('mysql:host=localhost;dbname=CDO;charset=utf8', 'root', 'root');
    // echo'connexion OK <br />'; border="1" width="70%" align="center"
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
$reponse = $bdd->query('SELECT * FROM reservation, document' ); // IL FAUT FINIR LINNER JOIN POUR NOM PRENOM STAGIAIRE
$nom = $bdd->query('SELECT * FROM utilisateur');
$pret = $bdd->query('SELECT * FROM pret');
?>
<!--SELECT * FROM stage inner join entreprise on stage.id_entreprise=entreprise.id_entreprise'*/
-->
<?php $tab = $nom->fetch();?>
<body>   
<h2 id="titreco">Bonjour <b><?php echo $tab['Nomutilisateur'];?></b> bienvenue sur votre espace perso </h2 ><p id="titreco"> demander ralonge de pret
Listes de vos ouvrages emprunté:</p>
<h1 id="titreco">reservation</h1>
<table class="tblcontact" >
<br>
  <tr>
    <th>ID reservation</th>
    <th>Titre document</th>
    <th>Auteur</th>
    <th>Date reservation</th>
  </tr> 

  <?php //on affiche les ligne du tableau avec la boucle while
  while ($tabs = $reponse->fetch())
  {

  ?>

  <tr>
    <td><?php echo $tabs['Idreservation'];?></td>
    <td><?php echo $tabs['Titredocument'];?></td>
    <td><?php echo $tabs['NomAuteurDocument'];?></td>
    <td><?php echo $tabs['datereservation'];?></td>
  </tr>
<?php
}
?>
</table>

</body>

<h1  id="titreco">pret</h1>
<table class="tblcontact" >
  <br>
    <tr>
      <th>ID Pret</th>
      <th>Date début de pret</th>
      <th>Date fin de Pret</th>
      <th>Nom pret</th>
    </tr>     

  <?php //on affiche les ligne du tableau avec la boucle while
  while ($donnee = $pret->fetch())
  {
  ?>
  
  <tr>
    <td><?php echo $donnee['IDpret'];?></td>
    <td><?php echo $donnee['Datedebpret'];?></td>
    <td><?php echo $donnee['Datefinpret'];?></td>
    <td><?php echo $donnee['Nompret'];?></td>
  </tr>
  
  <?php
   }
   $reponse->closeCursor(); //libère la connexion du serveur, permettant ainsi à d'autres requêtes SQL d'être exécutées
  ?>
</table>
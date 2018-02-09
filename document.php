<link rel="stylesheet" href="./gg.css" >
<link rel="stylesheet" href="./navbar.php" >

<?php
include("./navbar.php");
include("./menu.php");

try
{
	echo '<br />';
    $bdd = new PDO('mysql:host=localhost;dbname=CDO;charset=utf8', 'root', '');
    $bdd = new PDO('mysql:host=localhost;dbname=CDO;charset=utf8', 'root', 'root');
 // echo'connexion OK <br />';
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
$reponse = $bdd->query('SELECT * FROM document group by Titredocument');

?>
<br>
    <table class="tblstage" >

      <tr>
        <th><b></b></th>
        <th><b>resumé</b></th>
          <th><b>Titre document</b></th>
          <th>Auteur document</th>
          <th>Theme document</th>
          <th>Type document</th>
          <th>Editeur document</th>
          <th>Réserver</th>
      </tr>
    <?php //on affiche les ligne du tableau avec la boucle while
while ($donnees = $reponse->fetch())
{ ?>
  <tr>
      <th><?php echo "<input type='hidden' name='tab[".$donnees['IDdocument']."]' value='".$donnees['IDdocument']."'>" ?>
      <th><?php echo $donnees['ResumeDocument'];?></th>
      <th><?php echo $donnees['Titredocument'];?></th>
      <th><?php echo $donnees['NomAuteurDocument'];?></th>
      <th><?php echo $donnees['ThemeDocument'];?></th>
      <th><?php echo $donnees['TypeDocument'];?></th>
      <th><?php echo $donnees['EditeurDocument'];?></th>
      <?php $reference =  $donnees['IDdocument']."¤".$donnees['Titredocument']."¤".$donnees['NomAuteurDocument']."¤".$donnees['ThemeDocument']."¤".$donnees['TypeDocument']
      ."¤".$donnees['EditeurDocument']."¤".$donnees['ResumeDocument']; ?>
      <th><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalReserver_"
       onclick="test('<?php echo $reference; ?>')">Réserver</button></th>
  </tr>

<?php }
$reponse->closeCursor();
?>
</table>
<!-- Modal -->
<div class="modal fade" id="ModalReserver_" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Réserver un document</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 
        <span id="info"></span> <br>
        <form action="action.php" method="post">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" value="Sauvegarder" />
      </form>
      </div>
    </div>
  </div>
</div>




</body>
<script type="text/javascript">
 
function test(reference){
 
var tabref = reference.split("¤");

document.getElementById("info").innerHTML = "<b>Titre</b> : " + tabref[1] + " <br><b>Nom auteur</b> : " + tabref[2]  +" <br><b>TypeDocument </b>: " + tabref[4]+" <br><b>Resume Document </b>: " + tabref[6] ;

  
}

</script>
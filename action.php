<?php
try
{
	echo '<br />';
    $bdd = new PDO('mysql:host=localhost;dbname=cdo;charset=utf8', 'root', 'root');  //on declare un obget pdo et on précise la bdd identifiant..;
    // echo'connexion OK <br />'; border="1" width="70%" align="center"
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

try{
	
	//$datereservation = $_POST['datereservation'];
	 //echo date_format($dateres, 'Y-m-d');
	//date("d-M-Y", mktime($dateres));
	//$datereservation = $_POST['datereservation'];
	//$dateres = date('Y-m-d',mktime($datereservation));
	//var_dump($dateres);
//	$NOM_STAGIAIRE = $_POST['NOM_STAGIAIRE'];
	//$nomstagiaire = $_POST['nomsta'];
	//$prenomstagiaire = $_POST['prenomsta'];

	$strSQL = "INSERT INTO reservation(datereservation) values(NOW())";
	if($bdd->exec($strSQL)) {
		echo "reservation effectué<br />";
	}
	/*$last = $bdd->lastInsertId();
	$strSQL = "INSERT INTO tuteur(NOM_TUTEUR) values ('$tuteur')";
	if($bdd->query($strSQL)) {
		echo "Tuteur add";

	}

	/*$reqSQL = "INSERT INTO stage(ID_ENTREPRISE, ID_TUTEUR, ANNEE_STAGE, CLASSE_STAGE) values ('$last', '".$bdd->lastInsertId()."' ,'$annee','$classe')";
	if($bdd->query($reqSQL)) {
		echo "Stage ajouté";
	}*/
   // $strSQL = "INSERT INTO stagiaire(NOM_STAGIAIRE) values('$NOM_STAGIAIRE')";
	//if($bdd->query($strSQL)) {
	//	echo "Entreprise ajouté<br />";
	//}
	//$reqSQL = "INSERT INTO stagiaire(NOM_STAGIAIRE, PRENOM_STAGIAIRE) values ('$last', '".$bdd->lastInsertId()."' ,'$nomsta','$prenoms')";
	//if($bdd->query($reqSQL)) {
		//echo "Stage ajouté";
	//}
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
<html>
<meta http-equiv="refresh" content="nb_secondes; url=destination.php" />
</html>
<?php

//$strSQL = "INSERT INTO entreprise(NOM_ENTREPRISE) values('" . $_POST["NOM_ENTREPRISE"] . "')";
//echo $strSQL;

//$bdd->query('INSERT INTO entreprise(NOM_ENTREPRISE) values(' . $_POST["NOM_ENTREPRISE"] . ')');&
?>
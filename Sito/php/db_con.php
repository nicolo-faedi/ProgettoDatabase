<?php     //connessione al nostro database
	$address = "localhost:8080";
	$admin= "root";
	$password = "";
	$db_name = "postit_db";

	$connessione_al_server = mysql_connect($address , $admin , $password);
	if(!$connessione_al_server){
		die ('Non riesco a connettermi: errore '.mysql_error()); // questo apparirà solo se ci sarà un errore
	}

	$db_selected = mysql_select_db($db_name , $connessione_al_server); // dove io ho scritto "prova" andrà inserito il nome del db
	if(!$db_selected){
		die ('Errore nella selezione del database: errore '.mysql_error()); // se la connessione non andrà a buon fine apparirà questo messaggio
	}
 
?>
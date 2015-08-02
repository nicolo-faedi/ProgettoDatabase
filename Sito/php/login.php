<?php

	//Apro la sessione
	session_start();// come sempre prima cosa, aprire la sessione 
	// include il file di connessione al database
	include("db_con.php"); // Include il file di connessione al database

	$_SESSION["username"]=$_POST["username"]; 
	$_SESSION["password"]=$_POST["password"];
	$query = mysql_query("SELECT * FROM utenti WHERE email='".$_POST["username"]."' AND password ='".$_POST["password"]."'")  
	or DIE('query non riuscita'.mysql_error());

	//se c'è una persona con quel nome nel db allora loggati
	if(mysql_num_rows($query) == 1){
		// metto i risultati dentro una variabile di nome $row        
		$row = mysql_fetch_row($query); 
		$_SESSION["logged"] = true;  // Nella variabile SESSION associo TRUE al valore logged
		echo "Login effettuato con successo" ; 

		// ottengo l'id dell'utente
		$id = $row[0];


		// e mando per esempio ad una pagina esempio.php// in questo caso rimanderò ad una pagina prova.php
		header("Location: /Sito/profile.php?id=".$id."&nome=".$row[1]."&cognome=".$row[2]."&tipo=".$row[5]);
		die();
	}else{
		echo "non ti sei registrato con successo"; // altrimenti esce scritta a video questa stringa di errore
	}
?>
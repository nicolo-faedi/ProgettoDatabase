<?php
session_start(); // dive essere la prima cosa nella pagina, aprire la sessione
include("db_con.php"); // includo il file di connessione al database
if($_POST["nome"] != "" && $_POST["cognome"]!= "" && $_POST["email"] != "" && $_POST["password"] != "" && $_POST["tipo"] != "Tipo utente"){  // se i parametri iscritto non sono vuoti non sono vuote
$query_registrazione = mysql_query("INSERT INTO utenti (nome,cognome,email,password,tipo)
VALUES ('".$_POST["nome"]."','".$_POST["cognome"]."','".$_POST["email"]."','".$_POST["password"]."','".$_POST["tipo"]."')") // scrivo sul DB questi valori
or die ("query di registrazione non riuscita".mysql_error()); // se la query fallisce mostrami questo errore
}else{
	echo "non hai compilato tutti i campi obbligatori\n";
//header('location:index.php?action=registration&errore=Non hai compilato tutti i campi obbligatori'); // se le prime condizioni non vanno bene entra in questo ramo else
}
if(isset($query_registrazione)){ //se la reg è andata a buon fine
$_SESSION["logged"]=true; //restituisci vero alla chiave logged in SESSION
header("location:index.php");
}else{
echo "non ti sei registrato con successo"; // altrimenti esce scritta a video questa stringa
}
?>
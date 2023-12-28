<?php
	$host = "localhost";
	$usuario = "root";
	$senha_servidor = "";
	$banco = "regional_kanban";

	$conn = new mysqli($host,$usuario,$senha_servidor,$banco);

	if(mysqli_connect_errno()){
		die ("<meta http-equiv='refresh' content='30;URL='>Desculpe o transtorno, estamos com um pouco de lentidão devido ao alto tráfego.<br> Por favor aguarde alguns minutos...");
	}
	
?>
<?php
	
	// Acesso ao BD - PHPMYSQL
	include "conexaoMySQL.inc";
		
	// Inicia a Sessão 
	session_start();
	
	// Fim Sessão
	session_destroy();
	unset($_SESSION['cpf_Eleitor']); // Testar
	unset($_SESSION['senha_Voto']);  // Testar
	header('location:index.html');

	// Conexão 	
	mysql_close($conexao);
?>


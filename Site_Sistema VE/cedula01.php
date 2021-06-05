<?php

	// Site

	// Acesso ao BD - PHPMYSQL
	include "conexaoMySQL.inc";   
	
	// Inicia a Sessão 
	session_start();
	
	// Valida Sessão o CPF e Senha na sessão
    if ( !isset($_SESSION['cpf_Eleitor']) and !isset($_SESSION['senha_Voto']) ) 
	{
		session_destroy();
		unset ($_SESSION['cpf_Eleitor']);
		unset ($_SESSION['senha_Voto']);
		header('location:index.html');
	}
	
else 
	{
	
	// Captura dados do Formulário
	$cpf_Eleitor = $_SESSION['cpf_Eleitor'];
	$senha_Voto =  $_SESSION['senha_Voto'];

	
	
	// Captura dados do Formulário
	$g1 = $_POST["p1"];
	$g2 = $_POST["p2"];
	$g3 = $_POST["p3"];

	$g4 = $_POST["p4"];
	$g5 = $_POST["p5"];
	$g6 = $_POST["p6"];

	$g7 = $_POST["p7"];
	$g8 = $_POST["p8"];
	$g9 = $_POST["p9"];

	$g10 = $_POST["p10"];
	$g11 = $_POST["p11"];
	$g12 = $_POST["p12"];

	$g13 = $_POST["p13"];
	$g14 = $_POST["p14"];
	$g15 = $_POST["p15"];

	$g16 = $_POST["p16"];
	$g17 = $_POST["p17"];
	$g18 = $_POST["p18"];

	$g19 = $_POST["p19"];
	$g20 = $_POST["p20"];
	$g21 = $_POST["p21"];
	$g22 = $_POST["p22"];
		
	if($g1 != '')
	{
		$consulta1 = "INSERT INTO VOTACAO (CPF, PROJETO, DATAHORA)VALUES"."('$cpf_Eleitor','$g1',now())"; 		  
		mysql_query($consulta1);
	}

	if($g2 != '')
	{
		$consulta1 = "INSERT INTO VOTACAO (CPF, PROJETO, DATAHORA)VALUES"."('$cpf_Eleitor','$g2',now())"; 
		mysql_query($consulta1);
	}	
	
	if($g3 != '')
	{
		$consulta1 = "INSERT INTO VOTACAO (CPF, PROJETO, DATAHORA)VALUES"."('$cpf_Eleitor','$g3',now())"; 
		mysql_query($consulta1);
	}	


	if($g4 != '')
	{
		$consulta1 = "INSERT INTO VOTACAO (CPF, PROJETO, DATAHORA)VALUES"."('$cpf_Eleitor','$g4',now())"; 
		mysql_query($consulta1);
	}	

	if($g5 != '')
	{
		$consulta1 = "INSERT INTO VOTACAO (CPF, PROJETO, DATAHORA)VALUES"."('$cpf_Eleitor','$g5',now())"; 
		mysql_query($consulta1);
	}	
	
	
	if($g6 != '')
	{
		$consulta1 = "INSERT INTO VOTACAO (CPF, PROJETO, DATAHORA)VALUES"."('$cpf_Eleitor','$g6',now())"; 
		mysql_query($consulta1);
	}	

	if($g7 != '')
	{
		$consulta1 = "INSERT INTO VOTACAO (CPF, PROJETO, DATAHORA)VALUES"."('$cpf_Eleitor','$g7',now())"; 
		mysql_query($consulta1);
	}	
	
	if($g8 != '')
	{
		$consulta1 = "INSERT INTO VOTACAO (CPF, PROJETO, DATAHORA)VALUES"."('$cpf_Eleitor','$g8',now())"; 
		mysql_query($consulta1);
	}	

	if($g9 != '')
	{
		$consulta1 = "INSERT INTO VOTACAO (CPF, PROJETO, DATAHORA)VALUES"."('$cpf_Eleitor','$g9',now())"; 
		mysql_query($consulta1);
	}	

	if($g10 != '')
	{
		$consulta1 = "INSERT INTO VOTACAO (CPF, PROJETO, DATAHORA)VALUES"."('$cpf_Eleitor','$g10',now())"; 
		mysql_query($consulta1);
	}	
	
	if($g11 != '')
	{
		$consulta1 = "INSERT INTO VOTACAO (CPF, PROJETO, DATAHORA)VALUES"."('$cpf_Eleitor','$g11',now())"; 
		mysql_query($consulta1);
	}	

	if($g12 != '')
	{
		$consulta1 = "INSERT INTO VOTACAO (CPF, PROJETO, DATAHORA)VALUES"."('$cpf_Eleitor','$g12',now())"; 
		mysql_query($consulta1);
	}	

	if($g13 != '')
	{
		$consulta1 = "INSERT INTO VOTACAO (CPF, PROJETO, DATAHORA)VALUES"."('$cpf_Eleitor','$g13',now())"; 
		mysql_query($consulta1);
	}	
	
	if($g14 != '')
	{
		$consulta1 = "INSERT INTO VOTACAO (CPF, PROJETO, DATAHORA)VALUES"."('$cpf_Eleitor','$g14',now())"; 
		mysql_query($consulta1);
	}	

	if($g15 != '')
	{
		$consulta1 = "INSERT INTO VOTACAO (CPF, PROJETO, DATAHORA)VALUES"."('$cpf_Eleitor','$g15',now())"; 
		mysql_query($consulta1);
	}	

	if($g16 != '')
	{
		$consulta1 = "INSERT INTO VOTACAO (CPF, PROJETO, DATAHORA)VALUES"."('$cpf_Eleitor','$g16',now())"; 
		mysql_query($consulta1);
	}	

	if($g17 != '')
	{
		$consulta1 = "INSERT INTO VOTACAO (CPF, PROJETO, DATAHORA)VALUES"."('$cpf_Eleitor','$g17',now())"; 
		mysql_query($consulta1);
	}	
	
	if($g18 != '')
	{
		$consulta1 = "INSERT INTO VOTACAO (CPF, PROJETO, DATAHORA)VALUES"."('$cpf_Eleitor','$g18',now())"; 
		mysql_query($consulta1);
	}	
	
	if($g19 != '')
	{
		$consulta1 = "INSERT INTO VOTACAO (CPF, PROJETO, DATAHORA)VALUES"."('$cpf_Eleitor','$g19',now())"; 
		mysql_query($consulta1);
	}	

	if($g20 != '')
	{
		$consulta1 = "INSERT INTO VOTACAO (CPF, PROJETO, DATAHORA)VALUES"."('$cpf_Eleitor','$g20',now())"; 
		mysql_query($consulta1);
	}	

	if($g21 != '')
	{
		$consulta1 = "INSERT INTO VOTACAO (CPF, PROJETO, DATAHORA)VALUES"."('$cpf_Eleitor','$g21',now())"; 
		mysql_query($consulta1);
	}	

	if($g22 != '')
	{
		$consulta1 = "INSERT INTO VOTACAO (CPF, PROJETO, DATAHORA)VALUES"."('$cpf_Eleitor','$g22',now())"; 
		mysql_query($consulta1);
	}		
	
	header ("Location:votoMsg.php");
	
	
}
	mysql_close($conexao);
?>


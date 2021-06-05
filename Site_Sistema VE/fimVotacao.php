<?php
	
	// Acesso ao BD FapBetim20181
	include "conexaoMySQL.inc";   	
	
	// Start Sessão
	session_start();
	
	// Função:	
	ini_set('default_charset','UTF-8');
    
	
	// Captura dados do Formulário cedulaVotacao.html
	$cpf_Eleitor = $_SESSION['cpf_Eleitor'];	
	$senha_Voto  = $_SESSION['senha_Voto'];	
	
	// Valida Sessão o CPF e Senha na sessão
    if ( !isset($_SESSION['cpf_Eleitor']) and !isset($_SESSION['senha_Voto']) ) 
	{
		session_destroy();
		unset ($_SESSION['cpf_Eleitor']);
		unset ($_SESSION['senha_Voto']);
		header('location:index.html');
	}	
	else{
		
			$resultadoEleitorNome = mysql_query("SELECT * FROM ELEITOR WHERE CPF = '$cpf_Eleitor'" );
			$linhasEleitor = mysql_num_rows($resultadoEleitorNome);
				  
				  // BD Nome e Curso
				  for ($i = 0; $i < $linhasEleitor; $i++)	
					   {
							$NomeEleitor = mysql_result($resultadoEleitorNome , $i, "NOME");
							$TipoEleitor = mysql_result($resultadoEleitorNome , $i, "TIPOELEITOR");
						}

				  echo "<html>
				  <head>
					<meta http-equiv='content-type' content='text/html;charset=utf-8' />
					<link rel = 'shortcut icon' href = 'logo.ico'>		 
					<title> V Simpósio de Engenharias 2018/2 </title>
				  </head>
				  <body bgcolor = '#000000'>
					<center>
						<font color='#FF8C00' face='Verdana' size  = '5'>
							<br><h1> FACULDADE PITÁGORAS DE BETIM <br> V Simpósio de Engenharias 2018/2 </h1> 
						</font>
					</center>
	
					<font color='#FFFFFF' size='6' face='Verdana'> <b><br>	
					<p align=\"center\"> - Olá $TipoEleitor $NomeEleitor <br> - Voto Registrado c/Sucesso!!!</p>
					
					
					</font> 
						  <center>	
	


						  <a href='http://fapbetim.martinsnunes.com.br/index.php'>
								<input type = 'button' value = 'Fechar Sistema de Votação' name = 'Sair'  style='width: 180px; height: 50px'>
						  </a>


						  </center>	
					      </body>
						  </html>";								
	}
	
	
	
	
	mysql_close($conexao);
?>

<?php
	    
	// Acesso ao BD FapBetim20181
	include "conexaoMySQL.inc";   

	// Captura dados do Formulário index.html
	$cpf_Eleitor = $_POST["cpf"];
	$senha_Voto = $_POST["senha"];
	
	// Consulta ao BD - Eleitor e Senha 
	$resultadoEleitor = mysql_query("SELECT * FROM ELEITOR WHERE CPF = '$cpf_Eleitor' AND SENHA = '$senha_Voto' AND VOTOSTATUS = '0'" );
	
	// Retorono do Cpf, Senha e StatusVoto 
	$linhasEleitor = mysql_num_rows($resultadoEleitor);
	
	// Valida Sessão - Cpf, Senha e StatusVoto
	if ($linhasEleitor == 1)
		{
			
			// Verifica se o eleitor já votou
			$resultadoEleitorVoto = mysql_query("SELECT * FROM VOTACAO WHERE CPF = '$cpf_Eleitor'");
	        $linhasEleitorVoto = mysql_num_rows($resultadoEleitorVoto);


			if($linhasEleitorVoto > 0)
			{
				

				$resultadoEleitorNome = mysql_query("SELECT NOME FROM ELEITOR WHERE CPF = '$cpf_Eleitor'");
				$Linhas_Resultado_Nome = mysql_num_rows($resultadoEleitorNome);

				for ($i = 0; $i < $Linhas_Resultado_Nome; $i++)
				{
					$A = mysql_result($resultadoEleitorNome, $i, "NOME");
				
				  echo "<html>
				    	<head>
					    <meta http-equiv='Content-Type' content='text/html;charset=utf-8'/>
					    <link rel = 'shortcut icon' href = 'logo.ico'>		 
					    <title> V Simpósio de Engenharias 2018/2 </title>
				        </head>
				        <body bgcolor = '#000000'>
					    <center>
						<font color='#FF8C00' face='Verdana' size  = '5'>
						<br><h1> FACULDADE PITÁGORAS DE BETIM <br> V Simpósio de Engenharias 2018/2 </h1> 
						</font>
					    </center>";
				 
				 echo "<font color='#FFFFFF' size='6' face='Verdana'> <b><br>";	
				 echo "<p align=\"center\"> - Prezado: $A <br> - Você já votou nos projetos do V Simpósio de Engenharias. <br> 
				      - Obrigado!!!</p>";
	
				 echo "</font> 
					   <center>	
					   <a href='http://fapbetim.martinsnunes.com.br/index.php'>
					   <input type = 'button' value = 'Fechar Sistema de Votação' name = 'Votar'  style='width: 180px; height: 50px'>
					   </a>
					   </center>	
					   </body>
					   </html>";
				}

			}		
			else
			{
				session_start();
			    $_SESSION['cpf_Eleitor'] = $cpf_Eleitor;
			    $_SESSION['senha_Voto'] = $senha_Voto;
			    header('location:cedulaVotacao.html');
			}
			
		}
	else 
		{	session_destroy();
			unset ($_SESSION['cpf_Eleitor']);
			unset ($_SESSION['senha_Voto']);

			echo "<!DOCTYPE html>
				  <html lang = 'pt-br'>
				  <head>
					<meta charset = 'utf-8' media = 'all'/>
					<link rel = 'shortcut icon' href = 'logo.ico'>		 
					<title> V Simpósio de Engenharias 2018/2 </title>
				  </head>
				  <body bgcolor = '#000000'>
					<center>
						<font color='#FF8C00' face='Verdana' size  = '5'>
							<br><h1> FACULDADE PITÁGORAS DE BETIM <br> V Simpósio de Engenharias 2018/2 </h1> 
						</font>
					</center>";
	
					echo "<font color='#FFFFFF' size='6' face='Verdana'> <b><br>";	
					echo "<p align=\"center\"> - Prezado Usuário: O Cpf: $cpf_Eleitor <br> e/ou a Senha: $senha_Voto estão incorretos. </p>";
					echo "</font> 
						  <center>	
					      <font size='4' face='Verdana'> <b>
							
							
							<a href='http://fapbetim.martinsnunes.com.br/index.php'>
								<input type = 'button' value = 'Página de Identificação' name = 'Sair'  style='width: 180px; height: 50px'>
						    </a>						  

							
							
			              </font>
						  </center>	
					      </body>
						  </html>";
		}
	
	// Acesso ao BD FapBetim20181
	mysql_close($conexao);
?>
<?php

	// Acesso ao BD - PHPMYSQL
	include "conexaoMySQL.inc";
	
	echo "<center>
	     <font color='#FF8C00' face='Verdana'>
	     <h1> FACULDADE PITÁGORAS DE BETIM <br> V Simpósio de Engenharias 2018/2 </h1> 
	     </font>
	     </center>";
	
	echo "<center><font face='Verdana'> <h1><b> SISTEMA DE VOTAÇÃO ELETRÔNICA<br> APURAÇÃO DOS VOTOS </b></h1></font></center>";
	echo "<hr>";
	


	$Consulta_Resultado_Votacao0 = mysql_query( "SELECT TIPOELEITOR, COUNT(ELEITOR.CPF) AS TOTAL 
		                                           FROM ELEITOR
												  WHERE  CPF IN ( SELECT DISTINCT  ELEITOR.CPF
                 										          FROM VOTACAO INNER JOIN ELEITOR
                                                                  ON VOTACAO.CPF = ELEITOR.CPF
							                                      )
                                                   GROUP BY TIPOELEITOR");

	$Linhas_Resultado_Votacao0 = mysql_num_rows($Consulta_Resultado_Votacao0);

	echo "<font size='4' face='Verdana'><h2><b> Relatório 00 - Número de Eleitores/Tipo: </b></h2></font>";

	for ($i = 0; $i < $Linhas_Resultado_Votacao0; $i++)
		 {
			$A = mysql_result ($Consulta_Resultado_Votacao0, $i, "TIPOELEITOR");
			$B = mysql_result ($Consulta_Resultado_Votacao0, $i, "TOTAL");
			


			echo "<!DOCTYPE html>
				  <html lang = 'pt-br'>
				  <head>
				  	<meta charset = 'utf8' media = 'all'/>
					<link rel = 'shortcut icon' href = 'logo.ico'>		 
					<title> V Simpósio de Engenharias 2018/2 </title>
				  </head>
				  <body>
				  	<font size='4' face='Verdana'>
						<b>Tipo Eleitor:</b> $A <b>Total:</b> $B  <br>
			     	</font>
			      </body>
				  </html>";
		 }

	echo "<br><hr>";





	/* - -----------------------  */
	
	/*AND DATAHORA BETWEEN '2018-05-19 08:59:59' AND '2018-05-19 12:30:59*/   
	
	$Consulta_Resultado_Votacao1 = mysql_query( "SELECT PROJETO.IDPJ AS CODIGO, PROJETO.NOME, 
	                                                   PROJETO.CURSO, COUNT(IDVT) AS TOTALVOTO, PROJETO.AREA 
                                                  FROM VOTACAO INNER JOIN PROJETO
			                                                   ON VOTACAO.PROJETO = PROJETO.IDPJ
    												AND DATAHORA BETWEEN '2018-11-10 08:59:59' AND '2018-11-10 11:30:59'               
                                              GROUP BY CODIGO, PROJETO.NOME, PROJETO.CURSO, PROJETO.AREA
                                              ORDER BY TOTALVOTO DESC");
	
	$Linhas_Resultado_Votacao1 = mysql_num_rows($Consulta_Resultado_Votacao1);
	
	echo "<font size='4' face='Verdana'><h2><b> Relatório 01 - Classificação Geral dos Projetos: </b></h2></font>";

	for ($i = 0; $i < $Linhas_Resultado_Votacao1; $i++)
		 {
			$A = mysql_result ($Consulta_Resultado_Votacao1, $i, "CURSO");
			$B = mysql_result ($Consulta_Resultado_Votacao1, $i, "NOME");
			$C = mysql_result ($Consulta_Resultado_Votacao1, $i, "TOTALVOTO");
			$D = mysql_result ($Consulta_Resultado_Votacao1, $i, "AREA");

		    $cont = 1;
		    $cont = $cont + $i;

			echo "<!DOCTYPE html>
				  <html lang = 'pt-br'>
				  <head>
				  	<meta charset = 'utf8' media = 'all'/>
					<link rel = 'shortcut icon' href = 'logo.ico'>		 
					<title> V Simpósio de Engenharias 2018/2 </title>
				  </head>
				  <body>
				  	<font size='4' face='Verdana'>
						<b>$cont º lugar</b> - <b>Total de Votos:</b> $C - <b>Projeto:</b> $B - <b>$A</b> <br>
			     	</font>
			      </body>
				  </html>";
		 }

	echo "<br><hr>";

	/* 2 Relatorio - 'Engenharia Ambiental' */

	echo "<font size='4' face='Verdana'><h2><b> Relatório 02 - Classificação dos Projetos/Curso: </b></h2></font>";
	echo "<font size='4' face='Verdana'><h2><b> Engenharia Ambiental: </b></h2></font>";

	
	/* - -----------------------  */
	
	/*AND DATAHORA BETWEEN '2018-05-19 08:59:59' AND '2018-05-19 12:30:59*/   
	
	$Consulta_Resultado_Votacao2 = mysql_query( "SELECT PROJETO.IDPJ AS CODIGO, PROJETO.NOME, 
	                                                   PROJETO.CURSO, COUNT(IDVT) AS TOTALVOTO, PROJETO.AREA 
                                                  FROM VOTACAO INNER JOIN PROJETO
			                                                   ON VOTACAO.PROJETO = PROJETO.IDPJ
                                                 WHERE CODCURSO = 1
												   AND DATAHORA BETWEEN '2018-11-10 08:59:59' AND '2018-11-10 11:30:59'
                                              GROUP BY CODIGO, PROJETO.NOME, PROJETO.CURSO, PROJETO.AREA
                                              ORDER BY TOTALVOTO DESC");
	
	$Linhas_Resultado_Votacao2 = mysql_num_rows($Consulta_Resultado_Votacao2);
	   
	for ($i = 0; $i < $Linhas_Resultado_Votacao2; $i++)
		 {
			$A = mysql_result ($Consulta_Resultado_Votacao2, $i, "CURSO");
			$B = mysql_result ($Consulta_Resultado_Votacao2, $i, "NOME");
			$C = mysql_result ($Consulta_Resultado_Votacao2, $i, "TOTALVOTO");

			$cont2 = 1;
		    $cont2 = $cont2 + $i;

			echo "<!DOCTYPE html>
				  <html lang = 'pt-br'>
				  <head>
				  	<meta charset = 'utf8'>
					<link rel = 'shortcut icon' href = 'logo.ico'>		 
					<title> V Simpósio de Engenharias 2018/2 </title>
				  </head>
				  <body>
				  	<font size='4' face='Verdana'>
						<b>$cont2 º lugar</b> - <b>Total de Votos:</b> $C - <b>Projeto:</b> $B <br>
			     	</font>
			      </body>
				  </html>";
		 }

	echo "<br><hr>";

	/* 3 Relatorio - 'Engenharia Civil' */

	echo "<font size='4' face='Verdana'><h2><b> Engenharia Civil: </b></h2></font>";

	
	/* - -----------------------  */
	
	/*AND DATAHORA BETWEEN '2018-05-19 08:59:59' AND '2018-05-19 12:30:59*/   
	
	$Consulta_Resultado_Votacao3 = mysql_query( "SELECT PROJETO.IDPJ AS CODIGO, PROJETO.NOME, 
	                                                   PROJETO.CURSO, COUNT(IDVT) AS TOTALVOTO, PROJETO.AREA 
                                                  FROM VOTACAO INNER JOIN PROJETO
			                                                   ON VOTACAO.PROJETO = PROJETO.IDPJ
                                                 WHERE CODCURSO = 2
												  AND DATAHORA BETWEEN '2018-11-10 08:59:59' AND '2018-11-10 11:30:59'
                                              GROUP BY CODIGO, PROJETO.NOME, PROJETO.CURSO, PROJETO.AREA
                                              ORDER BY TOTALVOTO DESC");
	
	$Linhas_Resultado_Votacao3 = mysql_num_rows($Consulta_Resultado_Votacao3);
	   
	for ($i = 0; $i < $Linhas_Resultado_Votacao3; $i++)
		 {
			$A = mysql_result ($Consulta_Resultado_Votacao3, $i, "CURSO");
			$B = mysql_result ($Consulta_Resultado_Votacao3, $i, "NOME");
			$C = mysql_result ($Consulta_Resultado_Votacao3, $i, "TOTALVOTO");

			$cont3 = 1;
		    $cont3 = $cont3 + $i;

			echo "<!DOCTYPE html>
				  <html lang = 'pt-br'>
				  <head>
				  	<meta charset = 'utf8'>
					<link rel = 'shortcut icon' href = 'logo.ico'>		 
					<title> V Simpósio de Engenharias 2018/2 </title>
				  </head>
				  <body>
				  	<font size='4' face='Verdana'>
						<b>$cont3 º lugar</b> - <b>Total de Votos:</b> $C - <b>Projeto:</b> $B <br>
			     	</font>
			      </body>
				  </html>";
		 }

	echo "<br><hr>";




/******************************************************/

	/* 4 Relatorio - 'Engenharia de Controle e Automação' */

	echo "<font size='4' face='Verdana'><h2><b> Engenharia de Controle e Automação: </b></h2></font>";

	
	/* - -----------------------  */
	
	/*AND DATAHORA BETWEEN '2018-05-19 08:59:59' AND '2018-05-19 12:30:59*/   
	
	$Consulta_Resultado_Votacao4 = mysql_query( "SELECT PROJETO.IDPJ AS CODIGO, PROJETO.NOME, 
	                                                   PROJETO.CURSO, COUNT(IDVT) AS TOTALVOTO, PROJETO.AREA 
                                                  FROM VOTACAO INNER JOIN PROJETO
			                                                   ON VOTACAO.PROJETO = PROJETO.IDPJ
                                                  WHERE CODCURSO = 3
												   AND DATAHORA BETWEEN '2018-11-10 08:59:59' AND '2018-11-10 11:30:59'
                                              GROUP BY CODIGO, PROJETO.NOME, PROJETO.CURSO, PROJETO.AREA
                                              ORDER BY TOTALVOTO DESC");
	
	$Linhas_Resultado_Votacao4 = mysql_num_rows($Consulta_Resultado_Votacao4);
	   
	for ($i = 0; $i < $Linhas_Resultado_Votacao4; $i++)
		 {
			$A = mysql_result ($Consulta_Resultado_Votacao4, $i, "CURSO");
			$B = mysql_result ($Consulta_Resultado_Votacao4, $i, "NOME");
			$C = mysql_result ($Consulta_Resultado_Votacao4, $i, "TOTALVOTO");

			$cont4 = 1;
		    $cont4 = $cont4 + $i;

			echo "<!DOCTYPE html>
				  <html lang = 'pt-br'>
				  <head>
				  	<meta charset = 'utf8'>
					<link rel = 'shortcut icon' href = 'logo.ico'>		 
					<title> V Simpósio de Engenharias 2018/2 </title>
				  </head>
				  <body>
				  	<font size='4' face='Verdana'>
						<b>$cont4 º lugar</b> - <b>Total de Votos:</b> $C - <b>Projeto:</b> $B <br>
			     	</font>
			      </body>
				  </html>";
		 }

	echo "<br><hr>";



	/* 5 Relatorio - 'Engenharia Elétrica' */

	echo "<font size='4' face='Verdana'><h2><b> Engenharia Elétrica: </b></h2></font>";

	
	/* - -----------------------  */
	
	/*AND DATAHORA BETWEEN '2018-05-19 08:59:59' AND '2018-05-19 12:30:59*/   
	
	$Consulta_Resultado_Votacao5 = mysql_query( "SELECT PROJETO.IDPJ AS CODIGO, PROJETO.NOME, 
	                                                   PROJETO.CURSO, COUNT(IDVT) AS TOTALVOTO, PROJETO.AREA 
                                                  FROM VOTACAO INNER JOIN PROJETO
			                                                   ON VOTACAO.PROJETO = PROJETO.IDPJ
                                                  WHERE CODCURSO = 4
												   AND DATAHORA BETWEEN '2018-11-10 08:59:59' AND '2018-11-10 11:30:59'
                                              GROUP BY CODIGO, PROJETO.NOME, PROJETO.CURSO, PROJETO.AREA
                                              ORDER BY TOTALVOTO DESC");
	
	$Linhas_Resultado_Votacao5 = mysql_num_rows($Consulta_Resultado_Votacao5);
	   
	for ($i = 0; $i < $Linhas_Resultado_Votacao5; $i++)
		 {
			$A = mysql_result ($Consulta_Resultado_Votacao5, $i, "CURSO");
			$B = mysql_result ($Consulta_Resultado_Votacao5, $i, "NOME");
			$C = mysql_result ($Consulta_Resultado_Votacao5, $i, "TOTALVOTO");

			$cont5 = 1;
		    $cont5 = $cont5 + $i;

			echo "<!DOCTYPE html>
				  <html lang = 'pt-br'>
				  <head>
				  	<meta charset = 'utf8'>
					<link rel = 'shortcut icon' href = 'logo.ico'>		 
					<title> V Simpósio de Engenharias 2018/2 </title>
				  </head>
				  <body>
				  	<font size='4' face='Verdana'>
						<b>$cont5 º lugar</b> - <b>Total de Votos:</b> $C - <b>Projeto:</b> $B <br>
			     	</font>
			      </body>
				  </html>";
		 }

	echo "<br><hr>";


	
		
	mysql_close($conexao);
?>


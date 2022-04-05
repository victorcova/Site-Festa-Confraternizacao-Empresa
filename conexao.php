<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED & ~ E_WARNING);

	$servidor = "xxxxxxxxx";
	$usuario = "xxxxxxxxx";
	$senha = "xxxxxxxxx";
	$banco = "xxxxxxxxx";
	$link = mysql_connect($servidor, $usuario, $senha) or die("Nao foi poss&iacute;vel conectar: " . mysql_error());

	mysql_select_db($banco) or die("<center><b><font color=red>Nao foi poss&iacute;vel selecionar o banco de dados</font></b></center>");

    mysql_query("SET NAMES 'utf8'");
    mysql_query('SET character_set_connection=utf8');
    mysql_query('SET character_set_client=utf8');
    mysql_query('SET character_set_results=utf8');

?>

<?php
/************************************************************************************/
//Tratamento de inputs

$nome_func = str_replace("'", "", $nome_func);
$nome_func = str_replace("&", "", $nome_func);
$nome_func = str_replace('"', "", $nome_func);
$nome_func = strtoupper ($nome_func);
$nome_func = rtrim($nome_func);
$nome_func = ltrim($nome_func);

if($nome_conv != ""){
   $nome_conv = str_replace("'", "", $nome_conv);
   $nome_conv = str_replace("&", "", $nome_conv);
   $nome_conv = str_replace('"', "", $nome_conv);
   $nome_conv = strtoupper ($nome_conv);
   $nome_conv = rtrim($nome_conv);
   $nome_conv = ltrim($nome_conv);
}

/*******************************************************************************************************************************/

?>

<?php
ob_start();
?>

<?php
include("conexao.php");
extract($_POST); // Extrai os dados do form

$verifica = "select id from colaboradores where cpf_func = '$verif_cpf';";
$query_verif = mysql_query($verifica) or die(mysql_error());
  while($row = mysql_fetch_array($query_verif)){
     $id_colaborador = $row["id"];
  }
  
//var_dump ($id_colaborador);

if(@$id_colaborador == null){
   header("Location: nao_colaborador.html");
}else{
   header("Location: colaborador.php?cpf=$verif_cpf");
}

?>

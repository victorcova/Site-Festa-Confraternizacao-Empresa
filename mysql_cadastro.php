<?php
/************************************************************************************/

//Verifica duplicidade:
  $cont = "select COUNT(*) from cadastro";
  $querycount = mysql_query($cont) or die(mysql_error());
  while($row = mysql_fetch_array($querycount)){
     $count = $row["COUNT(*)"];
  }//echo $count;die;

  $repetido = 0;
  $w = 1;
  $valorCPF = 0;
  while (($repetido == 0) && ($w <= $count)){
     $verificaCPF = "select cpf_func from cadastro where id = $w;";
     $query_verificaCPF = mysql_query($verificaCPF) or die(mysql_error());
     while($row = mysql_fetch_array($query_verificaCPF)){
        $valorCPF = $row["cpf_func"];
     }
     $comparaCPF[$w] = $valorCPF;
  $w++;
  }//echo 'CPF: '.$valorCPF;die;

  for ($x = 1; $x <= $count; $x++){
     if ($cpf_atual == $comparaCPF[$x]){
        $repetido = 1;// ACHOU CPF DUPLICADO!
     }
  }
//echo $repetido;die;
/************************************************************************************/

if($repetido == 0){
   $agora = date('H:i:s d-m-Y');

//Insert no usuário: cadastro
   $cadastro = mysql_query("insert into cadastro(id, coop_func, cpf_func, nome_func, dt_nasc_func, mail_func, camisa_func, cpf_conv,
               nome_conv, dt_nasc_conv, camiseta_conv, data_cadastro, ativo)
               values(0,'$coop_atual','$cpf_atual','$nome_func','$dt_nasc_func','$mail_func', '$camiseta_colab','$cpf_conv','$nome_conv',
               '$dt_nasc_conv','$camiseta_conv','$agora','1');") or die(mysql_error());

   if(! $cadastro) {
      $cadastro = 0;
      $log = "Erro: INS#001CAD.<br>";
   }else{
      $cadastro = 1;
   }
}else{
   $log = "<font color = 'red'>O CPF <b>".$cpf."</b> j&aacute; foi cadastrado.</font><br>";
   $log .= "<font color = '333333'><b><i>Erro: CAD#REP#001.</b></i></font>";
   $log .= "<p align='center'><a href='javascript:window.history.go(-2)'><img src='img/ico_voltar.png' alt=''/> Sair</a></p>";
}
/************************************************************************************/

?>

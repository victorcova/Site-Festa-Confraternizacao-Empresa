<?php
include("conexao.php");
extract($_POST); // Extrai os dados do form

//echo $coop_atual;die;
//echo $cpf_atual;die;
//echo 'COOPERATIVA'.$coop_atual;die;
//echo $camiseta_conv;die;
/************************************************************************************/
//Tratamento inicial - seguran�a
if($coop_atual == "" || $cpf_atual == ""){
   echo "Acesso n�o autorizado. Houve um erro no preenchimento do formul�rio.<br><hr>";
   die;
}
/************************************************************************************/
//EXECU��ES:

require("trata_inputs.php");//Tratamento de inputs
require("mysql_cadastro.php");//Insert Cadastro

/************************************************************************************/

if(@$cadastro == 1){

   if($nome_conv == ""){
      $nome_conv = "N&Atilde;O DECLARADO";
   }

//echo 'camisa conv: '.$camiseta_conv;die;
/*
   if($camiseta_conv == 0){
      $camiseta_conv = "N&Atilde;O DECLARADO";
   }
*/

   $resp = "


<p align='center'><font color='#00b1a1' size='+2'><strong>SUA INSCRI&Ccedil;&Atilde;O FOI REALIZADA COM SUCESSO. </strong> <br>
          </font></p>
        <table width='50%' border='0' cellspacing='2' cellpadding='2' align='center'>
            <tbody>
              <tr>
                <td width='32%'>CPF:</td>
                <td width='68%'>$cpf_atual</td>
              </tr>
              <tr>
                <td>NOME:</td>
                <td>$nome_func</td>
              </tr>
              <tr>
                <td>CAMISA:</td>
                <td>$camiseta_colab</td>
              </tr>
              <tr>
                <td>CONVIDADO:</td>
                <td>$nome_conv</td>
              </tr>
              <tr>
                <td>CAMISETA:</td>
                <td>$camiseta_conv</td>
              </tr>
          </tbody>
        </table>
          <hr width='80%'>
          <p align='center'>Caso fique d&uacute;vidas sobre o evento fale conosco no telefone: (61)3204-5036. </font></p>
   ";
   
   $img = "img/img_sucess.png";

   //mail
   $envio = 0;

   $quebra_linha = "\n";
   
   $emailsender = "mail";
   $nomeremetente = "nome-remetente";
   $emaildestinatario = "mail";

   $assunto = "Festa abcedf";

   $mensagemHTML = "
<!DOCTYPE html>
<html>
<!--<![endif]-->
<head>

<meta charset='iso-8859-1'/>

<title>Festa xxxxxxxx</title>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>

<link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.css'>
<link rel='stylesheet' href='css/font-awesome.css'>
<link rel='stylesheet' href='css/theme.css'>

<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
<style type='text/css'>
body,td,th {
	font-family: Montserrat, sans-serif;
}
</style>
<script type='text/javascript' src='js/validar.js'></script>

</head>
<body>
<!--wrapper start-->
<div class='wrapper' id='wrapper'>

	<!--header--><!--about us--><!--feedback-->
	<section class='feedback' id='feedback'>
	<div class='container w960'></div>
	</section>

	<!--feedback-->
	<section class='contact' id='contact'>
	<div class='container'></div>
	 <div class='container w960'>
      <div class='row' style='background: #f9f9f9'>
          <p align='center'>&nbsp;</p>
          <p align='center'><img src='img/img_sucess.png' alt=''/></p>
          <p align='center'><font color='#00b1a1' size='+2'><strong>INSCRI&Ccedil;&Atilde;O REALIZADA COM SUCESSO. </strong> <br>
          </font></p>
        <table width='50%' border='0' cellspacing='2' cellpadding='2' align='center'>
            <tbody>
              <tr>
                <td width='32%'>CPF:</td>
                <td width='68%'>$cpf_func</td>
              </tr>
              <tr>
                <td>NOME:</td>
                <td>$nome_func</td>
              </tr>
              <tr>
                <td>CAMISA:</td>
                <td>$camisa_func</td>
              </tr>
              <tr>
                <td>CONVIDADO:</td>
                <td>$nome_conv</td>
              </tr>
              <tr>
                <td>CAMISETA:</td>
                <td>$camiseta_conv</td>
              </tr>
          </tbody>
          </table>
          <hr width='80%'>
          <p align='center'><font color='#009c8f'>Voc&ecirc; receber&aacute; uma conforma&ccedil;&atilde;o deste cadastro no email:
          $mail_func.<br>
          Caso fique d&uacute;vidas sobre o evento fale conosco no telefone: (61)3204-5036. </font></p>
          <p align='center'>&nbsp;      </p>
      </div>
    </div>
	</section>

<!--footer--></div><!--wrapper end-->

</body>
</html>
   ";

   $headers = "MIME-Version: 1.1".$quebra_linha;
   $headers .= "Content-Type: text/html; charset=iso-8859-1".$quebra_linha;
   $headers .= "From: ".$emailsender.$quebra_linha;
   $headers .= "Return-Path: ".$emailsender.$quebra_linha;
   $headers .= "Reply-To: ".$emailsender.$quebra_linha;

   $envio = mail ($emaildestinatario, $assunto, $mensagemHTML, $headers, "-r".$emailsender);
   //var_dump($envio);die;


}else{
   $resp = "<p align='center'>Seu cadastro n&atilde;o foi realizado.<br>O sistema reportou o seguinte erro:<br>".$log.'</p>';
   $img = "img_error.png";
}


?>

<!DOCTYPE html>
<html>
<!--<![endif]-->
<head>

<meta charset='iso-8859-1'/>

<title>Festa XXXXXXXXXXX</title>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>

<link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.css'>
<link rel='stylesheet' href='css/font-awesome.css'>
<link rel='stylesheet' href='css/theme.css'>

<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
<style type='text/css'>
body,td,th {
	font-family: Montserrat, sans-serif;
}
</style>
<script type='text/javascript' src='js/validar.js'></script>

<script type="text/javascript">
      window.onload = function(){
         parent.document.getElementById("iframe1").height = document.getElementById("myDoc").scrollHeight + 35;
     }
</script>


</head>
<body>
<div id="myDoc">
<!--wrapper start-->
<div class='wrapper' id='wrapper'>

	<!--header--><!--about us--><!--feedback-->
	<section class='feedback' id='feedback'>
	<div class='container w960'></div>
	</section>

	<!--feedback-->
	<section class='contact' id='contact'>
	<div class='container'></div>
	 <div class='container w960'>
      <div class='row' style='background: #f9f9f9'>
          <p align='center'>&nbsp;</p>
          <?php echo $resp; ?>
          <p align='center'>&nbsp;      </p>
      </div>
    </div>
	</section>

<!--footer--></div><!--wrapper end-->
</body>
</body>
</html>

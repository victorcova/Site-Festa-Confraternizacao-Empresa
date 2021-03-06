<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js">
<!--<![endif]-->
<head>

<meta charset="iso-8859-1"/>

<title>FESTA</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css">
<link rel="stylesheet" href="css/font-awesome.css">
<link rel="stylesheet" href="css/theme.css">

<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
<style type="text/css">
body,td,th {
	font-family: Montserrat, sans-serif;
}
</style>
<script type="text/javascript" src="js/validar.js"></script>
<script type="text/javascript" src="js/mascaraHellas.js"></script>

<script type="text/javascript">
      window.onload = function(){
         parent.document.getElementById("iframe1").height = document.getElementById("myDoc").scrollHeight + 35;
     }
</script>


</head>
<body>
<div id="myDoc">

<?php
include("conexao.php");
$cpf = $_GET["cpf"];
//echo $cpf;die;
/************************************************************************************/
//Tratamento inicial - seguranca
if($cpf == ""){
   echo "
<div class='row' style='background: #f9f9f9'>
        <p align='center'><font color='#B93400'><br>
        <strong>N&atilde;o foi poss&iacute;vel prosseguir para a inscri&ccedil;&atilde;o.</strong> <br>
		Tentativa incorreta de acesso.<br>
		Por favor entre em contato conosco: [TELEFONE]</font>
        </p>
        <p>&nbsp;</p>
        </div>
   ";
   die;
}

$verifica = "select nome_func, cpf_func, dt_nasc_func, mail_func, coop_func from colaboradores where cpf_func = '$cpf';";
$query_verif = mysql_query($verifica) or die(mysql_error());
  while($row = mysql_fetch_array($query_verif)){
     $nome_func = $row["nome_func"];
     $dt_nasc_func = $row["dt_nasc_func"];
     $mail_func = $row["mail_func"];
     $coop_func = $row["coop_func"];
  }


?>


<!--wrapper start-->
<div class="wrapper" id="wrapper">

	<!--header--><!--about us--><!--feedback-->
	<section class="feedback" id="feedback">
	<div class="container w960"></div>
	</section>

	<!--feedback-->
	<section class="contact" id="contact">
	<div class="container"></div>
	 <div align="left" style="padding-left: 25px">
      <div class="row">
       <form method="post" action="cadastro_festa.php" id="verificaCPF" onsubmit="JavaScript:return validaDadosCadastro()">
          <p><br>
          <h4>Inscri&ccedil;&atilde;o do Colaborador:</h4>
          </p>
          <p>
            <input name="coop_atual" id="coop_atual" type="hidden" value="<?php echo $coop_func; ?>">
            <input style="border-color: #033333" name="cpf_atual" id="cpf_atual" type="text" class="contact_cpf" value="<?php echo $cpf; ?>" readonly>
            <input name="nome_func" id="nome_func" type="text" class="contact_nome" value="<?php echo $nome_func; ?>" autofocus>
            <input name="mail_func" id="mail_func" type="text" class="contact_mail" value="<?php echo $mail_func; ?>">

  <select name="camiseta_colab" class="styled-select_func" id="camiseta_colab">
    <option value="0" >Camiseta</option>
    <option value="PP" >Tamanho PP</option>
    <option value="P" >Tamanho P</option>
    <option value="M" >Tamanho M</option>
    <option value="G" >Tamanho G</option>
    <option value="GG" >Tamanho GG</option>
    <option value="XL" >Tamanho XL</option>
    <option value="XXL" >Tamanho XXL</option>
</select>
          </p>

		  <div class="clearfix"></div>
          <p>
          <h4>Inscri&ccedil;&atilde;o do Convidado:</h4>
          <input name="cpf_conv" id="cpf_conv" type="text" class="contact_cpf" placeholder="CPF" maxlength="11" onblur="Verifica_campo_CPF(this)" >
          <input name="nome_conv" id="nome_conv" type="text" class="contact_nome" placeholder="Nome do convidado">
          <input name="dt_nasc_conv" onkeyup="mascaraHellas(this.value, this.id, '##/##/####', event)" id="dt_nasc_conv" type="text" class="contact_nome" placeholder="Nascimento" onblur="fctValidaData(this)">

   <select name="camiseta_conv" class="styled-select_func" id="camiseta_conv">
    <option value="0" >Camiseta</option>
    <option value="PP" >Tamanho PP</option>
    <option value="P" >Tamanho P</option>
    <option value="M" >Tamanho M</option>
    <option value="G" >Tamanho G</option>
    <option value="GG" >Tamanho GG</option>
    <option value="XL" >Tamanho XGG</option>
    <option value="XXL" >Tamanho XXGG</option>
</select>




  <div class="clearfix"></div>


  <div align="left"><br><br>
	<b>ATEN&Ccedil;&Atilde;O:</b><br/>
	  N&uacute;mero da cooperativa centro de custo: <u><strong><?php echo $coop_func; ?></strong></u><br>
	  Veja mais informa&ccedil;&otilde;es sobre os tamanhos das camisetas, <a href="img/tam_camisetas.pdf" target="_blank">CLIQUE AQUI</a> <img src="img/ico_blank.png" />.<br>
      <font color="#d80019">Caso alguma informa&ccedil;&atilde;o esteja incorreta n&atilde;o realize seu cadastro e ligue no [empresa]: [telefone].</font>


	  <p>
	  <input type="checkbox" name="termos" id="termos">
	  Aceito os regras gerais e declaro que meus dados est&atilde;o corretos. </p>
  </div>

        <div align="center" style="padding-right: 20px"><br>
          <input type="submit" id="submit" class="contact submit" value="Realizar Inscri&ccedil;&atilde;o">
          </div>
        </form>
      </div>
    </div>

    <div class="clearfix"></div>

  </section>

<!--footer--></div><!--wrapper end-->
<style type="text/css">
#id_meses{width:400px;  height:auto;  margin-right:6px; overflow:hidden; float:left; text-align:left; }
</style>

</div>
</body>
</html>
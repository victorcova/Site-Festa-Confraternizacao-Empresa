<?php
include("../conexao.php");
include("login/restrito.php");

$cont = "select COUNT(*) from colaboradores";
$querycount = mysql_query($cont) or die(mysql_error());
   while($row = mysql_fetch_array($querycount)){
      $valor_tabela_rows = $row["COUNT(*)"];
   }
   
if($valor_tabela_rows > 0){
   $sql_trunk = "TRUNCATE TABLE colaboradores";
   $return = mysql_query($sql_trunk) or die(mysql_error());
   echo"
<!doctype html>

<html lang='pt-BR'>

<head>

  <meta charset='utf-8'>

  <meta http-equiv='Content-Type' content='text/html'>

  <title>Importação de Associados</title>

  <link rel='stylesheet' type='text/css' media='all' href='../css/styles.css'>

  <link rel='stylesheet' type='text/css' media='all' href='../css/switchery.min.css'>

  <style type='text/css'>

  body {

	background-color: #f9f9f9;

}

  a:link {

	color: #1CB18F;

	text-decoration: none;

}

a:visited {

	text-decoration: none;

	color: #1CB18F;

}

a:hover {

	text-decoration: underline;

	color: #1CB18F;

}

a:active {

	text-decoration: none;

	color: #1CB18F;

}

  </style>

</head>



<body>

  <div id='wrapper'>
  <div><br>
    <p><a href='index.html'><img src='http://www.credijustra.com.br/images/logomarca/marca_privilege.png'/></a></p>
  </div>
  <form name='form_adesao' id='form_adesao' method='post' enctype='multipart/form-data' action='../verifica_cpf.php' onsubmit='JavaScript:return validaArquivo()'>

    <div class='col-1' >

<label style='margin: 7px;padding-bottom: 16px;'><br>
  <table width='100%' border='0' cellspacing='2' cellpadding='2'>
  <tbody>
    <tr>
      <td width='2%'><span style='margin: 7px;padding-bottom: 16px;'><img src='../imgs/img_sucess.png' width='15' height='14'/></span></td>
      <td width='98%'>SUCESSO:</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><p>A Tabela de Associados do banco de dados foi limpa. <br>
      </p>
        <p>Agora já é possivel importar a tabela de associados.</p></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><a href='javascript:window.history.go(-1)'><img src='../imgs/seta-esquerda.png' width='12' height='14' alt=''/>Voltar</a></td>
    </tr>
  </tbody>
</table>
<br>
    </div>

    </form>

  </div>

<script type='text/javascript'>

var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));



elems.forEach(function(html) {

  var switchery = new Switchery(html);

});

</script>

</body>

</html>
   ";
}else{
echo "
<!doctype html>

<html lang='pt-BR'>

<head>

  <meta charset='utf-8'>

  <meta http-equiv='Content-Type' content='text/html'>

  <title>Importação de Associados</title>

  <link rel='stylesheet' type='text/css' media='all' href='../css/styles.css'>

  <link rel='stylesheet' type='text/css' media='all' href='../css/switchery.min.css'>

  <style type='text/css'>

  body {

	background-color: #f9f9f9;

}

  a:link {

	color: #1CB18F;

	text-decoration: none;

}

a:visited {

	text-decoration: none;

	color: #1CB18F;

}

a:hover {

	text-decoration: underline;

	color: #1CB18F;

}

a:active {

	text-decoration: none;

	color: #1CB18F;

}

  </style>

</head>



<body>

  <div id='wrapper'>
  <div><br>
    <p><a href='index.html'><img src='http://www.credijustra.com.br/images/logomarca/marca_privilege.png'/></a></p>
  </div>
  <form name='form_adesao' id='form_adesao' method='post' enctype='multipart/form-data' action='../verifica_cpf.php' onsubmit='JavaScript:return validaArquivo()'>

    <div class='col-1' >

<label style='margin: 7px;padding-bottom: 16px;'><br>
  <table width='100%' border='0' cellspacing='2' cellpadding='2'>
  <tbody>
    <tr>
      <td width='2%'><span style='margin: 7px;padding-bottom: 16px;'><img src='../imgs/img_error.png' width='15' height='14'/></span></td>
      <td width='98%'>ERRO:</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>A base de dados não possui registros.<br>
Execute a importação de associados.
  </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><a href='javascript:window.history.go(-1)'><img src='../imgs/seta-esquerda.png' width='12' height='14' alt=''/>Voltar</a></td>
    </tr>
  </tbody>
</table>
<br>
    </div>

    </form>

  </div>

<script type='text/javascript'>

var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));



elems.forEach(function(html) {

  var switchery = new Switchery(html);

});

</script>

</body>

</html>
";
}

?>

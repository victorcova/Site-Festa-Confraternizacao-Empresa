<?php
include("../conexao.php");

$destino = "upload_banco/";

if(!$_FILES){
	$log .= 'Nenhum arquivo enviado!';
}else{
    $file_name = $_FILES['file_banco']['name'];
    //echo "tem arquivo";die;
    //echo $file_name;die;
    
if($file_name == ''){
    $log .= "Arquivo n&atilde;o enviado pois foi configurado incorretamente.";
    $erro_config = 1;
//    echo 'aqui';die;
//    exit;
}else{
	$file_type = $_FILES['file_banco']['type'];
	$file_size = $_FILES['file_banco']['size'];
	$file_tmp_name = $_FILES['file_banco']['tmp_name'];
	$error = $_FILES['file_banco']['error'];
//    echo 'aqui';die;
}
}

switch ($error){
	case 0:
		break;
	case 1:
		$log .= 'O tamanho do arquivo é maior que o definido nas configuracoes do PHP!';
		break;
	case 2:
		$log .= 'O tamanho do arquivo é maior do que o permitido!';
		break;
	case 3:
		$log .= 'O upload não foi concluído!';
		break;
	case 4:
		$log .= 'O upload não foi realizado!';
		break;
}

if(@$erro_config != 1){

if($error == 0){

                 $cont = "select COUNT(*) from colaboradores";
                 $querycount = mysql_query($cont) or die(mysql_error());
                    while($row = mysql_fetch_array($querycount)){
                       $total_cadastrados_colaboradores = $row["COUNT(*)"];
                    }

	if(!is_uploaded_file($file_tmp_name)){
		echo $log .= 'Erro ao processar o arquivo!';
	}else{
		if(!move_uploaded_file($file_tmp_name,$destino."//".$file_name)){
			$log .= 'Nao foi possivel salvar o arquivo!';
		}else{
			@$log .= 'Processo concluido com sucesso!<br>';
			$log .= "Nome do arquivo: $file_name<br>";
			$log .= "Tipo de arquivo: $file_type<br>";
			$log .= "Tamanho em byte: $file_size<br>";

			$caminho_arq_atual = $destino.$file_name;
			$arq = fopen( "$caminho_arq_atual", "r" ) or die( "ERRO, avise o webmaster, que falta um arquivo no servidor"); // abrindo o arquivo

			while(!feof($arq)){ // aqui o vetor captura cada linha do arquivo e tranforma numa posição do vetor
			$linha[] = fgets($arq);} // cria um array com o conteudo do arquivo; até aqui você tem o vetor com cada linha ("Linha01","Linha02", ...)

			//separando cada parte entre ';' num vetor e inserindo no BD.
            for($c = 0; $c < sizeof($linha); $c++){
		       $coluna = explode(";",$linha[$c]); //quebra a linha aonde achar o ';' e abaixo joga a parte numa coluna do bd

		       if($total_cadastrados_colaboradores > 0){
                     $log = "<br/>A base de dados possui registros!<br />Execute a limpeza antes de gerar uma nova base.<br><a href=\"javascript:window.history.go(-1)\">Voltar</a>";
                     $tipopagina = 0;
			      }else{
			         $total_cadastrados_colaboradores = 0;
			         $sql1 = "INSERT INTO `colaboradores` (`id`,`nome_func`,`cpf_func`,`dt_nasc_func`,`mail_func`,`coop_func`,`ativo`)
                             VALUES ('".$coluna[0]."', '".$coluna[1]."', '".$coluna[2]."', '".$coluna[3]."', '".$coluna[4]."', '".$coluna[5]."', '1')";
			         $result1 = mysql_query($sql1) or die(mysql_error());
			         $tipopagina = 1;
                  }

			}

		}
	}
}
}

?>

<?php
require("pagina.php");

if ($tipopagina == 1){
   echo $pagina;
   die;
}else{
   echo $pagina;
   die;
}

?>

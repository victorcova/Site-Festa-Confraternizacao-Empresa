// JavaScripts

/*=================================================================================================================*/


function validaArquivo() {

    if (file_banco.value=="") {  		
  		alert("Selecione uma arquivo válido");
		file_banco.focus();
  		return false;
}
	
	return true;
	
}

/*=================================================================================================================*/

function confirma_limpeza() {

    x = confirm("Deseja realmente Limpar a base de dados da tabela de associados?");
	
	if(x == true){
		return true;	
	}else{
		return false;
	}
	
	
return false;	
	
}
// JavaScripts

/*=================================================================================================================*/


function validaPrevia() {

    if (verif_cpf.value == "") {
        alert("✖ Informe o seu CPF.");
        verif_cpf.focus();
        return false; 
    }
	
	 if (verif_cpf.value.length < "11") {
        alert("✖ Informe corretamente o seu CPF.");
        verif_cpf.focus();
        return false; 
    }
	
	if (verif_cpf.value == "00000000000") {
        alert("✖ Informe corretamente o seu CPF.");
        verif_cpf.focus();
        return false; 
    }	
	
	return true;	
}

/*=================================================================================================================*/


function validaDadosCadastro() {

	if (nome_func.value == "") {
        alert("✖ Informe nome completo.");
        nome_func.focus();
        return false; 
    }
	
 	if (nome_func.value.length <= 6) {
        alert("✖ Informe nome completo. Utilize mais caracteres.");
        nome_func.focus();
        return false; 
    }	
	
 	if (dt_nasc_func.value == "") {
        alert("✖ Informe a data de nascimento.");
        dt_nasc_func.focus();
        return false; 
    }

	if (mail_func.value == "") {
        alert("✖ Informe um e-mail válido.");
        mail_func.focus();
        return false; 
    }			
	
	
	if (camiseta_colab.value == "0") {
        alert("✖ Selecione um tamanho válido para a sua camiseta.\nO uso da camiseta é obrigatório para entrada e durante a festa.");
        camiseta_colab.focus();
        return false; 
    }
	
	if (cpf_conv.value != "") {
		
		if (cpf_conv.value == cpf_atual.value) {
           alert("✖ Caso deseje cadastrar um convidado, informe um CPF diferente.\nO CPF do convidado não pode ser o mesmo do colaborador.");
           cpf_conv.focus();
           return false; 
        }		
		
		if (nome_conv.value == "") {
           alert("✖ Como foi informado um CPF para o convidado é necessário informar corretamente o nome completo.");
           nome_conv.focus();
           return false; 
        }
		
		if (nome_conv.value.length < 6) {
           alert("✖ Como foi informado um CPF para o convidado é necessário informar corretamente o nome completo.\nInforme mais caracteres.");
           nome_conv.focus();
           return false; 
        }
		
		
		if (dt_nasc_conv.value == "") {
           alert("✖ Como foi informado um CPF para o convidado é necessário informar a data de nascimento.");
           dt_nasc_conv.focus();
           return false; 
        }
		
		if (dt_nasc_conv.value.length < 10) {
           alert("✖ Como foi informado um CPF para o convidado é necessário informar a data de nascimento.\nInforme mais caracteres.");
           dt_nasc_conv.focus();
           return false; 
        }
		
		if (camiseta_conv.value == 0) {
           alert("✖ Como foi informado um CPF para o convidado é necessário selecionar um tamanho válido para a sua camiseta.\nO uso da camiseta é obrigatório para entrada e durante a festa.");
           camiseta_conv.focus();
           return false; 
        }
		
		
    }
	
	aceita_regulamento = document.getElementById("termos").checked;
	if (aceita_regulamento  == false) {
		alert("✖ para prosseguir você deve ler, concordar e aceitar as normas do evento, bem como a veracidade das informações.");
		termos.focus();
		return false;
	}	
	
	return true;	
}

/*=================================================================================================================*/



function Verifica_campo_CPF(cpf_atual) {

var CPF = cpf_atual.value; // Recebe o valor digitado no campo



// Aqui começa a checagem do CPF

var POSICAO, I, SOMA, DV, DV_INFORMADO;

var DIGITO = new Array(10);

DV_INFORMADO = CPF.substr(9, 2); // Retira os dois últimos dígitos do número informado



// Desemembra o número do CPF na array DIGITO

for (I=0; I<=8; I++) {

  DIGITO[I] = CPF.substr( I, 1);

}



// Calcula o valor do 10º dígito da verificação

POSICAO = 10;

SOMA = 0;

   for (I=0; I<=8; I++) {

      SOMA = SOMA + DIGITO[I] * POSICAO;

      POSICAO = POSICAO - 1;

   }

DIGITO[9] = SOMA % 11;

   if (DIGITO[9] < 2) {

        DIGITO[9] = 0;

}

   else{

       DIGITO[9] = 11 - DIGITO[9];

}



// Calcula o valor do 11º dígito da verificação

POSICAO = 11;

SOMA = 0;

   for (I=0; I<=9; I++) {

      SOMA = SOMA + DIGITO[I] * POSICAO;

      POSICAO = POSICAO - 1;

   }

DIGITO[10] = SOMA % 11;

   if (DIGITO[10] < 2) {

        DIGITO[10] = 0;

   }

   else {

        DIGITO[10] = 11 - DIGITO[10];

   }



// Verifica se os valores dos dígitos verificadores conferem

DV = DIGITO[9] * 10 + DIGITO[10];

   if (DV != DV_INFORMADO) {

      alert("CPF invalido");

      cpf_atual.value = "";

      cpf_atual.focus();

      return false;

   }

}



/*=================================================================================================================*/



function checa1(email) {    

	if (email.value == "") {

		email.value = "";

		return false;

	} else {

		prim = email.value.indexOf("@")

		if(prim < 2) {

			alert("O e-mail informado esta incorreto.");

			email.value = "";

			return false;

		}

		if(email.value.indexOf("@",prim + 1) != -1) {

			alert("O e-mail informado esta incorreto.");

			email.value = "";

			return false;

		}

		if(email.value.indexOf(".") < 1) {

			alert("O e-mail informado esta incorreto.");

			email.value = "";

			return false;

		}

		if(email.value.indexOf(" ") != -1) {

			alert("O e-mail informado esta incorreto.");

			email.value = "";

			return false;

		}

		if(email.value.indexOf("zipmeil.com") > 0) {

			alert("O e-mail informado esta incorreto.");

			email.value = "";

			return false;

		}

		if(email.value.indexOf("hotmeil.com") > 0) {

			alert("O e-mail informado esta incorreto.");

			email.value = "";

			return false;

		}

		if(email.value.indexOf(".@") > 0) {

			alert("O e-mail informado esta incorreto.");

			email.value = "";

			return false;

		}

		if(email.value.indexOf("@.") > 0) {

			alert("O e-mail informado esta incorreto.");

			email.value = "";

			return false;

		}

		if(email.value.indexOf(".com.br.") > 0) {

			alert("O e-mail informado esta incorreto.");

			email.value = "";

			return false;

		}

		if(email.value.indexOf("/") > 0) {

			alert("O e-mail informado esta incorreto.");

			email.value = "";

			return false;

		}

		if(email.value.indexOf("[") > 0) {

			alert("O e-mail informado esta incorreto.");

			email.value = "";

			return false;

		}

		if(email.value.indexOf("]") > 0) {

			alert("O e-mail informado esta incorreto.");

			email.value = "";

			return false;

		}

		if(email.value.indexOf("(") > 0) {

			alert("O e-mail informado esta incorreto.");

			email.value = "";

			return false;

		}

		if(email.value.indexOf(")") > 0) {

			alert("O e-mail informado esta incorreto.");

			email.value = "";

			return false;

		}

		if(email.value.indexOf("..") > 0) {

			alert("O e-mail informado esta incorreto.");

			email.value = "";

			return false;

		}

	}

		return true;

}



/*=================================================================================================================*/



// Entrada DD/MM/AAAA

function fctValidaData(obj)

{	

    var data = obj.value;

    var dia = data.substring(0,2)

    var mes = data.substring(3,5)

    var ano = data.substring(6,10)

 

    //Criando um objeto Date usando os valores ano, mes e dia.

    var novaData = new Date(ano,(mes-1),dia);

 

    var mesmoDia = parseInt(dia,10) == parseInt(novaData.getDate());

    var mesmoMes = parseInt(mes,10) == parseInt(novaData.getMonth())+1;

    var mesmoAno = parseInt(ano) == parseInt(novaData.getFullYear());

 

    if (!((mesmoDia) && (mesmoMes) && (mesmoAno)))

    {

		if(obj.value == ""){

			return false;//sai do campo vazio

		}else{

			alert('Data informada é inválida!');   

			obj.focus();

			obj.value = "";

			return false;

		}

    }  

    return true;

}



/*=================================================================================================================*/
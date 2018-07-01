class Controlinfor{
	mNome(){
		var retorno = "";
			try{
				var r = Mod.getNome().toLowerCase();
				r = r.replace(/[!-^]+/g,"");
				r = r.replace(/[¨]+/g,"");
				r = r.replace(/[{-}]+/g,"");
				Mod.setNome(r);
				retorno = Mod.getNome().toUpperCase();
			
			}catch(erro){
				console.log(err.message);
			}
		return retorno;
	};
	 mMat(){
	 	var retorno = "";
			try{
				var re = Mod.getMatricula().replace(/[^\d]+/g, '');
				retorno = re;
			}catch(erro){
				console.log(err.message);
			}
		return retorno;
	};
	 rMat(){
	var retorno = false;
		try{
			var json = '{"pessoa":[{"nome":"Alefe Ribeiro", "matricula":"", "nascimento":""}, {"nome":"Allef Sandro", "matricula":"3127209", "nascimento":"11/04/2001"}, {"nome":"Ana Eduarda", "matricula":"3264258", "nascimento":"23/08/2001"}, {"nome":"Ana Vitoria", "matricula":"3687602", "nascimento":"27/07/2000"}, {"nome":"Antonio Victor", "matricula":"3095418", "nascimento":"11/01/2001"}, {"nome":"Barbara Vitoria", "matricula":"3670027", "nascimento":"12/04/2001"}, {"nome":"Carlos Eduardo", "matricula":"3477325", "nascimento":"04/12/2000"}, {"nome":"Davi Ferreira", "matricula":"3663706", "nascimento":"15/12/2000"}, {"nome":"Eduardo Sousa", "matricula":"2831084", "nascimento":"21/08/2001"}, {"nome":"Francisca Beatriz", "matricula":"3691290", "nascimento":"30/12/2000"}, {"nome":"Francisco Jonathan", "matricula":"3127470", "nascimento":"11/03/2002"}, {"nome":"Francisco Ronniery", "matricula":"3136852", "nascimento":"24/09/2000"}, {"nome":"Guilherme Haylton", "matricula":"3691572", "nascimento":"18/03/2001"}, {"nome":"Hallyson Ribeiro", "matricula":"3149228", "nascimento":"29/05/2001"}, {"nome":"Ianca Kelly", "matricula":"2831483", "nascimento":"07/02/2001"}, {"nome":"Jisele Vitoria", "matricula":"1925818", "nascimento":"25/05/2001"}, {"nome":"João Batista", "matricula":"3089859", "nascimento":"27/03/2001"}, {"nome":"João Lucas", "matricula":"3265240", "nascimento":"30/11/2000"}, {"nome":"João Victor", "matricula":"3096556", "nascimento":"29/04/2001"}, {"nome":"Jonatas Moreira", "matricula":"3691468", "nascimento":"14/04/2001"}, {"nome":"Juliane Costa", "matricula":"3128985", "nascimento":"22/10/2000"}, {"nome":"Leandro Lucas", "matricula":"3696836", "nascimento":"08/09/2000"}, {"nome":"Lemuel Alefe", "matricula":"3447842", "nascimento":"14/08/2001"}, {"nome":"Leonardo Frutuoso", "matricula":"3089321", "nascimento":"08/02/2001"}, {"nome":"Letícia Alves", "matricula":"3265243", "nascimento":"05/01/2001"}, {"nome":"Lucas Venancio", "matricula":"3663715", "nascimento":"03/04/2001"}, {"nome":"Luidy Moura", "matricula":"2831610", "nascimento":"02/09/2000"}, {"nome":"Marcelo Ferreira", "matricula":"3691531", "nascimento":"05/02/2001"}, {"nome":"Marcos Paulo", "matricula":"3442234", "nascimento":"17/04/2001"}, {"nome":"Matheus Dias", "matricula":"3663907", "nascimento":"07/10/2000"}, {"nome":"Nayane Maria", "matricula":"3676284", "nascimento":"07/05/2000"}, {"nome":"Nicole Inacio", "matricula":"3670332", "nascimento":"24/12/2000"}, {"nome":"Paulo Iury", "matricula":"3669552", "nascimento":"24/12/2000"}, {"nome":"Paulo Vitor", "matricula":"3691018", "nascimento":"03/09/2000"}, {"nome":"Raquel Silva", "matricula":"3690978", "nascimento":"02/06/2001"}, {"nome":"Rebeca Vieira", "matricula":"3089840", "nascimento":"14/12/2000"}, {"nome":"Rodrigo Lima", "matricula":"3691376", "nascimento":"05/08/2001"}, {"nome":"Samuel Lucas", "matricula":"2098926", "nascimento":"25/11/2000"}, {"nome":"Suyan Richard", "matricula":"", "nascimento":""}, {"nome":"Talitha Nascimento", "matricula":"3670008", "nascimento":"25/07/2001"}, {"nome":"Victor Manuel", "matricula":"3696707", "nascimento":"27/10/2000"}, {"nome":"Wellington Ehrich", "matricula":"3673591", "nascimento":"27/12/2000"} ] }';
			var js = JSON.parse(json);
			var tr;
			for (var i = 0; i < js.pessoa.length; i++) {
				if (js.pessoa[i].matricula == mat.value) {
					cmat.innerHTML="";
					// console.log(js.pessoa[i].nome);
					nom.value = js.pessoa[i].nome.toUpperCase();
					tr = i;
					retorno = true;
				}
			}
			if (tr == null){
				retorno = false;
			}
		}catch(err){
			console.log(err.message);
		}
	return retorno;
	};
	 mEmail(){
		var retorno = null;

			try{
				var r = Mod.getEmail().toLowerCase();
				r = r.replace(/[´\^]+/g,"");
				r = r.replace(/[!\~]+/g,"");
				r = r.replace(/[{-}]+/g,"");
				r = r.replace(/[[-^]+/g,"");
				r = r.replace(/[(-)]+/g,"");
				retorno = r;
			}catch(erro){
				console.log(erro.message);
			}
		return retorno;
	};
	 vEmail(){
		var retorno = false;
		try{
			var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			if(pattern.test(Mod.getEmail())){
				retorno = true;
			}else{
				retorno = false;
			}
		}catch(err){
			console.log(err.message);
		}
		return retorno;
	};

	 valida(){
	var retorno = false;
		try{
			if (Mod.getNome().length < 4) {
				retorno = "Nome Incompleto";
			}else if(Mod.getMatricula().length < 7){
				retorno = "Dígite sua Matricula(7 dígitos)";
			}else if(document.getElementById('ermat')){
				retorno = "Coloque uma Matricula Válida";
			}else if(Mod.getEmail().length <13){
				retorno = "Email maior que 13 carácteres e menor que 30 carácteres";
			}else if(document.getElementById('erema')){
				retorno = "Dígite um Email Válido";
			}else if(Mod.getSenha().length < 8){
				retorno = "Senha menor que 8 dígitos";
			}else if(Mod.getCsenha().length < 8){
				retorno = "Senha menor que 8 dígitos";
			}else if(Mod.getSenha() != Mod.getCsenha()){
				retorno = "Senhas Diferentes";
			}else{
				retorno = false;
			}
		}catch(err){
			console.log(err.message);
		}
	return retorno;
	};

	 prosegue(){
	var retorno = false;
		try{
			if(requisitarArquivo("../processos/Cadastrar.php?nome="+Mod.getNome()+"&email="+Mod.getEmail()+"&matricula="+Mod.getMatricula()+"&senha="+Mod.getSenha(),vld)){	
				form.reset();
				retorno = true;
			}
		}catch(err){
			console.log(err.message);
		}
	return retorno;
	};

	 proMat(){
	var retorno = false;
		try{
			if(requisitarArquivo("../processos/VerificarMatricula.php?mat="+Mod.getMatricula(),cmat)){
				retorno = true;
			}else{
				retorno = false;
			}
		}catch(err){
			console.log(err.message);
		}
	return retorno;
	};

	 proEmail(){
	var retorno = false;
		try{
			if(requisitarArquivo("../processos/VerificarEmail.php?em="+Mod.getEmail(),cmail)){
				retorno = true;
			}else{
				retorno = false;
			}
		}catch(err){
			console.log(err.message);
		}
	return retorno;
	};

	 testeMat(){
	var retorno = false;
		try{
			if (mat.value.length <7) {
				cmat.innerHTML ="<span style='color:red;padding-left:4px;'>Número incorreto(min:7)</span>";
			}else{
				Mod.setMatricula(mat.value);
				if(proMat()){
					if (document.getElementById("ermat")) {
							retorno = false;
					}else{
						if(rMat()){
							retorno = true;
						}else{
							cmat.innerHTML ="<span id='ermat' style='color:red;padding-left:4px;'>Mátricula não Cadastrada</span>";
						}
					}
				}
			}
		}catch(err){
			console.log(err.message);
		}
	return retorno;
	};

	proLogin(ena){
		var retorno = false;
			try{
				if(requisitarArquivo("../processos/Login.php?em="+Mod.getEmail()+"&sen="+Mod.getSenha(),clog)){
					ena.innerHTML="<img src='../img/preloader3.gif' width='50' height='30'>";
					retorno = true;
				}

			}catch(err){
				console.log(err);
			}	
		return retorno;
	};
}
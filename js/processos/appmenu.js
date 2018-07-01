try{
var form = document.forms.formcadastro;
var cmat = document.getElementById('retmat');
var vld = document.getElementById("valid");
var dnam = document.getElementById("dnam");
var cmail = document.getElementById("retemail");
var nom = form.nome;
var mat = form.matricula;
var em = form.email;
var sen = form.senha;
var csen = form.csenha;
var env = form.envio;
var ControlMod = new Controlinfor();
var Mod = new Infor();
	nom.setAttribute("maxlength","20");
	mat.setAttribute("maxlength","7");
	em.setAttribute("maxlength","30");
	sen.setAttribute("maxlength","30");
	csen.setAttribute("maxlength","30");
	
	nom.onblur = function(){
		Mod.setNome(nom.value);
		nom.value = ControlMod.mNome();
	};
	mat.onkeyup = function(){
		Mod.setMatricula(mat.value);
		mat.value = ControlMod.mMat();
	};
	mat.onblur = function(){
		if (mat.value.length <7) {
			cmat.innerHTML ="<span style='color:red;padding-left:4px;'>Número incorreto(min:7)</span>";
		}else{
			Mod.setMatricula(mat.value);
			if(ControlMod.proMat()){
				setTimeout(function(){
					if (document.getElementById("ermat")) {
					
					}else{
						if(ControlMod.rMat()){
							}else{
								cmat.innerHTML ="<span id='ermat' style='color:red;padding-left:4px;'>Mátricula não Cadastrada</span>";
							}
					}
				},500);
			}
		}
	}
	em.onfocus = function(){
		cmail.innerHTML="<span id='erema' style='color:red;font-size:13px;padding-left:7px;'>Dígite um Email Válido</span>";
	};
	em.onblur= function(){
		Mod.setEmail(em.value); em.value = ControlMod.mEmail(); 
	};
	em.onblur = function(){
		Mod.setEmail(em.value);
		if(!ControlMod.vEmail()){
		 	cmail.innerHTML="<span style='color:red;padding-left:7px' id='erema'>Email Invalido</span>";
		}else{
			Mod.setEmail(em.value);
			ControlMod.proEmail();
		}
	};
	form.onsubmit = function(e){
		e.preventDefault();
		Mod.setNome(nom.value);
		Mod.setEmail(em.value);
		Mod.setSenha(sen.value);
		Mod.setCsenha(csen.value);
		Mod.setMatricula(mat.value);
		if(ControlMod.proMat()){
			setTimeout(function(){
				if (document.getElementById("ermat")) {

				}else{
					if(ControlMod.rMat()){
						if(ControlMod.vEmail()){
							if (ControlMod.proEmail()) {
								setTimeout(function(){
									if(document.getElementById("erema")){

									}else{
										var result = ControlMod.valida();
										if (result) {
											vld.setAttribute("style","color:red;padding-left:7px;");
											vld.className="w3-center";
											vld.innerHTML ="<div style='padding-left:7px' class='w3-margin-top w3-col s12 w3-padding w3-card w3-center'>"+result+"</div>";
											setTimeout(function(){
														vld.innerHTML="";
											},3000);
										}else{
											env.innerHTML = "<img src='../img/preloader3.gif' width='50' height='30' />";
											if(ControlMod.prosegue()){
												setTimeout(function(){
													env.innerHTML = "Cadastrar <i class='fa fa-check'></i>";
													if (document.getElementById("ercad")) {
														vld.innerHTML = "<div style='padding-left:7px;color:red' class='w3-margin-top w3-col s12 w3-padding w3-card w3-center'>Erro ao Cadastrar tente Novamente!</div>";
													}else{
														vld.innerHTML = "<div style='padding-left:7px;color:green' class='w3-margin-top w3-col s12 w3-padding w3-card w3-center'>Cadastrado com sucesso. Faça Login(Acesse)</div>";
														setTimeout(function(){
															document.getElementById('Cadastro').style.display = 'none';
															document.getElementById('Login').style.display = 'block';
														},1500);
													}
													setTimeout(function(){
														vld.innerHTML="";
													},4000);
												},500);
											}
										}
									}
								},500);
							}
						}
					}else{
						cmat.innerHTML ="<span id='ermat' style='color:red;padding-left:4px;'>Mátricula não Cadastrada</span>";
					}
				}
			},500);
		}
	};

var flogin = document.forms.formlogin;
var eml = flogin.email;
var senl = flogin.senha;
var envl = flogin.envio;
var clog = document.getElementById("retlog");
eml.setAttribute("maxlength","30");
senl.setAttribute("maxlength","30");
eml.onblur = function(){
	Mod.setEmail(eml.value); eml.value = ControlMod.mEmail();
};
flogin.onsubmit = function(e){
	e.preventDefault();
	Mod.setEmail(eml.value);
	Mod.setSenha(senl.value);
	if(ControlMod.proLogin(envl)){
		setTimeout(function(){
			if (document.getElementById('erlog')) {
				clog.innerHTML = "<div style='padding-left:7px;color:red;' class='w3-margin-top w3-col s12 w3-padding w3-card w3-center'>Erro: E-mail ou Senha Incorretos</div>";
				envl.innerHTML = "Entrar <i class='fa fa-check'></i>";
				setTimeout(function(){
					clog.innerHTML = "";
				},4000);
			}else{
				// sessionStorage.setItem('nombre', eml.value);
				clog.innerHTML = "<div style='padding-left:7px;color:green;' class='w3-margin-top w3-col s12 w3-padding w3-card w3-center'>Sucesso: Estamos lhe Redirecionando!</div>";
				setTimeout(function(){window.location.href = "../"},500);
			}
		},1500);
	}
};
}catch(err){
	console.log(err.message);
}
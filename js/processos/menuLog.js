var post = document.getElementById('postagens');
var hom = document.getElementById('homel');
var fots = document.getElementById('fotosl');
var LocalConteudo = document.getElementById("contaja");
var postm = document.getElementById('postagensm');
var homm = document.getElementById('homelm');
var fotsm = document.getElementById('fotoslm');
var editconta = document.getElementById("editarconta");
var editcontaM = document.getElementById("editarcontaM")
var LocalConteudo = document.getElementById("contaja");
var logout = document.getElementById("sair");
var logoutM = document.getElementById("sairM");
var panelUser = document.getElementById("usuario");
var panelUserM = document.getElementById("usuarioM");
var fechausuario = document.getElementById("Fechausuario");
var fechausuarioM = document.getElementById("FechausuarioM");
var miniaja = document.getElementById("logaout"); 
var miniajaM = document.getElementById("logaoutM"); 
post.onclick = function(){
try{
	carregando(LocalConteudo);
	setTimeout(function(){requisitarArquivo("../codigos/conteudoPostagens.php",LocalConteudo);
	document.getElementById("mud").setAttribute("href","../css/apppostagens.css");},500);
	hom.className = hom.className.replace(" w3-border-bottom","");
	fots.className = fots.className.replace(" w3-border-bottom","");
	post.className = post.className.replace(" w3-border-bottom","");
	panelUser.className = panelUser.className.replace(" w3-border-bottom","");
	editconta.className = post.className.replace(" w3-border-bottom","");
	post.className += " w3-border-bottom"; 
	document.documentElement.scrollTop = 500;
	document.body.scrollTop= 500;
	
}catch(err){
	alert(err.message);
}
};

hom.onclick = function(){
try{
	carregando(LocalConteudo);
	setTimeout(function(){requisitarArquivo("../codigos/conteudoHome.php",LocalConteudo);
	document.getElementById("mud").setAttribute("href","../css/apphome.css");},500);
	document.documentElement.scrollTop = 500;
	document.body.scrollTop= 500;
	hom.className = hom.className.replace(" w3-border-bottom","");
	fots.className = fots.className.replace(" w3-border-bottom","");
	post.className = post.className.replace(" w3-border-bottom","");
	panelUser.className = panelUser.className.replace(" w3-border-bottom","");
	editconta.className = post.className.replace(" w3-border-bottom","");
	hom.className += " w3-border-bottom"; 
}catch(err){
	alert(err.message);
}
};

fots.onclick = function(){
try{
	carregando(LocalConteudo);
	setTimeout(function(){requisitarArquivo("../codigos/conteudoFotos.php",LocalConteudo);
	document.getElementById("mud").setAttribute("href","../css/appfotos.css");},500);
	document.documentElement.scrollTop = 500;
	document.body.scrollTop= 500;
	hom.className = hom.className.replace(" w3-border-bottom", "");
	fots.className = fots.className.replace(" w3-border-bottom", "");
	post.className = post.className.replace(" w3-border-bottom", "");
	panelUser.className = panelUser.className.replace(" w3-border-bottom","");
	editconta.className = post.className.replace(" w3-border-bottom","");
	fots.className += " w3-border-bottom"; 
}catch(err){
	alert(err.message);
}
};
editconta.onclick = function(){
	try{
		var control = new ControleInnit();
		document.documentElement.scrollTop = 500;
		document.body.scrollTop= 500;
		hom.className = hom.className.replace(" w3-border-bottom","");
		fots.className = fots.className.replace(" w3-border-bottom","");
		post.className = post.className.replace(" w3-border-bottom","");
		editconta.className = editconta.className.replace(" w3-border-bottom","");
		panelUser.className = panelUser.className.replace(" w3-border-bottom","");
		panelUser.className +=" w3-border-bottom";
		editconta.className += " w3-border-bottom";
		control.EditUser();
	}catch(err){
		alert(err.message);
	}
};
postm.onclick = function(){
try{
	carregando(LocalConteudo);
	setTimeout(function(){requisitarArquivo("../codigos/conteudoPostagens.php",LocalConteudo);
	document.getElementById("mud").setAttribute("href","../css/apppostagens.css");},500);
	document.documentElement.scrollTop= 500;
	document.body.scrollTop= 500;
	homm.className = homm.className.replace(" w3-text-orange", "");
	fotsm.className = fotsm.className.replace(" w3-text-orange", "");
	postm.className = postm.className.replace(" w3-text-orange", "");
	editcontaM.className = editcontaM.className.replace(" w3-text-orange","");
	panelUserM.className = panelUserM.className.replace(" w3-text-orange","");
	postm.className += " w3-text-orange"; 
	ClMenu();
}catch(err){
	alert(err.message);
}
};

homm.onclick = function(){
try{
	carregando(LocalConteudo);
	setTimeout(function(){requisitarArquivo("../codigos/conteudoHome.php",LocalConteudo);
	document.getElementById("mud").setAttribute("href","../css/apphome.css");},500);
	document.documentElement.scrollTop = 500;
	document.body.scrollTop= 500;
	homm.className = homm.className.replace(" w3-text-orange", "");
	fotsm.className = fotsm.className.replace(" w3-text-orange", "");
	postm.className = postm.className.replace(" w3-text-orange", "");
	editcontaM.className = editcontaM.className.replace(" w3-text-orange","");
	panelUserM.className = panelUserM.className.replace(" w3-text-orange","");
	homm.className += " w3-text-orange"; 
	ClMenu();
}catch(err){
	alert(err.message);
}
};

fotsm.onclick = function(){
try{
	carregando(LocalConteudo);
	setTimeout(function(){requisitarArquivo("../codigos/conteudoFotos.php",LocalConteudo);
	document.getElementById("mud").setAttribute("href","../css/appfotos.css");},500);
	document.documentElement.scrollTop = 500;
	document.body.scrollTop= 500;
	homm.className = homm.className.replace(" w3-text-orange", "");
	fotsm.className = fotsm.className.replace(" w3-text-orange", "");
	postm.className = postm.className.replace(" w3-text-orange", "");
	editcontaM.className = editcontaM.className.replace(" w3-text-orange","");
	panelUserM.className = panelUserM.className.replace(" w3-text-orange","");
	fotsm.className += " w3-text-orange"; 
	ClMenu();
}catch(err){
	alert(err.message);
}
};
editcontaM.onclick = function(){
	try{
		var control = new ControleInnit();
		setTimeout(function(){requisitarArquivo("../codigos/conteudoEditarConta.php",LocalConteudo);
		document.getElementById("mud").setAttribute("href","../css/appfotos.css");},500);
		document.documentElement.scrollTop = 500;
		document.body.scrollTop= 500;
		homm.className = homm.className.replace(" w3-text-orange","");
		fotsm.className = fotsm.className.replace(" w3-text-orange","");
		postm.className = postm.className.replace(" w3-text-orange","");
		editcontaM.className = editcontaM.className.replace(" w3-text-orange","");
		panelUserM.className = panelUserM.className.replace(" w3-text-orange","");
		panelUserM.className +=" w3-text-orange";
		editcontaM.className += " w3-text-orange";
		control.EditUser();
		ClMenu();
	}catch(err){
		alert(err.message);
	}
};
window.onload = function(){
	try{
		if (document.getElementById("pvisittrue")) {
			var divvisit = document.getElementById("pvisittrue");
			requisitarArquivo("../processos/Visitante.php",divvisit);
			setTimeout(function(){
				var Controle = new ControleInnit();
				Controle.vPvisit();
			},1000);
		}
	}catch(err){
		alert(err.message);
	}
}
logout.onclick = function(){
	var Controle = new ControleInnit();
	Controle.Sair();
}
logoutM.onclick = function(){
	var Controle = new ControleInnit();
	Controle.SairM();
}
function UserO() {
    document.getElementById("MenuUser").style.display = "block";
}
function UserC() {
    document.getElementById("MenuUser").style.display = "none";
}
function UserOM() {
    document.getElementById("MenuUserM").style.display = "block";
}
function UserCM() {
    document.getElementById("MenuUserM").style.display = "none";
}
// function da(){
// 	alert("oi");
// }
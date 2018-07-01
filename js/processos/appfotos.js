
    try {
        var ExibirFotos = document.getElementById("ExibirFotos");
        requisitarArquivo("../processos/ExibirFotos.php", ExibirFotos);
        if (document.getElementById("Inserir")) {
            var BtnInserirFoto = document.getElementById("Inserir");
            var FormularioFotos = document.forms.FormFotos;
            var foto = FormularioFotos.fotos;
            var viw = document.getElementById("View");
            var Retorno = document.getElementById("enviarComentario");
            var Enviar = FormularioFotos.enviar;
            var bProg = document.getElementById("barradeProgresso");
            var ControleF = new ControleFotos();
            var Mod = new FotosM();
            BtnInserirFoto.onclick = function() {
                document.getElementById("InserirFoto").style.display = "block";
            }
            foto.onchange = function() {
                Retorno.innerHTML = "";
                Mod.setFoto(foto);
                ControleF.View();
            }
            FormularioFotos.onsubmit = function(e) {
                e.preventDefault();
                foto.onchange();
                if (document.getElementById("errfot")) {
                    Retorno.innerHTML = "<div id='errfot' class='w3-center w3-text-red'>Selecione uma Imagem</div>";
                } else {
					Mod.setBarra(bProg);
					Mod.setFoto(foto);
					Mod.setBtnEnviar(Enviar);
					Mod.setContainer(Retorno);
					ControleF.EnviarFoto();
					setTimeout(function(){
						if(document.getElementById("errfot")){
							Retorno.innerHTML ="<div id='errfot' class='w3-center w3-text-red'>Selecione uma foto!</div>";
						}else if(!document.getElementById("supost")){
							Retorno.innerHTML = "<div id='errfot' class='w3-center w3-text-red'>Erro ao inserir foto tente novamente.</div>";
						}	
					},1000);
                }
            };
        }

        function AmpliarImagem(img) {
            document.getElementById("ImgMudarM" ).src = img.src;
            document.getElementById("VerImagemAmp").style.display = "block";
            document.getElementById("caption").innerHTML = img.alt;
        }
        function ExcluirFoto(idfotexl){
            var ContFotEx = document.getElementById("ExcluirFotoCont");
            if(ControleF.ExcluirFotoP(ContFotEx,idfotexl)){
                setTimeout(function(){
                    if(document.getElementById("susExclu")){
                        requisitarArquivo("../processos/ExibirFotos.php", ExibirFotos);
                        ContFotEx.innerHTML="<div class='w3-center w3-text-green'>Excluida Com Sucesso!</div>";
                    }else{
                        ContFotEx.innerHTML="<div class='w3-center w3-text-red'>Erro ao excluir Imagem, tente novamente!</div>";
                    }   
                    setTimeout(function(){
                        ContFotEx.innerHTML="";
                    },2000)
                },1000);
            }
        }
        function SolicitarExcluirFoto(idfotsoli){
            var ModalExcluir =  document.getElementById("ExcluirConfirma");
            var ImgFotoConfEx = document.getElementById("ImgExcluirConf");
                ImgFotoConfEx.src="../processos/Foto.php?id="+idfotsoli;
            var ConfirmarExclucao = document.getElementById("ConfirmarExcluir");
                ConfirmarExclucao.onclick = function(){
                    ExcluirFoto(idfotsoli);
                    setTimeout(function(){
                        ModalExcluir.style.display="none";
                        ImgFotoConfEx.src="";
                    },200);
                };  
            ModalExcluir.style.display="block";
        }
    } catch (err) {
        console.log(err.message);
        if(Fotos){
            Fotos.onclick();
        }else{
            FotosMob.onclick();
        }
    }
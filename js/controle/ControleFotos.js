class ControleFotos {
    View() {
        var ImgRead = new FileReader();
        ImgRead.readAsDataURL(Mod.getFoto().files[0]);
        ImgRead.onload = function(oFREvent) {
            if (oFREvent.target.result.includes("image/jpg") || oFREvent.target.result.includes("image/png") || oFREvent.target.result.includes("image/jpeg")) {
                viw.src = oFREvent.target.result;
            } else {
                viw.src = "../img/FotoMais.jpg";
                Retorno.innerHTML = "<div id='errfot' class='w3-center w3-text-red'>Selecione uma Imagem jpg,png,jpeg</div>";
            }
        };
    }
    EnviarFoto() {
        var resultado = false;
        try {
        alert(Mod.getContainer());
            var BtndeEnv = Mod.getBtnEnviar();
            var barra = Mod.getBarra();
            var ExecutarFoto = Mod.getContainer();
            BtndeEnv.innerHTML = "Enviando...";
            var arquivos = Mod.getFoto().files;
            var formData = new FormData();
            for (var i = 0; i < arquivos.length; i++) {
                var arquivo = arquivos[i];
                formData.append(i, arquivo, arquivo.name);
            }
            var ajax = iniciarAjax();
            ajax.onreadystatechange = function() { // Evento de mudança de estado
                mostrarResposta(ExecutarFoto, ajax); // Execução da resposta da requisição
            };
            ajax.open("POST", "../processos/InserirFoto.php");
            ajax.upload.onloadstart = function() {
                barra.style.display = "block";
                barra.value = 0;
            };
            ajax.upload.onloadprogress = function(e) {
                if (e.lengthComputable) {
                    barra.max = e.total;
                    barra.value = e.loaded;
                }
            };
            ajax.upload.onloadend = function(e) {
                barra.value = e.loaded;
                setTimeout(function() {
                    barra.style.display = "none";
                }, 1000);
            };
            ajax.send(formData);
            ajax.onload = function() {
                if (ajax.status === 200) {
                    BtndeEnv.innerHTML = 'Enviar <i class="fa fa-arrow-right"></i>';
                    foto.value = "";
                    viw.src = "../img/FotoMais.jpg";
                    requisitarArquivo("../processos/ExibirFotos.php", ExibirFotos);
                } else {
                     document.getElementById("AvisoComunicacao").style.display = "block";
                }
            };
        } catch (err) {
            console.log(err.message);
        }
    }
    ExcluirFotoP(ContExcluir,idfti){
        var resultado = false;
            try{
                if(requisitarArquivo("../processos/ExcluirFoto.php?id="+idfti,ContExcluir)){
                    resultado = true;
                }
            }catch(err){
                console.log(err.message);
            }
        return resultado;
    }
}
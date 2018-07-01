class ControleHome {
    ViewHome() {
        var ImgReadhome = new FileReader();
        ImgReadhome.readAsDataURL(ModHome.getFoto().files[0]);
        ImgReadhome.onload = function(oFREvent) {
            if (oFREvent.target.result.includes("image/jpg") || oFREvent.target.result.includes("image/png") || oFREvent.target.result.includes("image/jpeg")) {
                Imgview.src = oFREvent.target.result;
            } else {
                Imgview.src = "../img/FotoMais.jpg";
                RetornoHome.innerHTML = "<div id='errfot' class='w3-center w3-text-red'>Selecione uma Imagem jpg,png,jpeg</div>";
            }
        };
    }
    InserirNaLinha() {
        try {
            var BtnEnviarHome = ModHome.getBtnEnviar();
            var barraLHome = ModHome.getBarra();
            var ExecutarLinha = ModHome.getContainer();
            BtnEnviarHome.innerHTML = "Enviando...";
            var arquivos = ModHome.getFoto().files;
            var formDataHome = new FormData();
            for (var i = 0; i < arquivos.length; i++) {
                var arquivo = arquivos[i];
                formDataHome.append(i, arquivo, arquivo.name);
            }
            var ajax = iniciarAjax();
            ajax.onreadystatechange = function() { // Evento de mudança de estado
                mostrarResposta(ExecutarLinha, ajax); // Execução da resposta da requisição
            };
            ajax.open("POST", "../processos/InserirLinha.php?nome=" + ModHome.getNome() + "&descricao=" + ModHome.getDescricao());
            ajax.upload.onloadstart = function() {
                barraLHome.style.display = "block";
                barraLHome.value = 0;
            };
            ajax.upload.onloadprogress = function(e) {
                if (e.lengthComputable) {
                    barraLHome.max = e.total;
                    barraLHome.value = e.loaded;
                }
            };
            ajax.upload.onloadend = function(e) {
                barraLHome.value = e.loaded;
                setTimeout(function() {
                    barraLHome.style.display = "none";
                }, 1000);
            };
            ajax.send(formDataHome);
            ajax.onload = function() {
                if (ajax.status === 200) {
                    BtnEnviarHome.innerHTML = 'Enviar <i class="fa fa-arrow-right"></i>';
                    Fotohome.value = "";
                    NomeHome.value = "";
                    DescricaoHome.value = "";
                    Imgview.src = "../img/FotoMais.jpg";
                    requisitarArquivo("../processos/ExibirLinha.php", ExibirLinhaH);
                    document.getElementById('InserirLinha').style.display='none';
                } else {
                    console.log('Erro ao processar!');
                }
            };
        } catch (err) {
            console.log(err.message);
        }
    }
    ProsseguirExcluir(id){
        var retorno = false;
        try{
            if(requisitarArquivo("../processos/ExcluirLinha.php?id="+id)){
                retorno = true;
            }
        } catch (err) {
            console.log(err.message);
        }
        return retorno;
    }
}
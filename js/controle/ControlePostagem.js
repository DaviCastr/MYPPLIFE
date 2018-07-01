class ControlePostagem {
    PreviewPostImg() {
        try {
            var ImgRead = new FileReader();
            ImgRead.readAsDataURL(Mod.getFoto().files[0]);
            ImgRead.onload = function(oFREvent) {
                if (oFREvent.target.result.includes("image/jpg") || oFREvent.target.result.includes("image/png") || oFREvent.target.result.includes("image/jpeg")) {
                    modalPrevImag.style.display = "block";
                    prevePostImg.src = oFREvent.target.result;
                } else {
                    modalPrevImag.style.display = "block";
                    prevePostImg.src = "../img/FotoMais.jpg";
                    RespView.innerHTML = "<div id='errfot' class='w3-center w3-text-red'>Selecione uma Imagem jpg,png,jpeg</div>";
                }
            };
        } catch (err) {
            console.log(err.message);
        }
    }
    InserirPostagem() {
        var resultado = false;
        try {
            var Conteudo = new FormData(FormInserirPostagem);
            if (requisitarArquivoP("../processos/InserirPostagem.php", inserirPostagem, Conteudo)) {
                resultado = true;
            }
        } catch (err) {
            console.log(err.message);
        }
        return resultado;
    };
    InserirComentario() {
        var resultado = false;
        try {
            var Conteudo = new FormData(FormInserirComentario);
            if (requisitarArquivoP("../processos/InserirComentario.php", inserirComentario, Conteudo)) {
                resultado = true;
            }
        } catch (err) {
            console.log(err.message);
        }
        return resultado;
    };
    CurtirPostagem(container) {
        var resultado = false;
        try {
            carregandoPost(container);
            if (requisitarArquivo("../processos/InserirCurtida.php?id=" + Mod.getId(), container)) {
                // setTimeout(function() {
                //     requisitarArquivo("../processos/ExibePostagens.php", ExibirPost);
                // }, 1000);
                resultado = true;
            }
        } catch (err) {
            console.log(err.message);
        }
        return resultado;
    };
    AtualizarPostagens(){
        setInterval(function(){
            requisitarArquivo("../processos/ExibePostagens.php", ExibirPost);
        },60000);
    };
}
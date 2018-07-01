
    try {
        var ExibirPost = document.getElementById("ExibePostagens");
        requisitarArquivo("../processos/ExibePostagens.php", ExibirPost);
        if (document.forms.FormInserirPost) {
            var FormInserirPostagem = document.forms.FormInserirPost;
            var descri = FormInserirPostagem.descricao;
            var arc = FormInserirPostagem.arquivo;
            var prevePostImg = document.getElementById("imgPostPrev");
            var modalPrevImag = document.getElementById("ModalPrevPost");
            var inserirPostagem = document.getElementById("inserirPostagem");
            var RespView = document.getElementById("respostapostimg");
            var Mod = new Postagem();
            var Controle = new ControlePostagem();
            Controle.AtualizarPostagens();
            arc.onchange = function() {
                Mod.setFoto(arc);
                modalPrevImag.style.display = "block";
                Controle.PreviewPostImg();
            };
            FormInserirPostagem.onsubmit = function(e) {
                e.preventDefault();
                if (document.getElementById("errfot")) {} else {
                    if (descri.value != '' || arc.value != '') {
                        Mod.setDescricao(descri.value);
                        if (Controle.InserirPostagem()) {
                            descri.value = "";
                            arc.value = "";
                            setTimeout(function() {
                                requisitarArquivo("../processos/ExibePostagens.php", ExibirPost);
                                inserirPostagem.innerHTML = "";
                            }, 500);
                        }
                    }
                }
            };
        }

        function Comentario(idcomentario) {
            var ModalComentario = document.getElementById("ComentarioPost").style.display = "block";
            var FormularioComentarioo = document.forms.FormulariodeComentario;
            var EnviarComent = document.getElementById("enviarComentario");
            var BtnCom = FormularioComentarioo.enviarC;
            var Idpost = FormularioComentarioo.id;
            var ComentarioCampo = FormularioComentarioo.comentario;
            var ExibirComent = document.getElementById("ExibirComentarios");
            requisitarArquivo("../processos/ExibeComentarios.php?id=" + idcomentario, ExibirComent);
            Idpost.setAttribute("value", idcomentario);
            FormulariodeComentario.onsubmit = function(e) {
                e.preventDefault();
                if (ComentarioCampo.value.length != 0) {

                    var ComentarioValor = new FormData(FormulariodeComentario);
                    if (requisitarArquivoP("../processos/InserirComentario.php", EnviarComent, ComentarioValor)) {
                        BtnCom.innerHTML = "<img src='../img/preloader.gif' width='20' height='20' />";
                        ComentarioCampo.value = "";
                        setTimeout(function() {
                            requisitarArquivo("../processos/ExibeComentarios.php?id=" + idcomentario, ExibirComent);
                            requisitarArquivo("../processos/ExibePostagens.php", ExibirPost);
                            ExibirComent.scrollTop = 200;
                            BtnCom.innerHTML = "<i class='fa fa-arrow-right'></i>";
                        }, 1500);
                    }
                }
            };
        }

        function Curtir(container, postagemID) {
            Mod.setId(postagemID);
            Controle.CurtirPostagem(container);
        }

    } catch (err) {
        console.log(err.message);
        if(Postagens){
            Postagens.onclick();
        }else{
            POstagensMob.onclick();
        }
    }
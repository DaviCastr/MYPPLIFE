
try {
    var ExibirLinhaH = document.getElementById("ExibirLinhaHome");
    requisitarArquivo("../processos/ExibirLinha.php", ExibirLinhaH);
    var ExibirSl = document.getElementById("ExibirSlideHome");
    var qtslide = 1;
    var AdicionarLinha = document.getElementById("Inserir");
    var DivExcluir  = document.getElementById("ExcluirLinhaDiv");
    var modalAtualizar = document.getElementById("AtualizarLinha");
    if (document.forms.FormInserirLinha) {
        var FormInserirL = document.forms.FormInserirLinha;
        var Fotohome = FormInserirL.fotos;
        var NomeHome = FormInserirL.nome;
        var DescricaoHome = FormInserirL.descricao;
        var RetornoHome = document.getElementById("enviarLinha");
        var Imgview = document.getElementById("ViewHoem");
        var BtnEnviarHome = FormInserirL.Enviar;
        var BarraProgHome = document.getElementById("barradeProgressoHome");
        var ModHome = new Home();
        var Control = new ControleHome();
        Fotohome.onchange = function() {
            ModHome.setFoto(Fotohome);
            Control.ViewHome();
        };
        FormInserirL.onsubmit = function(e) {
            e.preventDefault();

            if (NomeHome.value != "" && DescricaoHome.value != "") {
                ModHome.setNome(NomeHome.value);
                ModHome.setDescricao(DescricaoHome.value);
                ModHome.setBtnEnviar(BtnEnviarHome);
                ModHome.setContainer(RetornoHome);
                ModHome.setBarra(BarraProgHome);
                Control.InserirNaLinha();
            }
        };
        AdicionarLinha.onclick = function() {
            document.getElementById("InserirLinha").style.display = "block";
        };
        function ExcluirLinha(idlinha){
            if(Control.ProsseguirExcluir(idlinha)){
                requisitarArquivo("../processos/ExibirLinha.php", ExibirLinhaH);
            }
        };
        function ModalAtualizarLinha(idlinhaM){
            // document.getElementById("ViewHoemAtu").src = "../processos/LinhaImagem.php?id="+idlinhaM;
            // document.getElementById("fotosAtu").value = nomelinha;
            // document.getElementById("descricaoAtu").value = desclinha;
            modalAtualizar.style.display="block";
        };
        function AtualizarLinha(idlinhaA){

        };
    }
    carregaslide(qtslide, "");
     // setInterval(function() { carregaslide(qtslide, ""); }, 10000);

    function carregaslide(qt, tee) {
        var i;
        var sli = document.getElementsByClassName('imgslide');
        if (qt > sli.length) { qtslide = 1; }
        if (qt < 0 || qt == 0) { qtslide = sli.length; }
        for (i = 0; i < sli.length; i++) {
            sli[i].style.display = 'none';
            sli[i].className = sli[i].className.replace(" w3-animate-opacity", "");
        }
        sli[qtslide - 1].style.display = "block";
        sli[qtslide - 1].className += " w3-animate-opacity";
        if (tee == "") {
            qtslide++;
        }
    }

    function adslide(ad) {
        carregaslide(qtslide += ad, "w");
    }

} catch (err) {
    console.log(err.message);
    if(HomePc){
        HomePc.onclick();
    }else{
        HomeMob.onclick();
    }
}
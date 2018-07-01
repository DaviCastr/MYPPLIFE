var FormdeContato = document.forms.FormulariodeContato;
var nomeC = FormdeContato.nome;
var emailC = FormdeContato.email;
var mensagemC = FormdeContato.mensagem;
var DivEnviarmen = document.getElementById("EnviarMensagemC");
emailC.setAttribute("maxlength", "30");
nomeC.setAttribute("maxlength", "18");

function vEmailC(ValidEmailC) {
    var retorno = false;
    try {
        var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (pattern.test(ValidEmailC)) {
            retorno = true;
        } else {
            retorno = false;
        }
    } catch (err) {
        alert(err.message);
    }
    return retorno;
};
FormdeContato.onsubmit = function(e) {
    e.preventDefault();
    if (vEmailC(emailC.value)) {
        var FromContato = new FormData(FormdeContato);
        carregandoCont(DivEnviarmen);
        requisitarArquivoP("../processos/EnviarContato.php", DivEnviarmen, FromContato);
        setTimeout(function() { DivEnviarmen.innerHTML = ""; }, 2000);
    } else {
        DivEnviarmen.innerHTML = "<div class='w3-text-red w3-white w3-center'>E-mail Inválido!</div>";
        setTimeout(function() { DivEnviarmen.innerHTML = ""; }, 2000);
    }
}
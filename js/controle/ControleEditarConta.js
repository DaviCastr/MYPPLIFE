class ControleEditarConta {
    Nome() {
        var retorno = null;
        try {
            var r = Mod.getNome().toLowerCase();
            r = r.replace(/[!-^]+/g, "");
            r = r.replace(/[¨]+/g, "");
            r = r.replace(/[{-}]+/g, "");
            Mod.setNome(r);
            retorno = Mod.getNome().toUpperCase();
        } catch (erro) {
            console.log(erro.message);
        }
        return retorno;
    }
    Email() {
        var retorno = null;
        try {
            var r = Mod.getEmail().toLowerCase();
            r = r.replace(/[´\^]+/g, "");
            r = r.replace(/[!\~]+/g, "");
            r = r.replace(/[{-}]+/g, "");
            r = r.replace(/[[-^]+/g, "");
            r = r.replace(/[(-)]+/g, "");
            retorno = r;
        } catch (erro) {
            console.log(erro.message);
        }
        return retorno;
    }
    VEmail() {
        var retorno = false;
        try {
            var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (pattern.test(Mod.getEmail())) {
                retorno = true;
            } else {
                retorno = false;
            }
        } catch (err) {
            console.log(err.message);
        }
        return retorno;
    }
    validar() {
        var retorno = false;
        try {
            if (document.getElementById("erimg") || document.getElementById("errfot")) {
                retorno = "Insira uma imagem! obs:Menor que 2Mb";
            } else if (Mod.getNome().length < 4) {
                retorno = "Nome Incompleto";
            } else if (Mod.getEmail().length < 13) {
                retorno = "Email maior que 13 carácteres e menor que 30 carácteres";
            } else if (document.getElementById('erema')) {
                retorno = "Dígite um Email Válido";
            } else if (Mod.getSenha().length < 8) {
                retorno = "Senha menor que 8 dígitos";
            } else {
                retorno = false;
            }
        } catch (err) {
            console.log(err.message);
        }
        return retorno;
    }
    pesqEmail() {
        var retorno = false;
        try {
            if (requisitarArquivo("../processos/VerificarEmail.php?em=" + Mod.getEmail(), retEm)) {
                retorno = true;
            } else {
                retorno = false;
            }
        } catch (err) {
            console.log(err.message);
        }
        return retorno;
    };
    View() {
        var ImgRead = new FileReader();
        ImgRead.readAsDataURL(Mod.getFoto().files[0]);
        ImgRead.onload = function(oFREvent) {
            if (oFREvent.target.result.includes("image/jpg") || oFREvent.target.result.includes("image/png") || oFREvent.target.result.includes("image/jpeg")) {
                viw.src = oFREvent.target.result;
            } else {
                viw.src = "../img/FotoMais.jpg";
                Retorno.innerHTML = "<div id='errfot' class='w3-center w3-text-red'>Selecione uma Imagem</div>";
            }
        };
    };
}
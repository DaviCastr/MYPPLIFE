
    try {
        var execedit = document.getElementById('execEditarconta');
        var formeditaconta = document.forms.editarConta;
        var prog = document.getElementById("barra");
        var btneditcont = formeditaconta.envio;
        var menuuser = document.getElementById("menuUser");
        var menuuserM = document.getElementById("menuUserM");
        var panelUser = document.getElementById("UsuarioPc");
        var panelUserM = document.getElementById("UsuarioMob");
        var Retorno = document.getElementById("EditarPerfil");
        var viw = document.getElementById("ImgPErfilMUd");
        var nom = formeditaconta.nome;
        var perf = formeditaconta.Mperfil;
        var emai = formeditaconta.email;
        var senh = formeditaconta.senha;
        var retEm = document.getElementById("retEmail");
        var Mod = new EditarConta();
        var contr = new ControleEditarConta();
        perf.onchange = function() {
            Retorno.innerHTML = "";
            Mod.setFoto(perf);
            contr.View();
        };
        nom.setAttribute("maxlength", "18");
        emai.setAttribute("maxlength", "30");
        senh.setAttribute("maxlength", "30");
        nom.onblur = function() {
            Mod.setNome(nom.value);
            nom.value = contr.Nome();
        };
        emai.onblur = function() {
            Mod.setEmail(emai.value);
            emai.value = contr.Email();
            if (!contr.VEmail()) {
                retEm.innerHTML = "<span id='erema' style='color:red;padding-left:7px'>E-mail Inválido!</span>";
            } else {
                if (contr.pesqEmail()) {

                }
            }
        };
        formeditaconta.onsubmit = function(e) {
            e.preventDefault();
            // var ajax = iniciarAjax();
            Mod.setNome(nom.value);
            Mod.setEmail(emai.value);
            Mod.setSenha(senh.value);
            var retornoV = contr.validar();
            if (retornoV) {
                execedit.innerHTML = "<div style='padding-left:7px;color:red;' class='w3-margin-top w3-margin-bottom w3-col s12 w3-padding w3-card w3-center'>" + retornoV + "</div>";
                setTimeout(function() {
                    execedit.innerHTML = "";
                }, 3000);
            } else {
                btneditcont.innerHTML = "<img src='../img/preloader3.gif' width='50' height='30' />";
                var formData = new FormData(formeditaconta);
                setTimeout(function() {
                    if (requisitarArquivoP("../processos/EditarConta.php", execedit, formData)) {
                        setTimeout(function() {
                            if (document.getElementById("confimg")) {
                                document.getElementById("imgusermud").setAttribute("src", "../img/preloader.gif");
                            }
                        }, 200);
                        setTimeout(function() {
                            btneditcont.innerHTML = "Salvar <i class='fa fa-check'></i>";
                            if (document.getElementById("suEdi")) {
                                execedit.innerHTML = "<div style='padding-left:7px;color:green;' class='w3-margin-top w3-margin-bottom w3-col s12 w3-padding w3-card w3-center'>Dados Atualizados com Sucesso! Redirecionando..</div>";
                                requisitarArquivo("../codigos/menuUser.php", menuuser);
                                requisitarArquivo("../codigos/menuNome.php", panelUser);
                                requisitarArquivo("../codigos/menuUserMob.php", menuuserM);
                                requisitarArquivo("../codigos/menuNomeMob.php", panelUserM);
                                var titulo = document.getElementsByTagName("title");
                                titulo[0].innerHTML = Mod.getNome();
                                setTimeout(function() {
                                    ContaPc.onclick();
                                }, 2000);
                            } else if (document.getElementById("erimg")) {
                                execedit.innerHTML = "<div style='padding-left:7px;color:red;' class='w3-margin-top w3-margin-bottom w3-col s12 w3-padding w3-card w3-center'>Insira uma imagem! obs:Menor que 2Mb</div>";
                            } else {
                                execedit.innerHTML = "<div style='padding-left:7px;color:red;' class='w3-margin-top w3-margin-bottom w3-col s12 w3-padding w3-card w3-center'>Erro ao Atualizar!</div>";
                            }
                            setTimeout(function() {
                                execedit.innerHTML = "";
                            }, 3000);

                        }, 1500);
                    }
                }, 1000);
            }
        }
    } catch (err) {
        console.log(err.message);
        if(EditaConta){
            EditaConta.onclick();
        }else{
            EditaContaM.onclick();
        }
    }
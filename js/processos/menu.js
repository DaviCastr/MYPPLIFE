try {
    var Postagens = document.getElementById('Postagens');
    var Fotos = document.getElementById('Fotos');
    var LocalConteudo = document.getElementById("contaja");
    var POstagensMob = document.getElementById('PostagensMob');
    var HomePc = document.getElementById('HomePc');
    var HomeMob = document.getElementById("HomeMob");
    var FotosMob = document.getElementById('FotosMob');
    var EditaConta = document.getElementById("EditarConta");
    var EditaContaM = document.getElementById("EditarContaM");
    var LocalConteudo = document.getElementById("contaja");
    var ForLogin = document.getElementById("ForLogin");
    var ForCadastro = document.getElementById("ForCadastro");
    var ForPcLogin = document.getElementById("ForPcLogin");
    var BatePapaDivPc = document.getElementById("PessoasBatepapoPc");
    var BatePapaDivMob = document.getElementById("PessoasBatepapoMob");
    var BatePapoPcL = document.getElementById("BatePapoPcLink");
    // Sessão
    var MenuContaPc = document.getElementById("UsuarioPc");
    var MenuContaMob = document.getElementById("UsuarioMob");
    var FecharMenuContaPc = document.getElementById("FecharMenuConta");
    var FecharMenuContaMob = document.getElementById("FecharMenuContaM");
    var CSair = document.getElementById("Logout");
    var CSairM = document.getElementById("LogoutM");
    var Logout = document.getElementById("Sair");
    var LogoutM = document.getElementById("SairM");
    var ContaPc = document.getElementById("ContaPc");
    var ContaMob = document.getElementById("ContaMob");

    function AbMenuFunction() {
        document.getElementById("MMenu").style.display = "block";
        document.getElementById("topo").style.display = "none";
    }

    function ClMenu() {
        document.getElementById("MMenu").style.display = "none";
    }
    HomePc.onclick = function() {
        try {
            carregando(LocalConteudo);
            if (requisitarArquivo("../codigos/conteudoHome.php", LocalConteudo)) {
                document.getElementById("mud").setAttribute("href", "../css/apphome.css");
                document.documentElement.scrollTop = 500;
                document.body.scrollTop = 500;
                setTimeout(function() {
                    var modhome = document.createElement("script");
                    modhome.setAttribute("src", "../js/modelo/Home.js");
                    var controlhome = document.createElement("script");
                    controlhome.setAttribute("src", "../js/controle/ControleHome.js");
                    var cript = document.createElement("script");
                    cript.setAttribute("src", "../js/processos/apphome.js");
                    var homcript = document.getElementById("homescripts");
                    homcript.appendChild(modhome);
                    homcript.appendChild(controlhome);
                    homcript.appendChild(cript);
                }, 1500);
            }
        } catch (err) {
            alert(err.message);
        }
    };
    HomeMob.onclick = function() {
        try {
            carregando(LocalConteudo);
            if (requisitarArquivo("../codigos/conteudoHome.php", LocalConteudo)) {
                document.getElementById("mud").setAttribute("href", "../css/apphome.css");
                document.documentElement.scrollTop = 500;
                document.body.scrollTop = 500;
                setTimeout(function() {
                    var modhome = document.createElement("script");
                    modhome.setAttribute("src", "../js/modelo/Home.js");
                    var controlhome = document.createElement("script");
                    controlhome.setAttribute("src", "../js/controle/ControleHome.js");
                    var cript = document.createElement("script");
                    cript.setAttribute("src", "../js/processos/apphome.js");
                    var homcript = document.getElementById("homescripts");
                    homcript.appendChild(modhome);
                    homcript.appendChild(controlhome);
                    homcript.appendChild(cript);
                }, 1500);
                ClMenu();
            }
        } catch (err) {
            alert(err.message);
        }
    };

    Postagens.onclick = function() {
        try {
            document.documentElement.scrollTop = 500;
            document.body.scrollTop = 500;
            carregando(LocalConteudo);
            if (requisitarArquivo("../codigos/conteudoPostagens.php", LocalConteudo)) {
                document.getElementById("mud").setAttribute("href", "../css/apppostagens.css");
                setTimeout(function() {
                    var modelpost = document.createElement("script");
                    modelpost.setAttribute("src", "../js/modelo/Postagem.js");
                    var controlepost = document.createElement("script");
                    controlepost.setAttribute("src", "../js/controle/ControlePostagem.js");
                    var cript = document.createElement("script");
                    cript.setAttribute("src", "../js/processos/apppostagem.js");
                    var postcript = document.getElementById("postscript");

                    postcript.appendChild(modelpost);
                    postcript.appendChild(controlepost);
                    postcript.appendChild(cript);
                }, 1500);
            }
        } catch (err) {
            alert(err.message);
        }
    };

    POstagensMob.onclick = function() {
        try {
            carregando(LocalConteudo);
            if (requisitarArquivo("../codigos/conteudoPostagens.php", LocalConteudo)) {
                document.getElementById("mud").setAttribute("href", "../css/apppostagens.css");
                document.documentElement.scrollTop = 500;
                document.body.scrollTop = 500;
                setTimeout(function() {
                    var modelpost = document.createElement("script");
                    modelpost.setAttribute("src", "../js/modelo/Postagem.js");
                    var controlepost = document.createElement("script");
                    controlepost.setAttribute("src", "../js/controle/ControlePostagem.js");
                    var cript = document.createElement("script");
                    cript.setAttribute("src", "../js/processos/apppostagem.js");
                    var postcript = document.getElementById("postscript");
                    postcript.appendChild(modelpost);
                    postcript.appendChild(controlepost);
                    postcript.appendChild(cript);
                }, 1500);
                // homm.className = homm.className.replace(" w3-text-orange", "");
                // fotsm.className = fotsm.className.replace(" w3-text-orange", "");
                // postm.className = postm.className.replace(" w3-text-orange", "");
                // editcontaM.className = editcontaM.className.replace(" w3-text-orange", "");
                // panelUserM.className = panelUserM.className.replace(" w3-text-orange", "");
                // postm.className += " w3-text-orange";
                ClMenu();
            }
        } catch (err) {
            alert(err.message);
        }
    };

    Fotos.onclick = function() {
        try {
            carregando(LocalConteudo);
            if (requisitarArquivo("../codigos/conteudoFotos.php", LocalConteudo)) {
                document.getElementById("mud").setAttribute("href", "../css/appfoto.css");
                document.documentElement.scrollTop = 500;
                document.body.scrollTop = 500;
                setTimeout(function() {
                    var modfoto = document.createElement("script");
                    modfoto.setAttribute("src", "../js/modelo/Fotos.js");
                    var controlfoto = document.createElement("script");
                    controlfoto.setAttribute("src", "../js/controle/ControleFotos.js");
                    var cript = document.createElement("script");
                    cript.setAttribute("src", "../js/processos/appfotos.js");
                    var fotcript = document.getElementById("fotsscript");
                    fotcript.appendChild(modfoto);
                    fotcript.appendChild(controlfoto);
                    fotcript.appendChild(cript);
                }, 1500);
            }
        } catch (err) {
            alert(err.message);
        }
    };

    FotosMob.onclick = function() {
        try {
            carregando(LocalConteudo);
            if (requisitarArquivo("../codigos/conteudoFotos.php", LocalConteudo)) {
                document.getElementById("mud").setAttribute("href", "../css/appfoto.css");
                document.documentElement.scrollTop = 500;
                document.body.scrollTop = 500;
                setTimeout(function() {
                    var modfoto = document.createElement("script");
                    modfoto.setAttribute("src", "../js/modelo/Fotos.js");
                    var controlfoto = document.createElement("script");
                    controlfoto.setAttribute("src", "../js/controle/ControleFotos.js");
                    var cript = document.createElement("script");
                    cript.setAttribute("src", "../js/processos/appfotos.js");
                    var fotcript = document.getElementById("fotsscript");
                    fotcript.appendChild(modfoto);
                    fotcript.appendChild(controlfoto);
                    fotcript.appendChild(cript);
                }, 2000);
                ClMenu();
            }
        } catch (err) {
            alert(err.message);
        }
    };
    if (document.getElementById("ForLogin")) {
        ForLogin.onclick = function() {
            document.getElementById('Login').style.display = 'block';
        };

        ForCadastro.onclick = function() {
            document.getElementById('Cadastro').style.display = 'block';
        };

        ForPcLogin.onclick = function() {
            document.getElementById('Login').style.display = 'block';
        };

        ForPcCadastro.onclick = function() {
            document.getElementById('Cadastro').style.display = 'block';
        };
    }
    if (document.getElementById("MenuUserPc")) {
        MenuContaPc.onclick = function() {
            document.getElementById("MenuUserPc").style.display = "block";
        };

        MenuContaMob.onclick = function() {
            document.getElementById("MenuUserMob").style.display = "block";
        };

        FecharMenuContaPc.onclick = function() {
            document.getElementById("MenuUserPc").style.display = "none";
        };

        FecharMenuContaMob.onclick = function() {
            document.getElementById("MenuUserMob").style.display = "none";
        };

        Logout.onclick = function() {
            var Controle = new ControleInnit();
            Controle.Sair();
        };
        LogoutM.onclick = function() {
            var Controle = new ControleInnit();
            Controle.SairM();
        };
        EditaConta.onclick = function EditarSuaConta() {
            try {
                document.documentElement.scrollTop = 500;
                document.body.scrollTop = 500;
                carregando(LocalConteudo);
                if (requisitarArquivo("../codigos/conteudoEditarConta.php", LocalConteudo)) {
                    document.getElementById("mud").setAttribute("href", "../css/appeditarconta.css");
                    setTimeout(function() {
                        var modeledit = document.createElement("script");
                        modeledit.setAttribute("src", "../js/modelo/EditarConta.js");
                        var controledit = document.createElement("script");
                        controledit.setAttribute("src", "../js/controle/ControleEditarConta.js");
                        var cript = document.createElement("script");
                        cript.setAttribute("src", "../js/processos/appeditarconta.js");
                        var edicript = document.getElementById("ediscript");
                        edicript.appendChild(modeledit);
                        edicript.appendChild(controledit);
                        edicript.appendChild(cript);
                    }, 1500);
                }
            } catch (err) {
                alert(err.message);
            }
        };

        EditaContaM.onclick = function() {
            try {
                document.documentElement.scrollTop = 500;
                document.body.scrollTop = 500;
                carregando(LocalConteudo);
                if (requisitarArquivo("../codigos/conteudoEditarConta.php", LocalConteudo)) {
                    document.getElementById("mud").setAttribute("href", "../css/appeditarconta.css");
                    setTimeout(function() {
                        var modeledit = document.createElement("script");
                        modeledit.setAttribute("src", "../js/modelo/EditarConta.js");
                        var controledit = document.createElement("script");
                        controledit.setAttribute("src", "../js/controle/ControleEditarConta.js");
                        var cript = document.createElement("script");
                        cript.setAttribute("src", "../js/processos/appeditarconta.js");
                        var edicript = document.getElementById("ediscript");
                        edicript.appendChild(modeledit);
                        edicript.appendChild(controledit);
                        edicript.appendChild(cript);
                    }, 1500);
                }
                ClMenu();
            } catch (err) {
                alert(err.message);
            }
        };

        ContaPc.onclick = function() {
            try {
                document.documentElement.scrollTop = 500;
                document.body.scrollTop = 500;
                carregando(LocalConteudo);
                if (requisitarArquivo("../codigos/conteudoConta.php", LocalConteudo)) {
                    document.getElementById("mud").setAttribute("href", "../css/appconta.css");
                }
            } catch (err) {
                alert(err.message);
            }
        };

        ContaMob.onclick = function() {
            try {
                document.documentElement.scrollTop = 500;
                document.body.scrollTop = 500;
                carregando(LocalConteudo);
                if (requisitarArquivo("../codigos/conteudoConta.php", LocalConteudo)) {
                    document.getElementById("mud").setAttribute("href", "../css/appconta.css");
                }
                ClMenu();
            } catch (err) {
                alert(err.message);
            }
        };

        window.onload = function() {
            try {
                if (document.getElementById("pvisittrue")) {
                    var divvisit = document.getElementById("pvisittrue");
                    requisitarArquivo("../processos/Visitante.php", divvisit);
                    setTimeout(function() {
                        var Controle = new ControleInnit();
                        Controle.vPvisit();
                    }, 1500);
                }
            } catch (err) {
                alert(err.message);
            }
        };
        var FormDeBatepapo = document.forms.FormularioDeBatepapo;
        var CaMatricula = FormDeBatepapo.matricula;
        var MensasB = FormDeBatepapo.mensagem;
        var btnEnvMen = FormDeBatepapo.enviarC;
        var ColocarColegaB = document.getElementById("ColocarColega");
        MensasB.setAttribute("maxlength", "200")
        var ContEnviarM = document.getElementById("enviarMensagem");
        var BatePapoMobL = document.getElementById("BatePapoMobLink");
        BatePapoMobL.onclick = function() {
            requisitarArquivo("../processos/ExibirColegas.php", BatePapaDivMob);
            document.getElementById('BatePapoMob').style.display = 'block';
            FecharMenuContaMob.onclick();
        }
        BatePapoPcL.onclick = function() {
            requisitarArquivo("../processos/ExibirColegas.php", BatePapaDivPc);
            document.getElementById('BatePapoPc').style.display = 'block';
            FecharMenuConta.onclick();
        }
        FormDeBatepapo.onsubmit = function(e) {
            e.preventDefault();
            if (MensasB.value != "") {
                var ValorB = new FormData(FormDeBatepapo);
                if (requisitarArquivoP("../processos/InserirMensagem.php", ContEnviarM, ValorB)) {
                    MensasB.value = "";
                }
            }
        };

        function AbrirBatePapa(matricula) {
            var LocalConversa = document.getElementById("ConversaBatePapo");
            CaMatricula.value = matricula;
            if (requisitarArquivo("../processos/ExibirColegaMat.php?matricula=" + matricula, ColocarColegaB)) {
                if (requisitarArquivo("../processos/ExibirMensagens.php?matricula=" + matricula, LocalConversa)) {
                    intervaloBatePapo = setInterval(function() { requisitarArquivo("../processos/ExibirMensagens.php?matricula=" + matricula, LocalConversa);}, 1500);
                    document.getElementById("BataPapoModal").style.display = "block";
                }
            }
        }
        // var FechaIntervalo = document.getElementById("FecharBatepapo");
        // FechaIntervalo.onclick = function() {
        //     if (clearInterval(intervaloBatePapo)) { document.getElementById("BataPapoModal").style.display = "none"; } };
    }
    HomePc.onclick();
} catch (err) {
    alert(err.message);
}
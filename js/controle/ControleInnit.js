class ControleInnit {
    vPvisit() {
        if (document.getElementById('PVisitante')) {
            document.getElementById("PVisitante").style.display = 'block';
        }
    };
    Sair() {
        if (requisitarArquivo("../processos/Sair.php", CSair)) {
            Logout.innerHTML += "<img src='../img/preloader3.gif' style='width:20px;height:15px;margin-left:5px;'>";
            setTimeout(function() {
                if (document.getElementById('logUt')) {
                    window.location.href = '../';
                } else {
                    Logout.innerHTML = "<i class='fa fa-sign-out-alt'></i> Sair";
                }
            }, 1000);
        }
    }
    SairM() {
        if (requisitarArquivo("../processos/Sair.php", CSairM)) {
            LogoutM.innerHTML += "<img src='../img/preloader3.gif' style='width:20px;height:20px;margin-left:5px;'>";
            setTimeout(function() {
                if (document.getElementById('logUt')) {
                    window.location.href = '../';
                } else {
                    LogoutM.innerHTML = "<i class='fa fa-sign-out-alt'></i> Sair";
                }
            }, 1000);
        }
    }
    ContaUser() {
        try {

        } catch (err) {
            console.log(err.message);
        }
    }
}
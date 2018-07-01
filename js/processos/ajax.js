function iniciarAjax() {
    var objetoAjax = false; // Variável que recebe obj
    if (window.XMLHttpRequest) { // Firefox e demais Browsers
        objetoAjax = new XMLHttpRequest();
    } else if (window.ActiveXObject) { // IE 9 ou >
        objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
        if (!objetoAjax) { // IE 8 ou < 
            objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return objetoAjax;
}


function mostrarResposta(elemento, ajax) {
    if (ajax.readyState == 4) { // Condição baseada no estado da REQUISIÇÃO 
        if (ajax.status == 200 || ajax.status == 304) { // Condição baseada no estado da RESPOSTA
            elemento.innerHTML = ajax.responseText;
        } else {
            document.getElementById("AvisoComunicacao").style.display = "block";
        }
    }
}

function carregando(container) { // Recebe Elemento como argumento
    // Verifica se elemento possui nós filhos
    while (container.hasChildNodes()) {
        // Remove último elemento filho
        container.removeChild(container.lastChild);
    }
    // Cria elemento IMG
    var imagem = document.createElement("img");
    // Define os atributos
    imagem.setAttribute("src", "../img/preloader6.gif");
    imagem.setAttribute("style", "width: 200px;height: 200px;display:block;border-radius: 100px; margin-left: auto;margin-right:auto;margin-bottom:100px;margin-top:100px;");
    imagem.setAttribute("width", "400");
    imagem.setAttribute("height", "400");

    // Adiciona imagem como nó filho do elemento
    container.appendChild(imagem);
}

function carregandoPost(container) { // Recebe Elemento como argumento
    // Verifica se elemento possui nós filhos
    while (container.hasChildNodes()) {
        // Remove último elemento filho
        container.removeChild(container.lastChild);
    }
    // Cria elemento IMG
    var imagem = document.createElement("img");
    // Define os atributos
    imagem.setAttribute("src", "../img/preloader.gif");
    imagem.setAttribute("style", "width: 20px;height: 20px;display:block;margin-left: auto;margin-right:auto;");
    imagem.setAttribute("width", "400");
    imagem.setAttribute("height", "400");

    // Adiciona imagem como nó filho do elemento
    container.appendChild(imagem);
}

function carregandoCont(container) { // Recebe Elemento como argumento
    // Verifica se elemento possui nós filhos
    while (container.hasChildNodes()) {
        // Remove último elemento filho
        container.removeChild(container.lastChild);
    }
    // Cria elemento IMG
    var imagem = document.createElement("img");
    // Define os atributos
    imagem.setAttribute("src", "../img/preloader3.gif");
    imagem.setAttribute("style", "width: 50px;height: 20px;display:block;margin-left: auto;margin-right:auto;");
    imagem.setAttribute("width", "400");
    imagem.setAttribute("height", "400");

    // Adiciona imagem como nó filho do elemento
    container.appendChild(imagem);
}

function requisitarArquivoP(arquivo, elemento, dado) {
    var ajax = iniciarAjax(); // Inicia Ajax	
    if (ajax) { // Verifica se Ajax está ativo
        ajax.onreadystatechange = function() { // Evento de mudança de estado
            mostrarResposta(elemento, ajax); // Execução da resposta da requisição
        };
        ajax.open("POST", arquivo, true); // Define a requisição

        ajax.send(dado); // Envia requisição
        return true;
    } else {
        return false;
    }
}

function requisitarArquivo(arquivo, elemento) {
    var ajax = iniciarAjax(); // Inicia Ajax	
    if (ajax) { // Verifica se Ajax está ativo
        ajax.onreadystatechange = function() { // Evento de mudança de estado
            mostrarResposta(elemento, ajax); // Execução da resposta da requisição
        };
        ajax.open("GET", arquivo, true); // Define a requisição
        ajax.send(null); // Envia requisição
        return true;
    } else {
        return false;
    }

}
// mmenu
// document.documentElement.scrollTop = 200;
function MenuFunction() {
    try {
        var x = document.getElementById("navDemo");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    } catch (err) {
        alert(err.message);
    }
}
// mmenu
window.onload = function() { myFunction() }
window.onscroll = function() { myFunction() }

function myFunction() {
    var navbar = document.getElementById("Menu");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        navbar.className = "w3-bar" + " w3-card" + " w3-animate-top";
        navbar.style.background = '#008000';
        navbar.style.color = '#fff';
    } else {
        navbar.style.background = '';
        navbar.className = navbar.className.replace(" w3-card w3-animate-top", "");
    }
    var top = document.getElementById("topo");
    if (document.body.scrollTop > 450 || document.documentElement.scrollTop > 450) {
        top.style.display = "block";
        top.className += " w3-animate-bottom";
    } else {
        top.style.display = "none";
        top.className = top.className.replace(" w3-animate-bottom", " ");
    }
    // if (document.getElementById('amais')) {
    //     if (document.body.scrollTop > 550 || document.documentElement.scrollTop > 550) {
    //         var amas =  document.getElementById('amais');
    //         amas.className = "w3-hide-medium"+" w3-hide-small"+" w3-top"+ " w3-col"+" w3-white"+" s12"+" m4"+" l4"+" w3-card-4"+" w3-right"+" w3-padding"; 
    //         amas.style.margin = "5% 50% 50% 64%";
    //     }else{
    //         var amas =  document.getElementById('amais');
    //         amas.style.margin = "0";
    //         amas.className = amas.className.replace(" w3-top"," ");
    //         amas.className = "w3-margin-top"+" w3-hide-medium"+" w3-hide-small"+" w3-col"+" s12"+" m4"+" l4"+" w3-white"+" w3-card-4"+" w3-right"+" w3-padding"; 
    //     }
    // }
}
// mfotos
var login = document.getElementById('Login');
var cadastro = document.getElementById('Cadastro');

window.onclick = function(event) {
    if (event.target == login) {
        login.style.display = "none";
    }
    if (event.target == cadastro) {
        cadastro.style.display = "none";
    }
}
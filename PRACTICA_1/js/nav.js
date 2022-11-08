var xhr = new XMLHttpRequest();
xhr.open('POST', 'http://localhost/MIS_PAGINAS_WEB/DWES/PRACTICA_1/nav.html');
xhr.setRequestHeader('Content-Type', 'text/plain');
xhr.send();
xhr.onload = function (data) {
    let aux = document.createElement('div');
    aux.innerHTML = data.currentTarget.response;
    document.querySelector('body').insertBefore(aux, document.querySelector('#container'));
};
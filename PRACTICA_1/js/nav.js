fetch('./nav.html')
.then(response => {
return response.text()
})
.then(data => {
let aux = document.createElement('div');
aux.setAttribute('class', 'header');
aux.innerHTML = data;
document.querySelector('body').insertBefore(aux, document.querySelector('#container'));
let linkNav = document.querySelectorAll('.linkNav');
colorNav(linkNav);
});

function colorNav(linkNav) {
    for(let link of linkNav) {
        if(link.href === location.href) {
            link.setAttribute('style', 'background-color:#182625;')
        }
        else {
            link.setAttribute('style', 'background-color:none;')
        }
    }
}
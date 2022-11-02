const URL = 'https://valorant-api.com/v1/agents';
const URL_maps = 'https://valorant-api.com/v1/maps';

window.onload = () => {
    console.log('Ha cargado la página');

    const peticion = new XMLHttpRequest();
    peticion.open('GET', URL);
    peticion.send();
    peticion.onreadystatechange = () => {
        if(peticion.readyState === XMLHttpRequest.DONE) {
            const respuestaJson = JSON.parse(peticion.responseText);
            cargaBotones(respuestaJson.data);
        }
    }
};

function cargaBotones(personajesJson) {
    const contenedor = document.querySelector('#botones');
    personajesJson.forEach(personaje => {
        console.log(personaje);
        const boton = document.createElement('button');
        boton.innerHTML = `<img src="${personaje.displayIcon}" width="50px"/>
        <p>${personaje.displayName}</p>`;
        boton.onclick = () => muestraImagen(personaje);
        contenedor.appendChild(boton);
    });
}

function muestraImagen(personaje) {
    const contenedor = document.querySelector('#personaje');
    contenedor.innerHTML = '';
    const img = document.createElement('img');
    img.setAttribute('src', personaje.fullPortraitV2);
    img.setAttribute('width', '500px');
    contenedor.appendChild(img);
    const myAudio = document.createElement('audio');
    myAudio.setAttribute('src', personaje.voiceLine.mediaList[0].wave);
    myAudio.autoplay = true;
    contenedor.appendChild(myAudio);
    const newBoton = document.createElement('button');
    newBoton.innerText = 'Jugar';
    newBoton.onclick = () => mostrarMapa(contenedor);
    contenedor.appendChild(newBoton);
}

function mostrarMapa(contenedor) {
    const BoxMap = document.createElement('div');
    const peticion = new XMLHttpRequest();
    peticion.open('GET', URL_maps);
    peticion.send();
    peticion.onreadystatechange = () => {
        if(peticion.readyState === XMLHttpRequest.DONE) {
            const respuestaJson = JSON.parse(peticion.responseText);
            let max=0;
            respuestaJson.data.forEach(element => {
                max++;
            })
            let nAl = Math.floor(Math.random() * (max - 0) + 0);
            const img = document.createElement('img');
            img.setAttribute('src', respuestaJson.data[nAl].splash);
            img.setAttribute('width', '800px');
            BoxMap.innerHTML = ``;
            BoxMap.innerHTML = `${img.outerHTML}`;
            contenedor.appendChild(BoxMap);
        }
    }
}
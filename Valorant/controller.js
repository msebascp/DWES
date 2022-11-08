const URL = 'https://valorant-api.com/v1/agents';
const URL_maps = 'https://valorant-api.com/v1/maps';
//let maps = [];
window.onload = () => {
    console.log('Ha cargado la pagina');
    cargarPersonajes().then(personajes => cargaBotones(personajes.data));
    //cargarMapas();
    /*Promise.all([cargarMapas(), cargarPersonajes()]).
    then(mapasYPersonajes => {
        maps = mapasYPersonajes[0].data;
        cargaBotones(mapasYPersonajes[1].data);
    })*/
};

function cargaBotones(personajesJson) {
    const contenedor = document.querySelector('#botones');
    personajesJson.forEach(personaje => {
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
    newBoton.onclick = () => mostrarMapa(contenedor, personaje);
    contenedor.appendChild(newBoton);
}

async function mostrarMapa(contenedor, personaje) {
    let boxMapExist = document.querySelector('#boxMap');
    if(boxMapExist){
        contenedor.removeChild(boxMapExist)
    }
    const boxMap = document.createElement('div');
    boxMap.setAttribute('id', 'boxMap');
    boxMap.innerHTML = '';
    const img = document.createElement('img');
    const maps = (await cargarMapas()).data;
    let nAl = Math.floor(Math.random() * ((maps.length-1) - 0) + 0);
    let map = maps[nAl];
    img.setAttribute('src', map.splash);
    img.setAttribute('width', '800px');
    boxMap.appendChild(img);
    //boton
    const button2 = document.createElement('button');
    button2.innerText = 'GUARDAR PARTIDA';
    button2.onclick = () => guardarPartida(personaje, map);
    boxMap.appendChild(button2);
    contenedor.appendChild(boxMap);
}
function cargarPersonajes() {
    return fetch(URL).then(response => response.json());
    /*const peticion = new XMLHttpRequest();
    peticion.open('GET', URL);
    peticion.send();
    peticion.onreadystatechange = () => {
        if(peticion.readyState === XMLHttpRequest.DONE) {
            const personajes = JSON.parse(peticion.responseText);
            cargaBotones(personajes.data);
        }
    }*/
}

async function cargarMapas() {
    return fetch(URL_maps)
    .then(response => response.json())
    .catch(_ => alert('Falló'))
    /*.then(mapas => {
        maps = mapas.data;
        cargarPersonajes();
    }
    );*/
}


//Enviar los ids del personaje y el mapa del servidor
//Mediante una petición POST donde el cuerpo es json
function guardarPartida(personaje, mapa) {
    console.log(personaje, mapa);
    const params = {
        mapId: mapa.uuid,
        heroId: personaje.uuid,
        mapName: mapa.displayName,
        heroName: personaje.displayName
    }
    fetch('./guardarPartida.php', {
        method: 'POST',
        body: JSON.stringify(params)
    })
}
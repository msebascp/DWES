//datos a insertar en la tabla
const FILASDATA = [
    {name:'Nombre', description:'Descripción', nserie:'Número de serie', estate:'Estado', priority:'Prioridad'},
    {name:'Sensor1', description:'El mejor del mundo', nserie:'001', estate:'No activo', priority:'Media'},
    {name:'Sensor2', description:'El más rápido', nserie:'002', estate:'Activo', priority:'Alta'},
    {name:'Sensor3', description:'El que tiene mayor durabilidad', nserie:'003', estate:'Activo', priority:'Baja'},
    {name:'Sensor4', description:'El más estético', nserie:'004', estate:'Activo', priority:'Media'},
    {name:'Sensor5', description:'El más económico', nserie:'005', estate:'No activo', priority:'Alta'},
    {name:'Sensor6', description:'El punto medio', nserie:'006', estate:'Activo', priority:'Baja'},
]
const tabla = document.querySelector('#table');
const inputSearch = document.querySelector('#searchTable');

function rellenarTabla() {
    //String donde se guardará el contenido que se añadirá a la tabla
    tabla.innerHTML = "<caption>Tabla de sensores</caption>";
    let theadTabla = document.createElement('thead');
    let tbodyTabla = document.createElement('tbody');
    for(let i = 0; i < FILASDATA.length; i++){
        let trTabla = document.createElement('tr');
        if(i == 0){
            for(let element in FILASDATA[i]){
                let thTabla = document.createElement('th');
                thTabla.innerHTML = FILASDATA[0][element];
                trTabla.appendChild(thTabla);
            }
            trTabla.innerHTML += '<th>Acciones</th>';
            theadTabla.appendChild(trTabla);
        }
        else{
            for(let element in FILASDATA[i]){
                let tdTabla = document.createElement('td');
                tdTabla.innerHTML = FILASDATA[i][element];
                trTabla.appendChild(tdTabla);
            }
            trTabla.innerHTML += '<td><button class = "deleteButton">X</button> \
                <button class = "editButton">Editar</button></td>';
            tbodyTabla.appendChild(trTabla);
        }
    }
    tabla.appendChild(theadTabla);
    tabla.appendChild(tbodyTabla);
    //Controlamos la parte de eliminar una fila
    let deleteButtons = document.querySelectorAll('.deleteButton');
    deleteRow(deleteButtons);
    //Controlamos la parte de editar una fila
    let editButtons = document.querySelectorAll('.editButton');
    editRow(editButtons);
}
function deleteRow(buttons) {
    for(let i = 0; i < buttons.length; i++){
        buttons[i].onclick = () => {
            row = buttons[i].parentNode.parentNode;
            row.style.display = 'none';
        }
    }
}
function editRow(buttons) {
    let contenido;
    
    for(let i = 0; i < buttons.length; i++){
        buttons[i].onclick = () => {
            let row = buttons[i].parentNode.parentNode;
            //Recorremos todas las celdas de la fila donde se encuentra el botón editar pulsado
            for(let i = 0; i < row.cells.length; i++) {
                //Ocultamos el botón de editar y añadimos uno para confirmar los cambios
                if(i == row.cells.length - 1) {
                    let confirmButton = document.createElement('button');
                    confirmButton.innerHTML = 'Confirmar';
                    confirmButton.setAttribute('class', 'confirmButton');
                    row.cells[i].lastElementChild.style.display = 'none';
                    //row.cells[i].innerHTML += confirmButton.outerHTML;
                    row.cells[i].appendChild(confirmButton);
                    
                }
                //Cambiamos el contenido de las celdas a inputs para editar la información
                else {
                    contenido = row.cells[i].innerHTML;
                    row.cells[i].innerHTML = `<input value = "${contenido}" style = "background-color:transparent; color:white; 
                    width: ${row.cells[i].clientWidth-30}px; border:none; text-align:center; text-decoration:underline">`
                }
                confirmar();
            }
        }
    }
}
function confirmar() {
    let confirmButtons = document.querySelectorAll('.confirmButton');
    for(let button of confirmButtons) {
        button.addEventListener('click' , function(){
            let row = this.parentNode.parentNode;
            for(let i = 0; i < row.cells.length; i++) {
                //Ocultamos el botón de confirmar y añadimos el botón de editar
                if(i == row.cells.length - 1) {
                    row.cells[i].removeChild(row.cells[i].lastElementChild);
                    row.cells[i].lastElementChild.style.display = 'inline-block';
                }
                //Cambiamos el contenido de los inputs a texto normal de vuelta
                else {
                    contenido = row.cells[i].lastElementChild.value;
                    row.cells[i].innerHTML = `${contenido}`;
                }
            }
        })
    }
}
function controlarInput(){
    //Controlamos la búsqueda del input
    inputSearch.oninput = function() {
        //Pongo el fondo predeterminado en caso de que no haya resultados
        for(let columna of tabla.rows) {
            columna.style.backgroundColor = '#455559';
        }
        //Una vez se ha escrito más de 2 carácteres se empieza a buscar
        if(inputSearch.value.length > 2){
            for(let fila of tabla.rows) {
                let texto = fila.cells[0].innerHTML;
                let texto2 = fila.cells[1].innerHTML;
                if(texto.includes(inputSearch.value) || texto2.includes(inputSearch.value)) {
                    fila.style.backgroundColor = '#3D5A73';
                }
            }
        }
    };
}

window.onload = () => {
    rellenarTabla();
    controlarInput();
};
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
var tabla = document.querySelector('#table');
const inputSearch = document.querySelector('#searchTable');

function rellenarTabla() {
    //Añadimos información a la tabla
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
//Oculta la fila de la cual se ha pulsado el botón de eliminar
function deleteRow(buttons) {
    for(let i = 0; i < buttons.length; i++){
        buttons[i].onclick = () => {
            row = buttons[i].parentNode.parentNode;
            row.style.display = 'none';
        }
    }
}
//Edita la fila de la cual se ha pulsado el botón de editar
function editRow(editButtons) {
    for(let i = 0; i < editButtons.length; i++){
        editButtons[i].onclick = () => {
            //Con este for ocultamos todos los botonnes de editar
            for(let editButton of editButtons){
                editButton.setAttribute('style', 'display:none');
            }
            let row = editButtons[i].parentNode.parentNode;
            //Recorremos todas las celdas de la fila donde se encuentra el botón editar pulsado
            for(let j = 0; j < row.cells.length; j++) {
                //Ocultamos el botón de editar y eliminar y añadimos uno para confirmar los cambios
                if(j == row.cells.length - 1) {
                    row.cells[j].firstChild.setAttribute('style', 'display:none');
                    let confirmButton = document.createElement('button');
                    confirmButton.innerHTML = 'Confirmar';
                    confirmButton.setAttribute('id', 'confirmButton');
                    row.cells[j].appendChild(confirmButton);
                    confirmar(editButtons);
                }
                //Cambiamos el contenido de las celdas a inputs para editar la información
                else {
                    let contenido = row.cells[j].innerHTML;
                    row.cells[j].innerHTML = `<input value = "${contenido}" style = "background-color:transparent; color:white; 
                    width: ${row.cells[j].clientWidth-30}px; border:none; text-align:center; text-decoration:underline">`;
                }
            }
        }
    }
}
//Confirma los cambios hechos de la fila
function confirmar(editButtons) {
    let confirmButton = document.querySelector('#confirmButton');
    confirmButton.onclick = () => {
        //Volvemos a mostrar los botones de editar y el botón de eliminar de la fila
        confirmButton.parentNode.firstChild.setAttribute('style', 'display:inline-block');
        for(let editButton of editButtons){
            editButton.setAttribute('style', 'display:inline-block');
        }
        let row = confirmButton.parentNode.parentNode;
        for(let i = 0; i < row.cells.length; i++) {
            //Eliminamos el botón de confirmar
            if(i == row.cells.length - 1) {
                row.cells[i].removeChild(row.cells[i].lastElementChild);
            }
            //Cambiamos el contenido de los inputs a texto normal de vuelta
            else {
                contenido = row.cells[i].lastElementChild.value;
                row.cells[i].innerHTML = `${contenido}`;
            }
        }
    }
}
//Controlamos los resultados del buscador
function controlarInput(){
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
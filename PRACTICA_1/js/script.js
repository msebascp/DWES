//datos a insertar en la tabla
const filasForm = [
    {name:'Sensor1', description:'El mejor del mundo', nserie:'001', estate:'No activo', priority:'Media'},
    {name:'Sensor2', description:'El más rápido', nserie:'002', estate:'Activo', priority:'Alta'},
    {name:'Sensor3', description:'El que tiene mayor durabilidad', nserie:'003', estate:'Activo', priority:'Baja'},
    {name:'Sensor4', description:'El más estético', nserie:'004', estate:'Activo', priority:'Media'},
    {name:'Sensor5', description:'El más económico', nserie:'005', estate:'No activo', priority:'Alta'},
    {name:'Sensor6', description:'El punto medio', nserie:'006', estate:'Activo', priority:'Baja'},
]
//Cuando cargue la tabla rellenaremos la tabla con datos y trabajaremos con ella
const trabajarConTabla = function(lista) {
    let table = document.querySelector('#table');
    //String donde se guardará el contenido que se añadirá a la tabla
    let stringTabla = "<caption>Tabla de sensores</caption>"+
    "<thead><tr><th>Nombre</th><th>Descripción</th><th>Número de serie</th>"+
    "<th>Estado</th><th>Prioridad</th><th>Acciones</th></tr></thead><tbody>";
    for(let element of lista) {
        let fila = '<tr><td>';
        fila += element.name + '</td><td>';
        fila += element.description + '</td><td>';
        fila += element.nserie + '</td><td>';
        fila += element.estate + '</td><td>';
        fila += element.priority + '</td><td>';
        fila += '<button class="deleteButton">X</button></td></tr>';
        stringTabla += fila;
    }
    stringTabla += '</tbody>';
    table.innerHTML = stringTabla;
    //Controlamos la parte de eliminar una fila
    let deleteButton = document.querySelectorAll('.deleteButton');
    buttonLenght = deleteButton.length;
    for(let i = 0; i < buttonLenght; i++){
        deleteButton[i].addEventListener('click' , function(){
            row = deleteButton[i].parentNode.parentNode;
            row.style.display = 'none';
        })
    }
    //Controlamos la búsqueda del input
    inputTable = document.querySelector('#searchTable');
    inputTable.oninput = function() {
        for(let columna of table.rows) {
            columna.style.backgroundColor = '#455559';
        }
        if(inputTable.value.length > 2){
            for(let element of filasForm){
                if(element.name.includes(inputTable.value) || element.description.includes(inputTable.value)) {
                    for(let columna of table.rows) {
                        let texto = columna.cells[0].innerHTML;
                        let texto2 = columna.cells[1].innerHTML;
                        if(texto == element.name || texto == element.description) {
                            columna.style.backgroundColor = '#3D5A73';
                        }
                    }
                }
            }
        }
    };
}
window.onload = function ($filasForm){
    trabajarConTabla(filasForm);
}
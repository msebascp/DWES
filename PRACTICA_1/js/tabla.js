const tabla = document.querySelector('#table')
const inputSearch = document.querySelector('#searchTable')
const URL_GET = './ws/getElement.php'
const URL_DELETE = './ws/deleteElement.php?id='
const URL_MODIFY = './ws/modifyElement.php?id='

const checkAlertDelete = (row) => {
  Swal.fire({
    title: '¿Seguro que quieres eliminar el elemento?',
    text: '¡No podrás revertir esta acción!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: '¡Sí!',
    cancelButtonText: 'Cancelar'
  }).then(function (result) {
    if (result.isConfirmed) {
      tabla.deleteRow(row.rowIndex)
      deleteData(row.id)
    }
  })
}

const checkAlertEdit = (dataPreEdit) => {
  let confirmButton = document.querySelector('#confirmButton')
  let row = confirmButton.parentNode.parentNode
  confirmButton.onclick = () => {
    Swal.fire({
      title: '¿Quieres guardar los cambios?',
      showDenyButton: true,
      showCancelButton: true,
      confirmButtonText: 'Guardar',
      denyButtonText: 'No guardar',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {
        saveRow(confirmButton)
        editData(row.id, row)
      } else if (result.isDenied) {
        restoreRow(confirmButton, dataPreEdit)
      }
    })
  }
}

const loadData = async () => {
  try {
    const promise = await fetch(URL_GET)
    const response = await promise.json()
    if (response.success) {
      fillTable(response.data)
    } else {
      Swal.fire(response.message)
    }
  } catch (error) {
    console.log(error)
  }
}

const deleteData = async (id) => {
  try {
    const promise = await fetch(URL_DELETE + id)
    const response = await promise.json()
    if (response.success) {
      Swal.fire('¡Elemento eliminado!')
    } else {
      Swal.fire(response.message)
    }
  } catch (error) {
    console.log(error)
  }
}

const editData = async (id, datosRow) => {
  let formData = new FormData()
  let nombreDatos = ['name', 'description', 'nseries', 'estate', 'priority']
  for (let i = 0; i < datosRow.cells.length - 1; i++) {
    let key = nombreDatos[i]
    let value = datosRow.cells[i].innerHTML
    formData.append(key, value)
  }
  try {
    const promise = await fetch(URL_MODIFY + id, {
      method: 'POST', body: formData
    })
    const response = await promise.json()
    if (response.success) {
      Swal.fire('¡Elemento editado!')
    } else {
      Swal.fire(response.message)
    }
  } catch (error) {
    console.log(error)
  }
}

function fillTable (elements) {
  //Añadimos información a la tabla
  tabla.innerHTML = '<caption>Tabla de sensores</caption>' + '<thead><tr>' + '<th>Nombre</th><th>Descripción</th><th>Número de serie</th><th>Estado</th><th>Prioridad</th><th>Acciones</th>' + '</tr></thead>'
  let tbodyTabla = document.createElement('tbody')
  for (let i = 0; i < elements.length; i++) {
    let trTabla = document.createElement('tr')
    for (let element in elements[i]) {
      if (element !== 'id') {
        let tdTabla = document.createElement('td')
        tdTabla.innerHTML = elements[i][element]
        trTabla.appendChild(tdTabla)
      } else {
        trTabla.setAttribute('id', elements[i].id)
      }
    }
    trTabla.innerHTML += '<td><button class = "deleteButton"><img src="./media/deleteIcon.png" width="25px"></button> \
            <button class = "editButton"><img src="./media/editIcon.png" width="25px"></button></td>'
    tbodyTabla.appendChild(trTabla)
  }
  tabla.appendChild(tbodyTabla)
  //Controlamos la parte de eliminar una fila
  let deleteButtons = document.querySelectorAll('.deleteButton')
  deleteRow(deleteButtons)
  //Controlamos la parte de editar una fila
  let editButtons = document.querySelectorAll('.editButton')
  editRow(editButtons)
}

//Oculta la fila de la cual se ha pulsado el botón de eliminar
function deleteRow (buttons) {
  for (let i = 0; i < buttons.length; i++) {
    buttons[i].onclick = () => {
      let row = buttons[i].parentNode.parentNode
      checkAlertDelete
    (row, 'Eliminar')
    }
  }
}

//Edita la fila de la cual se ha pulsado el botón de editar
function editRow (editButtons) {
  arrRowPreEdit = []
  for (let i = 0; i < editButtons.length; i++) {
    editButtons[i].onclick = () => {
      //Con este for ocultamos todos los botones de editar
      for (let editButton of editButtons) {
        editButton.setAttribute('style', 'display:none')
      }
      let row = editButtons[i].parentNode.parentNode
      //Recorremos todas las celdas de la fila donde se encuentra el botón editar pulsado
      for (let j = 0; j < row.cells.length; j++) {
        //Ocultamos el botón de editar y eliminar y añadimos uno para confirmar los cambios
        if (j === row.cells.length - 1) {
          row.cells[j].firstChild.setAttribute('style', 'display:none')
          let confirmButton = document.createElement('button')
          confirmButton.innerHTML = '<img src="./media/confirmIcon.png" width="25px">'
          confirmButton.setAttribute('id', 'confirmButton')
          row.cells[j].appendChild(confirmButton)
          checkAlertEdit(arrRowPreEdit)
        }
        //Cambiamos el contenido de las celdas a inputs o desplegables para editar la información
        else if (tabla.rows[0].cells[j].innerHTML === 'Estado') {
          let contenido = row.cells[j].innerHTML
          arrRowPreEdit.push(contenido)
          row.cells[j].innerHTML = `<select>
                    <option value="${contenido}">${contenido}</option>
                    <option value="Activo">Activo</option>
                    <option value="No activo">No activo</option>
                    </select>`
        } else if (tabla.rows[0].cells[j].innerHTML === 'Prioridad') {
          let contenido = row.cells[j].innerHTML
          arrRowPreEdit.push(contenido)
          row.cells[j].innerHTML = `<select>
                    <option value="${contenido}">${contenido}</option>
                    <option value="Alta">Alta</option>
                    <option value="Media">Media</option>
                    <option value="Baja">Baja</option>
                    </select>`
        } else {
          let contenido = row.cells[j].innerHTML
          arrRowPreEdit.push(contenido)
          row.cells[j].innerHTML = `<input value = "${contenido}" style = "background-color:transparent; color:white; 
                    width: ${row.cells[j].clientWidth - 30}px; border:none; text-align:center; text-decoration:underline">`
        }
      }
    }
  }
}

//Elimina los cambios hechos de la fila
function restoreRow (confirmButton, data) {
  let editButtons = document.querySelectorAll('.editButton')
  //Volvemos a mostrar los botones de editar y el botón de eliminar de la fila
  for (let editButton of editButtons) {
    editButton.setAttribute('style', 'display:inline-block')
  }
  let row = confirmButton.parentNode.parentNode
  for (let i = 0; i < row.cells.length; i++) {
    //Eliminamos el botón de confirmar
    if (i === row.cells.length - 1) {
      row.cells[i].firstChild.setAttribute('style', 'display:inline-block')
      row.cells[i].removeChild(row.cells[i].lastElementChild)
    }
    //Cambiamos el contenido de los inputs a texto normal de vuelta
    else {
      row.cells[i].innerHTML = data[i]
    }
  }
}

//Confirma los cambios hechos de la fila
function saveRow (confirmButton) {
  let editButtons = document.querySelectorAll('.editButton')
  //Volvemos a mostrar los botones de editar y el botón de eliminar de la fila
  for (let editButton of editButtons) {
    editButton.setAttribute('style', 'display:inline-block')
  }
  let row = confirmButton.parentNode.parentNode
  for (let i = 0; i < row.cells.length; i++) {
    //Eliminamos el botón de confirmar
    if (i === row.cells.length - 1) {
      row.cells[i].firstChild.setAttribute('style', 'display:inline-block')
      row.cells[i].removeChild(row.cells[i].lastElementChild)
    }
    //Cambiamos el contenido de los inputs a texto normal de vuelta
    else {
      let contenido = row.cells[i].lastElementChild.value
      row.cells[i].innerHTML = `${contenido}`
    }
  }
}

//Controlamos los resultados del buscador
function checkInput () {
  inputSearch.oninput = function () {
    //Pongo el fondo predeterminado en caso de que no haya resultados
    for (let columna of tabla.rows) {
      columna.style.backgroundColor = '#455559'
    }
    //Una vez se ha escrito más de 2 caracteres se empieza a buscar
    if (inputSearch.value.length > 2) {
      for (let fila of tabla.rows) {
        let texto = fila.cells[0].innerHTML
        let texto2 = fila.cells[1].innerHTML
        if (texto.includes(inputSearch.value) || texto2.includes(inputSearch.value)) {
          fila.style.backgroundColor = '#3D5A73'
        }
      }
    }
  }
}

window.onload = () => {
  loadData()
  checkInput()
}
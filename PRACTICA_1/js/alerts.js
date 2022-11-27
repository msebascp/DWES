const botonForm = document.querySelector('#botonForm')
const URL_CREATE = './ws/createElement2.php'

const createElement = async () => {
  let formulario = document.querySelector('#formulario')
  let formData = new FormData(formulario)
  try {
    const promise = await fetch(URL_CREATE, {
      method: 'POST', body: formData
    })
    const response = await promise.json()
    if (response.success) {
      Swal.fire('¡Elemento creado!')
    } else {
      Swal.fire(response.message)
    }
  } catch (error) {
    console.log(error)
  }
}
const checkAlertForm = (event) => {
  event.preventDefault()
  Swal.fire({
    title: '¿Seguro que quieres crear el elemento?',
    text: '¡No podrás revertir esta acción!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: '¡Sí!'
  }).then((result) => {
    if (result.isConfirmed) {
      createElement()
    }
  })
}

botonForm.addEventListener('click', checkAlertForm)
const btn = document.querySelector('#btn')
const title = document.querySelector('#title')
const time = document.querySelector('#time')
const mins = document.querySelector('#mins')
const ingridients = document.querySelector('#ingridients')

let editor
const previewTitle = document.querySelector('#preview-title')
ClassicEditor.create(document.querySelector('#editor'))
  .then(newEditor => (editor = newEditor))
  //editor.setData('<p>Description goes here....</p>') // Setting data to update recipe

  .catch(error => console.error(error))

const titleChange = e => {
  !e.target.value ?
    (previewTitle.textContent = 'Title') :
    (previewTitle.textContent = e.target.value)
}

const preparationTime = e => (mins.textContent = ` ${e.target.value} min`)

const ingridientsPart = e => {
  console.log(e)
}

const addRecipe = () => {
  try {
    const recipeImage = document.querySelector('#recipeImage').files[0]
    const {
      size,
      type
    } = recipeImage
    const title = document.querySelector('#title').value
    const editorData = editor.getData()

    let errors = []

    const allowedTypes = ['image/jpg', 'image/png', 'image/jpeg']
    const allowedSize = 2000000 // 2MB

    if (size > allowedSize) {
      errors = [...errors, 'Big file not allowed']
    }

    if (!allowedTypes.includes(type)) {
      errors = [...errors, 'Invalid file format,allowed JPG,JPEG,PNG']
    }

    if (editorData === '<p>&nbsp;</p>') {
      errors = [...errors, 'Description must not be empty']
    }

    if (!title) {
      errors = [...errors, 'Title must not be empty']
    }

    if (time.value === '0') {
      errors = [...errors, 'Preparation time must not be 0']
    }

    const errorsList = document.querySelector('#errors')

    if (errors.length === 0) {
      errorsList.innerHTML = ``
      const userID = document.querySelector('#_userID').value
      let headers = new Headers()

      headers.append('Accept', 'application/json')

      let formData = new FormData()

      formData.append('recipeImage', recipeImage)
      formData.append('title', title)
      formData.append('description', editorData)
      formData.append('approximatedTime', time.value)
      formData.append('userID', userID)
      let array = ['krompir', 'praziluk']
      formData.append('ingridients', array)

      console.log(formData)

      const options = {
        method: 'POST',
        headers: headers,
        body: formData
      }

      let request = new Request(
        `api/recipes/create.php?apiKey=${token()}`,
        options
      )

      // ajax

      fetch(request)
        .then(res => res.json())
        .then(data => {
          clearInputs(['title', 'time'])
          editor.setData('')
          time.value = '0'
          mins.textContent = ''
          notification.className = 'animated fadeIn'
          notification.innerHTML = SuccessNotification(data.data)
          document.querySelector('#preview-image').src = data.image
        })
        .catch(err => console.log(err))
    } else {
      console.log('errors', errors)
      let output = ``
      errors.forEach(err => (output += ErrorNotification(err)))
      errorsList.innerHTML = output
    }
  } catch (err) {
    console.error('You must choose picture')
  }
}

const initApp = () => {
  btn.addEventListener('click', addRecipe)
  title.addEventListener('input', titleChange)
  time.addEventListener('input', preparationTime)
  ingridients.addEventListener('keyup', ingridientsPart)
}

document.addEventListener('DOMContentLoaded', initApp())
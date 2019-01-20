jQuery('#shards-custom-slider').customSlider({
  start: [25],
  tooltips: [true],
  connect: true,
  range: {
    min: 0,
    max: 100
  }
})
let editor



const addRecipe = () => {
  const approximatedTime = document.querySelector('#approximatedTime')
  const data = approximatedTime.value

  const editorData = editor.getData()
  console.log(editorData)
  if (editorData !== '<p>&nbsp;</p>') {
    console.log(`data ${editorData}`)
  } else {
    console.log(`no data`)

  }
}

const descriptionChange = e => {
  console.log(e.target.value)
  document.querySelector('#preview-description').innerHTML = e.target.value
}

const titleChange = e => {
  const noText = title.placeholder
  if (!title.value) {
    document.querySelector('#preview-title').textContent = noText
  }
  document.querySelector('#preview-title').textContent = e.target.value
}

const initApp = () => {

  ClassicEditor
    .create(document.querySelector('#editor'))
    .then(newEditor => {
      editor = newEditor
    })
    .catch(error => {
      console.error(error)
    })

  const btn = document.querySelector('#btn')
  const title = document.querySelector('#title')

  btn.addEventListener('click', addRecipe)
  title.addEventListener('input', titleChange)
}

document.addEventListener('DOMContentLoaded', initApp())
jQuery('#shards-custom-slider').customSlider({
  start: [25],
  tooltips: [true],
  connect: true,
  range: {
    min: 0,
    max: 100
  }
})

tinymce.init({ selector: '#description' })

const addRecipe = () => {
  const approximatedTime = document.querySelector('#approximatedTime')
  const data = approximatedTime.value

  let ready = true
  if (ready) {
    console.log('ajax')
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
  const btn = document.querySelector('#btn')
  const description = document.querySelector('#description')
  const title = document.querySelector('#title')

  btn.addEventListener('click', addRecipe)
  title.addEventListener('input', titleChange)
  description.addEventListener('input', descriptionChange)
}

document.addEventListener('DOMContentLoaded', initApp())

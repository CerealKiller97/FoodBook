let editor

ClassicEditor
  .create(document.querySelector('#editor'))
  .then(newEditor => {
    editor = newEditor
    editor.setData('<p>Description goes here....</p>') // Setting data to update recipe
  })
  .catch(error => {
    console.error(error)
  })

const main = () => {
  axios.get(`/recipes/read_single.php?apiKey=${token()}`, {
      params: {
        id
      }
    })
    .then(res => fillData(res.data))
    .catch(err => console.log(err))
}

document.addEventListener('DOMContentLoaded', main())
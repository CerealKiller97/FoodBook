let editor
let ingridients = []
ClassicEditor
  .create(document.querySelector('#editor'))
  .then(newEditor => editor = newEditor)
  .catch(error => console.error(error))

const main = () => {
  axios.get(`/recipes/read_single.php?apiKey=${token()}`, {
      params: {
        id
      }
    })
    .then(res => {
      ingridients = res.data.ingridients
      console.log(ingridients)

      console.log(res.data)
      fillData(res.data)
    })
    .catch(err => console.log(err))
}

document.addEventListener('DOMContentLoaded', main())
const init = () => {
  const recipeList = document.querySelector('#recipe-list')
  axios
    .get(`/recipes/paginate.php?apiKey=${token()}`)
    .then(res => {
      const data = res.data
      const recipesTotal = data.length
      for (let i = 1; i < recipesTotal; i++) {
        console.log(`Pagination ${i}`);

      }
      const recipes = data.map(recipe => Recipe(recipe)).join('')
      recipeList.innerHTML = recipes
    })
    .catch(err => notification.innerHTML = ErrorNotification(err.response.data))

  const paginate = e => {
    e.preventDefault()
    const page = e.target.dataset.page
    axios.get(`/recipes/paginate.php?apiKey=${token()}&page=${page}`)
      .then(data => console.log(data.data))
      .catch(err => notification.innerHTML = ErrorNotification(err.response.data))
  }
  const pageLinks = document.querySelectorAll('.paginate')
  pageLinks.forEach(link => link.addEventListener('click', paginate))
}

document.addEventListener('DOMContentLoaded', init)
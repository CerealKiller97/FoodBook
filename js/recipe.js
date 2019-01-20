const init = () => {
  const recipe = document.querySelector('#recipe')
  axios
    .get(`/recipes/read_single.php?apiKey=${token()}`, { params: { id } })
    .then(res => {
      const data = res.data
      recipe.innerHTML = RecipeDetail(data)
    })
    .catch(err => console.log(err))
}

document.addEventListener('DOMContentLoaded', init)

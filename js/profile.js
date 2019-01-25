const deleteUser = e => {
  const id = e.target.dataset.id

  axios
    .delete(`/users/delete.php?apiKey=${token()}`, {
      data: {
        id
      }
    })
    .then(data => {
      notification.innerHTML = SuccessNotification(
        'You have successfully deleted you account'
      )
      setTimeout(() => (location.href = '?page=home'), 2000)
    })
    .catch(err => {
      notification.innerHTML = ErrorNotification(err.response.data)
    })
}



const init = () => {
  const userID = document.querySelector('#userID').value
  const recipes = document.querySelector('#recipes')
  axios
    .get(`/recipes/user.php?apiKey=${token()}`, {
      params: {
        userID
      }
    })
    .then(res => {
      const data = res.data
      const recipesList = data.map(recipe => RecipeProfile(recipe)).join('')
      recipes.innerHTML = recipesList
    })
    .catch(err => {
      const notificationRecipes = document.querySelector(
        '#notification-recipes'
      )

      notificationRecipes.innerHTML = ErrorNotification(err.response.data)
    })

  const btn = document.querySelector('#delete-user')
  btn.addEventListener('click', deleteUser)
}

document.addEventListener('DOMContentLoaded', init)
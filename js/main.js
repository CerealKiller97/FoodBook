const search = e => {
  if (!e.target.value) {
    console.log('empty')
  } else {
    console.log(`Ajax request: ${e.target.value}`)
  }
}

const toggleMode = e => {
  const body = document.querySelector('body')
  if (e.target.checked) {
    body.style.backgroundColor = '#141414'
    body.style.transition = 'backgroundColor 1s ease-in-out'
  } else {
    body.style.backgroundColor = '#FFFFFF'
    body.style.transition = 'backgroundColor 1s ease-in-out'
  }
}

const main = () => {
  //const params = { params: { id: 6 } } AXIOS DELETE (url,{ data: { id } })
  const state = {}

  const id = 6

  axios

    .get(`/recipes/filter.php?apiKey=${token()}`)
    .then(data => {
      console.log(data.data)

      const recipes = data.data.map(recipe => Recipe(recipe)).join('')
      document.querySelector('#recipes').innerHTML = recipes
    })
    .catch(err => {
      notification.innerHTML = ErrorNotification(err.response.data)
    })
  //const mode = document.querySelector('#mode')
  //mode.addEventListener('change', toggleMode)
  const searchRecipe = document.querySelector('#search')

  if ('geolocation' in navigator) {
    /* geolocation is available */
    navigator.geolocation.getCurrentPosition(position => {
      const obj = {
        latitude: position.coords.latitude,
        longitude: position.coords.longitude,
        date: new Date().toString()
      }
      console.log(obj)
    })
  } else {
    /* geolocation IS NOT available */
    console.log('geolocation IS NOT available')
  }

  // try {
  //   searchRecipe.addEventListener('keydown', search)
  // } catch (err) {
  //   console.log(err)
  // }
}

const deleteUser = e => {
  if (e.target.className.includes('delete-user')) {
    const id = e.target.dataset.id
    axios
      .delete(`/users/delete.php?apiKey=${token()}`, {
        data: {
          id
        }
      })
      .then(data => {
        if (data.status === 204) {
          e.target.parentElement.className = 'card-body animated fadeOut' //classList.add('')
          setInterval(() => e.target.parentElement.remove(), 500)
        }
      })
      .catch(err => {
        console.log(err)
      })
  }
}

document.addEventListener('click', deleteUser)
document.addEventListener('DOMContentLoaded', main)

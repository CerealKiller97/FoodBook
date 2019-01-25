const recipeList = document.querySelector('#recipe-list')
const spinner = document.querySelector('.spinner')
const progress = document.querySelector('#progress')
const progressHolder = document.querySelector('#progress-indicator')

// let progressPercent = 60

// const progressFunc = () => {
//   if (progressPercent === 100) {
//     myStopFunction()
//   }
//   if (progress.dataset.percentage === '99') {
//     progressHolder.classList.add('invisible')
//   }
//   progress.style.width = `${progressPercent}%`
//   progress.dataset.percentage = progressPercent
//   progressPercent++
// }

// function myStopFunction() {
//   clearInterval(myVar)
// }

// const myVar = setInterval(progressFunc, 10)

const init = () => {
  //progressFunc()

  setTimeout(() => spinner.classList.add('invisible'), 250)
  axios
    .get(`/recipes/read.php?apiKey=${token()}`)
    .then(res => {
      const total = res.data.length
      let links = Math.ceil(total / 3)
      let paginationOutput = ``
      for (let i = 0; i < links; i++) {
        paginationOutput += `<li class="page-item"><a class="page-link paginate" href="#" data-page="${i}">${i +
          1}</a></li>`
      }
      document.querySelector('#pagination-links').innerHTML = paginationOutput
    })
    .catch(err => console.log(err))

  axios
    .get(`/recipes/paginate.php?apiKey=${token()}`)
    .then(res => {
      const data = res.data
      const recipes = data.map(recipe => Recipe(recipe)).join('')
      recipeList.innerHTML = recipes
    })
    .catch(
      err => (notification.innerHTML = ErrorNotification(err.response.data))
    )

  const pageLinks = document.querySelectorAll('.paginate')
  pageLinks.forEach(link => link.addEventListener('click', paginate))
}

const paginate = e => {
  if (e.target.className.includes('paginate')) {
    spinner.classList.remove('invisible')
    setTimeout(() => spinner.classList.add('invisible'), 250)
    e.preventDefault()
    const page = e.target.dataset.page
    axios
      .get(`/recipes/paginate.php?apiKey=${token()}&page=${page}`)
      .then(data => {
        const recipes = data.data.map(recipe => Recipe(recipe)).join('')
        recipeList.innerHTML = recipes
      })
      .catch(
        err => (notification.innerHTML = ErrorNotification(err.response.data))
      )
  }
}

document.addEventListener('click', paginate)
document.addEventListener('DOMContentLoaded', init)

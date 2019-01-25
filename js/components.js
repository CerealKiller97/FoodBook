/* Stateless functional components */

const User = ({
  id,
  firstname,
  lastname,
  username
}) => {
  return `<div class="card my-2">
    <div class="card-body">
      <h4 class="card-title">${firstname}</h4>
      <p class="card-text">${lastname}</p>
      <a href="#" class="btn btn-primary" data-id="${id}">See profile of ${username}</a>
      <button class="btn btn-danger delete-user" data-id="${id}">Delete profile of ${username}</button>
    </div>
  </div>
  `
}

const Recipe = ({
  recipeID,
  title,
  ingridients,
  approximatedTime,
  image
}) => {
  ingridients = ingridients.split(',')
  const ingridientsList = ingridients
    .map(
      ingridient => `<span class="badge badge-light mr-3">${ingridient}</span>`
    )
    .join('')

  return `
<div class="card mx-2" style="width: 25rem;">
  <img class="card-img-top recipe-img" src="${image}" alt="${title} image" />
  <div class="card-body">
    <h6 class="card-title">${title}</h6>
    <p class="card-text">${ingridientsList}</p>
    <h6 class="card-title">Preparation: ${approximatedTime.toHHMMSS()}</h6>
    <a href="?page=recipe&id=${recipeID}" class="btn btn-success">Read more &rarr;</a>
  </div>
</div>`
}

const RecipeProfile = ({
  recipeID,
  title,
  ingridients,
  approximatedTime,
  image
}) => {
  ingridients = ingridients.split(',')
  const ingridientsList = ingridients
    .map(
      ingridient => `<span class="badge badge-light mr-3">${ingridient}</span>`
    )
    .join('')

  return `
<div class="card mx-2" style="width: 25rem;">
  <img class="card-img-top recipe-img" src="${image}" alt="${title} image" />
  <div class="card-body">
    <h6 class="card-title">${title}</h6>
    <p class="card-text">${ingridientsList}</p>
    <h6 class="card-title">Preparation: ${approximatedTime.toHHMMSS()}</h6>
    <a href="?page=update-recipe&id=${recipeID}" class="btn btn-success">Update</a>
    <a href="?page=recipe&id=${recipeID}" class="btn btn-danger">Delete</a>

  </div>
</div>`
}

const RecipeDetail = ({
  id,
  title,
  description,
  approximatedTime,
  ingridients,
  image
}) => {
  ingridients = ingridients.split(',')
  const ingridientsList = ingridients
    .map(
      ingridient => `<span class="badge badge-light mr-1">${ingridient}</span>`
    )
    .join('')
  return `
  <div class="card text-white">
    <img class="card-img" src="${image}" alt="${title} image" />
    <div class="card-img-overlay">
      <h4 class="card-title">${title}</h4>
      <p class="lead font-weight-bold">Ingridients: ${ingridientsList}</p>
      <p class="lead font-weight-bold">Time for preparing: <span class="badge badge-light mr-1">${approximatedTime}min</span></p>
      <p class="lead font-weight-bold">Desciption: ${description}</p>
    </div>
  </div>
  `
}

const ErrorNotification = data => {
  return `<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <p class="text-center">${data}</p>
</div>
  `
}

const SuccessNotification = data => {
  return `<div class="alert alert-success alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <p class="text-center">${data}</p>
</div>
  `
}

const Comment = data => {
  return `<div>${data}</div>`
}
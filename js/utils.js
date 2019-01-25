/**
 * Validation functions
 * @param {*} field
 */

const checkField = field => {
  field.value = document.querySelector(`#${field.id}`).value
  if (field.value) {
    field.regExp.test(field.value) ?
      (field.state = true) :
      (field.state = false)
  } else {
    field.state = null
  }
}

const showHint = field => {
  let hintPlaceholder = document.querySelector(`#${field.hint}`)
  if (field.state === false) {
    hintPlaceholder.textContent = field.error.invalid
    hintPlaceholder.className = 'form-text text-danger'
  } else if (field.state === null) {
    hintPlaceholder.textContent = field.error.empty
    hintPlaceholder.className = 'form-text text-danger'
  }
}

const hideHint = field => {
  let hintPlaceholder = document.querySelector(`#${field.hint}`)
  if (!field.state) {
    hintPlaceholder.textContent = ''
    hintPlaceholder.className = 'form-text'
  }
}
/**
 * Helper functions
 */

const registerData = () => {
  return {
    firstname: document.querySelector('#reg-firstname').value,
    lastname: document.querySelector('#reg-lastname').value,
    username: document.querySelector('#reg-username').value,
    email: document.querySelector('#reg-email').value,
    password: document.querySelector('#reg-password').value,
    confirm: document.querySelector('#reg-confirm').value
  }
}

const credentials = () => {
  return {
    email: document.querySelector('#email').value,
    password: document.querySelector('#password').value
  }
}

const clearInputs = arr => {
  for (input of arr) {
    document.querySelector(`#${input}`).value = ''
  }
}

const fillData = ({
  id,
  title,
  description,
  image,
  ingridients
}) => {
  document.querySelector('#recipeID').value = id
  document.querySelector('#title').value = title
  editor.setData(description)

}

// Minutes must be passed
String.prototype.toHHMMSS = function () {
  var sec_num = parseInt(this, 10) * 60 // don't forget the second param
  var hours = Math.floor(sec_num / 3600)
  var minutes = Math.floor((sec_num - hours * 3600) / 60)
  var seconds = sec_num - hours * 3600 - minutes * 60

  if (hours < 10) {
    hours = `0${hours}`
  }
  if (minutes < 10) {
    minutes = `0${minutes}`
  }
  if (seconds < 10) {
    seconds = `0${seconds}`
  }
  return `${hours}:${minutes}:${seconds}`
}

const token = () => document.querySelector('#csrf_token').value
const notification = document.querySelector('#notification')
axios.defaults.baseURL = '/api'

const queryString = window.location.href
const usp = new URL(queryString)
const page = usp.searchParams.get('page')
const id = usp.searchParams.get('id')
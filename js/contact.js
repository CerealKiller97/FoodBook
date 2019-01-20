const sendMessage = () => {
  history.pushState(null, '', '?page=recipes')
}

const init = () => {
  console.log(page)

  const btn = document.querySelector('#contact')
  btn.addEventListener('click', sendMessage)
}

document.addEventListener('DOMContentLoaded', init)

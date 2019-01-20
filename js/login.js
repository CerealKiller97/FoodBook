const fields = [{
    id: 'email',
    regExp: /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/,
    state: undefined,
    hint: 'email-hint',
    error: {
      empty: 'Email can not be empty',
      invalid: 'Invalid email address'
    }
  },

  {
    id: 'password',
    regExp: /^[0-9a-zA-Z]{8,}$/,
    state: undefined,
    hint: 'password-hint',
    error: {
      empty: 'Password can not be empty',
      invalid: 'Invalid password'
    }
  }
]

const login = () => {
  const invalidFields = fields.filter(field => !field.state)
  if (invalidFields.length === 0) {
    const previousPage = document.querySelector('#_previousPage').value
    axios
      .post(`/users/login.php?apiKey=${token()}`, credentials())
      .then(res => {
        notification.className = 'animated fadeIn'
        notification.innerHTML = SuccessNotification(res.data)
        setTimeout(() => (window.location.href = previousPage), 1500)
      })
      .catch(err => {
        notification.className += 'animated fadeIn'
        notification.innerHTML = ErrorNotification(err.response.data)
      })
  }
}

const init = () => {
  fields.forEach(field => {
    let fieldElement = document.querySelector(`#${field.id}`)
    fieldElement.addEventListener('blur', () => {
      checkField(field)
      showHint(field)
    })
    fieldElement.addEventListener('focus', () => hideHint(field))
  })

  fields.forEach(registerField => {
    let registerFieldElement = document.querySelector(`#${registerField.id}`)
    registerFieldElement.addEventListener('blur', () => {
      checkField(registerField)
      showHint(registerField)
    })
    registerFieldElement.addEventListener('focus', () =>
      hideHint(registerField)
    )
  })

  const loginBtn = document.querySelector('#loginBtn')
  try {
    loginBtn.addEventListener('click', login)
  } catch (err) {
    console.log(err)
  }
}

document.addEventListener('DOMContentLoaded', init())
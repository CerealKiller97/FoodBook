const fields = [{
    id: 'reg-firstname',
    regExp: /^[A-ZŽŠĐČĆ][a-zžšđćč]{2,}$/,
    state: undefined, // true/false
    hint: 'firstname-hint',
    error: {
      empty: 'First name must not be empty',
      invalid: 'Invalid first name'
    }
  },

  {
    id: 'reg-lastname',
    regExp: /^[A-ZŽŠĐČĆ][a-zžšđćč]{2,}$/,
    state: undefined, // true/false
    hint: 'lastname-hint',
    error: {
      empty: 'Last name must not be empty',
      invalid: 'Invalid last name'
    }
  },

  {
    id: 'reg-username',
    regExp: /^[0-9a-zA-Z]{4,}$/,
    state: undefined, // true/false
    hint: 'username-hint',
    error: {
      empty: 'Username must not be empty',
      invalid: 'Username must be at least 4 characters long'
    }
  },

  {
    id: 'reg-email',
    regExp: /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/,
    state: undefined,
    hint: 'email-hint',
    error: {
      empty: 'Email must not be empty',
      invalid: 'Invalid email'
    }
  },

  {
    id: 'reg-password',
    regExp: /^[0-9a-zA-Z]{8,}$/,
    state: undefined, // true/false
    hint: 'password-hint',
    error: {
      empty: 'Password must not be empty',
      invalid: 'Password must be at least 8 characters long'
    }
  }
]

const register = () => {
  const invalidFields = fields.filter(field => !field.state)
  if (invalidFields.length === 0) {
    axios
      .post(`/users/create.php?apiKey=${token()}`, registerData())
      .then(data => {
        notification.innerHTML = SuccessNotification(data.data)
        clearInputs(['reg-firstname', 'reg-lastname', 'reg-username', 'reg-email', 'reg-password', 'reg-confirm'])
      })
      .catch(err => {
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

  let registerBtn = document.querySelector('#register-btn')
  try {
    registerBtn.addEventListener('click', register)
  } catch (error) {
    console.log(err)
  }
}

document.addEventListener('DOMContentLoaded', init())
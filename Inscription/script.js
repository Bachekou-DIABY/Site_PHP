let first_name = document.getElementById('first_name')
let last_name = document.getElementById('last_name')
let password = document.getElementById('password')
let email = document.getElementById('email')
let passConfirmation = document.getElementById('password-confirm')
let form = document.querySelector('form')
console.log("form:", form);
let error = '';

function validFirstName(value) {
  if (value === '') {
    return 'Le prenom est obligatoire\n'
  }

  return '';
}

function validLastName(value) {
  if (value === '') {
    return 'Le nom est obligatoire\n'
  }

  return '';
}

function validPassword(value) {
  if (value.length < 8) {
    return 'Le mot de passe doit contenir au moins 8 caractères\n'
  }

  return '';
}

function passConfirm(password, passConfirmation) {
  if (password !== passConfirmation) {
    return 'Les 2 mots de passe doivent être identiques\n'
  }

  return '';
}

form.addEventListener('submit', (event) => {
  error = ''
  error += passConfirm(password.value, passConfirmation.value)
  for(var count=0; count<form.elements.length; count++) {
    switch (form.elements[count].name) {
      case 'first_name':
        error+= validFirstName(form.elements[count].value)
        break;
      case 'last_name':
        error+= validLastName(form.elements[count].value)
        break;  
      case 'password':
        error += validPassword(form.elements[count].value)
        break; 
    }
  }

  if (error !== '') {
    alert(error)
    event.preventDefault()
  }
})
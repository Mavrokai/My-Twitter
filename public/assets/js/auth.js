// auth.js
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

// Animation pour le panneau latéral
signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
});

// Gestion du logo
const logo = document.querySelector('.logo');
const container1 = document.getElementById('container');

logo.addEventListener('click', () => {
    logo.classList.add('shrunk');
    container1.classList.add('with-opacity');
});


function toggleForms() {
    window.location.href = "inscription.php";
}


const emailInput = document.querySelector('input[name="email"]');
const passwordInput = document.querySelector('input[name="password"]');
const loginButton = document.getElementById('signUp');

function checkForm() {
    const isEmailFilled = emailInput.value.trim() !== '';
    const isPasswordFilled = passwordInput.value.trim() !== '';
    loginButton.disabled = !(isEmailFilled && isPasswordFilled);
}


document.addEventListener('DOMContentLoaded', () => {
    checkForm();
    


    if (emailInput && passwordInput) {
        emailInput.addEventListener('input', checkForm);
        passwordInput.addEventListener('input', checkForm);
    }

});
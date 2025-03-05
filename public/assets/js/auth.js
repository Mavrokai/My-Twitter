const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
});

// Sélectionner le logo et le conteneur
const logo = document.querySelector('.logo');
const container1 = document.getElementById('container');

// Ajouter l'événement click sur le logo
logo.addEventListener('click', () => {
    // Ajouter la classe qui rétrécit le logo et le met en arrière-plan
    logo.classList.add('shrunk');

    // Ajouter l'opacité au conteneur pour adoucir l'arrière-plan
    container1.classList.add('with-opacity');
});
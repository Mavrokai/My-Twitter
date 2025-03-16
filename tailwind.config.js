// Création d'un fichier tailwind.config.js pour personnaliser les configurations de Tailwind CSS dans l'extension.

module.exports = {
    darkMode: 'class',
    content: [
        './views/**/*.php',
        './public/**/*.html',
        './src/**/*.js'
    ],
    theme: {
        extend: {
            colors: {
                primary: '#59713E',
            }
        }
    },
    variants: {
        extend: {
            backgroundColor: ['dark'],
            textColor: ['dark'],
            borderColor: ['dark'],
        }
    },
    plugins: [],
}
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification - Yjungle</title>
    <link rel="shortcut icon" href="../../../public/assets/img/LogoYjungle.webp" type="image/x-icon">
    <link rel="stylesheet" href="../../../public/assets/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        /* Animation for logo */
        .logo {
            opacity: 0;
            transform: scale(0);
            animation: logoAnimation 2s forwards ease-in-out;
        }

        @keyframes logoAnimation {
            0% {
                opacity: 0;
                transform: scale(0);
            }

            50% {
                opacity: 1;
                transform: scale(1.2);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Animation for text */
        .text {
            opacity: 0;
            transform: translateY(20px);
            animation: textAnimation 1.5s 1s forwards ease-out;
        }

        @keyframes textAnimation {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Gradient text for "Yjungle" */
        .gradient-text {
            background: linear-gradient(to right, #34D399, #059669, #16A34A);
            color: transparent;
            font-size: 3rem;
            /* Réduction de la taille du texte */
            font-weight: 700;
            font-style: italic;
            /* Texte en italique */
        }

        /* Shadow effect for the text */
        .shadow-text {
            text-shadow: 4px 4px 6px rgba(0, 0, 0, 0.2), 0 0 25px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body class="bg-[#5d7245] flex justify-center items-center h-screen font-[Montserrat]">

    <!-- Authentication Container -->
    <div class="bg-[#f8f7f776] p-8 rounded-2xl shadow-2xl w-full max-w-4xl flex transition-transform duration-500 mt-20" id="auth-container">
        <!-- Connexion -->
        <div class="w-1/2 p-8 flex flex-col justify-center text-center border-r border-gray-300">
            <h2 class="text-2xl font-bold mb-4">Connexion</h2>
            <form action="../../controllers/AuthController.php?action=login" method="POST" class="space-y-4">
                <input type="email" name="email" placeholder="Email" class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-600">
                <input type="password" name="password" placeholder="Mot de passe" class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-600">
                <button type="submit" id="signUp" class="w-full bg-green-700 text-white font-bold py-3 rounded-lg hover:bg-green-800 transition">Se connecter</button>
            </form>
        </div>

        <!-- Inscription -->
        <div class="w-1/2 p-8 flex flex-col justify-center text-center">
            <a href="inscription.php" class="text-black hover:text-green-900">
                <h2 class="text-2xl font-bold mb-4">Rejoignez-nous</h2>
            </a>

            <!-- Logo with animation placed here -->
            <div class="flex justify-center items-center mb-4">
                <img src="../../../public/assets/LogoYjungle.png" alt="Yjungle Logo" class="logo h-24 mb-4"> <!-- Logo avec animation ici -->
            </div>

            <p class="text-sm mb-4">Créez un compte pour commencer l'aventure avec Yjungle !</p>

            <!-- Lien vers la page inscription.php -->
            <a href="./inscription.php">
                <button id="signIn" class="w-full bg-green-700 text-white font-bold py-3 rounded-lg hover:bg-green-800 transition">S'inscrire</button>
            </a>
        </div>
    </div>

    <script src="../../../public/assets/js/auth.js"></script>
</body>

</html>
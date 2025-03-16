<!DOCTYPE html>
<html lang="fr" class="h-screen bg-[#5d7245]">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Yjungle</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
    </style>
</head>

<body class="bg-[#5d7245] flex justify-center items-center h-screen font-[Montserrat]">

    <!-- Authentication Container -->
    <div class="bg-[#f8f7f776] p-6 rounded-xl shadow-lg w-full max-w-sm flex transition-transform duration-500 mt-10">
        <!-- Inscription Section -->
        <div class="w-full p-4 flex flex-col justify-center text-center">
            <h2 class="text-xl font-bold mb-4">Inscription</h2>

            <!-- Logo with animation placed here -->
            <div class="flex justify-center items-center mb-4">
                <img src="../../../public/assets/LogoYjungle.png" alt="Yjungle Logo" class="logo h-20 mb-4"> <!-- Logo avec animation ici -->
            </div>

            <form action="../../controllers/AuthController.php?action=register" method="POST" class="space-y-4">
                <!-- Nom d'utilisateur -->
                <div class="form-group">
                    <label class="block text-sm font-medium mb-2 text-gray-700">Nom d'utilisateur:</label>
                    <input type="text" name="username" required class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-600">
                    <div id="usernameError" class="error-message text-red-500 text-sm"></div>
                </div>

                <!-- Nom complet -->
                <div class="form-group">
                    <label class="block text-sm font-medium mb-2 text-gray-700">Nom complet:</label>
                    <input type="text" name="display_name" required class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-600">
                    <div id="displayNameError" class="error-message text-red-500 text-sm"></div>
                </div>

                <!-- Date de naissance -->
                <div class="form-group">
                    <label class="block text-sm font-medium mb-2 text-gray-700">Date de naissance:</label>
                    <input type="date" name="date_of_birth" required class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-600">
                    <div id="birthdayError" class="error-message text-red-500 text-sm"></div>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label class="block text-sm font-medium mb-2 text-gray-700">Email:</label>
                    <input type="email" name="email" required class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-600">
                    <div id="emailError" class="error-message text-red-500 text-sm"></div>
                </div>

                <!-- Mot de passe -->
                <div class="form-group">
                    <label class="block text-sm font-medium mb-2 text-gray-700">Mot de passe:</label>
                    <input type="password" name="password" required class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-600">
                    <div id="passwordError" class="error-message text-red-500 text-sm"></div>
                </div>

                <!-- Confirmation mot de passe -->
                <div class="form-group">
                    <label class="block text-sm font-medium mb-2 text-gray-700">Confirmation de Mot de passe:</label>
                    <input type="password" name="confirm_password" required class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-600">
                    <div id="confirmPasswordError" class="error-message text-red-500 text-sm"></div>
                </div>

                <button type="submit" class="w-full bg-green-700 text-white font-bold py-2 rounded-lg hover:bg-green-800 transition">S'inscrire</button>

                <p class="text-sm mt-4">Vous avez déjà un compte ? <a href="auth.php" class="text-blue-500 hover:text-blue-700">Connectez-vous !</a></p>
            </form>
        </div>
    </div>

</body>

</html>
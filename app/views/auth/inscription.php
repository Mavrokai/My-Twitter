<!DOCTYPE html>
<html lang="fr" class="h-screen bg-[#F5F5DC]">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../public/assets/LogoYjungle.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../public/assets/css/all.css">
    <link rel="shortcut icon" href="../../../public/assets/LogoYjungle.png" type="image/x-icon">
    <title>Inscription</title>
</head>

<body class="flex justify-center items-center">
    <div class="container mx-auto p-4 max-w-md bg-[#F0E4CC] rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-4">Inscription</h1>
        <form id="registerForm" method="POST" action="../../controllers/AuthController.php?action=register" class="space-y-4">
            <!-- Champ username obligatoire -->
            <div class="form-group">
                <label class="block text-sm font-medium mb-2">Nom d'utilisateur:</label>
                <input type="text" name="username" required class="block w-full p-2 border border-gray-300 rounded-lg">
                <div id="usernameError" class="error-message text-red-500 text-sm"></div>
            </div>

            <!-- Champ display_name (remplace prénom/nom) -->
            <div class="form-group">
                <label class="block text-sm font-medium mb-2">Nom complet:</label>
                <input type="text" name="display_name" required class="block w-full p-2 border border-gray-300 rounded-lg">
                <div id="displayNameError" class="error-message text-red-500 text-sm"></div>
            </div>

            <!-- Date de naissance conservée -->
            <div class="form-group">
                <label class="block text-sm font-medium mb-2">Date de naissance:</label>
                <input type="date" name="date_of_birth" required class="block w-full p-2 border border-gray-300 rounded-lg">
                <div id="birthdayError" class="error-message text-red-500 text-sm"></div>
            </div>

            <!-- Email et mot de passe conservés -->
            <div class="form-group">
                <label class="block text-sm font-medium mb-2">Email:</label>
                <input type="email" name="email" required class="block w-full p-2 border border-gray-300 rounded-lg">
                <div id="emailError" class="error-message text-red-500 text-sm"></div>
            </div>

            <div class="form-group">
                <label class="block text-sm font-medium mb-2">Mot de passe:</label>
                <input type="password" name="password" required class="block w-full p-2 border border-gray-300 rounded-lg">
                <div id="passwordError" class="error-message text-red-500 text-sm"></div>
            </div>

            <div class="form-group">
                <label class="block text-sm font-medium mb-2">Confirmation de Mot de passe:</label>
                <input type="password" name="confirm_password" required class="block w-full p-2 border border-gray-300 rounded-lg">
                <div id="confirmPasswordError" class="error-message text-red-500 text-sm"></div>
            </div>

            <button class="submit bg-[#6495ED] hover:bg-[#4682B4] text-white font-bold py-2 px-4 rounded" type="submit" name="submitBtn">S'inscrire</button>


            <p class="LinkConnexion text-sm text-gray-500">Vous êtes déjà inscrit ? <a href="./auth.php" class="text-blue-500 hover:text-blue-700">Connectez-vous !</a></p>
        </form>
    </div>
</body>

</html>
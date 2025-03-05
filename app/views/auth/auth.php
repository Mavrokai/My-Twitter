<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../public/assets/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body class="bg-[#5d7245] flex justify-center items-center flex-col font-['Montserrat'] h-screen m-[-5rem_0_3rem]">
    <div class="anim absolute top-0 left-0 w-screen h-screen flex justify-center items-center transition-all duration-600 ease-in-out z-10">
        <img class="logo h-auto object-cover transition-all duration-600 ease-in-out" src="../../../public/assets/img/LogoYjungle.png" alt="logo">
    </div>

    <div class="container bg-white rounded-xl shadow-2xl relative overflow-hidden max-w-[768px] min-h-[480px] z-10" id="container">
        <!-- Sign Up Form -->
        <div class="form-container absolute top-0 h-full transition-all duration-600 ease-in-out left-0 w-1/2 opacity-0 z-10">
            <form class="bg-white flex flex-col items-center justify-center px-[50px] h-full text-center" action="../../controllers/AuthController.php.php?action=login" method="POST">
                <h1 class="font-bold m-0">Créer un compte</h1>
                <div class="social-container my-4">
                    <a href="#" class="social text-black text-sm no-underline mx-1"><i class="fab fa-google-plus-g"></i></a>
                </div>
                <span class="text-xs my-4">ou utiliser son mail</span>
                <input type="text" placeholder="Nom" class="w-full px-4 py-3 my-2 rounded-full border border-black bg-gray-200" />
                <input type="email" name="email" placeholder="Email" class="w-full px-4 py-3 my-2 rounded-full border border-black bg-gray-200" />
                <input type="password" name="password" placeholder="Mot de Passe" class="w-full px-4 py-3 my-2 rounded-full border border-black bg-gray-200" />
                <button class="rounded-full border border-black bg-gray-200 text-xs font-bold px-12 py-3 my-4 uppercase tracking-wide transition-transform duration-80 ease-in active:scale-95 focus:outline-none">S'enregister</button>
            </form>
        </div>

        <!-- Sign In Form -->
        <div class="form-container absolute top-0 h-full transition-all duration-600 ease-in-out left-0 w-1/2 z-20">
            <form class="bg-white flex flex-col items-center justify-center px-[50px] h-full text-center" action="../../controllers/AuthController.php?action=login" method="POST">
                <h1 class="font-bold m-0">Connexion</h1>
                <div class="social-container my-4">
                    <a href="#" class="social text-black text-sm no-underline mx-1"><i class="fab fa-google-plus-g"></i></a>
                </div>
                <span class="text-xs my-4">ou utiliser son compte</span>
                <input type="email" name="email" placeholder="Email" class="w-full px-4 py-3 my-2 rounded-full border border-black bg-gray-200" />
                <input type="password" name="password" placeholder="Password" class="w-full px-4 py-3 my-2 rounded-full border border-black bg-gray-200" />
                <a href="#" class="text-black text-sm no-underline my-4">Mot de passe oublié ?</a>
                <button class="rounded-full border border-black bg-gray-200 text-xs font-bold px-12 py-3 my-4 uppercase tracking-wide transition-transform duration-80 ease-in active:scale-95 focus:outline-none">Se connecter</button>
            </form>
        </div>

        <!-- Overlay -->
        <div class="overlay-container absolute top-0 left-1/2 w-1/2 h-full overflow-hidden  transition-transform duration-600 ease-in-out z-[100]">
            <div class="overlay bg-gradient-to-r from-[#A3D65C] to-[#2E7D32] relative left-[-100%] h-full w-[200%] translate-x-0 transition-transform duration-600 ease-in-out">
                <!-- Left Overlay Panel -->
                <div class="overlay-panel absolute top-0 h-full w-1/2 flex flex-col items-center justify-center px-10 text-center translate-x-[-20%] transition-transform duration-600 ease-in-out">
                    <h1 class="text-2xl font-bold">De retour !</h1>
                    <p class="text-sm my-4">Pour rester en contact, veuillez vous connecter.</p>
                    <button class="ghost rounded-full border border-white bg-transparent text-xs font-bold px-12 py-3 my-4 uppercase tracking-wide">Se connecter</button>
                </div>

                <!-- Right Overlay Panel -->
                <div class="overlay-panel absolute top-0 right-0 h-full w-1/2 flex flex-col items-center justify-center px-10 text-center translate-x-0 transition-transform duration-600 ease-in-out">
                    <h1 class="text-2xl font-bold">Bienvenue !</h1>
                    <p class="text-sm my-4">Rentrez vos données personnelles et commencez l'aventure avec Yjungle!</p>
                    <button class="ghost rounded-full border border-white bg-transparent text-xs font-bold px-12 py-3 my-4 uppercase tracking-wide">S'inscrire</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../../../public/assets/js/auth.js"></script>
</body>

</html>
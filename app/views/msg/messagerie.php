<!DOCTYPE html>
<html lang="fr" class="bg-[#59713E]">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/assets/css/all.css">
    <link rel="shortcut icon" href="../../../public/assets/img/LogoYjungle.webp" type="image/x-icon">
    <title>Twiter - Messagerie</title>
</head>

<body class="relative ml-[17%]">

    <!-- Sidebar responsive -->
    <aside class="fixed top-8.5 h-screen z-50 md:w-48 lg:w-64"">
        <div class=" h-full bg-[#f8f7f776] p-4 rounded-2xl w-full">
        <?php include '../partials/sidebar.php'; ?>
        </div>
    </aside>

    <main class="min-h-screen md:ml-48 lg:ml-70 p-4">

        <?php if ($hasMessages): ?>
            <div class="flex">
                <!-- Version avec messages (à adapter selon besoins) -->
                <div class="flex bg-[#f8f7f776] rounded-2xl p-5">
                    <!-- ... contenu existant ... -->
                </div>

                <div class="w-48 lg:w-64 bg-[#f8f7f776] rounded-2xl p-5">
                    <!-- ... contenu existant ... -->
                </div>
            </div>

        <?php else: ?>

            <!-- Conteneur principal responsive -->
            <div class="flex rounded-2xl w-full p-5">
                <!-- Boîte de message -->
                <div class="relative w-full md:w-2/3 lg:w-1/2 bg-[#f8f7f776] rounded-2xl p-5">
                    <div class="flex flex-col sm:flex-row items-center justify-between">
                        <p class="text-xl mb-4 sm:mb-0">Messages</p>
                        <div class="flex items-center gap-3 sm:gap-5">
                            <img class="h-6 w-6 cursor-pointer" src="../../../public/assets/img/reglages.png" alt="Paramètres">
                            <img class="h-6 w-6 cursor-pointer" src="../../../public/assets/img/plus-solid.svg" alt="Nouveau message">
                        </div>
                    </div>

                    <div class="mt-6 md:mt-10">
                        <h1 class="text-xl md:text-2xl">Bienvenue dans votre boîte de réception !</h1>
                        <p class="mt-3 md:mt-5 text-sm md:text-base">
                            Envoyez un message, partagez des publications et bien plus encore...
                        </p>

                        <button class="bg-[#59713E] hover:bg-amber-800 text-white font-bold py-2 px-4 mt-4 md:mt-6 rounded cursor-pointer transition duration-500 w-full sm:w-auto">
                            Écrire un message
                        </button>
                    </div>
                </div>

                <!-- Panneau latéral -->
                <div class="w-48 ml-15 lg:w-64 bg-[#f8f7f776] rounded-2xl p-5">
                    <div class="text-center">
                        <h1 class="text-xl md:text-2xl">
                            Sélectionnez un message
                        </h1>
                        <p class="mt-3 md:mt-5 text-sm md:text-base">
                            Choisissez parmi vos conversations existantes...
                        </p>
                        <div class="flex justify-center pb-3 md:pb-5">
                            <button class="bg-[#59713E] hover:bg-amber-800 text-white font-bold py-2 px-4 mt-4 md:mt-6 rounded cursor-pointer transition duration-500 w-full sm:w-auto">
                                Nouveau message
                            </button>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

    </main>

</body>

</html>
<!DOCTYPE html>
<html lang="fr" class="bg-[#59713E]">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/assets/css/all.css">
    <link rel="shortcut icon" href="../../../public/assets/img/LogoYjungle.webp" type="image/x-icon">
    <title>Twiter - Messagerie</title>
</head>

<body class="px-85">

    <aside>
        <?php include '../partials/sidebar.php'; ?>
    </aside>

    <main class="flex">

        <?php if(!$hasMessages): ?>
            <!-- Section messages existants -->
            <div class="px-5 rounded-2xl ml-70 h-100vh w-1/2 pt-5 bg-[#f8f7f776]">
                    <!-- ... contenu existant ... -->
            </div>

            <div class="rounded-2xl ml-6 h-full w-1/4 pt-5 bg-[#f8f7f776] px-5">
                <!-- ... contenu existant ... -->
            </div>
        <?php else: ?>

        <div class="px-5 rounded-2xl ml-70 h-100vh w-1/2 pt-5 bg-[#f8f7f776]">
            <div class="flex items-center justify-between">
                <p class="text-xl">Messages</p>
                <div class="flex items-center gap-5">
                    <img class="h-6 w-6 cursor-pointer" src="../../../public/assets/img/reglages.png" alt="">
                    <img class="h-6 w-6 cursor-pointer" src="../../../public/assets/img/plus-solid.svg" alt="">
                </div>
            </div>
            <div class="block">

                <h1 class="text-2xl mt-10">Bienvenue dans votre boîte de réception !</h1>
                <p class="mt-5">Envoyez un message, partagez des publications et bien plus encore grâce aux conversations privées entre vous et d'autres personnes sur Yjungle.</p>

                <button class="bg-[#59713E] hover:bg-amber-800 text-white font-bold py-2 px-4 mt-5 rounded cursor-pointer transition duration-500"">Ecrire un message</button>
            </div>
        </div>

        <div class=" rounded-2xl ml-6 h-full w-1/4 pt-5 bg-[#f8f7f776] px-5">
                    <div>
                        <h1 class="text-2xl text-center">
                            Sélectionnez un message
                        </h1>
                        <p class="mt-5 text-center">
                            Choisissez parmi vos conversations existantes, commencez-en une nouvelle ou continuez simplement à naviguer.
                        </p>
                        <div class="flex justify-center pb-5">
                            <button class="bg-[#59713E] hover:bg-amber-800 text-white font-bold py-2 px-4 mt-5 rounded cursor-pointer transition duration-500"">Nouveau message</button>
                </div>
            </div>

            <?php endif; ?>

    </main>


</body>

</html>
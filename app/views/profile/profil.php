<?php include_once __DIR__ . '/../../config/config.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/assets/css/all.css">
    <link rel="shortcut icon" href="../../../public/assets/LogoYjungle.png" type="image/x-icon">
    <title>Profil</title>
</head>
<body class="bg-[#59713E] px-20">
    <!-- Sidebar Gauche -->
    <aside class="fixed top-0 left-0 w-1/6 h-full bg-[#f8f7f776] p-3 flex flex-col space-y-3 shadow-lg rounded-r-xl hidden md:flex text-sm">
        <div class="flex items-center space-x-2">
            <img src="../../../public/assets/LogoYjungle.png" class="w-8 h-8 rounded-full" alt="logo">
            <h1 class="text-md font-bold">Menu</h1>
        </div>
        <nav class="space-y-2">
            <a href="#" class="flex items-center space-x-2 p-2 hover:bg-gray-300 rounded">🏠<span>Accueil</span></a>
            <a href="#" class="flex items-center space-x-2 p-2 hover:bg-gray-300 rounded">🔍<span>Explorer</span></a>
            <a href="#" class="flex items-center space-x-2 p-2 hover:bg-gray-300 rounded">🔔<span>Notifications</span></a>
            <a href="#" class="flex items-center space-x-2 p-2 hover:bg-gray-300 rounded">📮<span>Messages</span></a>
            <a href="#" class="bg-[#59713E] flex items-center space-x-2 p-2 hover:bg-gray-300 rounded-lg">👤<span>Profil</span></a>
        </nav>
    </aside>

    <!-- Contenu Central Scrollable -->
    <main class="w-full md:w-[55%] h-screen overflow-y-none p-4 mx-auto text-sm">
        <div class="relative bg-[#f8f7f776] rounded-lg shadow p-3">
            <div class="h-32 bg-cover bg-center rounded-t-lg" style="background-image: url('http://i.pinimg.com/736x/33/08/88/3308882a244675788da52502814a0119.jpg');"></div>
            <div class="relative p-3">
                <div class="absolute top-0 left-3 -mt-8 z-10">
                    <img src="https://i.pinimg.com/736x/72/f7/3e/72f73e03e134d091171fc0ff0d3fe5b8.jpg" class="w-16 h-16 rounded-full border-3 border-white shadow-lg" alt="Avatar">
                </div>
                <button class="absolute right-3 top-3 bg-gray-200 px-3 py-1 rounded-lg hover:bg-gray-300">Modifier</button>
                <div class="ml-20">
                    <h2 class="text-lg font-bold">LAHOUAZI Kahina</h2>
                    <p class="text-gray-600">@just.another.sister</p>
                </div>
                <div class="mt-1 text-xs text-black-600">🌍 Juste une âme curieuse naviguant dans ce monde.<br> Amoureuse des petits bonheurs simples ✨<br>passionnée par la découverte et toujours en quête de nouvelles aventures. 📖☕🌿</div>
                <div class="flex space-x-3 mt-1">
                    <br><span>486 Suivis</span>
                    <span>1287 Abonnés</span>
                </div>
            </div>
        </div>
 <main><br>
<!-- Posts Section -->
<div class="bg-[#f8f7f776] p-4 rounded-lg shadow-md border border-gray-300">
        <h3 class="text-md font-semibold text-gray-800">Félicitation les nouveaux mariés Mathéo et Lisa</h3>
        <p class="text-xs text-gray-600">#love #old #wedding #hiring :)</p>
        <div class="mt-3 flex justify-center">
            <img src="../../../public/assets/IMG_2128.jpg" class="object-cover rounded-lg w-48 h-48">
        </div>
        <button class="like-btn flex items-center space-x-1 bg-gray-200 text-gray-800 px-3 py-1 rounded-md shadow hover:bg-gray-300 transition mt-2">
            ❤️ <span class="like-count">0</span>
        </button>
    </div>
<div class="space-y-4 mt-3">
    <div class="bg-[#f8f7f776] p-4 rounded-lg shadow-md border border-gray-300">
        <h3 class="text-md font-semibold text-gray-800">Un matin paisible 🌅</h3>
        <p class="text-xs text-gray-600">Rien de mieux qu'un café et un bon livre pour bien commencer la journée ! ☕📖</p>
        <div class="mt-3 flex justify-center">
            <img src="https://i.pinimg.com/736x/d7/8a/0b/d78a0b8afcd40e5b25afbb25983814ed.jpg" class="object-cover rounded-lg w-48 h-48">
        </div>
        <button class="like-btn flex items-center space-x-1 bg-gray-200 text-gray-800 px-3 py-1 rounded-md shadow hover:bg-gray-300 transition mt-2">
            ❤️ <span class="like-count">0</span>
        </button>
    </div>

    <div class="bg-[#f8f7f776] p-4 rounded-lg shadow-md border border-gray-300">
        <h3 class="text-md font-semibold text-gray-800">Nouvelle recette testée 🍰</h3>
        <p class="text-xs text-gray-600">J'ai essayé une tarte au citron maison et c'était une tuerie ! 😋</p>
        <div class="mt-3 flex justify-center">
            <img src="https://i.pinimg.com/736x/99/f4/cd/99f4cd1837f05524ab229a1a87254ee1.jpg" class="object-cover rounded-lg w-48 h-48">
        </div>
        <button class="like-btn flex items-center space-x-1 bg-gray-200 text-gray-800 px-3 py-1 rounded-md shadow hover:bg-gray-300 transition mt-2">
            ❤️ <span class="like-count">0</span>
        </button>
    </div>

    <div class="bg-[#f8f7f776] p-4 rounded-lg shadow-md border border-gray-300">
        <h3 class="text-md font-semibold text-gray-800">Petit coin de paradis 🌿</h3>
        <p class="text-xs text-gray-600">Une balade dans la nature pour se ressourcer, ça fait du bien ! 🍃</p>
        <div class="mt-3 flex justify-center">
            <img src="https://i.pinimg.com/736x/83/09/76/830976930e58af7e7103cc227f476831.jpg" class="object-cover rounded-lg w-48 h-48">
        </div>
        
        <button class="like-btn flex items-center space-x-1 bg-gray-200 text-gray-800 px-3 py-1 rounded-md shadow hover:bg-gray-300 transition mt-2">
            ❤️ <span class="like-count">0</span>
        </button>
    </div>
</div>

<!-- Script pour gérer les likes -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const likeButtons = document.querySelectorAll(".like-btn");

        likeButtons.forEach(button => {
            let count = 0;
            const likeCount = button.querySelector(".like-count");

            button.addEventListener("click", function () {
                count++;
                likeCount.textContent = count;
                button.classList.toggle("bg-red-500");
                button.classList.toggle("text-white");
            });
        });
    });
</script>


    <!-- Sidebar Droite -->
    <aside class="fixed top-0 right-0 w-1/6 h-full p-3 space-y-3 bg-[#f8f7f776] shadow-lg rounded-l-xl hidden md:block text-sm">
        <div class="bg-white p-3 rounded-lg shadow">
            <input type="text" placeholder="Recherche" class="w-full bg-gray-100 p-2 rounded outline-none">
        </div>
        <div class="bg-white p-3 rounded-lg shadow">
            <h2 class="font-semibold">Abonnement</h2>
            <p class="text-xs text-gray-600">Abonne-toi pour débloquer des fonctionnalités !</p>
            <button class="mt-2 w-full bg-[#59713E] text-white py-1 rounded">S'abonner</button>
        </div>
        <div class="bg-white p-3 rounded-lg shadow">
            <h2 class="font-semibold"></h2>
            <div class="flex items-center space-x-2 mt-2">
                <img src="https://i.pinimg.com/736x/b7/b1/9f/b7b19fe260b73a5aa535c021b999117d.jpg" class="w-7 h-7 rounded-full">
                <p class="text-xs font-medium">jyoka_flkb</p>
                <button class="bg-[#59713E] text-white py-1 px-2 rounded text-xs">Suivre</button>
            </div>
        </div>
        <div class="bg-white p-3 rounded-lg shadow">
            <h2 class="font-semibold"></h2>
            <div class="flex items-center space-x-2 mt-2">
                <img src="https://i.pinimg.com/736x/15/bc/1d/15bc1d249298677d949a5e7abaf2d113.jpg" class="w-7 h-7 rounded-full">
                <p class="text-xs font-medium">tsukkilove</p>
                <button class="bg-[#59713E] text-white py-1 px-2 rounded text-xs">Suivre</button>
            </div>
        </div>
        <div class="bg-white p-3 rounded-lg shadow">
            <h2 class="font-semibold"></h2>
            <div class="flex items-center space-x-2 mt-2">
                <img src="https://i.pinimg.com/736x/1d/f2/5a/1df25a0612a7533316b660408e04ee68.jpg" class="w-7 h-7 rounded-full">
                <p class="text-xs font-medium">ar_merveille</p>
                <button class="bg-[#59713E] text-white py-1 px-2 rounded text-xs">Suivre</button>
            </div>
        </div>
        <div class="bg-white p-3 rounded-lg shadow">
            <h2 class="font-semibold"></h2>
            <div class="flex items-center space-x-2 mt-2">
                <img src="https://i.pinimg.com/736x/a0/40/21/a040217e61baa565bfd6388acf5e36bd.jpg" class="w-7 h-7 rounded-full">
                <p class="text-xs font-medium">mavrokai</p>
                <button class="bg-[#59713E] text-white py-1 px-2 rounded text-xs">Suivre</button>
            </div>
        </div>
        <div class="bg-white p-3 rounded-lg shadow">
            <h2 class="font-semibold"></h2>
            <div class="flex items-center space-x-2 mt-2">
                <img src="https://i.pinimg.com/736x/00/c1/c0/00c1c001455f45bf52dc3cdc70d85c91.jpg" class="w-7 h-7 rounded-full">
                <p class="text-xs font-medium">ahma.d__slm</p>
                <button class="bg-[#59713E] text-white py-1 px-2 rounded text-xs">Suivre</button>
            </div>
        </div>
        <div class="bg-white p-3 rounded-lg shadow">
            <h2 class="font-semibold"></h2>
            <div class="flex items-center space-x-2 mt-2">
                <img src="https://i.pinimg.com/736x/bc/90/d6/bc90d61afa9b1acc66325b9fee3f67a7.jpg" class="w-7 h-7 rounded-full">
                <p class="text-xs font-medium">lisa__.km</p>
                <button class="bg-[#59713E] text-white py-1 px-2 rounded text-xs">Suivre</button>
            </div>
        </div>
        <div class="bg-white p-3 rounded-lg shadow">
            <h2 class="font-semibold"></h2>
            <div class="flex items-center space-x-2 mt-2">
                <img src="../../../public/assets/IMG_2129.jpg" class="w-7 h-7 rounded-full">
                <p class="text-xs font-medium">matimatraque</p>
                <button class="bg-[#59713E] text-white py-1 px-2 rounded text-xs">Suivre</button>
            </div>
        </div>
    </aside>

    <!-- Bouton Flottant "+" -->
    <div id="createPostBtn" class="fixed bottom-4 left-1/2 transform -translate-x-1/2 bg-[#59713E] text-black[”’ px-4 py-2 rounded-full shadow-lg flex items-center space-x-1 cursor-pointer hover:bg-[#f8f7f776] text-sm transition-transform active:scale-110">
    <span class="text-md font-bold">+</span>
    <span>Créer un post</span>
</div>
<!-- Bouton pour ouvrir le modal -->
<button id="openModal" class="fixed bottom-4 left-1/2 transform -translate-x-1/2 bg-[#59713E] text-white px-4 py-2 rounded-full shadow-lg flex items-center space-x-1 cursor-pointer hover:bg-green-700 text-sm">
    <span class="text-md font-bold">+</span>
    <span>Créer un post</span>
</button>

<!-- Modal -->
<div id="postModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-lg font-semibold text-gray-800 mb-3">Créer un post</h2>
        <form action="controller/postController.php" method="POST" enctype="multipart/form-data" class="space-y-3">
            <input type="text" name="title" class="w-full p-2 border border-gray-300 rounded" placeholder="Titre du post">
            <textarea name="content" class="w-full p-2 border border-gray-300 rounded" placeholder="Exprime-toi..."></textarea>
            <input type="file" name="image" id="imageUpload" class="w-full p-2 border border-gray-300 rounded">
            
            <!-- Preview de l'image -->
            <div id="imagePreview" class="w-full h-48 border border-gray-300 rounded flex items-center justify-center hidden">
                <img id="previewImg" src="#" alt="Aperçu de l'image" class="max-w-full max-h-full rounded">
            </div>
            
            <div class="flex justify-end space-x-2">
                <button type="button" id="closeModal" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">Annuler</button>
                <button type="submit" class="bg-[#59713E] text-white px-4 py-2 rounded hover:bg-green-700">Publier</button>
            </div>
        </form>
    </div>
</div>

<!-- Script JS pour ouvrir et fermer le modal + Preview Image -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const openModal = document.getElementById("openModal");
        const closeModal = document.getElementById("closeModal");
        const postModal = document.getElementById("postModal");
        const imageUpload = document.getElementById("imageUpload");
        const imagePreview = document.getElementById("imagePreview");
        const previewImg = document.getElementById("previewImg");

        openModal.addEventListener("click", function () {
            postModal.classList.remove("hidden");
        });

        closeModal.addEventListener("click", function () {
            postModal.classList.add("hidden");
        });

        // Fermer le modal si on clique en dehors
        window.addEventListener("click", function (e) {
            if (e.target === postModal) {
                postModal.classList.add("hidden");
            }
        });

        // Preview de l'image uploadée
        imageUpload.addEventListener("change", function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImg.src = e.target.result;
                    imagePreview.classList.remove("hidden");
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.classList.add("hidden");
            }
        });
    });
</script>


</body>
</html>
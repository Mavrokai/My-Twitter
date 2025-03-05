<?php
include_once '../../controllers/ProfileController.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/assets/css/all.css">
    <link rel="shortcut icon" href="../../../public/assets/LogoYjungle.png" type="image/x-icon">
    <title>Profil de <?php echo $_SESSION['username']; ?></title>
</head>

<body class="bg-[#59713E]">
    <!-- Sidebar Gauche -->

    <?php include '../partials/sidebar.php'; ?>

    <!-- Contenu Central Scrollable -->
    <main class="w-full md:w-[55%] h-screen overflow-y-none p-4 mx-auto text-sm">
        <div class="relative bg-[#f8f7f776] rounded-lg shadow p-3">
            <div class="h-32 bg-cover bg-center rounded-t-lg" style="background-image: url('http://i.pinimg.com/736x/33/08/88/3308882a244675788da52502814a0119.jpg');"></div>
            <div class="relative p-3">
                <div class="absolute top-0 left-3 -mt-8 z-10">
                    <img src="https://i.pinimg.com/736x/72/f7/3e/72f73e03e134d091171fc0ff0d3fe5b8.jpg" class="w-16 h-16 rounded-full border-3 border-white shadow-lg" alt="Avatar">
                </div>
                <button id="openEditModal" class="absolute right-3 top-3 bg-gray-200 px-3 py-1 rounded-lg hover:bg-gray-300">Modifier</button>
                <div class="ml-20">
                    <h2 class="text-lg font-bold"><?php echo $_SESSION['display_name']; ?></h2>
                    <p class="text-gray-600">@<?php echo $_SESSION['username'] ?></p>
                </div>
                <div class="mt-2 mb-4">
                    <p class="text-sm text-black leading-normal max-w-prose">
                        <?= !empty($_SESSION['bio']) ? htmlspecialchars($_SESSION['bio']) : '📝 Écrivez quelque chose sur vous...' ?>
                    </p>
                </div>
                <div class="flex mt-2 space-x-4 text-sm">
                    <span class="flex items-center space-x-1 hover:text-[#59713E] transition-colors duration-200 cursor-default">
                        <span id="following-count" class="font-semibold text-gray-800"><?= $following_count ?></span>
                        <span class="text-gray-600">Suivis</span>
                    </span>
                    <span class="flex items-center space-x-1 hover:text-[#59713E] transition-colors duration-200 cursor-default">
                        <span id="followers-count" class="font-semibold text-gray-800"><?= $followers_count ?></span>
                        <span class="text-gray-600">Abonnés</span>
                    </span>
                </div>
            </div>
        </div>

        <!-- Modal Edit Profile -->
        <div id="editProfileModal" class="fixed z-50 inset-0 bg-black bg-opacity-75 backdrop-filter backdrop-blur-md flex justify-center items-center hidden">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                <h2 class="text-lg font-semibold text-gray-800 mb-3">Modifier le profil</h2>
                <form action="../../controllers/ProfileController.php" method="POST" class="space-y-3">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Username</label>
                        <input type="text" name="username" value="<?php echo $_SESSION['username']; ?>"
                            class="w-full p-2 border border-gray-300 rounded">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Display Name</label>
                        <input type="text" name="display_name" value="<?php echo $_SESSION['display_name']; ?>"
                            class="w-full p-2 border border-gray-300 rounded">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>"
                            class="w-full p-2 border border-gray-300 rounded">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nouveau mot de passe</label>
                        <input type="password" name="password"
                            class="w-full p-2 border border-gray-300 rounded" placeholder="Laissez vide pour ne pas modifier">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Bio</label>
                        <textarea name="bio" class="w-full p-2 border border-gray-300 rounded" rows="3"><?php echo $_SESSION['bio']; ?></textarea>
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button type="button" id="closeEditModal" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">Annuler</button>
                        <button type="submit" name="update_profile" class="bg-[#59713E] text-white px-4 py-2 rounded hover:bg-green-700">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>


        <!-- Messages flash session pour la modal edit profile -->
        <div class="fixed top-4 right-210 z-50 max-w-xs">
            <?php if (isset($_SESSION['success'])) : ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-5 py-3 rounded relative mb-3" role="alert">
                    <span class="block sm:inline"><?= htmlspecialchars($_SESSION['success']) ?></span>
                    <span class="absolute top-0 bottom-0 right-[-1]  py-2.5" onclick="this.parentElement.remove()">
                        <svg class="fill-current  h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Fermer</title>
                            <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>
            <?php
                unset($_SESSION['success']);
            endif; ?>

            <?php if (isset($_SESSION['error'])) : ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-3" role="alert">
                    <span class="block sm:inline"><?= htmlspecialchars($_SESSION['error']) ?></span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.remove()">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Fermer</title>
                            <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>
            <?php
                unset($_SESSION['error']);
            endif; ?>
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


                <?php foreach ($randomUsers as $user): ?>
                    <div class="bg-white p-3 rounded-lg shadow">
                        <div class="flex items-center justify-between space-x-2">
                            <div class="flex items-center space-x-2">
                                <img src="https://i.pinimg.com/736x/b7/b1/9f/b7b19fe260b73a5aa535c021b999117d.jpg"
                                    class="w-7 h-7 rounded-full">
                                <div>
                                    <p class="text-xs font-medium"><?= htmlspecialchars($user['display_name']) ?></p>
                                    <p class="text-xs text-gray-500">@<?= htmlspecialchars($user['username']) ?></p>
                                </div>
                            </div>
                            <button class="follow-btn <?= $user['is_following'] ? 'bg-gray-300' : 'bg-[#59713E] text-white' ?> 
                    py-1 px-2 rounded text-xs hover:opacity-90 transition-opacity"
                                data-user-id="<?= $user['user_id'] ?>">
                                <?= $user['is_following'] ? 'Suivi' : 'Suivre' ?>
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>
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
            <div id="postModal" class="fixed z-50 inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
                <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                    <h2 class="text-lg font-semibold text-gray-800 mb-3">Créer un post</h2>
                    <form action="controller/postController.php" method="POST" enctype="multipart/form-data" class="space-y-3">
                        <input type="text" name="title" class="w-full p-2 border border-gray-300 rounded" placeholder="Titre du post">
                        <textarea name="content" class="w-full p-2 border border-gray-300 rounded" placeholder="Exprime-toi..."></textarea>
                        <input type="file" name="image" id="imageUpload" class="w-full p-2 border border-gray-300 rounded">

                        <!-- Preview de l'image -->
                        <div id="imagePreview" class="w-full h-48 border border-gray-300 rounded flex items-center justify-center">
                            <img id="previewImg" src="#" alt="Aperçu de l'image" class="max-w-full max-h-full rounded">
                        </div>

                        <div class="flex justify-end space-x-2">
                            <button type="button" id="closeModal" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">Annuler</button>
                            <button type="submit" class="bg-[#59713E] text-white px-4 py-2 rounded hover:bg-green-700">Publier</button>
                        </div>
                    </form>
                </div>
            </div>

        </main>
    </main>
    <script src="../../../public/assets/js/profil.js"></script>
</body>

</html>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION)) {
    session_start();
}
include __DIR__ . '/../../controllers/HomeController.php';
include __DIR__ . '/../../controllers/TweetController.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/assets/css/all.css">
    <link rel="shortcut icon" href="../../../public/assets/LogoYjungle.png" type="image/x-icon">
    <title>Page d'Accueil</title>
</head>

<body class="bg-[#59713E]">
    <!-- Sidebar Gauche -->
    <?php include '../partials/sidebar.php'; ?>



    <!-- Contenu Central Scrollable -->
    <main class="w-full md:w-[55%] h-screen overflow-y-none p-4 mx-auto text-sm">



        <!-- Messages flash -->
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
            <?php unset($_SESSION['success']);
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
            <?php unset($_SESSION['error']);
            endif; ?>
        </div>

        <main><br>


            <!-- Posts Section -->
            <?php foreach ($user_posts as $post): ?>
                <div class="bg-[#f8f7f776] p-4 rounded-lg shadow-md border border-gray-300 mb-4" data-post-id="<?= $post['post_id'] ?>">
                    <div class="flex items-start space-x-3">
                        <!-- Avatar -->
                        <img src="https://i.pinimg.com/736x/72/f7/3e/72f73e03e134d091171fc0ff0d3fe5b8.jpg"
                            class="w-12 h-12 rounded-full border-2 border-white">

                        <div class="flex-1">
                            <!-- En-tête avec infos utilisateur -->
                            <?php if ($post['is_retweet']): ?>
                                <span class="text-gray-500 text-sm">
                                    🔁 Retweeté par <?= htmlspecialchars($post['retweeter_display_name']) ?>
                                </span>
                            <?php endif; ?>
                            <div class="flex items-center space-x-2">
                                <span class="font-semibold"><?= htmlspecialchars($post['original_display_name']) ?></span>
                                <span class="text-gray-600">@<?= htmlspecialchars($post['original_username']) ?></span>
                                <span class="text-gray-500 text-sm">
                                    • <?= date('d/m/Y H:i', strtotime($post['display_date'])) ?>
                                </span>
                            </div>
                            <!-- Contenu du tweet -->
                            <p class="mt-3 text-black">
                                <?= processContent($post['content']) ?>
                            </p>

                            <!-- Affichage des médias -->
                            <?php if (!empty($post['media_data'])): ?>
                                <div class="mt-3 flex flex-wrap gap-2">
                                    <?php foreach (explode('||', $post['media_data']) as $media):
                                        [$file_name, $short_url] = explode('|SHORT|', $media); ?>
                                        <a href="/public/get_image.php?short_url=<?= $short_url ?>" target="_blank">
                                            <img src="/public/get_image.php?short_url=<?= $short_url ?>"
                                                class="object-cover rounded-lg w-48 h-48"
                                                alt="Image du tweet">
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <!-- Boutons d'interaction -->
                            <div class="flex space-x-2 mt-2">


                                <?php if (!$is_owner && !$post['is_retweet']): ?>
                                    <button class="retweet-btn bg-gray-200 px-3 py-1 rounded-md hover:bg-gray-300 transition-colors"
                                        data-post-id="<?= $post['post_id'] ?>"
                                        <?= $post['is_retweeted'] ? 'disabled' : '' ?>>
                                        <?= $post['is_retweeted'] ? 'Retweeté' : '🔁 Retweeter' ?>
                                    </button>
                                <?php endif; ?>

                                <button class="reply-btn bg-gray-200 px-3 py-1 rounded-md hover:bg-gray-300"
                                    data-post-id="<?= $post['post_id'] ?>"
                                    data-username="<?= htmlspecialchars($post['username'] ?? '') ?>">
                                    💬 Répondre
                                </button>
                            </div>

                            <!-- Formulaire de réponse -->
                            <form class="reply-form hidden mt-3" action="../../controllers/TweetController.php" method="POST">
                                <input type="hidden" name="reply_to" value="<?= $post['post_id'] ?>">
                                <div class="relative">
                                    <textarea
                                        name="content"
                                        class="w-full p-2 border border-gray-300 rounded"
                                        maxlength="140"
                                        required></textarea>
                                </div>
                                <div class="flex justify-end space-x-2 mt-2">
                                    <button type="button" class="cancel-reply bg-gray-300 px-3 py-1 rounded-md hover:bg-gray-400">
                                        Annuler
                                    </button>
                                    <button type="submit" class="bg-[#59713E] text-white px-3 py-1 rounded-md hover:bg-green-700">
                                        Répondre
                                    </button>
                                </div>
                            </form>

                            <!-- Réponses -->
                            <?php if (!empty($post['replies'])): ?>
                                <div class="ml-8 mt-4 space-y-4 border-l-2 border-gray-200 pl-4">
                                    <?php foreach ($post['replies'] as $reply): ?>
                                        <div class="bg-[#f0f0f0] p-3 rounded-lg">
                                            <div class="flex items-center space-x-2 text-sm">
                                                <span class="font-semibold"><?= htmlspecialchars($reply['display_name']) ?></span>
                                                <span class="text-gray-600">@<?= htmlspecialchars($reply['username']) ?></span>
                                                <span class="text-gray-500">• <?= date('d/m/Y H:i', strtotime($reply['created_at'])) ?></span>
                                            </div>
                                            <p class="mt-2 text-black">
                                                <?= processContent($reply['content']) ?>
                                            </p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>


            <!-- Sidebar Droite -->
            <aside class="fixed top-0 right-0 w-1/6 h-full p-3 space-y-3 bg-[#f8f7f776] shadow-lg rounded-l-xl hidden md:block text-sm">

                <div class="bg-white p-3 rounded-lg shadow relative">
                    <input
                        type="text"
                        placeholder="Recherche @utilisateur ou #hashtag"
                        class="w-full bg-gray-100 p-2 rounded outline-none focus:ring-2 focus:ring-[#59713E]"
                        id="globalSearch">

                    <div id="searchResults" class="absolute z-50 w-full mt-2 bg-white border border-gray-200 rounded-lg shadow-lg max-h-60 overflow-y-auto opacity-0 translate-y-[-10px] transition-all duration-200 origin-top pointer-events-none">
                    </div>
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


            <?php if ($is_owner): ?>
                <!-- Bouton Flottant "+" -->
                <button id="openModal" class="fixed bottom-4 left-1/2 transform -translate-x-1/2 bg-[#59713E] text-white px-4 py-2 rounded-full shadow-lg flex items-center space-x-1 cursor-pointer hover:bg-green-700 text-sm">
                    <span class="text-md font-bold">+</span>
                    <span>Créer un post</span>
                </button>

                <!-- Modal -->
                <div id="postModal" class="fixed z-50 inset-0 backdrop-filter backdrop-blur-md pt-[25vh] pl-[75vh] justify-center items-center hidden">
                    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                        <h2 class="text-lg font-semibold text-gray-800 mb-3">Créer un post</h2>
                        <form action="../../controllers/TweetController.php" method="POST" enctype="multipart/form-data" class="space-y-3">
                            <div class="relative">
                                <textarea
                                    name="content"
                                    class="w-full p-2 border border-gray-300 rounded"
                                    placeholder="Exprime-toi..."
                                    maxlength="140"
                                    id="tweetContent"></textarea>
                                <div id="charCount" class="absolute bottom-2 right-2 text-sm text-gray-500 bg-white px-1">
                                    140
                                </div>
                            </div>
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
            <?php endif; ?>


        </main>
    </main>
    <script src="../../../public/assets/js/recherche.js"></script>
    <script src="../../../public/assets/js/profil.js"></script>
</body>

</html>
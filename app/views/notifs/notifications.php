<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link rel="stylesheet" href="../../../public/assets/css/all.css">
</head>

<body class="bg-[#59713E] px-20">

    <!-- Sidebar Gauche -->
    <aside>
        <?php include  '../partials/sidebar.php'; ?>
    </aside>

    <!-- Conteneur principal centré -->
    <div class="w-full max-w-2xl mt-6 mx-auto pl-[2%]">
        <!-- En-tête -->
        <header class="bg-[#6D7244] text-white text-center py-3 text-lg font-semibold rounded-t-lg">
            Notifications
        </header>

        <!-- Onglets avec état actif -->
        <div class="bg-[#D4BEB8] flex justify-around py-2 shadow-md">
            <button id="tabAll" class="text-black font-semibold bg-[#6D7244] text-white px-4 py-1 rounded-t-lg border-b-4 border-[#6D7244]">All</button>
            <button id="tabSuivi" class="text-black font-medium px-4 py-1 rounded-t-lg border-b-4">Suivi</button>
        </div>

        <!-- Liste des notifications -->
        <div class="space-y-6 mt-4">
            <!-- Notification 1 -->
            <div class="bg-white p-4 rounded-lg shadow-md">
                <div class="flex items-center space-x-3">
                    <img src="https://i.pravatar.cc/40" class="w-10 h-10 rounded-full">
                    <div>
                        <p class="text-sm font-semibold">Nom + Prénom</p>
                        <p class="text-xs text-gray-500">@nom_utilisateur</p>
                    </div>
                    <button class="ml-auto bg-[#D4A373] text-white text-xs px-3 py-1 rounded">Suivre</button>
                </div>
                <button class="mt-3 w-full bg-[#78866B] text-white py-1 rounded">Nouveau post</button>
                <div class="mt-2 bg-black h-40 rounded"></div> <!-- Espace pour la photo -->
            </div>
        </div>
    </div>

    <!-- Sidebar Droite -->
    <aside class="fixed top-0 right-0 w-1/6 h-full p-4 space-y-4 bg-[#f8f7f776] shadow-lg rounded-l-xl hidden md:block text-sm">
        <!-- Barre de recherche -->
        <div class="bg-white p-3 rounded-full flex items-center shadow-md">
            <span class="text-gray-500 pl-2">🔍</span>
            <input type="text" placeholder="Recherche" class="w-full bg-transparent p-2 outline-none text-sm">
        </div>

        <!-- Abonnement -->
        <div class="bg-[#59713E]  p-4 rounded-2xl shadow">
            <h2 class="font-semibold text-lg">Achète ton abonnement</h2>
            <p class="text-xs text-gray-700 mt-2">Abonne toi pour débloquer de nouvelles fonctionnalités !!</p>
            <button class="mt-3 w-full text-black py-1 rounded-full border border-black">S'abonner</button>
        </div>

        <!-- Section "Suivre" -->
        <div class="bg-[#59713E] p-4 rounded-2xl shadow">
            <h2 class="font-semibold text-lg">Suivre</h2>
            <div class="space-y-2 mt-2">
                <div class="flex items-center space-x-2">
                    <div class="w-6 h-6 bg-[#C69C6D] rounded"></div>
                    <div class="flex-1">
                        <p class="text-xs font-medium">krimin45</p>
                        <p class="text-xs text-gray-500">@npm d'utilisateur</p>
                    </div>
                    <button class="bg-[#C69C6D] text-white py-1 px-3 rounded text-xs">Suivre</button>
                </div>
            </div>
            <button class="mt-3 w-full bg-white text-black py-1 rounded-full border border-black">Voir Plus</button>
        </div>

        <!-- Section "Nouveauté" -->
        <div class="bg-[#59713E] p-4 rounded-2xl shadow">
            <h2 class="font-semibold text-lg">Nouveauté</h2>
            <div class="space-y-3 mt-2">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-xs text-gray-600">Genre • Trend</p>
                        <p class="text-sm font-medium">@nom du profil</p>
                        <p class="text-xs text-gray-500">1.5M messages</p>
                    </div>
                    <button class="text-xl">⋯</button>
                </div>
            </div>
            <button class="mt-3 w-full bg-white text-black py-1 rounded-full border border-black">Voir Plus</button>
        </div>
    </aside>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tabAll = document.getElementById("tabAll");
            const tabSuivi = document.getElementById("tabSuivi");

            function activateTab(activeTab, inactiveTab) {
                activeTab.classList.add("bg-[#6D7244]", "text-white", "font-semibold", "border-b-4", "border-[#6D7244]");
                inactiveTab.classList.remove("bg-[#6D7244]", "text-white", "font-semibold", "border-b-4", "border-[#6D7244]");
                inactiveTab.classList.add("text-black", "font-medium");
            }

            tabAll.addEventListener("click", function() {
                activateTab(tabAll, tabSuivi);
            });

            tabSuivi.addEventListener("click", function() {
                activateTab(tabSuivi, tabAll);
            });
        });
    </script>

</body>

</html>
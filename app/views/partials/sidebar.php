<?php
$items = ['Accueil', 'Explorer', 'Notifications', 'Messages', 'Suivi', 'Emplois', 'Communautés', 'Abonnement', 'Entreprise vé...', 'Profil', 'Plus'];
$links = ['#', '#', '../notifs/notifications.php', '../msg/messagerie.php', '#', '#', '#', '#', '#', '../profile/profil.php', '#'];

$current_page = basename($_SERVER['PHP_SELF']);
?>

        <div class="space-y-2 mb-8">
            <div class="mt-[-0.9rem] w-full h-full">
                <a href="">
                    <img class="w-18 h-18 mx-auto" src="../../../public/assets/img/LogoYjungle.webp" alt="Logo Yjungle">
                </a>
            </div>

            <?php foreach ($items as $key => $item): ?>
                <?php

                $link_basename = basename($links[$key]);
                ?>
                <div class="flex items-center space-x-3 p-2 rounded-full hover:bg-blue-50 <?= ($link_basename === $current_page) ? 'bg-blue-100 font-semibold' : '' ?> hover:cursor-pointer">
                    <a href="<?= $links[$key] ?>" class="text-gray-950">
                        <?= $item ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="flex items-center space-x-2 text-gray-500 text-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">...</svg>
            <span>Utilisateurs</span>
        </div>

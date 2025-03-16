<?php

$items = ['Accueil', 'Notifications', 'Profil', 'Plus'];
$links = ['../home/home.php', '../notifs/notifications.php', '../profile/profil.php', '#'];

$current_page = basename($_SERVER['PHP_SELF']);
?>

<div class="w-64 h-screen bg-[#f8f7f776] p-4 fixed rounded-2xl">
    <div class="space-y-2 mb-8">
        <div class="mt-[-0.9rem] w-full h-full">
            <a href="">
                <img class="w-18 h-18 mx-auto" src="../../../public/assets/img/LogoYjungle.webp" alt="Logo Yjungle">
            </a>
        </div>

        <?php foreach ($items as $key => $item): ?>
            <?php $link_basename = basename($links[$key]); ?>
            <a href="<?= $links[$key] ?>" class="block">
                <div class="flex items-center space-x-3 p-2 rounded-full hover:bg-blue-50 <?= ($link_basename === $current_page) ? 'bg-blue-100 font-semibold' : '' ?> hover:cursor-pointer">
                    <span class="text-gray-950"><?= $item ?></span>
                </div>
            </a>
        <?php endforeach; ?>
    </div>

    <div class="flex items-center space-x-2 text-gray-500 text-sm">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">...</svg>
        <span><?php echo $_SESSION['username'] ?></span>
    </div>
</div>
<?php
session_start();
session_destroy();
header('Location: /app/views/auth/auth.php');
exit;
?>
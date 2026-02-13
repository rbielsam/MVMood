<?php
if (!isset($title)) { $title = 'MVM Mood'; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title) ?></title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

    <!-- Top Bar -->
    <div class="topbar">
        <img src="images/mockup-with-colours.png" alt="MVM Mood Logo">

        <div class="top-right">
            <span>🌐</span>
            <span>🌙</span>
        </div>
    </div>

    <!-- Main Layout -->
    <div class="container">

        <!-- Sidebar -->
        <div class="sidebar">
            <a href="index.php" class="<?= (basename($_SERVER['PHP_SELF']) === 'index.php') ? 'active' : '' ?>">Home</a>
            <a href="notifications.php" class="<?= (basename($_SERVER['PHP_SELF']) === 'notifications.php') ? 'active' : '' ?>">Notifications</a>
            <a href="messages.php" class="<?= (basename($_SERVER['PHP_SELF']) === 'messages.php') ? 'active' : '' ?>">Messages</a>
            <a href="create.php" class="<?= (basename($_SERVER['PHP_SELF']) === 'create.php') ? 'active' : '' ?>">Create</a>
            <a href="#">Language</a>
            <a href="#">Theme</a>

            <div class="logout">
                <a href="#">Log out</a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main">

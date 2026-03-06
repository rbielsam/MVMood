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
    <div class="topbar">
        <img src="images/mockup-with-colours.png" alt="MVM Mood Logo">

        <div class="top-right">
            <span>🌐</span>
            <span>🌙</span>
        </div>
    </div>

    <div class="container">
        <div class="sidebar">
            <a href="index.php?controller=Publicaciones&action=index">Home</a>
            <a href="index.php?controller=Publicaciones&action=notificaciones">Notifications</a>
            <a href="index.php?controller=Publicaciones&action=mensages">Messages</a>

            <?php if($_SESSION['rol'] != 'admin'): ?>
                <a href="index.php?controller=Publicaciones&action=crear">Create</a>
            <?php endif; ?>

            <div class="logout">
                <a href="index.php?controller=Auth&action=logout">Log out</a>
            </div>
        </div>
        <div class="main">

<?php
if (!isset($title)) { $title = 'Create Post - MVM Mood'; }
$title = 'Create Post - MVM Mood';
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
            <div class="create-post">
                <h2>Create a New Post</h2>
                <form id="postForm">
                    <textarea id="postContent" placeholder="What's on your mind? Share your thoughts, feelings, or updates..." required></textarea>
                    <button type="submit">Post</button>
                </form>
                <div class="post-preview" id="preview">
                    <h4>Your Post Preview</h4>
                    <p id="previewText"></p>
                </div>
            </div>

            <script>
                const form = document.getElementById('postForm');
                const textarea = document.getElementById('postContent');
                const preview = document.getElementById('preview');
                const previewText = document.getElementById('previewText');

                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const content = textarea.value.trim();
                    if (content) {
                        previewText.textContent = content;
                        preview.style.display = 'block';
                        textarea.value = '';
                        alert('Post created! (This is a demo - in a real app, this would be saved to a database)');
                    }
                });
            </script>
        </div> <!-- .main -->
    </div> <!-- .container -->

</body>
</html>

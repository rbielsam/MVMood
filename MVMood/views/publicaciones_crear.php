<?php
$title = 'Create Post - MVM Mood';
require_once "models/ACL.php";
include 'header.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title) ?></title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>



 
        <div class="main">
            <div class="create-post">
                <h2>Create a New Post</h2>

                <form id="postForm" method="post" action="index.php?controller=Publicaciones&action=crear">
                    <textarea id="postContent" name="content" placeholder="What's on your mind? Share your thoughts, feelings, or updates..." required></textarea>
                    <button type="submit">Post</button>
                </form>
                
        </div> 
    </div> 

</body>
</html>

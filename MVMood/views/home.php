<?php $title = 'Home - MVM Mood'; include 'includes/header.php'; ?>

            <!-- Search Bar with Profile -->
            <div class="search-section">
                <input type="text" class="search-bar" placeholder="🔍 Search...">
                <a href="settings.php"><img src="images/user.png" class="profile-pic" alt="Profile Picture"></a>
            </div>

            <!-- Stories -->
            <div class="stories">
                <div class="story"></div>
                <div class="story"></div>
                <div class="story"></div>
                <div class="story"></div>
                <div class="story"></div>
            </div>

            <!-- Posts -->
            <div class="post">
                <div class="post-header">
                    <img src="images/user.png" alt="Sofia" class="avatar">
                    <div>
                        <div class="post-author">Sofia Martinez</div>
                        <div class="post-meta"><span class="tagged">Tagged: @MariaRodriguez</span><span class="location">• Institute Campus</span></div>
                    </div>
                </div>
                <div class="post-content">This is a sample post content.</div>
                <div class="post-actions">
                    <button class="action-btn">👍 Like</button>
                    <button class="action-btn">💬 Comment</button>
                    <button class="action-btn">🔗 Share</button>
                </div>
            </div>

            <div class="post">
                <div class="post-header">
                    <img src="images/user.png" alt="Daniel" class="avatar">
                    <div>
                        <div class="post-author">Daniel Sanchez</div>
                        <div class="post-meta"><span class="tagged">Tagged: @CarlosLopez</span><span class="location">• Downtown Library</span></div>
                    </div>
                </div>
                <div class="post-content">This is another sample post.</div>
                <div class="post-actions">
                    <button class="action-btn">👍 Like</button>
                    <button class="action-btn">💬 Comment</button>
                    <button class="action-btn">🔗 Share</button>
                </div>
            </div>

<?php include 'includes/footer.php'; ?>

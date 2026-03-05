<?php $title = 'Settings - MVM Mood'; include 'layout.php'; ?>

            <div class="main">
            <div class="settings-section">
                <h2>Profile Edit</h2>
                <form>
                    <div class="form-group">
                        <label for="photo">Profile Photo</label>
                        <img src="images/user.png" class="profile-pic" alt="Current Profile Photo">
                        <input type="file" id="photo" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" placeholder="Enter your full name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="bio">Bio</label>
                        <input type="text" id="bio" placeholder="Tell us about yourself">
                    </div>
                    <button type="submit" class="save-btn">Save Changes</button>
                </form>
            </div>

            <div class="settings-section">
                <h2>Account Options</h2>
                <div class="options">
                    <button class="option-btn">Change Password</button>
                    <button class="option-btn">Terms and Conditions</button>
                    <button class="option-btn">Help and Support</button>
                    <button class="option-btn">About</button>
                    <button class="option-btn danger">Delete Account</button>
                </div>
            </div>
            </div>

<?php include 'includes/footer.php'; ?>

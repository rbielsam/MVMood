<?php if (!empty($_SESSION['mensaje'])): ?>
	<p class="ok"><?= $_SESSION['mensaje'] ?></p>
	<?php unset($_SESSION['mensaje']); ?>
<?php endif; ?>

<?php if (!empty($_SESSION['error'])): ?>
	<p class="error"><?= $_SESSION['error'] ?></p>
	<?php unset($_SESSION['error']); ?>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>MVMood - Sign Up</title>
</head>
<body>
    <header>
        <div class="header-content">
            <img id="languaje-icon" src="images/tierra.png" alt="Mode icon" width="32" height="32">
            <img id="mode-icon" src="images/modo-oscuro.png" alt="Mode icon" width="32" height="32">
        </div>
    </header>

    <div class="div_container">

        <section class="left_section">
            <iframe class="terms_conditions" src="views/terminosYCondiciones.html" title="description"></iframe><br/>

            <form action="index.php?controller=Usuarios&action=signUpProcess" method="POST">
                <input type="checkbox" name="signUp"/><label>   I accept</label>
            </form>
        </section>

        <section class="right_section">

            <div class="login_content">
<!--width="100" height="100"-->
                <img class="logoSignUp" src="images/imgLogo.png" /><br/>

                <form action="index.php?controller=Usuarios&action=signUpProcess" method="POST">
                    <input type="text" name="nickname" placeholder="username" class="imputs"/><br/>
                    <input type="text" name="email" placeholder="email" class="imputs"/><br/>
                    <input type="password" name="password" placeholder="password" class="imputs"/><br/>
                    <input type="password" name="repeatPassword" placeholder="repeat password" class="imputs"/><br/>
                    <input type="date" name="dateOfBirth" placeholder="date of birth" class="imputs"/><br/><br/>
                    <input type="submit" name="signUp" value="sign up" class="signUp_button"/><br/><br/>
                </form>

            </div>

        </section>


    </div>

    <footer>
        <p>MVMood 2026</p>
    </footer>

    <script src="scripts/script.js"></script>

</body>
</html>

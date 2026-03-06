<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>MVMood - Log in</title>
</head>
<body class="light-mode">
    <header>
        <div class="header-content">
            <!--width="32" height="32"-->
            <img id="languaje-icon" src="images/tierra.png" alt="Mode icon">
            <img id="mode-icon" src="images/modo-oscuro.png" alt="Mode icon">
        </div>
    </header>

    <div class="div_container">

        <section class="left_section">
            <img class ="imgLogo" src="images/imgLogo.png"/>
        </section>

        <section class="right_section">
            <div class="login_content">
                <form action="index.php?controller=Auth&action=loginProcess" method="POST">
                    <p class="p_login">Iniciar sesión en MVMood</p>
                    <input type="text" name="email" placeholder="email" class="imputs"/><br/>
                    <input type="password" name="password" placeholder="password" class="imputs"/><br/><br/>
                    <input type="submit" name="logIn" value="log in" class="logIn_button"/><br/>
                    
                </form>
                <form action="index.php?controller=Usuarios&action=signUp" method="POST">
                    <input type="submit" name="signUp" value="sign up" class="signUp_button"/><br/><br/>
                </form>

                <a href="index.php?controller=Usuarios&action=newPassword">forgot password?</a><br/>
            </div>
        </section>
        
    </div>

    <footer>
        <p>MVMood 2026</p>
    </footer>

    <script src="scripts/script.js"></script>

</body>
</html>
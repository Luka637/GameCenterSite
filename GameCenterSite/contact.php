<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Game Center | Contact</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="icon" href="img/icon.png" type="image/png">
</head>
<body>
    <header>
        <nav id="nav"></nav>

        <!-- Session-based login/register gilakebi gamochndeba an logout -->
        <?php if (isset($_SESSION['username'])): ?>
            <a href="logout.php" class="gradient-btn contact-fix">Logout</a>
        <?php else: ?>
            <a href="register.php" class="gradient-btn contact-fix">Register</a>
            <a href="login.php" class="gradient-btn">Log In</a>
        <?php endif; ?>
    </header>
    <main>
        <div class="main-content">
            <h1>Contact Us For Any Questions, Or Upload Your Cool Gaming Moments, Which We'll Share On Social Media</h1>

            <form action="contact_process.php" method="post" id="contactForm" enctype="multipart/form-data">
                <label>Name: <input type="text" name="name" required></label>
                <label>Surname: <input type="text" name="surname" required></label>
                <label>Email: <input type="email" name="gmail" required></label>
                <label>Phone: <input type="tel" name="phone" pattern="[0-9\-]{9,}" required title="Please enter at least 9 numbers (digits or dashes)"></label>
                <label>Your message: <textarea name="message" rows="4" required></textarea></label>
                <label>File (optional): <input type="file" name="file"></label>
                <button class="gradient-btn" type="submit">Send</button>
            </form>

            <div id="msg"></div>
        </div>
    </main>

    <footer class="site-footer">
        <p>&copy; 2025 Game Center. All rights reserved.</p>
    </footer>

    <script src="js/nav.js"></script>
    <script src="js/forForm.js"></script>
</body>
</html>
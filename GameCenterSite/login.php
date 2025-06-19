<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $username = preg_replace('/[^a-zA-Z0-9_-]/', '', $username);
    $password = $_POST["password"];

    if (file_exists("users/users.txt")) {
        $users = file("users/users.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $found = false;

        foreach ($users as $user) {
            list($uName, $hashedPassword) = explode(':', $user);

            if ($uName === $username && password_verify($password, $hashedPassword)) {
                // radgan tu sworad sheva informacia, sesia gaketdeba da gaagrdzelebs chveulebriv
                $_SESSION['username'] = $username;
                setcookie("remember_user", $username, time() + (7 * 24 * 60 * 60), "/");
                header("Location: contact.php");  //gadavides isev contactze
                exit();
            }
        }
    }
    $error = "Invalid username or password.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="icon" href="img/icon.png" type="image/png">
</head>
<body>
    <main>
        <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <div class="main-content">
            <h1>Log In</h1>
            <form method="post" action="">
                <label>Username: <input name="username" required></label><br>
                <label>Password: <input type="password" name="password" required></label><br>
                <button class="gradient-btn" type="submit">Log in</button>
            </form>
        </div>
    </main>
</body>
</html>

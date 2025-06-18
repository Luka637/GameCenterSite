<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = $_POST["password"];
    if(strlen($username)<1 || strlen($password)<5) echo "Error: Password must be 5 charachters at least!!!";
    else {
        if (!file_exists("users")) mkdir("users");
        $users = file("users/users.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $record = $username . ':' . password_hash($password, PASSWORD_DEFAULT) . "\n";
        file_put_contents("users/users.txt", $record, FILE_APPEND);
        echo "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <title>Thank You</title>
                <link rel='stylesheet' href='style/style.css'>
                <link rel='icon' href='img/icon.png' type='image/png'>
            </head>
            <body>
                <main>
                    <div class='main-content'>
                        Status: Account created.
                        <div>
                            <a href='contact.php' class='gradient-btn'>Return to Home</a>
                        </div>
                    </div>
                </main>
            </body>
            </html>";
        exit();
    }
}
?>
<!DOCTYPE html>
<html><head>
<title>Register</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="icon" href="img/icon.png" type="image/png">
</head>
<body>
    <main>
        <div class="main-content">
            <h1>Account Creation</h1>
            <form method="post" action="">
                <label>Username: <input name="username" required></label>
                <label>Password: <input type="password" name="password" required></label>
                <button class="gradient-btn" type="submit">Create Account</button>
            </form>
        </div>
    </main>
</body>
</html>

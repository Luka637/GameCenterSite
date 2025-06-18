<?php
session_start();

if (!isset($_SESSION['username'])) {
    //tu useri ar aris shesuli, gadava login-ze rom jer shevides
    header('Location: login.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fields = ['name', 'surname', 'gmail', 'phone', 'message'];
    $line = [];

    foreach ($fields as $f) {
        $line[] = strip_tags($_POST[$f]);
    }

    //failebi am foldershi wava, da tu araa sheqmnili sheiqmneba folderi
    $upload_dir = "uploads/";
    $uploaded_file_name = "";

    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $file_tmp_path = $_FILES['file']['tmp_name'];
        $file_name = basename($_FILES['file']['name']);
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        //am tipebis atvirtva gvqondes mxolod, rom saitze usafrtxod aitvirtos kevlaferi
        $allowed_ext = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp', 'pdf', 'txt', 'doc', 'docx'];
        if (!in_array($file_ext, $allowed_ext)) {
            echo "Invalid file type. Allowed: " . implode(", ", $allowed_ext);
            exit();
        }

        //ai aq iqmnea folderi tu araa sheqmnili
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }

        $new_file_name = time() . '_' . preg_replace("/[^a-zA-Z0-9._-]/", "_", $file_name);
        $dest_path = $upload_dir . $new_file_name;

        if (move_uploaded_file($file_tmp_path, $dest_path)) {
            $uploaded_file_name = $new_file_name;
        } else {
            echo "Error moving uploaded file.";
            exit();
        }
    }

    $line[] = $uploaded_file_name;
    $entry = implode(" | ", $line) . "\n";
    file_put_contents("contact.txt", $entry, FILE_APPEND);

    //gastilvistvisaa shemdegi, rom am php-zec imushaos, roca aitvirteba rame
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
                <h1>Thank you, your message was received!</h1>
                <p><strong>Name:</strong> " . htmlspecialchars($_POST['name']) . "</p>
                <p><strong>Surname:</strong> " . htmlspecialchars($_POST['surname']) . "</p>
                <p><strong>Email:</strong> " . htmlspecialchars($_POST['gmail']) . "</p>
                <p><strong>Phone:</strong> " . htmlspecialchars($_POST['phone']) . "</p>
                <p><strong>Message:</strong><br>" . nl2br(htmlspecialchars($_POST['message'])) . "</p>";

            if ($uploaded_file_name !== "") {
                echo "<p><strong>Uploaded File:</strong> $uploaded_file_name </p>";
            }

            echo "<a href='index.html' class='gradient-btn'>Back Home</a>
                </div>
        </main>
    </body>
    </html>";
    exit();
}

header("Location: contact.html");
?>

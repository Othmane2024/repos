<?php
session_start();

$messages_file = 'messages.json';
$messages = [];
if (file_exists($messages_file)) {
    $messages = json_decode(file_get_contents($messages_file), true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"rel="stylesheet"/>
    <link rel="icon" type="image/x-icon" href="guestbook.png">
   <link rel="stylesheet" href="style.css">
    <title>Guestbook Comments</title>
</head>
<body>
    <div class="container">
    <header>
            <h1>Gastenboek</h1>
        <nav>
            <ul>
            <a href="index.php"><i class='bx bxs-home'></i></a>
                <li><a href="page.php">Nieuw Bericht</a></li>
            </ul>
        </nav>
    </header>
    <div class="main1"> 
    <?php
    if (!empty($messages)) {
        foreach ($messages as $data) {
            echo "<div class='message'>";
            echo "<div class='message-info'>";
            echo "<p><strong>" . $data['name'] . "</strong> - " . $data['date'] . "</p>";
            echo "<p>" . $data['message'] . "</p>";
            echo "</div>";
           
            if (!empty($data['image'])) {
                echo "<div class='message-image'>";
                echo "<img src='uploads/{$data['image']}' alt=''>";
                echo "</div>";
            }
            echo "</div>";
        }
    }
    ?>
</div>

        </div>
    </div>
</body>
</html>
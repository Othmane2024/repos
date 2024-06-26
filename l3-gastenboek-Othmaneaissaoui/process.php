<?php
session_start();

function canPostMessage() {
    if (!isset($_SESSION['last_message_time'])) {
        return true; 
    }

    $last_message_time = $_SESSION['last_message_time'];
    $current_time = time();
    $elapsed_time = $current_time - $last_message_time;

    return $elapsed_time >= (24 * 3600); 
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    if (!canPostMessage()) {
        echo "<script>alert('You can only post a message every 24 hours.');</script>";
        echo "<script>window.location.href = 'page.php';</script>";
        exit();
    }
   
    $name = htmlspecialchars($_POST['name']);
    $message = htmlspecialchars($_POST['message']);

    $filename = null; 
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image'];
    
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $max_size = 5 * 1024 * 1024; // 5MB
        
        if (in_array($image['type'], $allowed_types) && $image['size'] <= $max_size) {
          
            $filename = uniqid() . '_' . $image['name'];
            move_uploaded_file($image['tmp_name'], 'uploads/' . $filename);
        } else {
            echo "<script>alert('Invalid file. Please upload a JPEG, PNG, or GIF file.');</script>";
            echo "<script>window.location.href = 'page.php';</script>";
            exit();
        }
    }

    $entry = [
        'name' => $name,
        'date' => date('Y-m-d H:i:s'), 
        'message' => $message,
        'image' => $filename
    ];

    $messages_file = 'messages.json';
    $messages = [];

    if (file_exists($messages_file)) {
        $messages = json_decode(file_get_contents($messages_file), true);
    }

    $messages[] = $entry;

    file_put_contents($messages_file, json_encode($messages, JSON_PRETTY_PRINT));

    $_SESSION['last_message_time'] = time(); 

    header("Location: comments.php");
    exit();
} 
?>

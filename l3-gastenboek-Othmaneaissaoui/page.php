<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"rel="stylesheet"/>
    <link rel="icon" type="image/x-icon" href="guestbook.png">
    <link rel="stylesheet" href="style.css">
    <title>Guestbook</title>
</head>
<body>
    <div class="container">
    <header>
            <h1>Gastenboek</h1>
        <nav>
            <ul>
                <a href="index.php"><i class='bx bxs-home'></i></a>
                <li><a href="comments.php">Berichten</a></li> 
            </ul>
        </nav>
    </header>
    <div class="main">
       <form action="process.php" method="POST" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required maxlength="50">

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required maxlength="400"></textarea>

            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept="image/*">
            
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
    </div>
 </body>
</html>
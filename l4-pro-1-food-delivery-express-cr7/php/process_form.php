<?php

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $name = htmlspecialchars($_POST['name']);
                    $message = htmlspecialchars($_POST['message']);
                    $email = htmlspecialchars( $_POST["email"]);
                
                    $to = "mertcar90@gmail.com"; 
                
                    $subject = "Nieuw bericht van $name";
                    $headers = "From: $email";
                
                    if (mail($to, $subject, $message, $headers)) {
                        echo "Bericht succesvol verzonden. Bedankt!";
                    } else {
                        echo "Er is een fout opgetreden bij het verzenden van het bericht. Probeer het later opnieuw.";
                    }
                }
                ?>
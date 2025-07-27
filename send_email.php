<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $hotel_name = $_POST['hotel_name'];
    $owner_name = $_POST['owner_name'];
    $map_link = $_POST['map_link'];
    $location = $_POST['location'];

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Set the SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'sahilcollegepurpose@gmail.com'; // Your Gmail address
        $mail->Password   = 'cndc nkiw tsfw zehd '; // Your Gmail App password (Not normal password)
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom('sahilcollegepurpose@gmail.com', 'Hotel Form');
        $mail->addAddress('sahilcollegepurpose@gmail.com', 'Admin');

        // Attach uploaded file
        if (isset($_FILES['hotel_photo']) && $_FILES['hotel_photo']['error'] == 0) {
            $mail->addAttachment($_FILES['hotel_photo']['tmp_name'], $_FILES['hotel_photo']['name']);
        }

        // Content
        $mail->isHTML(true);
        $mail->Subject = "New Hotel Submission: $hotel_name";
        $mail->Body    = "
        <strong>Hotel Name:</strong> $hotel_name<br>
        <strong>Owner Name:</strong> $owner_name<br>
        <strong>Google Map Link:</strong> $map_link<br>
        <strong>Location:</strong> $location
        ";

        $mail->send();
        echo 'Hotel information sent successfully!';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

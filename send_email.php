<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $subscription = $_POST['subscription'];

    // Compose the message
    $subject = "Bevestiging van je aanmelding - $subscription Les";
    $message = "Beste $name,\n\nBedankt voor je aanmelding voor de $subscription les!\n\nHier zijn je gegevens:\n";
    $message .= "Naam: $name\n";
    $message .= "E-mailadres: $email\n";
    $message .= "Wachtwoord: $password (bewaar dit veilig!)\n\n";
    $message .= "We kijken ernaar uit je les te geven!\n\nMet vriendelijke groet,\nRiff with Griff";

    // Set headers
    $headers = "From: no-reply@jouwwebsite.com\r\n";
    $headers .= "Reply-To: no-reply@jouwwebsite.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send the email
    if (mail($email, $subject, $message, $headers)) {
        echo "E-mail succesvol verzonden!";
    } else {
        echo "Er is een fout opgetreden bij het verzenden van de e-mail.";
    }
} else {
    echo "Ongeldig verzoek.";
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Ensure you've loaded the PHPMailer classes

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.yourdomain.com';  // Replace with your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'riffgriff025@gmail.com'; // Replace with your email
        $mail->Password = '@RiffGriff0956';             // Replace with your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('no-reply@yourdomain.com', 'Mailer');
        $mail->addAddress($email, $name); // Add a recipient

        //Content
        $mail->isHTML(false); // Set email format to plain text
        $mail->Subject = 'Bevestiging van je aanmelding';
        $mail->Body    = "Beste $name,\n\nBedankt voor je aanmelding!\n\nNaam: $name\nE-mailadres: $email\nWachtwoord: $password\n\nMet vriendelijke groet,\nRiff with Griff";

        $mail->send();
        echo 'E-mail succesvol verzonden!';
    } catch (Exception $e) {
        echo "E-mail kon niet verzonden worden. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Ongeldig verzoek.";
}

ini_set('display_errors', 1);
error_reporting(E_ALL);
} 
?>


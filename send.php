<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $idpubg = $_POST["idpubg"];
    $email = $_POST["email"];
    $alasan = $_POST["alasan"];

    $mail = new PHPMailer(true);

    try {
        // SMTP CONFIG
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'rizky456prasetyo@gmail.com'; // GANTI DENGAN EMAIL ADMIN
        $mail->Password   = 'APP_PASSWORD';          // GANTI DENGAN APP PASSWORD GMAIL
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Email isi
        $mail->setFrom('rizky456prasetyo@gmail.com', 'Form Pendaftaran SEAR');
        $mail->addAddress('rizky456prasetyo@gmail.com'); // Tujuan admin

        $mail->isHTML(true);
        $mail->Subject = 'Pendaftaran Baru Clan SEAR';
        $mail->Body    = "
            <h3>Data Pendaftar:</h3>
            <p><strong>Nama:</strong> $nama</p>
            <p><strong>ID PUBG:</strong> $idpubg</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Alasan Bergabung:</strong> $alasan</p>
        ";

        $mail->send();
        echo "Pendaftaran berhasil dikirim!";
    } catch (Exception $e) {
        echo "Pendaftaran gagal. Error: {$mail->ErrorInfo}";
    }
}
?>

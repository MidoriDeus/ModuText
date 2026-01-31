<?php
// api/enviar_correo.php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../PHPMailer/PHPMailer.php';
require_once __DIR__ . '/../PHPMailer/SMTP.php';
require_once __DIR__ . '/../PHPMailer/Exception.php';

// Enable CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

// Asegurarse de que es una petición POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $phone = htmlspecialchars($_POST['phone'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');

    if (!empty($name) && !empty($email) && !empty($message)) {
        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['EMAIL_USERNAME'] ?? 'drackracer@gmail.com'; // Tu correo
            $mail->Password = $_ENV['EMAIL_PASSWORD'] ?? 'iyphkooslbxszvsc'; // Tu contraseña de aplicación
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Configuración del correo
            $mail->CharSet = 'UTF-8';
            $mail->setFrom($_ENV['EMAIL_USERNAME'] ?? 'drackracer@gmail.com', 'Formulario de Contacto');
            $mail->addAddress($_ENV['EMAIL_USERNAME'] ?? 'drackracer@gmail.com');

            $mail->isHTML(true);
            $mail->Subject = 'Nuevo mensaje del formulario de contacto Modutext';
            $mail->Body = "
                <h1>Nuevo Mensaje</h1>
                <p><strong>Nombre:</strong> $name</p>
                <p><strong>Correo:</strong> $email</p>
                <p><strong>Teléfono:</strong> $phone</p>
                <p><strong>Mensaje:</strong><br>$message</p>
            ";

            $mail->send();
            // Enviar respuesta JSON
            header('Content-Type: application/json');
            echo json_encode(['status' => 'success', 'message' => '¡Correo enviado correctamente!']);
        } catch (Exception $e) {
            // Enviar error en formato JSON
            header('Content-Type: application/json');
            echo json_encode(['status' => 'error', 'message' => 'Error al enviar el Correo: ' . $mail->ErrorInfo]);
        }
    } else {
        // Enviar error de validación en formato JSON
        header('Content-Type: application/json');
        echo json_encode(['status' => 'error', 'message' => 'Todos los campos son obligatorios.']);
    }
} else {
    // Enviar error de método en formato JSON
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'Método no permitido']);
}
?>
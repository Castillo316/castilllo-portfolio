<?php
$email = 'destinatario@example.com';
$subject = 'Asunto del correo';
$message = 'Contenido del correo';

$sendgrid_api_key = 'TU_API_KEY';

$url = 'https://api.sendgrid.com/v3/mail/send';
$data = array(
    'personalizations' => array(
        array(
            'to' => array(
                array(
                    'email' => $email
                )
            ),
            'subject' => $subject
        )
    ),
    'from' => array(
        'email' => 'irenco_316@hotmail.com'
    ),
    'content' => array(
        array(
            'type' => 'text/plain',
            'value' => $message
        )
    )
);

$options = array(
    'http' => array(
        'header'  => "Content-Type: application/json\r\nAuthorization: Bearer $sendgrid_api_key",
        'method'  => 'POST',
        'content' => json_encode($data)
    )
);
$context  = stream_context_create($options);
$response = file_get_contents($url, false, $context);
if ($response === false) {
    echo 'Error al enviar el correo electrónico.';
} else {
    echo 'Correo electrónico enviado correctamente.';
}
?>



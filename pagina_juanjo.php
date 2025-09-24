<?php
// --- Procesar formulario ---
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre  = trim($_POST["nombre"] ?? "");
    $email   = trim($_POST["email"] ?? "");
    $mensaje = trim($_POST["mensaje"] ?? "");

    if ($nombre && $email && $mensaje) {
        $to = "ormmopu@hotmail.com"; // <-- Tu correo
        $subject = "Mensaje desde la web - $nombre";
        $body = "Has recibido un nuevo mensaje:\n\n".
                "Nombre: $nombre\n".
                "Email: $email\n".
                "Mensaje:\n$mensaje\n";

        $headers = "From: noreply@asustor.local\r\n".
                   "Reply-To: $email\r\n".
                   "X-Mailer: PHP/" . phpversion();

        if (mail($to, $subject, $body, $headers)) {
            $msg = "✅ ¡Mensaje enviado correctamente!";
        } else {
            $msg = "⚠️ Hubo un error al enviar el mensaje. Revisa la configuración de correo en tu NAS.";
        }
    } else {
        $msg = "⚠️ Todos los campos son obligatorios.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página Juanjo</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; padding: 20px; }
        .galeria img { margin: 15px auto; display: block; border: 2px solid #ccc; }
        form { max-width: 500px; margin: 30px auto; text-align: left; }
        label { display: block; margin-top: 10px; }
        input, textarea { width: 100%; padding: 8px; margin-top: 5px; }
        .actions { margin-top: 15px; text-align: center; }
        .btn { padding: 10px 20px; border: none; cursor: pointer; }
        .primary { background: #007BFF; color: white; }
    </style>
</head>
<body>
    <h1>Página de Juanjo</h1>

    <div class="galeria">
        <img src="img/fenoymoroso.jpg" width="500" height="300" alt="foto1">
        <img src="img/DEUDORJUANJOFENOY.JPG" width="500" height="300" alt="foto2">
        <img src="img/DEUDORJUANJOFENOY1.JPG" width="500" height="300" alt="foto3">
         <img src="img/FIN DE AÑO AND BUGGY 029.JPG" width="500" height="300" alt="foto3">
    </div>

    <h2>Contacto</h2>
    <?php if (!empty($msg)) echo "<p><b>$msg</b></p>"; ?>

    <form method="post" action="pagina_juanjo.php">
        <label>Nombre
            <input type="text" name="nombre" required>
        </label>
        <label>Email
            <input type="email" name="email" required>
        </label>
        <label>Mensaje
            <textarea name="mensaje" rows="5" required></textarea>
        </label>
        <div class="actions">
            <button class="btn primary" type="submit">Enviar</button>
        </div>
    </form>
</body>
</html>

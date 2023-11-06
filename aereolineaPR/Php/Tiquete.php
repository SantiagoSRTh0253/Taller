<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiquete</title>
    <!-- Enlaces a Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Estilos personalizados -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .jumbotron {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
        .lead {
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        session_start();

        // Verificar si las variables de sesión están configuradas
        if (isset($_SESSION['idreserva']) && isset($_SESSION['fecha_reserva']) && isset($_SESSION['vuelo_idvuelo']) && isset($_SESSION['usuario_idusuario']) && isset($_SESSION['numero_vuelo']) && isset($_SESSION['origen_vuelo']) && isset($_SESSION['destino_vuelo']) && isset($_SESSION['documento_identificacion']) && isset($_SESSION['nombre_usuario']) && isset($_SESSION['apellido_usuario'])) {
            // Obtener los datos de la reserva desde las variables de sesión
            $idreserva = $_SESSION['idreserva'];
            $fecha_reserva = $_SESSION['fecha_reserva'];
            $vuelo_idvuelo = $_SESSION['vuelo_idvuelo'];
            $usuario_idusuario = $_SESSION['usuario_idusuario'];
            $numero_vuelo = $_SESSION['numero_vuelo'];
            $origen_vuelo = $_SESSION['origen_vuelo'];
            $destino_vuelo = $_SESSION['destino_vuelo'];
            $documento_identificacion = $_SESSION['documento_identificacion'];
            $nombre_usuario = $_SESSION['nombre_usuario'];
            $apellido_usuario = $_SESSION['apellido_usuario'];
            ?>
            <div class="jumbotron">
                <h1 class="display-4">Tiquete</h1>
                <hr class="my-4">
                <p class="lead"><strong>ID Reserva:</strong> <?php echo $idreserva; ?></p>
                <p class="lead"><strong>Fecha de Reserva:</strong> <?php echo $fecha_reserva; ?></p>
                <p class="lead"><strong>ID Vuelo:</strong> <?php echo $vuelo_idvuelo; ?></p>
                <p class="lead"><strong>ID Usuario:</strong> <?php echo $usuario_idusuario; ?></p>
                <p class="lead"><strong>Número de Vuelo:</strong> <?php echo $numero_vuelo; ?></p>
                <p class="lead"><strong>Origen del Vuelo:</strong> <?php echo $origen_vuelo; ?></p>
                <p class="lead"><strong>Destino del Vuelo:</strong> <?php echo $destino_vuelo; ?></p>
                <p class="lead"><strong>Documento de Identificación:</strong> <?php echo $documento_identificacion; ?></p>
                <p class="lead"><strong>Nombre del Usuario:</strong> <?php echo $nombre_usuario; ?></p>
                <p class="lead"><strong>Apellido del Usuario:</strong> <?php echo $apellido_usuario; ?></p>
            </div>
        <?php
        } else {
            // Si las variables de sesión no están configuradas, redirigir a la página de inicio de sesión u otra página apropiada
            header("Location: iniciar_sesion.php");
            exit();
        }
        ?>
    </div>

    <!-- Scripts de Bootstrap (jQuery, Popper.js, Bootstrap JS) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
require "../conexion/db_conexion.php"; // Asegúrate de tener la conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['codigo_reserva']) && isset($_POST['fecha_reserva'])) {
        $codigo_reserva = $_POST['codigo_reserva'];
        $fecha_reserva = $_POST['fecha_reserva'];

        $codigo_reserva = mysqli_real_escape_string($conn, $codigo_reserva);
        $fecha_reserva = mysqli_real_escape_string($conn, $fecha_reserva);

        $query = "SELECT r.idreserva, r.fecha_reserva, r.vuelo_idvuelo, r.usuario_idusuario, v.numero_vuelo, v.origen_vuelo, v.destino_vuelo, u.documento_identificacion, u.nombre_usuario, u.apellido_usuario
                  FROM reserva r
                  JOIN vuelo v ON r.vuelo_idvuelo = v.idvuelo
                  JOIN usuario u ON r.usuario_idusuario = u.idusuario
                  WHERE r.idreserva = '$codigo_reserva' AND r.fecha_reserva = '$fecha_reserva'";

        $result = mysqli_query($conn, $query);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                // Credenciales correctas, redirigir a la página de éxito
                $row = mysqli_fetch_assoc($result);
                session_start();
                $_SESSION['idreserva'] = $row['idreserva'];
                $_SESSION['fecha_reserva'] = $row['fecha_reserva'];
                $_SESSION['vuelo_idvuelo'] = $row['vuelo_idvuelo'];
                $_SESSION['usuario_idusuario'] = $row['usuario_idusuario'];
                $_SESSION['numero_vuelo'] = $row['numero_vuelo'];
                $_SESSION['origen_vuelo'] = $row['origen_vuelo'];
                $_SESSION['destino_vuelo'] = $row['destino_vuelo'];
                $_SESSION['documento_identificacion'] = $row['documento_identificacion'];
                $_SESSION['nombre_usuario'] = $row['nombre_usuario'];
                $_SESSION['apellido_usuario'] = $row['apellido_usuario'];
                header("Location: ../php/Tiquete.php");
                exit();
            } else {
                // Credenciales incorrectas, mostrar mensaje de error
                echo "Credenciales incorrectas o usuario no encontrado.";
            }
        } else {
            // Error en la consulta SQL
            echo "Error en la consulta: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
}
?>

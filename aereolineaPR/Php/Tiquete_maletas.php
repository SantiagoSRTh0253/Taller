<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles de la Maleta</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            padding: 20px;
        }
        .titulo {
            text-align: center;
            margin-bottom: 30px;
        }
        .detalle {
            font-size: 18px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="titulo">Detalles de la Maleta</h1>
        <?php
        include("../Conexion/db_conexion.php");

        if(isset($_GET['id'])) {
            $maletaId = $_GET['id'];

            $sql = "SELECT * FROM maletas WHERE idmaleta = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $maletaId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<p class='detalle'><strong>Número de Maleta:</strong> " . $row['numero_maleta'] . "</p>";
                echo "<p class='detalle'><strong>Peso:</strong> " . $row['peso'] . " kg</p>";
                echo "<p class='detalle'><strong>Tipo de Maleta:</strong> " . $row['tipo'] . "</p>";
            } else {
                echo "<p class='detalle'>No se encontraron detalles para la maleta con ID: $maletaId</p>";
            }

            $stmt->close();
        } else {
            echo "<p class='detalle'>ID de maleta no proporcionado en la URL.</p>";
        }
        ?>
    </div>
</body>
</html>
        

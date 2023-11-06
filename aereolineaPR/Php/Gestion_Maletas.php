<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Maletas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Gestión de Maletas</h1>
        <?php
        include("../Conexion/db_conexion.php");

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $numeroMaleta = $_POST["numeroMaleta"];
            $peso = $_POST["peso"];
            $tipo = $_POST["tipo"];

            $sql = "INSERT INTO maletas (numero_maleta, peso, tipo) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ids", $numeroMaleta, $peso, $tipo);

            if ($stmt->execute()) {
                $maletaId = mysqli_insert_id($conn);
                header("Location: Tiquete_maletas.php?id=$maletaId");
                exit();
            } else {
                echo "<div class='alert alert-danger'>Error al guardar la maleta: " . $stmt->error . "</div>";
            }

            $stmt->close();
            $conn->close();
        }
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="numeroMaleta">Número de Maleta:</label>
                <input type="text" class="form-control" id="numeroMaleta" name="numeroMaleta" required>
            </div>
            <div class="form-group">
                <label for="peso">Peso (kg):</label>
                <input type="number" step="0.01" class="form-control" id="peso" name="peso" required>
            </div>
            <div class="form-group">
                <label for="tipo">Tipo de Maleta:</label>
                <input type="text" class="form-control" id="tipo" name="tipo" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Maleta</button>
        </form>
    </div>
</body>
</html>


<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

<?php
 require "../conexion/db_conexion.php"
 

// Consulta SQL para obtener la información relacionada entre pasajero, vuelo y reserva
$sql = "SELECT p.nombre_pasajero, p.apellido_pasajero, v.numero_vuelo, v.origen_vuelo, v.fecha_vuelo, r.fecha_reserva
        FROM pasajero p
        INNER JOIN reserva r ON p.idpasajero = r.pasajero_idpasajero
        INNER JOIN vuelo v ON r.vuelo_idvuelo = v.idvuelo";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Mostrar los datos obtenidos en un formato o estructura deseada
        echo "Nombre: " . $row["nombre_pasajero"] . " " . $row["apellido_pasajero"] . "<br>";
        echo "Vuelo: " . $row["numero_vuelo"] . " - Origen: " . $row["origen_vuelo"] . " - Fecha de Vuelo: " . $row["fecha_vuelo"] . "<br>";
        echo "Fecha de Reserva: " . $row["fecha_reserva"] . "<br>";
        echo "<hr>"; // Línea divisoria entre resultados
    }
} else {
    echo "0 resultados";
}

$conn->close();
?>


  
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>
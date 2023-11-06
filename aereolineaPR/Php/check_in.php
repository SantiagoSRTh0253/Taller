<?php
 require "../conexion/validardatos.php"
?>

<!doctype html>
<html lang="en">
<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
<!DOCTYPE html>
<html lang="en">
<head>
<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title mb-4">Check-In</h3>
            <form method="post" action="../conexion/validardatos.php" >
              <div class="form-group">
                <label for="codigo_reserva">Código de Reserva</label>
                <input type="text" class="form-control" id="codigo_reserva" name="codigo_reserva" placeholder="Ingrese el código de reserva" required>
              </div>
              <div class="form-group">
                <label for="fecha_reserva">Fecha de Reserva</label>
                <input type="date" class="form-control" id="fecha_reserva" name="fecha_reserva" required>
              </div>
              <button type="submit" class="btn btn-primary">Realizar Check-In</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

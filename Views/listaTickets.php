<!DOCTYPE html>
<html lang="es">
<head>
  <title>Tabla de Datos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Último CSS compilado y minimizado -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <style>
div.boton { 
  color:black;
  width: 10%;
  margin: 10px; 
  padding: 10px; 
  float: right;

}
div.titulo { 
  width: 80%;
  margin: 10px; 
  padding: 10px; 
  float: left;

}
div.mycontainer {
  color:black;
  width: 97%;
  overflow:auto;
}

table {
  margin: 5px; 
}
</style>

</head>
<body>

<div class="mycontainer">

<div class="titulo">
  <h1>Tickets</h1>
</div>

<div class="boton">
  <br><a href="crear_ticket.php"><button>Crear ticket nuevo</button></a>
</div>

</div>
    <di>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Descripcion del problema </th>
          <th>Nombre del Departamento</th>
          <th>Presentado por</th>
          <th>Fecha de Creación</th>
          <th>Estado</th>
          <th>Seleccionar</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (! $tickets->num_rows > 0) {
          echo "0 resultados";
        } else {
        ?>
          <?php foreach($tickets as $ticket) { ?>
            <tr>
            <td><?=$ticket["id_ticket"]?></td>
            <td><?=$ticket["desc_problema"]?></td>
            <td><?=$ticket["nombre_dpto"]?></td>
            <td><?=$ticket["presentado_por"]?></td>
            <td><?=$ticket["fecha_creacion"]?></td>
            <td>
            <?php
            if (isset($ticket["resuelto_por"])) {
              echo "Completado";
            } else {
              echo "Pendiente";
            }
            ?>
            </td>
            <td><a href='detalles_tickets.php?id="<?=$fila["id_ticket"]?>"'>Ver detalles</a></td>
            </tr>
          <?php } ?>
        <?php } ?>
      </tbody>
    </table>
    <br><a href="agregar_usuario.php"><button>Agrega usuario nuevo</button></a>
    <br>
    <br><a href="borrar_ticket.php"><button>Borrar Ticket</button></a>
    
    <br>
  </div>
</body>
</html>
<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  'apadilla',
  'lista_tarea'
) or die(mysqli_error($mysqli));

function getTareas($conn) {
  $query = 'SELECT * FROM lista';
  $tareas = mysqli_query($conn, $query);

  return $tareas;
}

function getTarea($conn, $id) {
  $query = "SELECT * FROM lista WHERE id = $id";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    return $row;
  }
}

function crearTarea($conn, $titulo, $descripcion) {
  $query = "INSERT INTO lista(titulo, descripcion) VALUES ('$titulo', '$descripcion')";
  mysqli_query($conn, $query);
}

function eliminarTarea($conn, $id) {
  $query = "DELETE FROM lista WHERE id = $id";
  mysqli_query($conn, $query);
}

function actualizarTarea($conn, $id, $titulo, $descripcion) {
  $query = "UPDATE lista SET titulo = '$titulo', descripcion = '$descripcion' WHERE id = $id";
  mysqli_query($conn, $query);
}

?>

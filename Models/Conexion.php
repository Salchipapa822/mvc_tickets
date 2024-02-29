<?php   

$con = mysqli_connect(
    "10.10.10.119",
    "root",
    "123456",
    "proyecto"
) or die(mysqli_connect_error());

function getTickets($con) {
    $query = "
    SELECT
    id_ticket,
    fecha_cierre,
    tickets.desc_problema,
    departamentos.nombre_dpto,
    tickets.fecha_creacion,
    CONCAT(clientes.primer_nombre, ' ', clientes.primer_apellido) AS presentado_por,
    CONCAT(tecnicos.primer_nombre, ' ', tecnicos.primer_apellido) AS resuelto_por
    FROM tickets
    JOIN usuarios clientes ON tickets.presentado_por = clientes.id_usuario
    LEFT JOIN usuarios tecnicos ON tickets.resuelto_por = tecnicos.id_usuario
    JOIN departamentos ON tickets.id_dpto = departamentos.id_dpto
    ORDER BY id_ticket";

    $tickets = mysqli_query($con, $query);

    return $tickets;
}

?>

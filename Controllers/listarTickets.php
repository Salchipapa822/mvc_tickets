<?php

include("./Models/Conexion.php");

$tickets = getTickets($con);

include("./Views/listaTickets.php");

?>
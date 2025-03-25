<?php
include 'db.php';

$sql = "SELECT * FROM usuarios";
$resultado = $conn->query($sql);

$usuarios = [];

while ($fila = $resultado->fetch_assoc()) {
    $usuarios[] = $fila;
}

echo json_encode($usuarios);
?>


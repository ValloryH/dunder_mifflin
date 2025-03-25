<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $sql = "DELETE FROM usuarios WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["mensaje" => "Usuario eliminado"]);
    } else {
        echo json_encode(["error" => "Error al eliminar usuario"]);
    }
}
?>

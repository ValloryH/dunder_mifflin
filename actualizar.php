<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $contrasenha = $_POST["contrasenha"];

    $sql = "UPDATE usuarios SET nombre='$nombre', email='$email', contrasenha='$contrasenha' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["mensaje" => "Usuario actualizado"]);
    } else {
        echo json_encode(["error" => "Error al actualizar usuario"]);
    }
}
?>

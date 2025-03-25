<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id =
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $contrasenha = $_POST["contrasenha"];

    $sql = "INSERT INTO usuarios (nombre, email, contrasenha) VALUES ('$nombre', '$email', '$contrasenha')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["mensaje" => "Usuario agregado correctamente"]);
    } else {
        echo json_encode(["error" => "Error al agregar usuario: " . $conn->error]);
    
    }
}
?>

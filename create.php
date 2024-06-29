<?php
include 'db.php';

if($_SERVER['REQUEST_METOD'] == 'POST') {
    $nombres = $_POST['txtnombres'];
    $dni = $_POST['txtdni'];
    $telefono = $_POST['txtfono'];
    $estudios = implode(',', array_filter([
        isset($POST['chkprimaria']) ? 'Primaria' : null,
        isset($POST['chksecundaria']) ? 'Secundaria' : null,
        isset($POST['chktecnico']) ? 'Tecnico' : null,
        isset($POST['chkuniversitario']) ? 'Universitario' : null,
    ]));
    $estado_civil = $_POST['btnestado'];
    $provincia = $_POST['txtprovincia'];
    $correo = $_POST['txtemail'];
    $clave = password_hash($_POST['txtclave'], PASSWORD_BCRYPT);
    $color_preferencia = $_POST['txtcolor'];
    $fecha_nacimiento = $_POST['txtfecha'];

    $sql = "INSERT INTO usuario (nombres, dni, telefono, estudios, estado_civil, provincia, correo, clave, color_preferencia, fecha_nacimiento
    VALUE ('$nombres', '$dni', '$telefono', '$estudios', '$estado_civil', '$provincia', '$correo', '$clave', '$color_preferencia', '$fecha_nacimiento')";

    if($conn->query($sql) === TRUE) {
        echo "Nuevo usuario registrado con exito";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

}

?>
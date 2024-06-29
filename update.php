<?php
include 'db.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM usuarios WHERE ID= '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        }
}

if($_SERVER['REQUEST_METOD'] == 'POST') {
    $id = $_post['id'];
    $nombres = $_POST['txtnombres'];
    $dni = $_POST['txtdni'];
    $telefono = $_POST['txtfono'];
    $estudios = implode(',', array_filter([
        isset($POST['chkprimaria']) ? 'Primaria'
    }
?>
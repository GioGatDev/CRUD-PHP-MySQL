<?php
include("db.php");
if (isset($_POST['guardar'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $responsable = $_POST['responsable'];
    $telefono = $_POST['telefono'];


    $query = "INSERT INTO tareas(Nombre, Descripcion, responsable, telefono) VALUES ('$nombre', '$descripcion','$responsable','$telefono')";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("Algo ha fallado");
    }

    $_SESSION['message'] = 'Guardado exitosamente';
    $_SESSION['message_type'] = 'success';
    header("Location: index.php");
} 
?>
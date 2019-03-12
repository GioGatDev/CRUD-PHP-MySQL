<?php
include("db.php");
if (isset($_POST['guardar'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $responsable = $_POST['responsable'];


    $query = "INSERT INTO tareas(Nombre, Descripcion, responsable) VALUES ('$nombre', '$descripcion','$responsable')";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("Algo ha fallado");
    }

    $_SESSION['message'] = 'Guardado exitosamente';
    $_SESSION['message_type'] = 'sucess';
    header("Location: index.php");
} 
?>
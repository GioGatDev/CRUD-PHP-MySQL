<?php 
include("db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "SELECT * FROM tareas WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        $nombre = $row['Nombre'];
        $descripcion = $row['Descripcion'];
        $responsable = $row['responsable'];
        $telefono = $row['telefono'];

    }
}


if(isset($_POST['update'])){
    $id = $_GET['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $responsable = $_POST['responsable'];
    $telefono = $_POST['telefono'];

    $query = "UPDATE tareas set Nombre = '$nombre', Descripcion = '$descripcion', responsable = '$responsable', $telefono = '$telefono' WHERE id = $id";
    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Tarea Actualizada';
    $_SESSION['message_type'] = 'info';
    header("Location: index.php");
}
?>


<?php include("includes/header.php")?>
<div class="container p-4">
<div class="row">
<div class="col-md-4 mx-auto">
    <div class="card card-body">
    <form action="editar.php?id=<?php echo $_GET['id'] ?>" method="POST">
    <div class="form-group">
       <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control" placeholder="Actualizar Nombre de tarea">
    </div>
    <div class="form-group">
    <textarea name="descripcion" rows="2" placeholder="Actualilza la descripción"><?php echo $descripcion; ?></textarea>
    </div>
    <div class="form-group">
       <input type="text" name="responsable" value="<?php echo $responsable; ?>" class="form-control" placeholder="Actualizar responsable de la tarea">
    </div>
   <button class="btn btn-success" name="update">
   Actualizar
   </button>
    </form>
    
    </div>
</div>
</div>
</div>

<?php include("includes/footer.php")?>
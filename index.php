<?php include("db.php")
?>
<?php include("includes/header.php")?>
<div class="container p-4"> 
<div class="row">
<div class="col-md-4 mb-3">
<?php if(isset($_SESSION['message'])){?>
    <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
    <?= $_SESSION['message']?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php session_unset(); } ?>
<div class="card card-body">
<form action="guardar.php" method="POST">
<div class="form-group">
<input type="text" name="nombre" class="form-control" placeholder="Nombre de tarea" autofocus>
</div>
<div class="form-grou">
<textarea name="descripcion" rows="2" class="from-control" placeholder="Descripción"></textarea>
</div>
<div class="form-group">
<input type="text" name="responsable" class="form-control" placeholder="Nombre del responsable">
</div>
<div class="form-group">
<input type="number" name="telefono" class="form-control" placeholder="Teléfono del responsable">
</div>
<input type="submit" class="btn btn-primary btn-block mb-3" name="guardar" value="Guardar">
</form>
</div>

</div>
<div class="col-md-8">
<table class="table table-striped">
<thead>
<tr class="bg-primary">
<th scope="col">#</th>
<th scope="col">Nombre</th>
<th scope="col">Descripción</th>
<th scope="col">Responsable</th>
<th scope="col">Teléfono</th>
<th scope="col">Fecha de creación</th>
<th scope="col">Acciones</th>
</tr>
<tbody>
<?php

$query = "SELECT * FROM tareas";
$result_tarea = mysqli_query($conn, $query);

while($row = mysqli_fetch_array($result_tarea)){ ?>
<tr>
<td><?php echo $row['id']?></td>
<td><?php echo $row['Nombre']?></td>
<td><?php echo $row['Descripcion']?></td>
<td><?php echo $row['responsable']?></td>
<td><?php echo $row['telefono']?></td>
<td><?php echo $row['fechacreacion']?></td>
<td>
<a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-primary mb-1"><i class="fas fa-edit"></i></a>
<a href="eliminar.php?id=<?php echo $row['id']?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
</td>
</tr>
<?php } ?>

</tbody>

</thead> 
</table>

</div>
</div>
</div>

<?php include("includes/footer.php")?>



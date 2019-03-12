<?php include("db.php")
?>
<?php include("includes/header.php")?>
<div class="container p-4"> 
<div class="row">
<div class="col-md-4 mb-3">
<div class="card card-body">
<form action="guardar.php" method="POST">
<div class="form-group">
<input type="text" name="nombre" class="form-control" placeholder="Nombre de tarea" autofocus>
</div>
<div class="form-grou">
<textarea name="descripcion" rows="2" class="from-control" placeholder="Descripción"></textarea>
</div>
<div class="form-group">
<input type="text" name="responsable" class="form-control" placeholder="Nombre del responsable" autofocus>
</div>
<input type="submit" class="btn btn-primary btn-block mb-3" name="guardar" value="guardartarea">
<?php if(isset($_SESSION['message'])){?>
    <div class="alert alert-<?= $_SESSION['messaje_type']?> alert-dismissible fade show" role="alert">
    <?= $_SESSION['message']?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php session_unset(); } ?>
</form>
</div>

</div>
<div class="col-md-8">
<table class="table table-bordered">
<thead>
<tr>
<th>Nombre</th>
<th>Descripción</th>
<th>Responsable</th>
<th>Fecha de creación</th>
<th>Acciones</th>
</tr>
<tbody>
<?php

$query = "SELECT * FROM tareas";
$result_tarea = mysqli_query($conn, $query);

while($row = mysqli_fetch_array($result_tarea)){ ?>
<tr>
<td><?php echo $row['Nombre']?></td>
<td><?php echo $row['Descripcion']?></td>
<td><?php echo $row['responsable']?></td>
<td><?php echo $row['fechacreacion']?></td>
<td>
<a href="edit.php?id=<?php echo $row['id']?>">Editar</a>
<a href="eliminar.php?id=<?php echo $row['id']?>">Eliminar</a>
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



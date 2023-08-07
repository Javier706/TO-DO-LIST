<?php require_once("controller/TasksController.php");?>

<?php $task = new TasksController()?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://kit.fontawesome.com/71a06353df.css" crossorigin="anonymous">

    <script src="../js/sweetalert.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-3">To-Do List <img src="../../img/checkpng.png" width="60"></h1>
        <h6>OVERALL PRODUCTIVITY</h6>
       <br>
        
<form   autocomplete="off" onsubmit="return validar();" class="card cpl-md-6 p-3" method="POST">
        <div class="mb-3">
        <label class="form-label">Tarea</label>
                <input type="text" class="form-control" tabindex="-1" id="titulo" name="titulo">
          </div>
          <div class="mb-3">
         <label for="descripcion" class="form-label">Descripción</label>
         <input type="text" class="form-control"  tabindex="2" id="descripcion"  name="descripcion">

         </div>
      <input type="submit" class="btn btn-primary" name="enviar">
</form>

     

        <h2 class="mt-5">Tareas</h2>
        <table class="table table-striped mt-5" id="tabla">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Tarea</th>
          <th scope="col">Descripcion</th>
          <th scope="col">Estado</th>
          <th scope="col">Creacion</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody >
      <?php

foreach ($task->getAll() as $data) {
?>
  <tr>
    <th scope="row"><?php echo $data['id'] ?></th>
    <td><?php echo $data['titulo'] ?></td>
    <td><?php echo $data["descripcion"] ?></td>
    <td><input type="checkbox" name="completado" ></td> 
    <td><?php echo $data["creacion"] ?></td>
    <td>
      <a href="./Editar.php?id=<?php echo $data['id'] ?>"><img src="../../img/update.png" alt="update" width="30"></a> 
      <a href="./Eliminar.php?id=<?php echo $data['id'] ?>"><img src="../../img/delete.png" alt="eliminar" width="30"></a>
    </td>
  </tr>
<?php
}
?>
      </tbody>
        </table>
    </div>
<?php
$task->validar();
?>

<script src="../js/Validacion.js"></script> 
<script>    history.replaceState(null,null,location.pathname)</script>
</body>
</html>

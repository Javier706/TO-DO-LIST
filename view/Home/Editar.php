<?php
require_once("controller/TasksController.php");
$tasks = new TasksController();
$Data = $tasks->getTasksById($_GET['id']);
?>

<header>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
      background-image: url('../../img/bg2.jpg'); 
      background-size: cover; 
      background-repeat: no-repeat; 
      background-attachment: fixed; 
    }
  </style>
</header>
<body>
      
 <div class="container mt-5">
        <h1 class="mb-3 text-white">EDITAR</h1>
        <h6 class="text-white">OVERALL PRODUCTIVITY</h6>
       <br>
<form action="EditForm.php?id=<?php echo $_GET['id'];?>" autocomplete="off" onsubmit="return validar();" class="card cpl-md-6 p-3" method="POST">
<div class="mb-3">
<label class="form-label ">Tarea</label>
        <input type="text" class="form-control" tabindex="-1" id="titulo" name="titulo" value="<?php echo $Data['titulo']?>">
  </div>
  <div class="mb-3">
 <label for="descripcion" class="form-label">Descripción</label>
 <input type="text" class="form-control"  tabindex="2" id="descripcion"  value="<?php echo $Data['descripcion']?>"name="descripcion">

 </div>
<input type="submit" class="btn btn-primary" name="enviar">

</form>
</body>
<script src="../js/Validacion.js"></script> 
<?php

?>

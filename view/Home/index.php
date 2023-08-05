<?php
require_once("controller/TasksController.php");

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">To-Do List</h1>
        
              <!-- Botón para abrir el modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTaskModal">
            Agregar Tarea
        </button>
        
        <!-- Modal para agregar tarea -->
        <div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addTaskModalLabel">Agregar Tarea</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <form class="card cpl-md-6 p-3" method="post" >
                            <div class="mb-3">
                                <label for="title" class="form-label">Título</label>
                                <input type="text" class="form-control"  name="titulo" id="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Descripción</label>
                                <textarea class="form-control" id="description" name="descripcion" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" name="enviar">Agregar Tarea</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <h2 class="mt-5">Tareas</h2>
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="task1">
                    <label class="form-check-label" for="task1">
                        Tarea 1
                    </label>
                </div>
                <button class="btn btn-danger btn-sm">Eliminar</button>
                <button class="btn btn-danger btn-sm">Actualizar</button>
            </li>
           
        </ul>
    </div>
<?php 

$task = new TasksController();
$task->validar();
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

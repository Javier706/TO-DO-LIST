<?php
require_once("model/Tasks.php");

class TasksController extends Tasks
{
    public function __construct()
    {
        parent::__construct();
    }

    public function validar()
    {
      if (isset($_POST['titulo']) && isset($_POST['descripcion'])&&isset($_POST['enviar'])) {
        $this->titulo=$_POST['titulo'];
        $this->descripcion = $_POST['descripcion'];
        
      
        if (
            !preg_match("/^[a-zA-ZáÁéÉíÍóÓúÚñÑüÜ]*$/", $this->titulo)
            || !preg_match("/^[a-zA-ZáÁéÉíÍóÓúÚñÑüÜ]*$/", $this->descripcion)
        ) {
            echo "<script>alert('los campos deben seguir el formato especificado')</script>";
        } else {
            if ($this->findTask()->rowCount() == 0) {
                $this->store();
                echo '
                <script>swal({
                    title: "Se ha creado la tarea!",
                    text: "La tarea se ha creado",
                    icon: "success",
                    button: {
                    text: "ok!"
                },
                });
                </script>';
            }
      }

   
    }
    
    }

    public function actualizar()
    {
        if (isset($_POST['titulo']) && isset($_POST['descripcion']) &&  isset($_POST['enviar'])) {
            $this->titulo = $_POST['titulo'];
            $this->descripcion = $_POST['descripcion'];
            $this->id_task = $_GET['id'];

            if (
                !preg_match("/^[a-zA-ZáÁéÉíÍóÓúÚñÑüÜ]*$/", $this->titulo)
                || !preg_match("/^[a-zA-ZáÁéÉíÍóÓúÚñÑüÜ]*$/", $this->descripcion)
            ) {
                return true; // Manejar el caso de validación no exitosa
            } else {
                $this->update();
                
                return false; // Manejar el caso de actualización exitosa
            }
        } else {
            return true; // Manejar el caso de datos faltantes
        }
    }
}
?>

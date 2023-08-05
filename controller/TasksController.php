<?php
require_once("model/Tasks.php");

class TasksController extends Tasks
{
    public function validar()
    {
    if (isset($_POST['titulo']) && isset($_POST['descripcion']) &&isset($_POST['completado']) &&isset($_POST['aceptar'])) {
       $this->titulo= $_POST['titulo'];
       $this->descripcion=  $_POST['descripcion'];
       $this->completado= $_POST['completado'];
       if (
        !preg_match("/^[a-zA-ZáÁéÉíÍóÓúÚñÑüÜ]*$/", $this->titulo)
        || !preg_match("/^[a-zA-ZáÁéÉíÍóÓúÚñÑüÜ]*$/", $this->descripcion)){
            echo "<script>alert('los campos deben seguir el formato especificado')</script>";
        }
    
    }else {
        if ($this->findTask()->rowCount() == 0) {
             $this->store();

            ?>
            <script>
                swal({
                    title: "!Tarea Creada!",
                    text: "Datos insertados correctamente!",
                    icon: "success",
                    button: {
                        text: "ok!"
                    },
                })
            </script>
            <?php
        } 
    }
}

    public function actualizar()
    {
        if (isset($_POST['titulo']) && isset($_POST['descripcion']) &&isset($_POST['completado']) &&isset($_POST['aceptar'])) {
            $this->titulo= $_POST['titulo'];
            $this->descripcion=  $_POST['descripcion'];
            $this->completado= $_POST['completado'];
            if (
             !preg_match("/^[a-zA-ZáÁéÉíÍóÓúÚñÑüÜ]*$/", $this->titulo)
             || !preg_match("/^[a-zA-ZáÁéÉíÍóÓúÚñÑüÜ]*$/", $this->descripcion)){
                return 1;
            } else {
                $this->update();

                return 0;
            }
        } else {
            return 1;
        }
    }
}

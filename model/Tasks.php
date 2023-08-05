<?php

require_once("model/conexion.php");

class Tasks extends Conexion{
    public $id_task;
    public $titulo;
    public $descripcion;
    public $completado;

    public function __construct()
    {
        parent::__construct();
    }

    public function store()
    {
        $query = $this->conexion->prepare("INSERT INTO tasks (titulo,descripcion,completado) VALUES (:titulo,:descripcion,:completado)");
        $query->execute([
            ":titulo"=>$this->titulo,
            ":descripcion"=>$this->descripcion,
            ":completado"=>$this->completado
        ]);
    }
    public function getAll() {
        $query = $this->conexion->prepare("SELECT * FROM tasks");
        $query->execute();

        $tasks = $query->fetchAll();

        return $tasks;
    }
    public function delete() {
        $query = $this->conexion->prepare("DELETE FROM tasks WHERE id = :id");
        $query->execute([":id" => $this->id_task]);
    }
    
    public function update()
    {
        $query = $this->conexion->prepare("UPDATE tasks SET titulo = :titulo, descripcion = :descripcion, completado = :completado WHERE id = :id");
        $query->execute([
            ":titulo" => $this->titulo,
            ":descripcion" => $this->descripcion,
            ":completado" => $this->completado,
            ":id" => $this->id_task
        ]);
    }

    public function findTask()
    {
        $consulta =  $this->conexion->prepare('SELECT id FROM tasks where id = :id');
        $consulta->execute([":id" => $this->id_task]);


        return $consulta;
    }

    public function getTasksById($id_task)
    {
        $query = $this->conexion->prepare("SELECT * FROM tasks WHERE id = :id");
        $query->execute([":id" => $id_task]);

        $stmt = $query->fetch(PDO::FETCH_ASSOC);
        return $stmt;
    }

}
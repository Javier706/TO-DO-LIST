<?php

require_once("model/conexion.php");

class Tasks extends Conexion{
    public $id_task;
    public $titulo;
    public $descripcion;
    

    public function __construct()
    {
        parent::__construct();
    }

    public function store()
    {
        $query = $this->conexion->prepare("INSERT INTO tasks (titulo,descripcion) VALUES (:titulo,:descripcion)");
        $query->execute([
            ":titulo"=>$this->titulo,
            ":descripcion"=>$this->descripcion
        ]);
    }
    public function getAll() {
        $query = $this->conexion->prepare("SELECT * FROM tasks");
        $query->execute();

        $tasks = $query->fetchAll();

        return $tasks;
    }
    public function delete($id_task) {
        $query = $this->conexion->prepare("DELETE FROM tasks WHERE id = :id");
        $query->execute([":id" => $id_task]);
    }
    
    public function update()
    {
        $query = $this->conexion->prepare("UPDATE tasks SET titulo = :titulo, descripcion = :descripcion WHERE id = :id");
        $query->execute([
            ":titulo" => $this->titulo,
            ":descripcion" => $this->descripcion,
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
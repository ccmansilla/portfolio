<?php

class Conexion{
    #atributos que son propios del objeto
    private $servidor = "ec2-52-20-166-21.compute-1.amazonaws.com";
    private $database = "d3sl9a337nfaho";
    private $usuario = "yrjtfzdojysnuz";
    private $port = "5432";
    private $pass = "71ebad52ab2d79d10ffe62781d405be0f96df61342afdae8bf58cae5bfcb80c0";
    private $conexion;#objeto de tipo pdo, de la clase propia de php
   
    public function __construct(){
        try{
            $this->conexion = new PDO("pgsql:host=$this->servidor;port=$this->port;dbname=$this->database;user=$this->usuario;password=$this->pass");
            #ACTIVAMOS LOS ERRORES Y LAS EXCEPTIONES
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $e){
            return "Falla de Conexión".$e;
        }
    }

    #creo un metodo de ejecucion a sql de insert, update, delete   
    public function ejecutar($sql){
        #Execute una consulta de sql
        $this->conexion->exec($sql);
    }
    public function consultar($sql){ # select 
        #ejecuta la consulta y nos devuelve la info de la base
        $sentencia = $this->conexion->prepare($sql);
        $sentencia->execute();
        #retorna todos los registros de la consulta sql
        return $sentencia->fetchAll();
    }
}

?>
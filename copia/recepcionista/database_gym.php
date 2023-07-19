<?php
class database
{
    private $PDOlocal;
    private $usuario="root";
    private $password="";
    private $server="mysql:host=localhost; dbname=egogym";

    function conectarDB()
    {
        try
        {
            $this->PDOlocal= new PDO($this->server,$this->usuario,$this->password);
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    function desconectarBD()
    {
        try
        {
            $this->PDOlocal= null;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    
    function seleccionar($consulta)
    {
        try
        {
            $resultado= $this->PDOlocal->query($consulta);
            $filas= $resultado->fetchAll(PDO::FETCH_OBJ);
            return $filas;

        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    function ejecutarSQL($consulta)
    {
        try
        {
            $this->PDOlocal->query($consulta);

        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}

?>
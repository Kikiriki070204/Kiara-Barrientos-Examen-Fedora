<?php
class Database
{
    private $PDOLocal;
    private $user = "root";
    private $password = "ranagasu22";
    private $server = "mysql:host=localhost; dbname=egogym";

    function conectarDB()
        {
            try
            {
                $this->PDOLocal = new PDO($this->server, $this->user, $this->password);
            }
            
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

        function desconectarDB()
        {
            
                try
                {
                    $this->PDOLocal = null;
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
                $resultado=$this->PDOLocal->query($consulta);
                $fila = $resultado->fetchAll(PDO::FETCH_OBJ);
                return $fila;
            } 
            catch (PDOException $e)
            {
                echo $e->getMessage();
            }
        }
        function ejecutarSQL($consulta)
        {
            try {
                $this->PDOLocal->query($consulta);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
     
}
 
?>
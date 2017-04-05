<?php
require_once 'conexion/conexion.php';
require_once 'entidades/tipo_impresora.php';

class ModeloTImpresora {
    var $con;
    function ModeloTImpresora() 
    {
        $this->con = new Conexion();
    }
    
    function mostrarTodoTImpresoras()
    {
        if ($this->con->conectar() == true) 
            {
                $query=mysql_query("SELECT  idtipo_impresora, descripcion FROM tipo_impresora order by descripcion");
                $resultado = array(); 
                if($query && mysql_num_rows($query)>0) 
                    { 
                        while($row = mysql_fetch_array($query)) { 
                            $Timpresora= new tipo_impresora();
                            $Timpresora->setIdtipo_impresora($row[0]);
                            $Timpresora->setDescripcion($row[1]);
                            ;
                            $resultado[] = $Timpresora;
                         }         
                    } 
                $this->con->cerrar();
            }
            return $resultado;
    } 
    
       function IngresarTipoImpresora(tipo_impresora $op)
    {
        if ($this->con->conectar() == true) 
        {                                                                                                                     
            return mysql_query("insert into tipo_impresora (descripcion)values  ('".$op->getDescripcion()."')");
        } 
        $this->con->cerrar();
    }
    
    function ValidaRegistro($op)
    {
        if ($this->con->conectar() == true) 
            {
                 $query=mysql_query("SELECT descripcion FROM tipo_impresora where descripcion ='".$op."'" );
                $resultado = array(); 
                if($query && mysql_num_rows($query)>0) 
                { return TRUE; } 
                else 
                { return FALSE; }
            }
        $this->con->cerrar();
    }
    
        function BusquedaTipoImpresora($op)
    {
         if ($this->con->conectar() == true) 
            {
                
                $query=mysql_query("SELECT  idtipo_impresora, descripcion FROM tipo_impresora where descripcion ='".$op."'" );
                $resultado = array(); 
                if($query && mysql_num_rows($query)>0) 
                    { 
                        while($row = mysql_fetch_array($query)) { 
                            $Timpresora= new tipo_impresora();
                            $Timpresora->setIdtipo_impresora($row[0]);
                            $Timpresora->setDescripcion($row[1]);
                            ;
                            $resultado[] = $Timpresora;
                         }         
                    } 
                $this->con->cerrar();
            }
            return $resultado;
    } 
    
    
    

}
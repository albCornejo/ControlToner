<?php
require_once 'conexion/conexion.php';
require_once 'entidades/unidad.php';

class ModeloUnidad {
    var $con;
    function ModeloUnidad() 
    {
        $this->con = new Conexion();
    }
    
    function mostrarTodoUnidad()
    {
        if ($this->con->conectar() == true) 
            {
                $query=mysql_query("SELECT  idunidad, descripcion, piso, vigencia FROM unidad order by descripcion");
                $resultado = array(); 
                    if($query && mysql_num_rows($query)>0) { 
                        while($row = mysql_fetch_array($query)) { 
                            $unidad= new unidad();
                            $unidad->setIdunidad($row[0]);
                            $unidad->setDescripcion($row[1]);
                            $unidad->setPiso($row[2]);
                            $unidad->setVigencia($row[3]);
                            
                            $resultado[] = $unidad;
                         }         
                    } 
                $this->con->cerrar();
            }
            return $resultado;
    } 
    
       function IngresarUnidad(unidad $op)
    {
        if ($this->con->conectar() == true) 
        {                                                                                                                     
            return mysql_query("insert into unidad (descripcion, piso, vigencia)values  ('".$op->getDescripcion()."','".$op->getPiso()."','".$op->getVigencia()."')");
        } 
        $this->con->cerrar();
    }
    
    function ValidaRegistro($op)
    {
        if ($this->con->conectar() == true) 
            {
                 $query=mysql_query("SELECT   descripcion, piso, vigencia FROM unidad where descripcion ='".$op."'" );
                $resultado = array(); 
                if($query && mysql_num_rows($query)>0) 
                { return TRUE; } 
                else 
                { return FALSE; }
            }
        $this->con->cerrar();
    }
    
        function BusquedaUnidad($op)
    {
         if ($this->con->conectar() == true) 
            {
                
                $query=mysql_query("SELECT idunidad, descripcion, piso, vigencia FROM unidad where descripcion ='".$op."'" );
                $resultado = array(); 
                if($query && mysql_num_rows($query)>0) 
                    { 
                        while($row = mysql_fetch_array($query)) { 
                            $unidad= new unidad();
                            $unidad->setIdunidad($row[0]);
                            $unidad->setDescripcion($row[1]);
                            $unidad->setPiso($row[2]);
                            $unidad->setVigencia($row[3]);
                            
                            $resultado[] = $unidad;
                         }         
                    } 
                $this->con->cerrar();
            }
            return $resultado;
    } 
    
        function ModificarUnidad(unidad $op)
    {
        if ($this->con->conectar() == true) 
        {     
        
            return mysql_query("update  unidad set descripcion = '".$op->getDescripcion()."',piso = '".$op->getPiso()."',vigencia = '".$op->getVigencia()."' where idunidad=".$op->getIdunidad()."");
        } 
        $this->con->cerrar();
    }
    
            function EliminararUnidad($op)
    {
        if ($this->con->conectar() == true) 
        {                                                                                                                     
            return mysql_query("delete from unidad  where idunidad=".$op."");
        } 
        $this->con->cerrar();
    }
    
     function BusquedaUnidadId($op)
    {
         if ($this->con->conectar() == true) 
            {
                $query=mysql_query("SELECT idunidad, piso, descripcion, vigencia FROM unidad where idunidad ='".$op."'" );
           
                if($query && mysql_num_rows($query)>0) 
                    { 
                        
                        while($row = mysql_fetch_array($query)) { 
                            $unidad= new unidad();
                            $unidad->setIdunidad($row[0]);
                            $unidad->setPiso($row[1]);
                            $unidad->setDescripcion($row[2]);
                            $unidad->setVigencia($row[3]);
                            
                            
                         }         
                    } 
                $this->con->cerrar();
            }
            return $unidad;
    } 
    
//    function EliminarUnidad($op)
//    {
//         if ($this->con->conectar() == true) 
//            {
//                
//                $query=mysql_query("SELECT idunidad, descripcion, piso, vigencia FROM unidad where descripcion ='".$op."'" );
//                $resultado = array(); 
//                if($query && mysql_num_rows($query)>0) 
//                    { 
//                        while($row = mysql_fetch_array($query)) { 
//                            $unidad= new unidad();
//                            $unidad->setIdunidad($row[0]);
//                            $unidad->setDescripcion($row[1]);
//                            $unidad->setPiso($row[2]);
//                            $unidad->setVigencia($row[3]);
//                            
//                            $resultado[] = $unidad;
//                         }         
//                    } 
//                $this->con->cerrar();
//            }
//            return $resultado;
//    } 
    
    
    

}

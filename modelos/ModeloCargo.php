<?php
require_once 'conexion/conexion.php';
require_once 'entidades/cargo.php';

class ModeloCargo {
    var $con;
    function ModeloCargo() 
    {
        $this->con = new Conexion();
    }

    function mostrarTodoCargo()
    {
        if ($this->con->conectar() == true) 
            {
                $query=mysql_query("SELECT  idcargo, descripcion, vigencia FROM cargo order by descripcion");
                $resultado = array(); 
                   if($query && mysql_num_rows($query)>0)  { 
                        while($row = mysql_fetch_array($query)) { 
                            $cargo= new cargo();
                            $cargo->setIdcargo($row[0]);
                            $cargo->setDescripcion($row[1]);
                            $cargo->setVigencia($row[2]);
                            
                            $resultado[] = $cargo;
                         }         
                    } 
                $this->con->cerrar();
            }
            return $resultado;
    } 
    
    function llenarModifica()
    {
       if ($this->con->conectar() == true) 
            {
                $query=mysql_query("SELECT  idcargo, descripcion, vigencia FROM cargo");
                $resultado = array(); 
                   if($query && mysql_num_rows($query)>0)  { 
                        
                            $cargo= new cargo();
                            $cargo->setIdcargo($row[0]);
                            $cargo->setDescripcion($row[1]);
                            $cargo->setVigencia($row[2]);
                            
                            $resultado[] = $cargo;
                               
                    } 
                $this->con->cerrar();
            }
            return $resultado;
        
    }
    
    
    
       function IngresarCargo(cargo $op)
    {
        if ($this->con->conectar() == true) 
        {                                                                                                                     
            return mysql_query("insert into cargo (descripcion, vigencia)values  ('".$op->getDescripcion()."','".$op->getVigencia()."')");
        } 
        $this->con->cerrar();
    }
    
    
    
    
    
    
        function ModificarCargo(cargo $op)
    {
        if ($this->con->conectar() == true) 
        {     
            //echo "update  cargo set descripcion = '".$op->getDescripcion()."',vigencia = '".$op->getVigencia()."' where idcargo=".$op->getIdcargo()."";
            return mysql_query("update  cargo set descripcion = '".$op->getDescripcion()."',vigencia = '".$op->getVigencia()."' where idcargo=".$op->getIdcargo()."");
        } 
        $this->con->cerrar();
    }
    

    
           function EliminararCargo($op)
    {
        if ($this->con->conectar() == true) 
        {                                                                                                                     
            return mysql_query("delete from cargo  where idCargo=".$op."");
        } 
        $this->con->cerrar();
    }
    
    
    
    
    
    function ValidaRegistro($op)
    {
        if ($this->con->conectar() == true) 
            {
                 $query=mysql_query("SELECT descripcion, vigencia FROM cargo where descripcion ='".$op."'" );
                $resultado = array(); 
                if($query && mysql_num_rows($query)>0) 
                { return TRUE; } 
                else 
                { return FALSE; }
            }
        $this->con->cerrar();
    }
    
        function BusquedaCargo($op)
    {
         if ($this->con->conectar() == true) 
            {
                
                $query=mysql_query("SELECT idcargo, descripcion, vigencia FROM cargo where descripcion ='".$op."'" );
                $resultado = array(); 
                if($query && mysql_num_rows($query)>0) 
                    { 
                        while($row = mysql_fetch_array($query)) { 
                            $cargo= new cargo();
                            $cargo->setIdcargo($row[0]);
                            $cargo->setDescripcion($row[1]);
                            $cargo->setVigencia($row[2]);
                            
                            $resultado[] = $cargo;
                         }         
                    } 
                $this->con->cerrar();
            }
            return $resultado;
    } 
    
    function BusquedaCargoId($op)
    {
         if ($this->con->conectar() == true) 
            {
                $query=mysql_query("SELECT idcargo, descripcion, vigencia FROM cargo where idcargo ='".$op."'" );
           
                if($query && mysql_num_rows($query)>0) 
                    { 
                        
                        while($row = mysql_fetch_array($query)) { 
                            $cargo= new cargo();
                            $cargo->setIdcargo($row[0]);
                            $cargo->setDescripcion($row[1]);
                            $cargo->setVigencia($row[2]);
                            
                            
                         }         
                    } 
                $this->con->cerrar();
            }
            return $cargo;
    } 
    
   
}
<?php
require_once 'conexion/conexion.php';
require_once 'entidades/insumo.php';
require_once 'entidades/tipo_insumo.php';

class ModeloInsumo {
    var $con;
    function ModeloInsumo() 
    {
        $this->con = new Conexion();
    }
    
    function mostrarTodoInsumo()
    {
        if ($this->con->conectar() == true) 
            {
                $query=mysql_query("SELECT idinsumo, marca, codigo,vigencia,codigo_medisyn, idtipo_insumo  FROM insumo ");
                $resultado = array(); 
                if($query && mysql_num_rows($query)>0) 
                    { 
                        while($row = mysql_fetch_array($query)) { 
                            $insumo= new insumo();
                            $insumo->setIdinsumo($row[0]);
                            $insumo->setMarca($row[1]);
                            $insumo->setCodigo($row[2]);
                            $insumo->setVigencia($row[3]);
                            $insumo->setCodigoMedisyn($row[4]);
                            $insumo->setIdtipo_insumo($row[5]);
                            
                            $resultado[] = $insumo;
                         }         
                    } 
                $this->con->cerrar();
            }
            return $resultado;
    } 
    
    
       function IngresarInsumo(insumo $op)
    {
        if ($this->con->conectar() == true) 
        {
            
            return mysql_query("insert into insumo ( marca, codigo, vigencia, codigo_medisyn, idtipo_insumo)values  ('".$op->getMarca()."','".$op->getCodigo()."','".$op->getVigencia()."',".$op->getCodigoMedisyn().",".$op->getIdtipo_insumo().")");
            
        } 
        $this->con->cerrar();
    }
    
    
        function BusquedaInsumo($op)
    {
        if ($this->con->conectar() == true) 
            {
                $query=mysql_query("SELECT idinsumo, marca, codigo,vigencia,codigo_medisyn, idtipo_insumo  FROM insumo where codigo ='".$op."'" );
                $resultado = array(); 
                if($query && mysql_num_rows($query)>0) 
                    { 
                       while($row = mysql_fetch_array($query)) { 
                            $insumo= new insumo();
                            $insumo->setIdinsumo($row[0]);
                            $insumo->setMarca($row[1]);
                            $insumo->setCodigo($row[2]);
                            $insumo->setVigencia($row[3]);
                            $insumo->setCodigoMedisyn($row[4]);
//                            $insumo->setIdstock($row[5]);
                            $insumo->setIdtipo_insumo($row[5]);
                            
                            $resultado[] = $insumo;
                         }         
                    } 
                $this->con->cerrar();
            }
            return $resultado;
    } 
    
    
     function ValidaRegistro($op)
    {
        if ($this->con->conectar() == true) 
            {
                 $query=mysql_query("SELECT  marca, codigo,vigencia,codigo_medisyn, idtipo_insumo FROM insumo where codigo ='".$op."'" );
                $resultado = array(); 
                if($query && mysql_num_rows($query)>0) 
                { return TRUE; } 
                else 
                { return FALSE; }
            }
        $this->con->cerrar();
    }  
    
    

    
    
    

}
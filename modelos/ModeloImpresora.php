<?php
require_once 'conexion/conexion.php';
require_once 'entidades/impresora.php';
require_once 'entidades/insumo.php';


class ModeloImpresora {
    var $con;
    function ModeloImpresora() 
    {
        $this->con = new Conexion();
    }
    
    function mostrarTodoImpresoras()
    {
        if ($this->con->conectar() == true) 
            {
                $query=mysql_query("SELECT I.idimpresora, I.marca, I.modelo,I.serie,I.vigencia,INS.codigo,TI.descripcion
FROM impresora I, insumo INS, tipo_impresora TI
where
I.idinsumo = INS.idinsumo
and
I.idtipo_impresora = TI.idtipo_impresora;  ");
                $resultado = array(); 
                if($query && mysql_num_rows($query)>0) 
                    { 
                        while($row = mysql_fetch_array($query)) { 
                            $impresora= new impresora();
                            $impresora->setIdimpresora($row[0]);
                            $impresora->setMarca($row[1]);
                            $impresora->setModelo($row[2]);
                            $impresora->setSerie($row[3]);
                            $impresora->setVigenca($row[4]);
                            $impresora->setInsumo($row[5]);
                            $impresora->setTipoImpresora($row[6]);
                            $resultado[] = $impresora;
                         }         
                    } 
                $this->con->cerrar();
            }
            return $resultado;
    } 
    
    
       function IngresarImpresora(Impresora $op)
    {
        if ($this->con->conectar() == true) 
        {                                                                                                                     
            return mysql_query("insert into impresora ( marca, modelo, serie, vigencia, idInsumo, idtipo_impresora)values  ('".$op->getMarca()."','".$op->getModelo()."','".$op->getSerie()."','".$op->getVigenca()."',".$op->getInsumo().",".$op->getTipoImpresora().")");
        } 
        $this->con->cerrar();
    }
    
    
        function BusquedaImpresora($op)
    {
        if ($this->con->conectar() == true) 
            {
                $query=mysql_query("SELECT idimpresora, marca, modelo,serie,vigencia,idinsumo,idtipo_impresora FROM impresora where marca ='".$op."'" );
                $resultado = array(); 
                if($query && mysql_num_rows($query)>0) 
                    { 
                       while($row = mysql_fetch_array($query)) { 
                            $impresora= new impresora();
                            $impresora->setIdimpresora($row[0]);
                            $impresora->setMarca($row[1]);
                            $impresora->setModelo($row[2]);
                            $impresora->setSerie($row[3]);
                            $impresora->setVigenca($row[4]);
                            $impresora->setInsumo($row[5]);
                            $impresora->setTipoImpresora($row[6]);
                            $resultado[] = $impresora;
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
                 $query=mysql_query("SELECT marca, modelo,serie,vigencia,idinsumo,idtipo_impresora FROM impresora where serie ='".$op."'" );
                $resultado = array(); 
                if($query && mysql_num_rows($query)>0) 
                { return TRUE; } 
                else 
                { return FALSE; }
            }
        $this->con->cerrar();
    }       

}
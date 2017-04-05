<?php
require_once 'conexion/conexion.php';
require_once 'entidades/solicitud.php';

class ModeloSolicitud {
    var $con;
    function ModeloSolicitud() 
    {
        $this->con = new Conexion();
    }
    
    function mostrarTodoSolicitud()
    {
        if ($this->con->conectar() == true) 
            {
                $query=mysql_query("SELECT  idSolicitud, fechaIngreso, cantidad, usuSolicita, vigencia, idimpresora, idresponsable FROM solicitud ");
                $resultado = array(); 
                  if($query && mysql_num_rows($query)>0)   { 
                        while($row = mysql_fetch_array($query)) { 
                            $solicitud= new solicitud();
                            $solicitud->setIdSolicitud($row[0]);
                            $solicitud->setFechaIngreso($row[1]);
                            $solicitud->setCantidad($row[2]);
                            $solicitud->setUsuSolicita($row[3]);
                            $solicitud->setVigencia($row[4]);
                            $solicitud->setIdimpresora($row[5]);
                            $solicitud->setIdresponsable($row[6]);
                            $resultado[] = $solicitud;
                         }         
                    } 
                $this->con->cerrar();
            }
            return $resultado;
    } 
    
       function IngresarSolicitud(solicitud $op)
    {
        if ($this->con->conectar() == true) 
        {                                                                                                                     
            return mysql_query("insert into solicitud ( fechaIngreso, cantidad, usuSolicita, vigencia, idimpresora, idresponsable)values  ('".$op->getFechaIngreso()."','".$op->getCantidad()."','".$op->getUsuSolicita()."','".$op->getVigencia()."','".$op->getIdimpresora()."','".$op->getIdresponsable()."')");
        } 
        $this->con->cerrar();
    }
    
}



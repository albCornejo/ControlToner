<?php
require_once 'conexion/conexion.php';
require_once 'entidades/responsable.php';
//require_once 'entidades/unidad.php';

class ModeloResponsable {
    var $con;
    function ModeloResponsable() 
    {
        $this->con = new Conexion();
    }
    
    function mostrarTodoResponsable()
    {
        if ($this->con->conectar() == true) 
            {
                $query=mysql_query("SELECT R.idresponsable, R.rut, R.nombre, R.aPaterno, R.aMaterno,
R.correo, R.vigencia, C.DESCRIPCION CARGO, U.DESCRIPCION UNIDAD  FROM RESPONSABLE R,UNIDAD U, CARGO C
WHERE
R.IDUNIDAD = U.IDUNIDAD
and 
R.IDCARGO = C.IDCARGO");
                $resultado = array(); 
                   if($query && mysql_num_rows($query)>0)  { 
                        while($row = mysql_fetch_array($query)) { 
                            $responsable= new responsable();
                            $responsable->setIdresponsable($row[0]);
                            $responsable->setRut($row[1]);
                            $responsable->setNombre($row[2]);
                            $responsable->setAPaterno($row[3]);
                            $responsable->setAMaterno($row[4]);
                            $responsable->setCorreo($row[5]);
                            $responsable->setVigencia($row[6]);
                            $responsable->setCargo($row[7]);
                            $responsable->setUnidad($row[8]);
                            $resultado[] = $responsable;
                         }         
                    } 
                $this->con->cerrar();
            }
            return $resultado;
    } 
    
//       function mostrarTodoResponsablecb()
//    {
//        if ($this->con->conectar() == true) 
//            {
//                $query=mysql_query("SELECT  idresponsable, rut, nombre, aPaterno, aMaterno, correo, vigencia, idcargo, idunidad FROM responsable ");
//                $resultado = array(); 
//                    { 
//                        while($row = mysql_fetch_array($query)) { 
//                            $responsable= new responsable();
//                            $responsable->setIdresponsable($row[0]);
//                            $responsable->setRut($row[1]);
//                            $responsable->setNombre($row[2]);
//                            $responsable->setAPaterno($row[3]);
//                            $responsable->setAMaterno($row[4]);
//                            $responsable->setCorreo($row[5]);
//                            $responsable->setVigencia($row[6]);
//                            $responsable->setCargo($row[7]);
//                            $responsable->setUnidad($row[8]);
//                            $resultado[] = $responsable;
//                         }         
//                    } 
//                $this->con->cerrar();
//            }
//            return $resultado;
//    } 
    
// ----------------------------------------------------------------------------------------   
       function IngresarResponsable(responsable $op)
    {
        if ($this->con->conectar() == true) 
        {                                                                                                                     
            return mysql_query("insert into responsable (rut, nombre, aPaterno, aMaterno, correo, vigencia, idcargo, idunidad)values  ('".$op->getRut()."','".$op->getNombre()."','".$op->getAPaterno()."','".$op->getAMaterno()."','".$op->getCorreo()."','".$op->getVigencia()."','".$op->getCargo()."','".$op->getUnidad()."')");
        } 
        $this->con->cerrar();
    }
    
    function ValidaRegistro($op)
    {
        if ($this->con->conectar() == true) 
            {
                 $query=mysql_query("SELECT  idresponsable, rut, nombre, aPaterno, aMaterno, correo, vigencia, idcargo, idunidad FROM responsable where rut ='".$op."'" );
                $resultado = array(); 
                if($query && mysql_num_rows($query)>0) 
                { return TRUE; } 
                else 
                { return FALSE; }
            }
        $this->con->cerrar();
    }
    
        function BusquedaResponsable($op)
    {
         if ($this->con->conectar() == true) 
            {
                
                $query=mysql_query("SELECT idresponsable, rut, nombre, aPaterno, aMaterno, correo, vigencia, idcargo, idunidad FROM responsable where rut ='".$op."'" );
                $resultado = array(); 
                if($query && mysql_num_rows($query)>0) 
                    { 
                        while($row = mysql_fetch_array($query)) { 
                            $responsable= new responsable();
                            $responsable->setIdresponsable($row[0]);
                            $responsable->setRut($row[1]);
                            $responsable->setNombre($row[2]);
                            $responsable->setAPaterno($row[3]);
                            $responsable->setAMaterno($row[4]);
                            $responsable->setCorreo($row[5]);
                            $responsable->setVigencia($row[6]);
                            $responsable->setCargo($row[7]);
                            $responsable->setUnidad($row[8]);
                            $resultado[] = $responsable;
                         }         
                    } 
                $this->con->cerrar();
            }
            return $resultado;
    } 
}



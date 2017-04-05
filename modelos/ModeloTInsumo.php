<?php

require_once 'conexion/conexion.php';
require_once 'entidades/tipo_insumo.php';

class ModeloTInsumo {

    var $con;

    function ModeloTInsumo() {
        $this->con = new Conexion();
    }

    

    function mostrarTodoTInsumos() {
        if ($this->con->conectar() == true) {
            $query = mysql_query("SELECT  idtipo_insumo, descripcion FROM tipo_insumo order by descripcion");
            $resultado = array();
            if ($query && mysql_num_rows($query) > 0) {
                while ($row = mysql_fetch_array($query)) {
                    $Tinsumo = new tipo_insumo();
                    $Tinsumo->setIdtipo_insumo($row[0]);
                    $Tinsumo->setDescripcion($row[1]);
                    
                    $resultado[] = $Tinsumo;
                }
            }
            $this->con->cerrar();
        }
        return $resultado;
    }

    function IngresarTipoInsumo(tipo_insumo $op) {
        if ($this->con->conectar() == true) {
            return mysql_query("insert into tipo_insumo (descripcion)values  ('" . $op->getDescripcion() . "')");
        }
        $this->con->cerrar();
    }

    function ValidaRegistro($op) {
        if ($this->con->conectar() == true) {
            $query = mysql_query("SELECT descripcion FROM tipo_insumo where descripcion ='" . $op . "'");
            $resultado = array();
            if ($query && mysql_num_rows($query) > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
        $this->con->cerrar();
    }

    function BusquedaTipoInsumo($op) {
        if ($this->con->conectar() == true) {

            $query = mysql_query("SELECT  idtipo_insumo, descripcion FROM tipo_insumo where descripcion ='" . $op . "'");
            $resultado = array();
            if ($query && mysql_num_rows($query) > 0) {
                while ($row = mysql_fetch_array($query)) {
                    $Tinsumo = new tipo_insumo();
                    $Tinsumo->setIdtipo_insumo($row[0]);
                    $Tinsumo->setDescripcion($row[1]);
                    ;
                    $resultado[] = $Tinsumo;
                }
            }
            $this->con->cerrar();
        }
        return $resultado;
    }

}

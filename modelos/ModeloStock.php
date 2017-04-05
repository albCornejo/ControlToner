<?php

require_once 'conexion/conexion.php';
require_once 'entidades/stock.php';
require_once 'entidades/insumo.php';

class ModeloStock {

    var $con;

    function ModeloStock() {
        $this->con = new Conexion();
    }

    function mostrarTodoStock() {
        if ($this->con->conectar() == true) {
            $query = mysql_query("SELECT  s.idstock, s.cantidad, s.fechaIngreso, s.numSolMedisyn, im.modelo, i.codigo FROM stock s, insumo i, impresora im
                                    where
                                        impresora_idinsumo = i.idinsumo
                                    and
                                        impresora_idimpresora = im.idimpresora");
            $resultado = array();
            if ($query && mysql_num_rows($query) > 0) {
                while ($row = mysql_fetch_array($query)) {
                    $stock = new stock();
                    $stock->setIdstock($row[0]);
                    $stock->setCantidad($row[1]);
                    $stock->setFechaIngreso($row[2]);
                    $stock->setNumSolMedisyn($row[3]);
                    $stock->setImpresora($row[4]);
                    $stock->setInsumo($row[5]);

                    $resultado[] = $stock;
                }
            }
            $this->con->cerrar();
        }
        return $resultado;
    }






    function IngresarStock(stock $op) {
        if ($this->con->conectar() == true) {
            echo "insert into stock (cantidad, fechaIngreso, numSolMedisyn, impresora_idimpresora, impresora_idinsumo) values  (" . $op->getCantidad() . ",'" . $op->getFechaIngreso() . "'," . $op->getNumSolMedisyn() . "," . $op->getImpresora() . "," . $op->getInsumo() . ")";
            return mysql_query("insert into stock (cantidad, fechaIngreso, numSolMedisyn, impresora_idimpresora, impresora_idinsumo) values  (" . $op->getCantidad() . ",'" . $op->getFechaIngreso() . "'," . $op->getNumSolMedisyn() . "," . $op->getImpresora() . "," . $op->getInsumo() . ")");
        }
        $this->con->cerrar();
    }

    function ValidaRegistro($op) {
        if ($this->con->conectar() == true) {
            $query = mysql_query("SELECT cantidad, fechaIngreso, numSolMedisyn, impresora, insumo FROM stock where numSolMedisyn ='" . $op . "'");
            $resultado = array();
            if ($query && mysql_num_rows($query) > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
        $this->con->cerrar();
    }

}


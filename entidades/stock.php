<?php

class stock {
    protected $idstock;
    protected $cantidad;
    protected $fechaIngreso;
    protected $numSolMedisyn;
    protected $impresora;
    protected $insumo;
    
    public function getIdstock() {
        return $this->idstock;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getFechaIngreso() {
        return $this->fechaIngreso;
    }

    public function getNumSolMedisyn() {
        return $this->numSolMedisyn;
    }

    public function getImpresora() {
        return $this->impresora;
    }

    public function getInsumo() {
        return $this->insumo;
    }

    public function setIdstock($idstock) {
        $this->idstock = $idstock;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function setFechaIngreso($fechaIngreso) {
        $this->fechaIngreso = $fechaIngreso;
    }

    public function setNumSolMedisyn($numSolMedisyn) {
        $this->numSolMedisyn = $numSolMedisyn;
    }

    public function setImpresora($impresora) {
        $this->impresora = $impresora;
    }

    public function setInsumo($insumo) {
        $this->insumo = $insumo;
    }


   
   
}

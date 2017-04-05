<?php

class tipo_insumo {
    
    protected $idtipo_insumo;
    protected $descripcion;
    protected $codigo_medisyn;
    public function getIdtipo_insumo() {
        return $this->idtipo_insumo;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getCodigo_medisyn() {
        return $this->codigo_medisyn;
    }

    public function setIdtipo_insumo($idtipo_insumo) {
        $this->idtipo_insumo = $idtipo_insumo;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setCodigo_medisyn($codigo_medisyn) {
        $this->codigo_medisyn = $codigo_medisyn;
    }


    
}

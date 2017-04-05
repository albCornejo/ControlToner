<?php


class unidad {
    
    protected $idunidad;
    protected $descripcion;
    protected $piso;
    protected $vigencia;
    
    public function getIdunidad() {
        return $this->idunidad;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPiso() {
        return $this->piso;
    }

    public function getVigencia() {
        return $this->vigencia;
    }

    public function setIdunidad($idunidad) {
        $this->idunidad = $idunidad;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setPiso($piso) {
        $this->piso = $piso;
    }

    public function setVigencia($vigencia) {
        $this->vigencia = $vigencia;
    }


    
   
}

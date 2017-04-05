<?php


class cargo {
    
    protected $idcargo;
    protected $descripcion;
    protected $vigencia;


    public function getIdcargo() {
        return $this->idcargo;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setIdcargo($idcargo) {
        $this->idcargo = $idcargo;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    
     public function getVigencia() {
        return $this->vigencia;
    }

    public function setVigencia($vigencia) {
        $this->vigencia = $vigencia;
    }


}

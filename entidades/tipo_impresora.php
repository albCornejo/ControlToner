<?php

class tipo_impresora {
    
    protected $idtipo_impresora;
    protected $descripcion;
    
    public function getIdtipo_impresora() {
        return $this->idtipo_impresora;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setIdtipo_impresora($idtipo_impresora) {
        $this->idtipo_impresora = $idtipo_impresora;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


}

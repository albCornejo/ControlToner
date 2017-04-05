<?php


class responsable {
    
    protected $idresponsable;
    protected $rut;
    protected $nombre;
    protected $aPaterno;
    protected $aMaterno;
    protected $correo;
    protected $vigencia;
    protected $cargo;
    protected $unidad;

    public function getIdresponsable() {
        return $this->idresponsable;
    }

    public function getRut() {
        return $this->rut;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getAPaterno() {
        return $this->aPaterno;
    }

    public function getAMaterno() {
        return $this->aMaterno;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getVigencia() {
        return $this->vigencia;
    }

    public function getCargo() {
        return $this->cargo;
    }

    public function getUnidad() {
        return $this->unidad;
    }

    public function setIdresponsable($idresponsable) {
        $this->idresponsable = $idresponsable;
    }

    public function setRut($rut) {
        $this->rut = $rut;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setAPaterno($aPaterno) {
        $this->aPaterno = $aPaterno;
    }

    public function setAMaterno($aMaterno) {
        $this->aMaterno = $aMaterno;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function setVigencia($vigencia) {
        $this->vigencia = $vigencia;
    }

    public function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    public function setUnidad($unidad) {
        $this->unidad = $unidad;
    }


}

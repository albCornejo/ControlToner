<?php

class solicitud {
    
    protected $idSolicitud;
    protected $fechaIngreso;
    protected $idresponsable;
    protected $cantidad;
    protected $usuSolicita;
    protected $vigencia;
    protected $idimpresora;
    
    public function getIdSolicitud() {
        return $this->idSolicitud;
    }

    public function getFechaIngreso() {
        return $this->fechaIngreso;
    }

    public function getIdresponsable() {
        return $this->idresponsable;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getUsuSolicita() {
        return $this->usuSolicita;
    }

    public function getVigencia() {
        return $this->vigencia;
    }

    public function getIdimpresora() {
        return $this->idimpresora;
    }

    public function setIdSolicitud($idSolicitud) {
        $this->idSolicitud = $idSolicitud;
    }

    public function setFechaIngreso($fechaIngreso) {
        $this->fechaIngreso = $fechaIngreso;
    }

    public function setIdresponsable($idresponsable) {
        $this->idresponsable = $idresponsable;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function setUsuSolicita($usuSolicita) {
        $this->usuSolicita = $usuSolicita;
    }

    public function setVigencia($vigencia) {
        $this->vigencia = $vigencia;
    }

    public function setIdimpresora($idimpresora) {
        $this->idimpresora = $idimpresora;
    }




}

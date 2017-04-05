<?php

class impresora {
    protected $idimpresora;
    protected $marca;
    protected $modelo;
    protected $serie;
    protected $vigenca;
    protected $insumo;
    protected $tipoImpresora;

    public function getInsumo() {
        return $this->insumo;
    }

    public function getTipoImpresora() {
        return $this->tipoImpresora;
    }

    public function setInsumo($insumo) {
        $this->insumo = $insumo;
    }

    public function setTipoImpresora($tipoImpresora) {
        $this->tipoImpresora = $tipoImpresora;
    }

    
    public function getVigenca() {
        return $this->vigenca;
    }

    public function setVigenca($vigenca) {
        $this->vigenca = $vigenca;
    }

        
    public function getIdimpresora() {
        return $this->idimpresora;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function getSerie() {
        return $this->serie;
    }

    public function setIdimpresora($idimpresora) {
        $this->idimpresora = $idimpresora;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function setSerie($serie) {
        $this->serie = $serie;
    }


}

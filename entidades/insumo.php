<?php

class insumo {
    protected $idinsumo;
    protected $marca;
    protected $codigo;
    protected $vigencia;
    protected $codigoMedisyn;
    protected $idtipo_insumo;

    public function getIdinsumo() {
        return $this->idinsumo;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getVigencia() {
        return $this->vigencia;
    }

    public function getCodigoMedisyn() {
        return $this->codigoMedisyn;
    }

    public function getIdtipo_insumo() {
        return $this->idtipo_insumo;
    }

    public function setIdinsumo($idinsumo) {
        $this->idinsumo = $idinsumo;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setVigencia($vigencia) {
        $this->vigencia = $vigencia;
    }

    public function setCodigoMedisyn($codigoMedisyn) {
        $this->codigoMedisyn = $codigoMedisyn;
    }

    public function setIdtipo_insumo($idtipo_insumo) {
        $this->idtipo_insumo = $idtipo_insumo;
    }


    

}

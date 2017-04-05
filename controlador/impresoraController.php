<?php

require_once 'modelos/ModeloImpresora.php';
require_once 'modelos/ModeloTImpresora.php';
require_once 'modelos/ModeloInsumo.php';
$impresoraForm = new impresora();
$modeloImpresora = new ModeloImpresora();
$modeloTImpresora = new ModeloTImpresora();
$modeloInsumo = new ModeloInsumo();
$tituloVista = "Impresora";

if ($accion == "ImpresoraList") {
    $registros = $modeloImpresora->mostrarTodoImpresoras();
    $datos = "";
    $datos .="<table class='table table-bordered table-hover'>";
    $datos .="<thead>";
    $datos .="<tr>";
    $datos .="<th>id Impresora</th>";
    $datos .="<th>Marca</th>";
    $datos .="<th>Modelo</th>";
    $datos .="<th>Serie</th>";
    $datos .="<th>Vigencia</th>";
    $datos .="<th>Insumo</th>";
    $datos .="<th>Tipo Impresora</th>";
    $datos .="</tr>";
    $datos .="</thead>";
    $datos .="<tbody>";
    foreach ($registros as $impresora) {
        $datos .="<tr>";
        $datos .="<td>" . $impresora->getIdimpresora() . "</td>";
        $datos .="<td>" . $impresora->getMarca() . "</td>";
        $datos .="<td>" . $impresora->getModelo() . "</td>";
        $datos .="<td>" . $impresora->getSerie() . "</td>";
        $datos .="<td>" . $impresora->getVigenca() . "</td>";
        $datos .="<td>" . $impresora->getInsumo() . "</td>";
        $datos .="<td>" . $impresora->getTipoImpresora() . "</td>";
        $datos .="</tr>";
    }
    require_once 'vistas/VistaListas.php';
    
} elseif ($accion == 'ImpresoraFormIng') {
    $validaExiste = $modeloImpresora->ValidaRegistro($_POST["serie"]);
    if (!$validaExiste > 0) {
        $impresoraForm->setMarca($_POST["marca"]);
        $impresoraForm->setModelo($_POST["modelo"]);
        $impresoraForm->setSerie($_POST["serie"]);
        $impresoraForm->setVigenca($_POST["vigencia"]);
        $impresoraForm->setInsumo($_POST["insumo"]);
        $impresoraForm->setTipoImpresora($_POST["tipo_impresora"]);

        $registros = $modeloImpresora->IngresarImpresora($impresoraForm);
        if ($registros > 0) {
            echo "<div class='alert alert-success alert-dismissable'>";
            echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
            echo "<strong>¡Felicitaciones!</strong> Impresora Ingresada Exitosamente.";
            echo "</div>";
        } else {
            echo "<div class='alert alert-danger alert-dismissable'>";
            echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
            echo "<strong>¡Error!</strong> Impresora No Ingresada, Intente Nuevamente.";
            echo "</div>";
        }
    } else {
        echo "<div class='alert alert-danger alert-dismissable'>";
        echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
        echo "<strong>¡Error!</strong> Impresora ya esxiste en la base de datos";
        echo "</div>";
    }
    require_once 'vistas/vFormImpresora.php';
} elseif ($accion == 'ResultadoBusquedaImpresora') {
    $datos = "";
    if (!empty($_POST["marca"])) {
        $op = $_POST["marca"];
        // echo $op;
        $registros = $modeloImpresora->BusquedaImpresora($op);
        $datos .="<table class='table table-bordered table-hover'>";
        $datos .="<thead>";
        $datos .="<tr>";
        $datos .="<th>id Impresora</th>";
        $datos .="<th>Marca</th>";
        $datos .="<th>Modelo</th>";
        $datos .="<th>Serie</th>";
        $datos .="<th>Vigencia</th>";
        $datos .="<th>Insumo</th>";
        $datos .="<th>Tipo Impresora</th>";
        $datos .="</tr>";
        $datos .="</thead>";
        $datos .="<tbody>";
        foreach ($registros as $impresora) {
            $datos .="<tr>";
            $datos .="<td>" . $impresora->getIdimpresora() . "</td>";
            $datos .="<td>" . $impresora->getMarca() . "</td>";
            $datos .="<td>" . $impresora->getModelo() . "</td>";
            $datos .="<td>" . $impresora->getSerie() . "</td>";
            $datos .="<td>" . $impresora->getVigenca() . "</td>";
            $datos .="<td>" . $impresora->getInsumo() . "</td>";
            $datos .="<td>" . $impresora->getTipoImpresora() . "</td>";
            $datos .="</tr>";
        }
        require_once 'vistas/vBsquedaImpresora.php';
    }
} elseif ($accion == "ImpresoraForm") {
    
    $registros = $modeloInsumo->mostrarTodoInsumo();
    $cbInsumo = "";
    foreach ($registros as $insumo) {
        $cbInsumo .= "<option value='" . $insumo->getIdinsumo(). "'>" . $insumo->getMarca() . "</option>";
    }
    
    
    $registros2 = $modeloTImpresora->mostrarTodoTImpresoras();
    $cbTImpresoras = "";
    foreach ($registros2 as $tipo_impresora) {
        $cbTImpresoras .= "<option value='" . $tipo_impresora->getIdtipo_impresora() . "'>" . $tipo_impresora->getDescripcion() . "</option>";
    }
     
    
    require_once 'vistas/vFormImpresora.php';
}
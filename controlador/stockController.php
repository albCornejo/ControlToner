<?php

require_once 'modelos/ModeloStock.php';
require_once 'modelos/ModeloImpresora.php';
require_once 'modelos/ModeloInsumo.php';

$StockForm = new stock();
//$ImpesoraForm = new impresora();
//$insumoForm= new insumo();
$modeloInsumo= new ModeloInsumo();
$modeloImpresora = new ModeloImpresora();
$modeloStock = new ModeloStock();
$tituloVista = "Stock Insumo";

if ($accion == "StockList") {
    $registros = $modeloStock->mostrarTodoStock();
    $datos = "";
    $datos .="<table class='table table-bordered table-hover'>";
    $datos .="<thead>";
    $datos .="<tr>";
    $datos .="<th>id Stock</th>";
    $datos .="<th>Catidad</th>";
    $datos .="<th>Fecha Ingreso</th>";
    $datos .="<th>Numero Medisyn</th>";
    $datos .="<th>Impresora Modelo</th>";
    $datos .="<th>Insumo Codigo</th>";
    $datos .="</tr>";
    $datos .="</thead>";
    $datos .="<tbody>";
    foreach ($registros as $stock) {
        $datos .="<tr>";
        $datos .="<td>" . $stock->getIdstock() . "</td>";
        $datos .="<td>" . $stock->getCantidad() . "</td>";
        $datos .="<td>" . date("d-m-Y", strtotime($stock->getFechaIngreso())) . "</td>";
        $datos .="<td>" . $stock->getNumSolMedisyn() . "</td>";
        $datos .="<td>" . $stock->getImpresora() . "</td>";
        $datos .="<td>" . $stock->getInsumo() . "</td>";
        $datos .="</tr>";
    }

    require_once 'vistas/VistaListas.php';
    
} elseif ($accion == 'StockFormIng') {
    $validaExiste = $modeloStock->ValidaRegistro($_POST["numSolMedisyn"]);
    if (!$validaExiste) {
        $fechaIngreso = date("Y-m-d", strtotime($_POST["fechaIngreso"]));
        $StockForm->setCantidad($_POST["cantidad"]);
        $StockForm->setFechaIngreso($fechaIngreso);
        $StockForm->setNumSolMedisyn($_POST["numSolMedisyn"]);
        $StockForm->setImpresora($_POST["impresora"]);
        $StockForm->setInsumo($_POST["insumo"]);       

        $registros = $modeloStock->IngresarStock($StockForm);

        if ($registros > 0) {
            $error = 1;
        } else {
            $error = 0;
        }
    } else {
        $error = 3;
    }

//echo"<script language='javascript'>window.location='index.php?accion=FormStock&error=" . $error . "';</script>";
    
} elseif ($accion == "FormStock") {
    $registros2 = $modeloImpresora->mostrarTodoImpresoras();
    $cbImpresora = "";
    foreach ($registros2 as $impresora) {
        $cbImpresora .= "<option value='" . $impresora->getIdimpresora() . "'>" . $impresora->getModelo() . "</option>";
    }

    $registros = $modeloInsumo->mostrarTodoInsumo();
    $cbInsumo = "";
    foreach ($registros as $insumo) {
        $cbInsumo .= "<option value='" . $insumo->getIdinsumo(). "'>" . $insumo->getCodigo(). "</option>";
    }

    require_once 'vistas/vFormStock.php';
}

<?php

require_once 'modelos/ModeloTInsumo.php';
$TinsumoForm = new tipo_insumo();
$modeloTInsumo = new ModeloTInsumo();
$tituloVista = "Tipos de Insumo";

if ($accion == "TinsumoList") {
    $registros = $modeloTInsumo->mostrarTodoTInsumos();
    $datos = "";
    $datos .="<table class='table table-bordered table-hover'>";
    $datos .="<thead>";
    $datos .="<tr>";
    $datos .="<th>id Tipo Insumo</th>";
    $datos .="<th>Descripcion</th>";
    $datos .="</tr>";
    $datos .="</thead>";
    $datos .="<tbody>";
    foreach ($registros as $tipo_insumo) {
        $datos .="<tr>";
        $datos .="<td>" . $tipo_insumo->getIdtipo_insumo() . "</td>";
        $datos .="<td>" . $tipo_insumo->getDescripcion() . "</td>";
        $datos .="</tr>";
    }
    
    require_once 'vistas/VistaListas.php';
    
} elseif ($accion == 'TipoInsumoFormIng') {
    $validaExiste = $modeloTInsumo->ValidaRegistro($_POST["descripcion"]);
    if (!$validaExiste > 0) {
        $TinsumoForm->setDescripcion($_POST["descripcion"]);


        $registros = $modeloTInsumo->IngresarTipoInsumo($TinsumoForm);
        if ($registros > 0) {
            echo "<div class='alert alert-success alert-dismissable'>";
            echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
            echo "<strong>¡Felicitaciones!</strong>Tipo Insumo Ingresada Exitosamente.";
            echo "</div>";
        } else {
            echo "<div class='alert alert-danger alert-dismissable'>";
            echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
            echo "<strong>¡Error!</strong>Tipo Insumo No Ingresado, Intente Nuevamente.";
            echo "</div>";
        }
    } else {
        echo "<div class='alert alert-danger alert-dismissable'>";
        echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
        echo "<strong>¡Error!</strong>Tipo Insumo ya esxiste en la base de datos";
        echo "</div>";
    }
    
    require_once 'vistas/vFormTipoInsumo.php';
    
} elseif ($accion == 'ResultadoBusquedaTipoInsumo') {
    $datos = "";
    if (!empty($_POST["descripcion"])) {
        $op = $_POST["descripcion"];
        $registros = $modeloTInsumo->BusquedaTipoInsumo($op);
        $datos = "";
        $datos .="<table class='table table-bordered table-hover'>";
        $datos .="<thead>";
        $datos .="<tr>";
        $datos .="<th>id Tipo Insumo</th>";
        $datos .="<th>Descripcion</th>";
        $datos .="</tr>";
        $datos .="</thead>";
        $datos .="<tbody>";
        foreach ($registros as $tipo_insumo) {
            $datos .="<tr>";
            $datos .="<td>" . $tipo_insumo->getIdtipo_insumo() . "</td>";
            $datos .="<td>" . $tipo_insumo->getDescripcion() . "</td>";
            $datos .="</tr>";
        }
        
        require_once 'vistas/vBusquedaTipoInsumo.php';
    }
}

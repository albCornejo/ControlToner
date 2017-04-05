<?php

require_once 'modelos/ModeloTImpresora.php';
$TimpresoraForm = new tipo_impresora();
$modeloTImpresora = new ModeloTImpresora();
$tituloVista = "Tipos de Impresora";

if ($accion == "TimpresoraList") {
    $registros = $modeloTImpresora->mostrarTodoTImpresoras();
    $datos = "";
    $datos .="<table class='table table-bordered table-hover'>";
    $datos .="<thead>";
    $datos .="<tr>";
    $datos .="<th>id Tipo Impresora</th>";
    $datos .="<th>Descripcion</th>";
    $datos .="</tr>";
    $datos .="</thead>";
    $datos .="<tbody>";
    foreach ($registros as $tipo_impresora) {
        $datos .="<tr>";
        $datos .="<td>" . $tipo_impresora->getIdtipo_impresora() . "</td>";
        $datos .="<td>" . $tipo_impresora->getDescripcion() . "</td>";
        $datos .="</tr>";
    }
    require_once 'vistas/VistaListas.php';
    
} elseif ($accion == 'TipoImpresoraFormIng') {
    $validaExiste = $modeloTImpresora->ValidaRegistro($_POST["descripcion"]);
    if (!$validaExiste > 0) {
        $TimpresoraForm->setDescripcion($_POST["descripcion"]);

        $registros = $modeloTImpresora->IngresarTipoImpresora($TimpresoraForm);
        
        if ($registros > 0) {
            echo "<div class='alert alert-success alert-dismissable'>";
            echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
            echo "<strong>¡Felicitaciones!</strong>Tipo Impresora Ingresada Exitosamente.";
            echo "</div>";
        } else {
            echo "<div class='alert alert-danger alert-dismissable'>";
            echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
            echo "<strong>¡Error!</strong>Tipo Impresora No Ingresada, Intente Nuevamente.";
            echo "</div>";
        }
    } else {
        echo "<div class='alert alert-danger alert-dismissable'>";
        echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
        echo "<strong>¡Error!</strong>Tipo Impresora ya esxiste en la base de datos";
        echo "</div>";
    }
    require_once 'vistas/vFormTipoImpresora.php';
    
} elseif ($accion == 'ResultadoBusquedaTipoImpresora') {
    $datos = "";
    if (!empty($_POST["descripcion"])) {
        $op = $_POST["descripcion"];
        $registros = $modeloTImpresora->BusquedaTipoImpresora($op);
        $datos = "";
        $datos .="<table class='table table-bordered table-hover'>";
        $datos .="<thead>";
        $datos .="<tr>";
        $datos .="<th>id Tipo Impresora</th>";
        $datos .="<th>Descripcion</th>";
        $datos .="</tr>";
        $datos .="</thead>";
        $datos .="<tbody>";
        foreach ($registros as $tipo_impresora) {
            $datos .="<tr>";
            $datos .="<td>" . $tipo_impresora->getIdtipo_impresora() . "</td>";
            $datos .="<td>" . $tipo_impresora->getDescripcion() . "</td>";
            $datos .="</tr>";
        }
        require_once 'vistas/vBusquedaTipoImpresora.php';
    }
}

<?php

require_once 'modelos/ModeloSolicitud.php';
require_once 'modelos/ModeloImpresora.php';
require_once 'modelos/ModeloResponsable.php';
$solicitudForm = new solicitud();
$modeloSolicitud = new ModeloSolicitud();
$modeloResponsable = new ModeloResponsable();
$modeloImpresora = new ModeloImpresora();
$tituloVista = "Solicitud";

if ($accion == "solicitudList") {
    $registros = $modeloSolicitud->mostrarTodoSolicitud();
    $datos = "";
    $datos .="<table class='table table-bordered table-hover'>";
    $datos .="<thead>";
    $datos .="<tr>";
    $datos .="<th>id Solicitud</th>";
    $datos .="<th>Fecha Ingreso</th>";
    $datos .="<th>Cantidad</th>";
    $datos .="<th>Usuario Solicitante</th>";
    $datos .="<th>Vigencia</th>";
    $datos .="<th>Id Impresora</th>";
    $datos .="<th>Id Responsable</th>";
    $datos .="</tr>";
    $datos .="</thead>";
    $datos .="<tbody>";
    foreach ($registros as $solicitud) {
        $datos .="<tr>";
        
        $datos .="<td>" . $solicitud->getIdSolicitud() . "</td>";
        $datos .="<td>" . date("d-m-Y", strtotime($solicitud->getFechaIngreso())) . "</td>";
        $datos .="<td>" . $solicitud->getCantidad() . "</td>";
        $datos .="<td>" . $solicitud->getUsuSolicita(). "</td>";
        $datos .="<td>" . $solicitud->getVigencia(). "</td>";
        $datos .="<td>" . $solicitud->getIdimpresora() . "</td>";
        $datos .="<td>" . $solicitud->getIdresponsable() . "</td>";
        $datos .="</tr>";
    }
    require_once 'vistas/VistaListas.php';
    
}
elseif ($accion == 'solicitudFormIng') {
    //$validaExiste = $modeloResponsable->ValidaRegistro($_POST["rut"]);
    //if (!$validaExiste > 0) 
        
        $fechaIngreso = date("Y-m-d", strtotime($_POST["fechaIngreso"]));
        $solicitudForm->setFechaIngreso($fechaIngreso);
        $solicitudForm->setCantidad($_POST["cantidad"]);
        $solicitudForm->setUsuSolicita($_POST["usuSolicita"]);
        $solicitudForm->setVigencia($_POST["vigencia"]);
        $solicitudForm->setIdimpresora($_POST["idimpresra"]);
        $solicitudForm->setIdresponsable($_POST["idresponsable"]);

        $registros = $modeloSolicitud->IngresarSolicitud($solicitudForm);
        if ($registros > 0) {
            echo "<div class='alert alert-success alert-dismissable'>";
            echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
            echo "<strong>¡Felicitaciones!</strong> Solicitud Ingresada Exitosamente.";
            echo "</div>";
        } else {
            echo "<div class='alert alert-danger alert-dismissable'>";
            echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
            echo "<strong>¡Error!</strong> Solicitud No Ingresada, Intente Nuevamente.";
            echo "</div>";
        }
        require_once 'vistas/vFormSolicitud.php';
    } 
    elseif ($accion == "FormSolicitud") {
    $registros = $modeloResponsable->mostrarTodoResponsable();
    $cbResponsable = "";
    foreach ($registros as $responsable) {
        $cbResponsable .= "<option value='" . $responsable->getIdresponsable() . "'>" . $responsable->getNombre() ." ".$responsable->getAPaterno()."-".$responsable->getUnidad(). "</option>";
    }

    $registros2 = $modeloImpresora->mostrarTodoImpresoras();
    $cbImpresora = "";
    foreach ($registros2 as $impresora) {
        $cbImpresora .= "<option value='" . $impresora->getIdimpresora() . "'>" . $impresora->getTipoImpresora() . "</option>";
    }


    require_once 'vistas/vFormSolicitud.php';
}
    
    




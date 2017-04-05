<?php

require_once 'modelos/ModeloResponsable.php';
require_once 'modelos/ModeloUnidad.php';
require_once 'modelos/ModeloCargo.php';
$responsableForm = new responsable();
$modeloResponsable = new ModeloResponsable();
$modeloUnidad = new ModeloUnidad();
$modeloCargo = new ModeloCargo();
$tituloVista = "Responable";

if ($accion == "responsableList") {
    $registros = $modeloResponsable->mostrarTodoResponsable();
    $datos = "";
    $datos .="<table class='table table-bordered table-hover'>";
    $datos .="<thead>";
    $datos .="<tr>";
    $datos .="<th>id Responsable</th>";
    $datos .="<th>Rut</th>";
    $datos .="<th>Nombre</th>";
    $datos .="<th>Apellido Paterno</th>";
    $datos .="<th>Apellido Materno</th>";
    $datos .="<th>Correo</th>";
    $datos .="<th>Vigencia</th>";
    $datos .="<th>Cargo</th>";
    $datos .="<th>Unidad</th>";
    $datos .="</tr>";
    $datos .="</thead>";
    $datos .="<tbody>";
    foreach ($registros as $responsable) {
        $datos .="<tr>";
        $datos .="<td>" . $responsable->getIdresponsable() . "</td>";
        $datos .="<td>" . $responsable->getRut() . "</td>";
        $datos .="<td>" . $responsable->getNombre() . "</td>";
        $datos .="<td>" . $responsable->getAPaterno() . "</td>";
        $datos .="<td>" . $responsable->getAMaterno() . "</td>";
        $datos .="<td>" . $responsable->getCorreo() . "</td>";
        $datos .="<td>" . $responsable->getVigencia() . "</td>";
        $datos .="<td>" . $responsable->getCargo() . "</td>";
        $datos .="<td>" . $responsable->getUnidad() . "</td>";
        $datos .="</tr>";
    }
    require_once 'vistas/VistaListas.php';
} elseif ($accion == 'responsableFormIng') {
//    $validaExiste = $modeloResponsable->ValidaRegistro($_POST["rut"]);
//    if (!$validaExiste) {
        $responsableForm->setRut($_POST["rut"]);
        $responsableForm->setNombre($_POST["nombre"]);
        $responsableForm->setAPaterno($_POST["aPaterno"]);
        $responsableForm->setAMaterno($_POST["aMaterno"]);
        $responsableForm->setCorreo($_POST["correo"]);
        $responsableForm->setVigencia($_POST["vigencia"]);
        $responsableForm->setCargo($_POST["cargo"]);
        $responsableForm->setUnidad($_POST["unidad"]);

        $registros = $modeloResponsable->IngresarResponsable($responsableForm);
        if ($registros > 0) {

            $error = 1;
        } else {

            $error = 0;
        }

    echo"<script language='javascript'>window.location='index.php?accion=FormResponsable&error=".$error."';</script>";
    
} elseif ($accion == 'ResultadoBusquedaResponsable') {
    $datos = "";
    if (!empty($_POST["rut"])) {
        $op = $_POST["rut"];
        $registros = $modeloResponsable->BusquedaResponsable($op);
        $datos = "";
        $datos .="<table class='table table-bordered table-hover'>";
        $datos .="<thead>";
        $datos .="<tr>";
        $datos .="<th>id Responsable</th>";
        $datos .="<th>Rut</th>";
        $datos .="<th>Nombre</th>";
        $datos .="<th>Apellido Paterno</th>";
        $datos .="<th>Apellido Materno</th>";
        $datos .="<th>Correo</th>";
        $datos .="<th>Vigencia</th>";
        $datos .="<th>Cargo</th>";
        $datos .="<th>Unidad</th>";
        $datos .="</tr>";
        $datos .="</thead>";
        $datos .="<tbody>";
        foreach ($registros as $responsable) {
            $datos .="<tr>";
            $datos .="<td>" . $responsable->getIdresponsable() . "</td>";
            $datos .="<td>" . $responsable->getRut() . "</td>";
            $datos .="<td>" . $responsable->getNombre() . "</td>";
            $datos .="<td>" . $responsable->getAPaterno() . "</td>";
            $datos .="<td>" . $responsable->getAMaterno() . "</td>";
            $datos .="<td>" . $responsable->getCorreo() . "</td>";
            $datos .="<td>" . $responsable->getVigencia() . "</td>";
            $datos .="<td>" . $responsable->getCargo() . "</td>";
            $datos .="<td>" . $responsable->getUnidad() . "</td>";
            $datos .="</tr>";
        }
        require_once 'vistas/vBusquedaResponsable.php';
    }
} elseif ($accion == "FormResponsable") {
    $registros = $modeloUnidad->mostrarTodoUnidad();
    $cbUnidad = "";
    foreach ($registros as $unidad) {
        $cbUnidad .= "<option value='" . $unidad->getIdunidad() . "'>" . $unidad->getDescripcion() . "</option>";
    }

    $registros2 = $modeloCargo->mostrarTodoCargo();
    $cbCargo = "";
    foreach ($registros2 as $cargo) {
        $cbCargo .= "<option value='" . $cargo->getIdcargo() . "'>" . $cargo->getDescripcion() . "</option>";
    }


    require_once 'vistas/vFormResponsable.php';
}


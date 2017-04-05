<?php

require_once 'modelos/ModeloInsumo.php';
require_once 'modelos/ModeloTInsumo.php';
$insumoForm = new insumo();
$modeloInsumo = new ModeloInsumo();
$modeloTInsumo = new ModeloTInsumo();
$tituloVista = "Insumos";
echo $accion;
if ($accion == "InsumoList") {
    $registros = $modeloInsumo->mostrarTodoInsumo();
    $datos = "";
    $datos .="<table class='table table-bordered table-hover'>";
    $datos .="<thead>";
    $datos .="<tr>";
    $datos .="<th>id Insumo</th>";
    $datos .="<th>Marca</th>";
    $datos .="<th>Codigo</th>";
    $datos .="<th>Vigencia</th>";
    $datos .="<th>Codigo Medisyn</th>";
//    $datos .="<th>Id Stock</th>";
    $datos .="<th>Id Tipo Insumo</th>";
    $datos .="</tr>";
    $datos .="</thead>";
    $datos .="<tbody>";
    foreach ($registros as $insumo) {
        $datos .="<tr>";
        $datos .="<td>" . $insumo->getIdinsumo() . "</td>";
        $datos .="<td>" . $insumo->getMarca() . "</td>";
        $datos .="<td>" . $insumo->getCodigo() . "</td>";
        $datos .="<td>" . $insumo->getVigencia() . "</td>";
        $datos .="<td>" . $insumo->getCodigoMedisyn() . "</td>";
//        $datos .="<td>" . $insumo->getIdstock() . "</td>";
        $datos .="<td>" . $insumo->getIdtipo_insumo() . "</td>";
        $datos .="</tr>";
    }
    require_once 'vistas/VistaListas.php';
    
} elseif ($accion == 'InsumoFormIng') {
    echo $_POST["codigo"];
    $validaExiste = $modeloInsumo->ValidaRegistro($_POST["codigo"]);
    if (!$validaExiste) {
        $insumoForm->setMarca($_POST["marca"]);
        $insumoForm->setCodigo($_POST["codigo"]);
        $insumoForm->setVigencia($_POST["vigencia"]);
        $insumoForm->setCodigoMedisyn($_POST["codigoMedisyn"]);

        $insumoForm->setIdtipo_insumo($_POST["tipo_insumo"]);

        $registros = $modeloInsumo->IngresarInsumo($insumoForm);
        if ($registros > 0) {
       

            $error = 1;
        } else {

            $error = 0;
        }
    } else 
        {

            $error = 3;
        }
    
    echo"<script language='javascript'>window.location='index.php?accion=FormInsumo&error=".$error."';</script>";
    
} elseif ($accion == 'ResultadoBusquedaInsumo') {
    $datos = "";
    if (!empty($_POST["codigo"])) {
        $op = $_POST["codigo"];
        $registros = $modeloInsumo->BusquedaInsumo($op);
    $datos = "";
    $datos .="<table class='table table-bordered table-hover'>";
    $datos .="<thead>";
    $datos .="<tr>";
    $datos .="<th>id Insumo</th>";
    $datos .="<th>Marca</th>";
    $datos .="<th>Codigo</th>";
    $datos .="<th>Vigencia</th>";
    $datos .="<th>Codigo Medisyn</th>";
//    $datos .="<th>Id Stock</th>";
    $datos .="<th>Id Tipo Insumo</th>";
    $datos .="</tr>";
    $datos .="</thead>";
    $datos .="<tbody>";
    foreach ($registros as $insumo) {
        $datos .="<tr>";
        $datos .="<td>" . $insumo->getIdinsumo() . "</td>";
        $datos .="<td>" . $insumo->getMarca() . "</td>";
        $datos .="<td>" . $insumo->getCodigo() . "</td>";
        $datos .="<td>" . $insumo->getVigencia() . "</td>";
        $datos .="<td>" . $insumo->getCodigoMedisyn() . "</td>";
//        $datos .="<td>" . $insumo->getIdstock() . "</td>";
        $datos .="<td>" . $insumo->getIdtipo_insumo() . "</td>";
        $datos .="</tr>";
        }
        require_once 'vistas/vBusquedaInsumo.php';
    }
    
}elseif  ($accion == "FormInsumo") 
        {
            $registros = $modeloTInsumo->mostrarTodoTInsumos();
            $cbTipoInsumo = "";
            foreach ($registros as $tipoIns)
                {
$cbTipoInsumo .= "<option value='".$tipoIns->getIdtipo_insumo()."'>".$tipoIns->getDescripcion()."</option>";
}
            
            
            
            require_once 'vistas/vFormInsumo.php';
  

}

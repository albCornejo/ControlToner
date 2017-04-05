<?php

require_once 'modelos/ModeloUnidad.php';
$unidadForm = new unidad();
$modeloUnidad = new ModeloUnidad();
$tituloVista = "Unidad";

if ($accion == "unidadList") {
    $registros = $modeloUnidad->mostrarTodoUnidad();
    $datos = "";
    $datos .="<table class='table table-bordered table-hover'>";
    $datos .="<thead>";
    $datos .="<tr>";
    $datos .="<th>id Unidad</th>";
    $datos .="<th>Descripcion</th>";
    $datos .="<th>Piso</th>";
    $datos .="<th>Vigencia</th>";
    $datos .="<th>Opciones</th>";
    $datos .="</tr>";
    $datos .="</thead>";
    $datos .="<tbody>";
    foreach ($registros as $unidad) {
        $datos .="<tr>";
        $datos .="<td>" . $unidad->getIdunidad() . "</td>";
        $datos .="<td>" . $unidad->getDescripcion() . "</td>";
        $datos .="<td>" . $unidad->getPiso() . "</td>";
        $datos .="<td>" . $unidad->getVigencia() . "</td>";
        $datos .="<td>" . "<a id='ModificaUnidad' href='index.php?accion=modificaUnidad&id=".$unidad->getIdunidad()."' class='btn btn-xs btn-info' role='botton' >Modificar</a>
                           <a data-toggle='modal' data-target='#confirm-delete'  id='EliminaUnidad'   data-href=index.php?accion=eliminaUnidad&id=".$unidad->getIdunidad()."  class='btn btn-xs btn-danger'  role='botton' >Eliminar</a>" ."</td>";
        $datos .="</tr>";
        
         ?>

<script>

        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
            
            $('.debug-url').html($(this).find('.danger').attr('href'));
        });

</script>


 <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Confirmar eliminacion</h4>
                </div>
            
                <div class="modal-body">
                    <p></p>
                    <p>Desea eliminar el registro seleccionado?</p>
<!--                    <p class='debug-url'></p>-->
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <a  class="btn btn-danger danger">Eliminar</a>
                </div>
            </div>
        </div>
    </div>
<?php
    }
    
    require_once 'vistas/VistaListas.php';
    
} elseif ($accion == 'unidadFormIng') {
    $validaExiste = $modeloUnidad->ValidaRegistro($_POST["descripcion"]);
    if (!$validaExiste > 0) {
        $unidadForm->setDescripcion($_POST["descripcion"]);
        $unidadForm->setPiso($_POST["piso"]);
        $unidadForm->setVigencia($_POST["vigencia"]);

        $registros = $modeloUnidad->IngresarUnidad($unidadForm);
        if ($registros > 0) {
            echo "<div class='alert alert-success alert-dismissable'>";
            echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
            echo "<strong>¡Felicitaciones!</strong>Unidad Ingresada Exitosamente.";
            echo "</div>";
        } else {
            echo "<div class='alert alert-danger alert-dismissable'>";
            echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
            echo "<strong>¡Error!</strong>Unidad No Ingresada, Intente Nuevamente.";
            echo "</div>";
        }
    } else {
        echo "<div class='alert alert-danger alert-dismissable'>";
        echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
        echo "<strong>¡Error!</strong>Unidad ya esxiste en la base de datos";
        echo "</div>";
    }
    
    require_once 'vistas/vFormUnidad.php';
    
} elseif ($accion == 'ResultadoBusquedaUnidad') {
    $datos = "";
    if (!empty($_POST["descripcion"])) {
        $op = $_POST["descripcion"];
        $registros = $modeloUnidad->BusquedaUnidad($op);
         $datos = "";
    $datos .="<table class='table table-bordered table-hover'>";
    $datos .="<thead>";
    $datos .="<tr>";
    $datos .="<th>id Unidad</th>";
    $datos .="<th>Descripcion</th>";
    $datos .="<th>Piso</th>";
    $datos .="<th>Vigencia</th>";
    $datos .="</tr>";
    $datos .="</thead>";
    $datos .="<tbody>";
    foreach ($registros as $unidad) {
        $datos .="<tr>";
        $datos .="<td>" . $unidad->getIdunidad() . "</td>";
        $datos .="<td>" . $unidad->getDescripcion() . "</td>";
        $datos .="<td>" . $unidad->getPiso() . "</td>";
        $datos .="<td>" . $unidad->getVigencia() . "</td>";
        $datos .="</tr>";
        }
        
        require_once 'vistas/vBusquedaUnidad.php';
    }
}elseif ($accion == 'modificaUnidad') {
    $datos = "";
    if (!empty($_GET["id"])) {
        $op = $_GET["id"];
        $objUnidadmodifica = $modeloUnidad->BusquedaUnidadId($op);

        require_once 'vistas/vFormUnidadModifica.php';
    }
}elseif ($accion == 'unidadFormModificado') {
    
        $unidadForm->setIdunidad($_POST["idundad"]);
        $unidadForm->setDescripcion($_POST["descripcion"]);
        $unidadForm->setPiso($_POST["piso"]);
        $unidadForm->setVigencia($_POST["vigencia"]);

        $registros = $modeloUnidad->ModificarUnidad($unidadForm);
        if ($registros > 0) {
            $error = 1;
            $mensaje = "Unidad Modificado";
        } else {
            $error = 0;
            $mensaje = "Unidad No Modificado";
        }
        
        
echo"<script language='javascript'>window.location='index.php?accion=unidadList&error=".$error."&mensaje=".$mensaje."';</script>";
    }
    elseif ($accion == 'eliminaUnidad') {
    $datos = "";
//    echo "ESTOY AQUIIIIII";
//    echo $_GET["id"];
    if (!empty($_GET["id"])) {
        
         $modeloUnidad->EliminararUnidad($_GET["id"]);
        if($error = 1)
        {
            $mensaje = "Unidad Eliminado";
        }
        else
        {   $mensaje= "Unidad No Eliminado"; }
       echo"<script language='javascript'>window.location='index.php?accion=unidadList&error=".$error."&mensaje=".$mensaje."';</script>";

        }
    
    }




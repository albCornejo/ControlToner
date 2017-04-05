<?php

require_once 'modelos/ModeloCargo.php';
$cargoForm = new cargo();
$modeloCargo = new ModeloCargo();
$tituloVista = "Cargos";

if ($accion == "cargoList") {
    $registros = $modeloCargo->mostrarTodoCargo();
    $datos = "";
    $datos .="<table class='table table-bordered table-hover tablesorter'>";
    $datos .="<thead>";
    $datos .="<tr>";
    $datos .="<th>id Cargo</th>";
    $datos .="<th>Descripcion</th>";
    $datos .="<th>Vigencia</th>";
    $datos .="<th>Opciones</th>";
    $datos .="</tr>";
    $datos .="</thead>";
    $datos .="<tbody>";
    foreach ($registros as $cargo) {
        $datos .="<tr>";
        $datos .="<td>" . $cargo->getIdcargo() . "</td>";
        $datos .="<td>" . $cargo->getDescripcion() . "</td>";
        $datos .="<td>" . $cargo->getVigencia() . "</td>";
        $datos .="<td>" . "<a id='ModificaCargo' href='index.php?accion=modificaCargo&id=".$cargo->getIdcargo()."' class='btn btn-xs btn-info' role='botton' >Modificar</a>
                           <a data-toggle='modal' data-target='#confirm-delete'  id='EliminaCargo'   data-href=index.php?accion=eliminaCargo&id=".$cargo->getIdcargo()."  class='btn btn-xs btn-danger'  role='botton' >Eliminar</a>" ."</td>";

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
    
} elseif ($accion == 'cargoFormIng') {
    $validaExiste = $modeloCargo->ValidaRegistro($_POST["descripcion"]);
    if (!$validaExiste > 0) {
        $cargoForm->setDescripcion($_POST["descripcion"]);
        $cargoForm->setVigencia($_POST["vigencia"]);

        $registros = $modeloCargo->IngresarCargo($cargoForm);
        if ($registros > 0) {
            echo "<div class='alert alert-success alert-dismissable'>";
            echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
            echo "<strong>¡Felicitaciones!</strong>Cargo Ingresado Exitosamente.";
            echo "</div>";
        } else {
            echo "<div class='alert alert-danger alert-dismissable'>";
            echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
            echo "<strong>¡Error!</strong>Cargo No Ingresado, Intente Nuevamente.";
            echo "</div>";
        }
    } else {
        echo "<div class='alert alert-danger alert-dismissable'>";
        echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
        echo "<strong>¡Error!</strong>Cargo ya esxiste en la base de datos";
        echo "</div>";
    }
    
    require_once 'vistas/vFormCargo.php';
    
} elseif ($accion == 'ResultadoBusquedaCargo') {
    $datos = "";
    if (!empty($_POST["descripcion"])) {
        $op = $_POST["descripcion"];
        $registros = $modeloCargo->BusquedaCargo($op);
        $datos = "";
    $datos .="<table class='table table-bordered table-hover'>";
    $datos .="<thead>";
    $datos .="<tr>";
    $datos .="<th>id Cargo</th>";
    $datos .="<th>Descripcion</th>";
    $datos .="<th>Vigencia</th>";
    $datos .="</tr>";
    $datos .="</thead>";
    $datos .="<tbody>";
    foreach ($registros as $cargo) {
        $datos .="<tr>";
        $datos .="<td>" . $cargo->getIdcargo() . "</td>";
        $datos .="<td>" . $cargo->getDescripcion() . "</td>";
        $datos .="<td>" . $cargo->getVigencia() . "</td>";
        $datos .="</tr>";
        }
        
        require_once 'vistas/vBusquedaCargo.php';
    }
}elseif ($accion == 'ResultadoBusquedaCargo') {
    $datos = "";
    if (!empty($_POST["descripcion"])) {
        $op = $_POST["descripcion"];
        $registros = $modeloCargo->BusquedaCargo($op);
        $datos = "";
    $datos .="<table class='table table-bordered table-hover'>";
    $datos .="<thead>";
    $datos .="<tr>";
    $datos .="<th>id Cargo</th>";
    $datos .="<th>Descripcion</th>";
    $datos .="<th>Vigencia</th>";
    $datos .="</tr>";
    $datos .="</thead>";
    $datos .="<tbody>";
    foreach ($registros as $cargo) {
        $datos .="<tr>";
        $datos .="<td>" . $cargo->getIdcargo() . "</td>";
        $datos .="<td>" . $cargo->getDescripcion() . "</td>";
        $datos .="<td>" . $cargo->getVigencia() . "</td>";
        $datos .="</tr>";
        }
        
        require_once 'vistas/vBusquedaCargo.php';
    }
}elseif ($accion == 'modificaCargo') {
    $datos = "";
    if (!empty($_GET["id"])) {
        $op = $_GET["id"];
        $objCargomodifica = $modeloCargo->BusquedaCargoId($op);

        require_once 'vistas/vFormCargoModifica.php';
    }
}elseif ($accion == 'cargoFormModificado') {
    
        $cargoForm->setIdcargo($_POST["idcargo"]);
        $cargoForm->setDescripcion($_POST["descripcion"]);
        $cargoForm->setVigencia($_POST["vigencia"]);

        $registros = $modeloCargo->ModificarCargo($cargoForm);
        if ($registros > 0) {
            $error = 1;
            $mensaje = "Cargo Modificado";
        } else {
            $error = 0;
            $mensaje = "Cargo No Modificado";
        }
        
        
echo"<script language='javascript'>window.location='index.php?accion=cargoList&error=".$error."&mensaje=".$mensaje."';</script>";
    }
    elseif ($accion == 'eliminaCargo') {
    $datos = "";
//    echo "ESTOY AQUIIIIII";
//    echo $_GET["id"];
    if (!empty($_GET["id"])) {
        
         $modeloCargo->EliminararCargo($_GET["id"]);
        if($error = 1)
        {
            $mensaje = "Cargo Eliminado";
        }
        else
        {   $mensaje= "Cargo No Eliminado"; }
       echo"<script language='javascript'>window.location='index.php?accion=cargoList&error=".$error."&mensaje=".$mensaje."';</script>";

        }
    
    }
?>
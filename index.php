
<?php
session_start();
if(isset($_SESSION["Login"]))
{
    $usuarioLogin = $_SESSION["Login"];
}
 else 
 {
    header("location:index_1.php");
 }    
?>

<!doctype html>
<html>
    <head>
        
        
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="css/view.css" media="all">
        <script src="js/jquery.min.js"></script>
        <script language="JavaScript" type="text/javascript" src="js/ajax.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/view.js"></script>
        <script src="js/jquery-ui.min.js" type="text/javascript"></script>
        <link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/scriptMenu2.js" type="text/javascript"></script>
        <link href="css/menu2.css" rel="stylesheet" type="text/css"/>
        <link href="css/boton.css" rel="stylesheet" type="text/css"/>
        
        <script src="js/jquery-ui.js" type="text/javascript"></script>
        <script src="js/jquery-ui.min.js" type="text/javascript"></script>
        <link href="css/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>


     <script src="js/jquery.tablesorter.js" type="text/javascript"></script>
        <script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
        <script src="js/tablesorter.js" type="text/javascript"></script>
        
        
       <script src="jquery.js"></script>
<script src="bootstrap-modal.js"></script>
        


        <meta charset="utf-8">
        <title>Control Toner</title>
    </head>
    
    

    <body>
        
        <div style=" background-color: #6A6161; height: 40px">
            <header>
                <div style="position:absolute; top:8px; right:750px; ">
                    <label style="font: oblique bold 190% cursive; color:#FCFBFB; ">"Control Tres"</label>
                </div>
                    
             
                
                <div style="float: right; position:absolute; top:18px; right:10px; font: oblique bold 120% cursive; color:#FCFBFB; ">
                    <?php     echo "Bienvenido usuario :  ".$usuarioLogin;     ?>&nbsp;&nbsp;<a href="index_1.php" style="size: 10px;">Cerrar Sesión</a>
                </div>
                

       </header> 
            </div>


        
        
        
        <div style=" width: 210px; float: left;" >

            <?php
            require_once "vistas/menu2.php";
            $accion = '';


           
            ?>

 

        </div>
        <div style="width: 670px; float: left; ">


            <?php
            //require_once "vistas/menu.php";
            // $accion = ''; 

            if (!empty($_GET["accion"])) {
                $accion = $_GET["accion"];
            }

            if (!empty($_POST["control"])) {
                $accion = $_POST["control"];
            }

            switch ($accion) {
                case "ImpresoraForm":
                    require_once 'controlador/impresoraController.php';
                    break;
                case "ImpresoraFormIng":
                    require_once 'controlador/impresoraController.php';
                    break;
                case "ImpresoraList":
                    require_once 'controlador/impresoraController.php';
                    break;
                case "BusquedaImpresora":
                    require_once "vistas/vBsquedaImpresora.php";
                    break;
                case "ResultadoBusquedaImpresora";
                    require_once "controlador/impresoraController.php";
                    break;


                case "tipoImpresoraForm":
                    require_once 'vistas/vFormTipoImpresora.php';
                    break;
                case "TimpresoraList":
                    require_once 'controlador/tImpresoraController.php';
                    break;
                case "TipoImpresoraFormIng":
                    require_once 'controlador/tImpresoraController.php';
                    break;
                case "BusquedaTipoImpesora":
                    require_once 'vistas/vBusquedaTipoImpresora.php';
                    break;
                case "ResultadoBusquedaTipoImpresora";
                    require_once "controlador/tImpresoraController.php";
                    break;


                case "tipoInsumoForm":
                    require_once 'vistas/vFormTipoInsumo.php';
                    break;
                case "TinsumoList":
                    require_once 'controlador/tInsumoController.php';
                    break;
                case "TipoInsumoFormIng":
                    require_once 'controlador/tInsumoController.php';
                    break;
                case "BusquedaTipoInsumo":
                    require_once 'vistas/vBusquedaTipoInsumo.php';
                    break;
                case "ResultadoBusquedaTipoInsumo";
                    require_once "controlador/tInsumoController.php";
                    break;


                case "FormStock":
                    require_once 'controlador/stockController.php';
                    break;
                case "StockFormIng":
                    require_once 'controlador/stockController.php';
                    break;
                case "StockList":
                    require_once 'controlador/stockController.php';
                    break;


                case "FormInsumo":
                    require_once 'controlador/insumoController.php';
                    break;
                case "InsumoFormIng":
                    require_once 'controlador/insumoController.php';
                    break;
                case "InsumoList":
                    require_once 'controlador/insumoController.php';
                    break;
                case "BusquedaInsumo":
                    require_once 'vistas/vBusquedaInsumo.php';
                    break;
                case "ResultadoBusquedaInsumo";
                    require_once "controlador/insumoController.php";
                    break;

                
                case "FormCargo":
                    require_once 'vistas/vFormCargo.php';
                    break;
                case "cargoFormIng":
                    require_once 'controlador/cargoController.php';
                    break;
                case "cargoList":
                    require_once 'controlador/cargoController.php';
                    break;
                case "BusquedaCargo":
                    require_once 'vistas/vBusquedaCargo.php';
                    break;
                case "ResultadoBusquedaCargo";
                    require_once "controlador/cargoController.php";
                    break;
                 case "modificaCargo";
                    require_once "controlador/cargoController.php";
                    break; 
                case "cargoFormModificado";
                  require_once "controlador/cargoController.php";
                    break;
                case "eliminaCargo";
                    require_once "controlador/cargoController.php";
                    break;
                
                

                
                case "FormUnidad":
                    require_once 'vistas/vFormUnidad.php';
                    break;
                case "unidadFormIng":
                    require_once 'controlador/unidadController.php';
                    break;
                case "unidadList":
                    require_once 'controlador/unidadController.php';
                    break;
                case "BusquedaUnidad":
                    require_once 'vistas/vBusquedaUnidad.php';
                    break;
                case "ResultadoBusquedaUnidad";
                    require_once "controlador/unidadController.php";
                    break;
                 case "modificaUnidad";
                     require_once 'controlador/unidadController.php';
                    break; 
                case "unidadFormModificado";
                   require_once 'controlador/unidadController.php';;
                    break;
                case "eliminaUnidad";
                     require_once 'controlador/unidadController.php';
                    break;


                case "FormResponsable":
                    require_once 'controlador/responsableController.php';
                    break;
                case "responsableFormIng":
                    require_once 'controlador/responsableController.php';
                    break;
                case "responsableList":
                    require_once 'controlador/responsableController.php';
                    break;
                case "BusquedaResponsable":
                    require_once 'vistas/vBusquedaResponsable.php';
                    break;
                case "ResultadoBusquedaResponsable";
                    require_once "controlador/responsableController.php";
                    break;

                
                case "FormSolicitud":
                    require_once 'controlador/solicitudController.php';
                    break;
                case "solicitudFormIng":
                    require_once 'controlador/solicitudController.php';
                    break;
                case "solicitudList":
                    require_once 'controlador/solicitudController.php';
                    break;


                default;
                    echo "<img src='img/emotic.jpg'/>";
                    break;
            }
            ?>
        </div>
        
        
        <script src="jquery.js"></script>
        <script src="bootstrap-modal.js"></script>
        
        
    </body>
</html>

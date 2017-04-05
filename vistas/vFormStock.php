<script>
        $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
        };
        $.datepicker.setDefaults($.datepicker.regional['es']);
       $(function () {
       $( "#datepicker" ).datepicker(
               { minDate: "0D", maxDate: "2Y" ,
               changeMonth: true,
               changeYear: true,
               dateFormat: 'dd-mm-yy' });  });
       
</script>





<img id="top" src="top.png" alt="">
<div id="form_container">

    <h1><a> Ingreso Stock</a></h1>
    <form id="form_1010057" class="appnitro"  method="post" action="index.php">
        <div class="form_description">
            <h2> Ingreso Stock</h2>
            <p></p>
            
             <?php
                if(!empty($_GET["error"]))
                {
                if ($_GET["error"] == 1) {
                    echo "<div class='alert alert-success alert-dismissable'>";
                    echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                    echo "<strong>¡Felicitaciones!</strong> Ingresado Exitosamente.";
                    echo "</div>";
                } elseif($_GET["error"] == 0) {
                    echo "<div class='alert alert-danger alert-dismissable'>";
                    echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                    echo "<strong>¡Error!</strong>No Ingresado, Intente Nuevamente.";
                    echo "</div>";
                } elseif($_GET["error"] == 3) {
                    echo "<div class='alert alert-danger alert-dismissable'>";
                    echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                    echo "<strong>¡Error!</strong> Numero Solicitud Medisyn ya existe en la base de datos";
                    echo "</div>";

                }           
                }
            ?>
            
        </div>						
        <ul >

            <li id="li_1" >
                <label class="description" for="element_1">Cantidad </label>
                <div>
                    <input id="cantidad" name="cantidad" class="element text medium" type="number"  value="" required min="1" max="99" placeholder="Solo numeros" /> 
                </div> 
            </li>		<li id="li_2" >
                <label class="description" for="element_2">Fecha Ingreso </label>
                <div>
                    <input id="datepicker" name="fechaIngreso" class="element text medium" type="text" maxlength="255" value=""/> 
  
                </div> 
            </li>		<li id="li_3" >
                <label class="description" for="element_3">Numero Solicitud Medisyn </label>
                <div>
                    <input id="numSolMedisyn" name="numSolMedisyn" class="element text medium" type="number"  value="" placeholder="Solo numeros" /> 
                </div> 
            </li>
            <li id="li_4" >
                <label class="description" for="element_4">Impresora </label>
                <div>
                    <select class="element select medium" id="impresora" name="impresora" required=""> 
                      <?php   echo $cbImpresora;   ?>

                    </select>
                </div> 
            </li>
            <li id="li_5" >
                <label class="description" for="element_4">Insumo </label>
                <div>
                    <select class="element select medium" id="insumo" name="insumo" required=""> 
                     <?php   echo $cbInsumo;   ?>
                    </select>
                </div> 
            </li>
            

            <li class="buttons">
                
                <input type="hidden" id="control" name="control" value="StockFormIng" />

                <input id="saveForm" class="btn-ejemplo" type="submit" name="submit" value="Guardar" />
            </li>
        </ul>
    </form>	
    <div id="footer">
        <a></a>
    </div>
</div>
<img id="bottom" src="bottom.png" alt="">
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

    <h1><a> Ingreso Solicitud Toner</a></h1>
    <form id="form_1010057" class="appnitro"  method="post" action="">
        <div class="form_description">
            <h2> Ingreso Solicitud Toner</h2>
            <p></p>
        </div>						
        <ul >

            <li id="li_1" >
                <label class="description" for="element_1">Fecha Ingreso </label>
                <div>
                    <input id="datepicker" name="fechaIngreso" class="element text medium" type="text" maxlength="255" value="" required=""/> 
                </div> 
            </li>                    <li id="li_5" >
                <label class="description" for="element_5">Impresora </label>
                <div>
                    <select class="element select medium" name="idimpresra" id="tipo">
                       <?php   echo $cbImpresora;   ?>
                    </select>
                </div> 
            </li>

            <li id="li_2" >
                <label class="description" for="element_2">Cantidad </label>
                <div>
                    <input id="cantidad" name="cantidad" class="element text medium" type="number"  value="" required min="1" max="99" /> 
                </div> 
            </li>		<li id="li_3" >
                <label class="description" for="element_3">Usuario Solicitante </label>
                <div>
                    <input id="usuSolicita" name="usuSolicita" class="element text medium" type="text" maxlength="255" value="" required="" /> 
                </div> 
            </li>		<li id="li_4" >
                <label class="description" for="element_4">Vigencia </label>
                <div>
                    <select class="element select medium" id="vigencia" name="vigencia"> 

                        <option value="S" >Activo</option>
                        <option value="N" >Inactivo</option>

                    </select>
                </div> 
            </li>				<li id="li_6" >
                <label class="description" for="element_6">Responsable Unidad </label>
                <div>
                    <select class="element select medium" name="responsable" id="responsable">
                       <?php   echo $cbResponsable;   ?>
                    </select>
                </div> 
            </li>

            <li class="buttons">
                <input type="hidden" name="control" id="control" value="solicitudFormIng" />

                <input id="saveForm" class="btn-ejemplo" type="submit" name="submit" value="Guardar" />
            </li>
        </ul>
    </form>	
    <div id="footer">
        <a></a>
    </div>
</div>
<img id="bottom" src="bottom.png" alt="">

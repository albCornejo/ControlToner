<img id="top" src="img/top.png" alt="">
<div id="form_container">
    <h1><a>Consulta Tipo Insumos</a></h1>
    <form id="form_996464" class="appnitro"  method="post" action="index.php" autocomplete="off">
        <div class="form_description">
            <h2>Consulta Tipo Insumos</h2>
	</div>						
	<ul >
            <li id="li_2" >
		<label class="description" for="element_2">Tipo Insumo </label>
                <div>
                    <input id="descripcion" name="descripcion" class="element text medium" type="text" maxlength="10" value="" required/> 
                </div>
            </li>
            <li class="buttons">
                <input type="hidden" name="control" id="control" value="ResultadoBusquedaTipoInsumo">
		<input id="saveForm" class="btn-ejemplo" type="submit" name="submit" value="Consultar" />
            </li>
	</ul>
    </form>	
    <div id="footer">
    </div>
</div>
<img id="bottom" src="img/bottom.png" alt="">
<?php
    if(!empty($datos))
    { echo $datos; }
?>

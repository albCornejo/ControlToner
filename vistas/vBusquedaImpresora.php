<img id="top" src="img/top.png" alt="">
<div id="form_container">
    <h1><a>Consulta de Impresras</a></h1>
    <form id="form_996464" class="appnitro"  method="post" action="index.php" autocomplete="off">
        <div class="form_description">
            <h2>Consulta de Impresoras</h2>
	</div>						
	<ul >
            <li id="li_2" >
		<label class="description" for="element_2">Marca </label>
                <div>
                    <input id="marca" name="marca" class="element text medium" type="text" maxlength="10" value="" required/> 
                </div>
            </li>
            <li class="buttons">
                <input type="hidden" name="control" id="control" value="ResultadoBusquedaImpresora">
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